<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Student;
use Validator;
use Session;
use DB;
use DateTime;
use Carbon\Carbon;
use File;


class StudentController extends Controller
{
     public function index(){
    	$students = Student::orderby('id','desc')->paginate(5);
        return view('students.student_index',['students'=>$students]);
    }

    public function insert(Request $request){
    		$rules = array('student_name'    => 'required',
    					   'gender'          => 'required',
    					   'join_date'       => 'required',
    					   'dob'             => 'required',
    					   'student_image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    					   'father_name'     => 'required',
    					   'contact_number'  => 'required|numeric',
                           'contact_email'   => 'required|email',
    					   'address'         => 'required',
    					   'mother_tongue'   => 'required',
    					   'known_languages' => 'required',
    					   'certificates'    => 'required'
    						 );
    		$error = Validator::make($request->all(),$rules);

    		if($error->fails()){
    			return response()->json(['errors' => $error->errors()->all()]);
    		}

    		//$student_name = $request->student_name;

    		$student_image = $request->file('student_image');

    		$new_name = rand().'.'.$student_image->getClientOriginalExtension();
    		$student_image->move(public_path('uploads/student_profile'),$new_name);
    		$form_data = array('student_name'      	=> $request->student_name,
    						   'gender' 	     	=> $request->gender,
    					   	   'join_date'       	=> $request->join_date,
    					       'dob'             	=> $request->dob,
    					       'student_image'   	=> $new_name,
    					       'father_name'     	=> $request->father_name,
    					       'contact_number'     => $request->contact_number,
    					       'contact_email'    	=> $request->contact_email,
    					       'address'         	=> $request->address,
    					       'mother_tongue'   	=> $request->mother_tongue,
    					       'known_languages' 	=> $request->known_languages,
    					       'certificates'    	=> $request->certificates
    					       );
    		Student::create($form_data);
    		return response()->json(['success' => 'Data Inserted Successfully.']);
    }


    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Student::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    
    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        //$id = $request->hidden_id;
        $student_image = $request->file('student_image');
        if($student_image != '')
        {
                $rules = array('student_name'    => 'required',
                                'gender'          => 'required',
                                'join_date'       => 'required',
                                'dob'             => 'required',
                                'student_image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                                'father_name'     => 'required',
                                'contact_number'  => 'required|numeric',
                                'contact_email'   => 'required|email',
                                'address'         => 'required',
                                'mother_tongue'   => 'required',
                                'known_languages' => 'required',
                                'certificates'    => 'required'
                        );
                $error = Validator::make($request->all(), $rules);
                if($error->fails()){
                    return response()->json(['errors' => $error->errors()->all()]);
                }
                $image_name = rand() . '.' . $student_image->getClientOriginalExtension();
                $student_image->move(public_path('uploads/student_profile'), $image_name);
        }
        else
        {
                 $rules = array('student_name'    => 'required',
                                'gender'          => 'required',
                                'join_date'       => 'required',
                                'dob'             => 'required',
                                'father_name'     => 'required',
                                'contact_number'  => 'required|numeric',
                                'contact_email'   => 'required|email',
                                'address'         => 'required',
                                'mother_tongue'   => 'required',
                                'known_languages' => 'required',
                                'certificates'    => 'required'
                         );
                 $error = Validator::make($request->all(), $rules);
                 if($error->fails())
                 {
                        return response()->json(['errors' => $error->errors()->all()]);
                 }
        }

         $form_data = array(
                               'student_name'       => $request->student_name,
                               'gender'             => $request->gender,
                               'join_date'          => $request->join_date,
                               'dob'                => $request->dob,
                               'student_image'      => $image_name,
                               'father_name'        => $request->father_name,
                               'contact_number'     => $request->contact_number,
                               'contact_email'      => $request->contact_email,
                               'address'            => $request->address,
                               'mother_tongue'      => $request->mother_tongue,
                               'known_languages'    => $request->known_languages,
                               'certificates'       => $request->certificates
        );

         Student::whereId($request->hidden_id)->update($form_data);
         //Seller::find($id)->update($form_data);
         return response()->json(['success' => 'Data is successfully updated']);

        
    }


}
