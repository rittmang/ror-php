<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

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
        
        $tname=$request->input('inputTitleName');
        $tyear=$request->input('inputTitleYear');
        $ttype=$request->input('inputTitleType');
        $tgenre=$request->input('inputTitleGenre');
        $tlp=$request->input('inputTitleLongPoster');
        $twp=$request->input('inputTitleWidePoster');
        $ttl=$request->input('inputTitleTrailerLink');
        $tast=$request->input('inputTitleAsset');
        $tvtt=$request->input('inputTitleVTT');
        $tage=$request->input('inputTitleAge');
        $tdur=$request->input('inputTitleDuration');
        $tdes=$request->input('inputTitleDescription');

        DB::insert('insert into title (name,year,type,genre,long_poster,wide_poster,trailer_link,asset,vtt,age,duration,description,views) values (?,?,?,?,?,?,?,?,?,?,?,?,?)',[$tname,$tyear,$ttype,$tgenre,$tlp,$twp,$ttl,$tast,$tvtt,$tage,$tdur,$tdes,0]);
        return redirect('dashboard/titles')->with('insertStatus',$tname . ' was succesfully added.');

    }
    public function titlesUpdate(Request $request)
    {
        $tid=$request->input('editTitleId');
        $tname=$request->input('editTitleName');
        $tyear=$request->input('editTitleYear');
        $ttype=$request->input('editTitleType');
        $tgenre=$request->input('editTitleGenre');
        $tlp=$request->input('editTitleLongPoster');
        $twp=$request->input('editTitleWidePoster');
        $ttl=$request->input('editTitleTrailerLink');
        $tast=$request->input('editTitleAsset');
        $tvtt=$request->input('editTitleVTT');
        $tage=$request->input('editTitleAge');
        $tdur=$request->input('editTitleDuration');
        $tdes=$request->input('editTitleDescription');

        DB::table('title')->where('id',$tid)->update(['name'=>$tname,'year'=>$tyear,'type'=>$ttype,'genre'=>$tgenre,'long_poster'=>$tlp,'wide_poster'=>$twp,'trailer_link'=>$ttl,'asset'=>$tast,'vtt'=>$tvtt,'age'=>$tage,'duration'=>$tdur,'description'=>$tdes]);
        return redirect('dashboard/titles')->with('editStatus',$tname . ' was succesfully edited.');
    }
    public function syncViews(){
        $factory=(new Factory)->withServiceAccount(__DIR__.'/../firebase-pk.json')->withDatabaseUri(getenv('databaseURL'));
        $database=$factory->createDatabase();
        $movie_ids=DB::table('title')->where('type','Movie')->orderBy('id','asc')->get(['id']);
        // Log::error("IDS:".$movie_ids);
        // $series_ids=DB::table('title')->where('type','Series')->orderBy('id','asc')->get(['id']);

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
}
