<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\KnownTechnology;
use Validator;
use Session;


class KnownTechnologyController extends Controller
{
   /* public function index(){
    	$known_technologies = KnownTechnology::orderby('id','desc')->paginate(5);
    	return view('known_technologies.known_technology_index',['known_technologies'=>$known_technologies]);
    }*/

    public function index(Request $request){ 
        if($request->search==""){
                $known_technologies = KnownTechnology::orderBy('id','asc')->paginate(5);
                return view('known_technologies.known_technology_index',compact('known_technologies'));
            }else{
            $known_technologies = KnownTechnology::where('known_technology_name','LIKE','%'.$request->search.'%')                      
                       ->orderBy('id','asc')
                       ->paginate(5);

                $known_technologies->appends($request->only('search')); //intha line code add pannathumthaan search correct ah work aachu..before without this line search first page work aaguthu more thaan one page data irukkum pothu second page filter aagama yella datavum 2nd page la show aachu...intha line command panni run panna u have to understand what is the problem in searching in 2nd page pagination problem... 
                          
            return view('known_technologies.known_technology_index',compact('known_technologies'));
           
        } 
    }

    public function insert(Request $request){
    	$rules = array( 'known_technology_name' => 'required' );
    	$error = Validator::make($request->all(),$rules);
    	if($error->fails()){
    		return response()->json(['errors'=>$error->errors()->all()]);
    	}
    	$form_data = array('known_technology_name' => $request->known_technology_name );
    	KnownTechnology::create($form_data);
    	return response()->json(['success' => 'Data Inserted Successfully.']);

    }

    public function edit($id){
    	if(request()->ajax()){
    		$data = KnownTechnology::findOrFail($id);
    		return response()->json(['data' => $data]);
    	}

    }

    public function update(Request $request){

    	$rules = array( 'known_technology_name' => 'required' );
    	$error = Validator::make($request->all(),$rules);
    	if($error->fails()){
    		return response()->json(['errors'=>$error->errors()->all()]);
    	}
    	$form_data = array('known_technology_name' => $request->known_technology_name );
    	KnownTechnology::whereId($request->hidden_id)->update($form_data);
    	return response()->json(['success' => 'Data Updated Successfully.']);

    }

    public function delete($id){
    	$data = KnownTechnology::findOrFail($id);
    	$data->delete(); 
    }
}
