<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Position;
use App\Department;
use Validator;
class PositionController extends Controller
{
    public function index(Request $request){
    	//$positions = Position::orderBy('id','desc')->paginate(5);
        $departments = Department::all(['id', 'department_name']);
        if($request->search==""){
                $positions = Position::orderBy('id','desc')->paginate(5);
                return view('positions.position_index',compact('positions'),compact('departments'));
            }else{
             $positions = Position::where('position_name','LIKE','%'.$request->search.'%')
                       ->orderBy('id','asc')
                       ->paginate(5);
             $positions->appends($request->only('search'));
    	return view('positions.position_index',compact('positions'),compact('departments'));
                }
    }

    public function insert(Request $request){    	
        $rules = array( 'position_department_id' => 'required|not_in:0',
                        'position_name' => 'required|unique:positions' );
    	
    	$error = Validator::make($request->all(),$rules);
    	if($error->fails()){
    		return response()->json(['errors'=>$error->errors()->all()]);
    	}
    	$form_data = array('position_department_id' => $request->position_department_id,
                           'position_name' => $request->position_name );
        dd($form_data);
    	Position::create($form_data);
    	return response()->json(['success' => 'Data Inserted Successfully.']);
    }

    public function edit($id){
    	if(request()->ajax()){
    		$data = Position::findOrFail($id);
    		return response()->json(['data' => $data]);
    	}

    }

    public function update(Request $request){

        $rules = array( 'position_department_id' => 'required|not_in:0',
                        'position_name' => 'required' );
    	$error = Validator::make($request->all(),$rules);
    	if($error->fails()){
    		return response()->json(['errors'=>$error->errors()->all()]);
    	}
    	$form_data = array('position_department_id' => $request->position_department_id,
                            'position_name' => $request->position_name );
        //dd($form_data);
    	Position::whereId($request->hidden_id)->update($form_data);
    	return response()->json(['success' => 'Data Updated Successfully.']);

    }

   public function delete($id){
        $data = Position::findOrFail($id);
        $data->delete();
   }

}
