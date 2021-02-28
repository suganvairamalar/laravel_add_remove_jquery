<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Taglist;
use Validator;

class TaglistController extends Controller
{
    public function index(){
    	return view("taglists.taglist_index");
    }

    public function insert(Request $request){
    	$rules = [];


        foreach($request->input('name') as $key => $value) {
            $rules["name.{$key}"] = 'required';
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {

            foreach($request->input('name') as $key => $value) {
                Taglist::create(['name'=>$value]);
            }


            return response()->json(['success'=>'done']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
