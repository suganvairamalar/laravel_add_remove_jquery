<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mark;
use App\Student;
use Validator;
use Input;

class MarkController extends Controller
{
    public function index(){
    	$students = Student::all(['id','student_name']);
    	return view('marks.mark_index',compact('students'));
    }

    public function insert(Request $request){

     $rules = [];
      
     
      foreach($request->input('mark1') as $key => $value) {
            $rules["mark1.{$key}"] = 'required|numeric';
        }
      foreach($request->input('mark2') as $key => $value) {
            $rules["mark2.{$key}"] = 'required|numeric';
        }
      foreach($request->input('mark3') as $key => $value) {
            $rules["mark3.{$key}"] = 'required|numeric';
        }
      foreach($request->input('mark4') as $key => $value) {
            $rules["mark4.{$key}"] = 'required|numeric';
        }
      foreach($request->input('mark5') as $key => $value) {
            $rules["mark5.{$key}"] = 'required|numeric';
        }
      foreach($request->input('total') as $key => $value) {
            $rules["total.{$key}"] = 'required|numeric';
        }
      foreach($request->input('percentage') as $key => $value) {
            $rules["percentage.{$key}"] = 'required';
        }
      foreach($request->input('rank') as $key => $value) {
            $rules["rank.{$key}"] = 'required';
        }
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json(['error'  => $error->errors()->all()]);
      }     
        
      $mark_fields  = Input::only('student_id', 'mark1', 'mark2', 'mark3', 'mark4', 'mark5', 'total', 'percentage', 'rank');

            $student_id = $mark_fields['student_id'];
            $mark1 = $mark_fields['mark1'];
            $mark2 = $mark_fields['mark2'];
            $mark3 = $mark_fields['mark3'];
            $mark4 = $mark_fields['mark4'];
            $mark5 = $mark_fields['mark5'];
            $total = $mark_fields['total'];
            $percentage = $mark_fields['percentage'];
            $rank = $mark_fields['rank'];
            
            foreach($student_id as $key => $n) {
                Mark::create(array(
                        'student_id' 		=> $student_id[$key],
                        'mark1' 			=> $mark1[$key],                   
                        'mark2' 			=> $mark2[$key],                   
                        'mark3' 			=> $mark3[$key],                 
                        'mark4' 			=> $mark4[$key],                   
                        'mark5' 			=> $mark5[$key],                   
                        'total' 			=> $total[$key],                   
                        'percentage' 		=> $percentage[$key],                   
                        'rank' 				=> $rank[$key]                   
                    ));
            }
      return response()->json(['success' => 'Data Inserted Successfully.']);
    
    }


}
