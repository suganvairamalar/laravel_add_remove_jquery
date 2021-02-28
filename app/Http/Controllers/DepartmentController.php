<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Department;
use Validator;

class DepartmentController extends Controller
{
   /* public function index(Request $request){
    	$departments = Department::orderBy('id','desc')->paginate(5);
    	return view('departments.department_index',compact('departments'));
    }*/
    public function index(Request $request){
       if($request->search==""){
             
                $departments = Department::orderBy('id','desc')->paginate(5);
                return view('departments.department_index',compact('departments'));
            }else{
            $departments = Department::where('department_name','LIKE','%'.$request->search.'%')                      
                       ->orderBy('id','desc')
                       ->paginate(5);

                $departments->appends($request->only('search')); //intha line code add pannathumthaan search correct ah work aachu..before without this line search first page work aaguthu more thaan one page data irukkum pothu second page filter aagama yella datavum 2nd page la show aachu...intha line command panni run panna u have to understand what is the problem in searching in 2nd page pagination problem... 
                          
            return view('departments.department_index',compact('departments'));
           
          } 
        }

    public function insert(Request $request){    	
    	$rules = array( 'department_name' => 'required|unique:departments' );
    	$error = Validator::make($request->all(),$rules);
    	if($error->fails()){
    		return response()->json(['errors'=>$error->errors()->all()]);
    	}
    	$form_data = array('department_name' => $request->department_name );
    	Department::create($form_data);
    	return response()->json(['success' => 'Data Inserted Successfully.']);
    }

   /* public function edit($id){
        if(request()->ajax()){
            $data = Department::findOrFail($id);
            return response()->json(['data' => $data]);
        }

    }*/

     public function update(Request $request){

        $rules = array( 'department_name' => 'required|unique:departments' );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $form_data = array('department_name' => $request->department_name );
        Department::whereId($request->id)->update($form_data);
        return response()->json(['success' => 'Data Updated Successfully.']);

    }

    public function delete($id){
        $data = Department::findOrFail($id);
        $data->delete();
    }

    
}
