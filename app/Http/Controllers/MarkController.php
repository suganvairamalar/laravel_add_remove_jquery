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
      $marks = Mark::select('marks.*','students.student_name')
                  ->leftJoin('students', 'marks.student_id', '=', 'students.id')
                  ->orderBy('marks.id', '=', 'desc')
                  ->paginate(5);
    	return view('marks.mark_index',compact('marks'),compact('students'));
    }

    
   

    public function insert(Request $request){
     
      $rules = [];

      //dd(array($request->input('myOptions')));
      //dd($request->input('mark1'));

      //$rules = array( 'student_id'     => 'required|not_in:0|unique:marks');

      $student_id = array($request->input('student_id'));

      foreach($student_id  as $key => $value) {
            $rules["student_id.{$key}"] = 'required|not_in:0';
        }

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

     /* $form_data = array('student_id' => $request->student_id,
                         'mark1' => $request->mark1,
                         'mark2' => $request->mark2,
                         'mark3' => $request->mark3,
                         'mark4' => $request->mark4,
                         'mark5' => $request->mark5,
                         'total' => $request->total,
                         'percentage' => $request->percentage,
                         'rank' => $request->rank
                        );*/

     $marks  = Input::only('student_id','mark1','mark2','mark3','mark4','mark5','total','percentage','rank');

            $student_id   = $marks['student_id'];
            $mark1        = $marks['mark1'];
            $mark2        = $marks['mark2'];
            $mark3        = $marks['mark3'];
            $mark4        = $marks['mark4'];
            $mark5        = $marks['mark5'];
            $total        = $marks['total'];
            $percentage   = $marks['percentage'];
            $rank         = $marks['rank'];
            
            foreach( $student_id as $key => $n ) {
                Mark::create(
                    array(
                        'student_id'      => $student_id[$key],
                        'mark1'           => $mark1[$key],                   
                        'mark2'           => $mark2[$key],                   
                        'mark3'           => $mark3[$key],                   
                        'mark4'           => $mark4[$key],                   
                        'mark5'           => $mark5[$key],                   
                        'total'           => $total[$key],                   
                        'percentage'      => $percentage[$key],                   
                        'rank'            => $rank[$key],                   
                    )
                );
            }
      
      return response()->json(['success' => 'Data Inserted Successfully.']);
  
    
    }

    public function find_rank(Request $request){
            $data = Mark::all(['id','student_id','total']); 
            return response()->json($data);
    }

  public function edit($id){
    if(request()->ajax()){
        $data = Mark::findOrFail($id);       
        return response()->json(['data' => $data]);
      }
   }


   public function update(Request $request){
    
        $rules = array( 'edit_student_id' => 'required',
                        'edit_mark1'      => 'required',
                        'edit_mark2'      => 'required',
                        'edit_mark3'      => 'required',
                        'edit_mark4'      => 'required',
                        'edit_mark5'      => 'required',
                        'edit_total'      => 'required',
                        'edit_percentage' => 'required',
                        'edit_rank'       => 'required'
         );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $form_data = array('student_id'   => $request->edit_student_id,
                            'mark1'       => $request->edit_mark1, 
                            'mark2'       => $request->edit_mark2, 
                            'mark3'       => $request->edit_mark3, 
                            'mark4'       => $request->edit_mark4, 
                            'mark5'       => $request->edit_mark5, 
                            'total'       => $request->edit_total, 
                            'percentage'  => $request->edit_percentage,
                            'rank'        => $request->edit_rank
                             );
        
        Mark::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Data Updated Successfully.']);

    }


}
