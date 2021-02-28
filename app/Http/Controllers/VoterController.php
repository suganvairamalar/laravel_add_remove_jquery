<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Voter;
class VoterController extends Controller
{
    public function index(){
        
        $voters = Voter::orderBy('id','asc')->paginate(6);
    	//$voters = Voter::paginate(6);
        //return view('voters.news_pagination',['voters'=>$news]);
    	return view('voters.voter_pagination',compact('voters'));
    }

    public function fetchdata(Request $request){
    	if($request->ajax()){
        $sort_by = $request->get('sortby');
        $sort_type = $request->get('sorttype');
    	$voters = Voter::orderBy($sort_by, $sort_type)->paginate(6);
    	//return view('voters.news_pagination_data',['voters'=>$voters])->render();
    	  return view('voters.voter_pagination_data',compact('voters'))->render();
    	}
    }
}
