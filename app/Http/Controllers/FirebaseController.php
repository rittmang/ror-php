<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    public function index(){
        
        $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json');
        $database=$factory->createDatabase();
        $reference=$database->getReference('page_views');
        $users=$reference->getValue();
        //foreach($users)
        $value=0;
        foreach(array_values($users) as $user)
        {
            $value=$value+$user[0];
        }
        return view('movies/the-social-dilemma')->with('views',$value);

    }
    public function change(Request $request){
        $factory=(new Factory)->withServiceAccount(__DIR__.'/firebase-pk.json');
        $database=$factory->createDatabase();
        $murmur=$request->murmur;
        

        $count=$database->getReference("page_views/{$murmur}/0")->getValue();
        $data=[$count+1];
        $ref=$database->getReference("page_views/{$murmur}")->set($data);
       

    }
}
