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
    					   'mother_tongue'   => 'required|not_in:0',
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
    					   	   'join_date'          => date('Y-m-d', strtotime($request->join_date)),
                               'dob'                => date('Y-m-d', strtotime($request->dob)),
                               'student_age'        => $request->student_age,
    					       'student_image'   	=> $new_name,
    					       'father_name'     	=> $request->father_name,
    					       'contact_number'     => $request->contact_number,
    					       'contact_email'    	=> $request->contact_email,
    					       'address'         	=> $request->address,
    					       'mother_tongue'   	=> $request->mother_tongue,
    					       'known_languages'    => $request->known_languages,
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
        //$known_languages = $request->known_languages;
        //dd($known_languages);
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
                                'mother_tongue'   => 'required|not_in:0',
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
                               'join_date'          => date('Y-m-d', strtotime($request->join_date)),
                               'dob'                => date('Y-m-d', strtotime($request->dob)),
                               'student_age'        => $request->student_age,
                               'student_image'      => $image_name,
                               'father_name'        => $request->father_name,
                               'contact_number'     => $request->contact_number,
                               'contact_email'      => $request->contact_email,
                               'address'            => $request->address,
                               'mother_tongue'      => $request->mother_tongue,
                               'known_languages'    => implode(',',$request->known_languages),
                               'certificates'       => implode(',',$request->certificates),
        );

         Student::whereId($request->hidden_id)->update($form_data);
         //Seller::find($id)->update($form_data);
         return response()->json(['success' => 'Data is successfully updated']);
    }

   public function delete($id){
    $data = Student::findOrFail($id);
     //$image = $data->student_image;
     //dd($image);
    
    $image_path = base_path()."/public/uploads/student_profile/".$data->student_image;
        if(file_exists($image_path)){
            //File::delete($image_path);
            File::delete($image_path);
        }    
     $data->delete();     
   }


}
