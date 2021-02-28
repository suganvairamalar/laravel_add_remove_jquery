<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DynamicField;
use Validator;
use Input;
use DB;


class DynamicFieldController extends Controller
{
    public function index(){
    	return view('dynamic_fields.dynamic_field_index');
    }


    public function insert(Request $request)
    {
     
     /* $rules = array( 'first_name'     => 'required',
                      'last_name'      => 'required' 
                      );*/
      $rules = [];
      foreach($request->input('first_name') as $key => $value) {
            $rules["first_name.{$key}"] = 'required';
        }
      foreach($request->input('last_name') as $key => $value) {
            $rules["last_name.{$key}"] = 'required';
        }
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json(['error'  => $error->errors()->all()]);
      }     
        
      $dynamic_fields  = Input::only('first_name','last_name');

            $first_name = $dynamic_fields['first_name'];
            $last_name = $dynamic_fields['last_name'];
            
            foreach( $first_name as $key => $n ) {
                DynamicField::create(
                    array(
                        'first_name' => $first_name[$key],
                        'last_name' => $last_name[$key]                   
                    )
                );
            }
      return response()->json(['success' => 'Data Inserted Successfully.']);
    
    }
}
