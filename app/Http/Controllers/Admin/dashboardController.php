<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Algolia\AlgoliaSearch\SearchClient;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;



class dashboardController extends Controller
{
    public function index(){
        $movie_titles=DB::table('title')->where('type','Movie')->orderBy('id','asc')->get(['id','name','year','genre']);
        $series_titles=DB::table('title')->where('type','Series')->orderBy('id','asc')->get(['id','name','year','genre']);
        return view('dashboard/index',['movie_titles'=>$movie_titles,'series_titles'=>$series_titles]);
    }
    public function titlesIndex(){
        $titles=DB::table('title')->orderBy('id','asc')->get();
        return view('dashboard/titles',['titles'=>$titles]);
    }
    public function titlesDelete(Request $request)
    {
        $ids=$request->ids;
        DB::table('title')->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Titles deleted succesfully"]);
    }
    public function titlesInsert(Request $request)
    {
        $client=SearchClient::create(config('admin.algolia_appid'),config('admin.algolia_apikey'));
        $index=$client->initIndex(config('admin.algolia_index'));
        
        $tname=$request->input('inputTitleName');
        $tlang=$request->input('inputTitleLanguage');
        $tyear=$request->input('inputTitleYear');
        $ttype=$request->input('inputTitleType');
        $tstudio=$request->input('inputTitleStudio');
        $tgenre=$request->input('inputTitleGenre');
        $tlp=$request->input('inputTitleLongPoster');
        $twp=$request->input('inputTitleWidePoster');
        $ttl=$request->input('inputTitleTrailerLink');
        $tast=$request->input('inputTitleAsset');
        $tvtt=$request->input('inputTitleVTT');
        $tage=$request->input('inputTitleAge');
        $tdur=$request->input('inputTitleDuration');
        $tdes=$request->input('inputTitleDescription');

        $tid=DB::table('title')->insertGetId(['name'=>$tname,'year'=>$tyear,'type'=>$ttype,'genre'=>$tgenre,'long_poster'=>$tlp,'wide_poster'=>$twp,'trailer_link'=>$ttl,'asset'=>$tast,'vtt'=>$tvtt,'age'=>$tage,'duration'=>$tdur,'description'=>$tdes,'views'=>0,'studio'=>$tstudio,'lang'=>$tlang]);
        $records=[
            ['objectID'=>$tid,'name'=>$tname,'year'=>$tyear,'long_poster'=>$tlp,'age'=>$tage,'duration'=>$tdur,'lang'=>$tlang]
        ];        
        $index->saveObjects($records,['autoGenerateObjectIDIfNotExist'=>true]);
        return redirect('dashboard/titles')->with('insertStatus',$tname . ' was succesfully added & indexed.');

    }
    public function titlesUpdate(Request $request)
    {
        $client=SearchClient::create(config('admin.algolia_appid'),config('admin.algolia_apikey'));
        $index=$client->initIndex(config('admin.algolia_index'));

        $tid=$request->input('editTitleId');
        $tname=$request->input('editTitleName');
        $tlang=$request->input('editTitleLanguage');
        $tyear=$request->input('editTitleYear');
        $ttype=$request->input('editTitleType');
        $tstudio=$request->input('editTitleStudio');
        $tgenre=$request->input('editTitleGenre');
        $tlp=$request->input('editTitleLongPoster');
        $twp=$request->input('editTitleWidePoster');
        $ttl=$request->input('editTitleTrailerLink');
        $tast=$request->input('editTitleAsset');
        $tvtt=$request->input('editTitleVTT');
        $tage=$request->input('editTitleAge');
        $tdur=$request->input('editTitleDuration');
        $tdes=$request->input('editTitleDescription');

        DB::table('title')->where('id',$tid)->update(['name'=>$tname,'year'=>$tyear,'type'=>$ttype,'genre'=>$tgenre,'long_poster'=>$tlp,'wide_poster'=>$twp,'trailer_link'=>$ttl,'asset'=>$tast,'vtt'=>$tvtt,'age'=>$tage,'duration'=>$tdur,'description'=>$tdes,'studio'=>$tstudio,'lang'=>$tlang]);
        $records=[
            ['objectID'=>$tid,'name'=>$tname,'year'=>$tyear,'long_poster'=>$tlp,'age'=>$tage,'duration'=>$tdur,'lang'=>$tlang]
        ];
        $index->saveObjects($records,['autoGenerateObjectIDIfNotExist'=>true]);

        return redirect('dashboard/titles')->with('editStatus',$tname . ' was succesfully edited.');
    }
    public function syncViews(){
        $factory=(new Factory)->withServiceAccount(__DIR__.'/../firebase-pk.json')->withDatabaseUri(getenv('databaseURL'));
        $database=$factory->createDatabase();
        $movie_ids=DB::table('title')->where('type','Movie')->orderBy('id','asc')->get(['id']);
        
        foreach($movie_ids as $id)
        {
            $reference=$database->getReference("{$id->id}");
            $viewcount=$reference->getValue();
            Log::error("ViewCount is".$viewcount);
            
            DB::table('title')->where('id',$id->id)->update(['views'=>$viewcount]);

        }

        // foreach($series_ids as $id)
        // {
        //     $reference=$database->getReference("{$id->id}");//getReference(30)
        //     $viewcount=$reference->getValue();
            
        //     DB::table('title')->where('id',$id->id)->update(['views'=>$viewcount]);

        // }
        return redirect('dashboard/titles')->with('editStatus','Movie views were succesfully synced with Firebase');
    }
    public function syncSearchIndex(){
        $client=SearchClient::create(config('admin.algolia_appid'),config('admin.algolia_apikey'));
        $index=$client->initIndex(config('admin.algolia_index'));
        $titles=DB::table('title')->orderBy('id','asc')->get(['id AS objectID','name','year','type','long_poster','age','duration','studio','lang']);
        $index->saveObjects($titles,['autoGenerateObjectIDIfNotExist'=>true]);
        return redirect('dashboard/titles')->with('editStatus','Records synced with search index');
    }

