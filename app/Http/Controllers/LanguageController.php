<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Language;
use Validator;
use Input;

class LanguageController extends Controller
{
   public function index(Request $request){
     $languages = Language::orderBy('id','asc')->paginate(5);
   	 return view('languages.language_index',compact('languages'));
   }

   public function insert(Request $request){   	  
       $rules = [];
       $rules = array( 'person_name'     => 'required');
       foreach($request->input('languages_name') as $key => $value) {
            $rules["languages_name.{$key}"] = 'required';
        }

      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json(['error'  => $error->errors()->all()]);
      }     

      $form_data = array('person_name' => $request->person_name,
                         'languages_name' => $request->languages_name
                        );
      
    	Language::create($form_data);
    	return response()->json(['success' => 'Data Inserted Successfully.']);
   }

   public function edit($id){
    if(request()->ajax()){
        $data = Language::findOrFail($id);       
        return response()->json(['data' => $data]);
      }
   }

   public function update(Request $request){
     $rules = [];
       $rules = array( 'person_name'     => 'required');
       foreach($request->input('languages_name') as $key => $value) {
            $rules["languages_name.{$key}"] = 'required';
        }

      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json(['error'  => $error->errors()->all()]);
      }     

      $form_data = array('person_name' => $request->person_name,
                         'languages_name' => implode(',',$request->languages_name)
                        );
      
      Language::whereId($request->hidden_id)->update($form_data);
      return response()->json(['success' => 'Data Updated Success.']);
   }

   public function delete($id){
        $data = Language::findOrFail($id);
        $data->delete();

   }


}
