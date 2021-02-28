<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    public function index(){
        //$news = News::orderBy('id','asc')->paginate(6);
    	$news = News::orderBy('id','asc')->paginate(6);
    	//return view('news.news_pagination',['news'=>$news]);
    	return view('news.news_pagination',compact('news'));
    }

    public function fetchdata(Request $request){
    	if($request->ajax()){
    	$news = News::orderBy('id','asc')->paginate(6);
    	//return view('news.news_pagination_data',['news'=>$news])->render();
    	  return view('news.news_pagination_data',compact('news'))->render();
    	}
    }
}