    // now for webisodes
    public function webisodesIndex(){
        $webisodes=DB::table('webisodes')->orderBy('title_id','asc')->orderBy('season','asc')->orderBy('episode','asc')->get();
        return view('dashboard/webisodes',['webisodes'=>$webisodes]);
    }
    public function webisodesDelete(Request $request)
    {
        $ids=$request->ids;
        DB::table('webisodes')->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Titles deleted succesfully"]);
    }
    public function webisodesInsert(Request $request)
    {
        $wname=$request->input('inputTitleName');
        $wname=$request->input('inputWebisodeName');
        $wseason=$request->input('inputWebisodeSeason');
        $wepisode=$request->input('inputWebisodeEpisode');
        $wtitleid=$request->input('inputWebisodeTitleId');
        $wposter=$request->input('inputWebisodeWidePoster');
        $wasset=$request->input('inputWebisodeAsset');
        $wvtt=$request->input('inputWebisodeVTT');
        $wduration=$request->input('inputWebisodeDuration');
        $wviews=0;

        try{
            $tid=DB::table('webisodes')->insertGetId(['ep_name'=>$wname,'season'=>$wseason,'episode'=>$wepisode,'title_id'=>$wtitleid,'wide_poster'=>$wposter,'asset'=>$wasset,'vtt'=>$wvtt,'duration'=>$wduration,'views'=>$wviews]);
            return redirect('dashboard/webisodes')->with('insertStatus','Title'.$wtitleid.' S'.$wseason.'E'.$wepisode.' '.$wname . ' was succesfully added & indexed.');
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect('dashboard/webisodes')->with('errorStatus',$e->getMessage());
        }
        // $records=[
        //     ['objectID'=>$tid,'name'=>$tname,'year'=>$tyear,'long_poster'=>$tlp,'age'=>$tage,'duration'=>$tdur,'lang'=>$tlang]
        // ];         

    }
    public function webisodesUpdate(Request $request)
    {
        $wid=$request->input('editWebisodeId');
        $wname=$request->input('editWebisodeName');
        $wseason=$request->input('editWebisodeSeason');
        $wepisode=$request->input('editWebisodeEpisode');
        $wtitleid=$request->input('editWebisodeTitleId');
        $wposter=$request->input('editWebisodeWidePoster');
        $wasset=$request->input('editWebisodeAsset');
        $wvtt=$request->input('editWebisodeVTT');
        $wduration=$request->input('editWebisodeDuration');
        $wviews=$request->input('editWebisodeViews');


        DB::table('webisodes')->where('id',$wid)->update(['ep_name'=>$wname,'season'=>$wseason,'episode'=>$wepisode,'title_id'=>$wtitleid,'wide_poster'=>$wposter,'asset'=>$wasset,'vtt'=>$wvtt,'duration'=>$wduration,'views'=>$wviews]);
        return redirect('dashboard/webisodes')->with('editStatus','Title'.$wtitleid . ' S'.$wseason . 'E'.$wepisode .' '. $wname . ' was succesfully edited.');
    }
    public function servicesIndex(){
        $banner_titles = DB::table('banner_movielist_homepage')->get()->pluck('banner_id')->toArray();
        return view('dashboard/services',['banner_titles'=>$banner_titles]);
    }

}
