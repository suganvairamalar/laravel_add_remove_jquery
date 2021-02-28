<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Department;
use App\Position;
use App\KnownTechnology;
use DB;
use DateTime;
use Carbon\Carbon;
use Validator;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Department::all(['id', 'department_name']);
        
        $positions = Position::all(['id', 'position_name']);        
        
        $known_technologies = KnownTechnology::all(['id', 'known_technology_name']);

         //$employees = Employee::orderBy('id','desc')->paginate(5);

        if($request->search==""){
             $employees = Employee::select('employees.*','departments.department_name','positions.position_name')
                  ->leftJoin('departments', 'employees.employee_department_id', '=', 'departments.id')
                  ->leftJoin('positions', 'employees.employee_position_id', '=', 'positions.id')
                  ->orderBy('employees.id', '=', 'desc')
                  ->paginate(5);
               
                return view('employees.employee_index',compact('employees'),compact('departments'))->with('positions',$positions)->with('known_technologies',$known_technologies);
            }else{
            $employees = Employee::select('employees.*','departments.department_name','positions.position_name')
                  ->leftJoin('departments', 'employees.employee_department_id', '=', 'departments.id')
                  ->leftJoin('positions', 'employees.employee_position_id', '=', 'positions.id');
                      /*  ->where('employee_name','LIKE','%'.$request->search.'%')     
                    ->orwhere('dob','=',date('Y-m-d', strtotime($request->search)))  
                      ->orwhere('join_date','=',date('Y-m-d', strtotime($request->search)))      
                      ->orwhere('department_name','LIKE','%'.$request->search.'%')       
                      ->orwhere('position_name','LIKE','%'.$request->search.'%')       
                      ->orderBy('employees.id', '=', 'desc')
                      ->paginate(5);*/
                       //date('Y-m-d',$request->search)
                       if ($request->get('search_dropdown')=='name') {
                      $employees->where('employee_name','LIKE','%'.$request->get('search').'%');
                      }   
                      if ($request->get('search_dropdown')=='dob') {
                      $employees->where('dob','=',date('Y-m-d', strtotime($request->search)));
                      }  
                      if ($request->get('search_dropdown')=='join_date') {
                      $employees->where('join_date','=',date('Y-m-d', strtotime($request->search)));
                      }  
                      if ($request->get('search_dropdown')=='department') {
                      $employees->where('department_name','LIKE','%'.$request->search.'%');
                      }  
                      if ($request->get('search_dropdown')=='position') {
                      $employees->where('position_name','LIKE','%'.$request->search.'%');
                      }  
                                            
                    $employees=$employees->orderBy('employees.id', '=', 'desc');
                      $employees=$employees->paginate(5);

                $employees->appends($request->only('search')); //intha line code add pannathumthaan search correct ah work aachu..before without this line search first page work aaguthu more thaan one page data irukkum pothu second page filter aagama yella datavum 2nd page la show aachu...intha line command panni run panna u have to understand what is the problem in searching in 2nd page pagination problem... 
                          
            return view('employees.employee_index',compact('employees'),compact('departments'))->with('positions',$positions)->with('known_technologies',$known_technologies);
           
        } 

    }

    public function find_employee_position(Request $request){
            $data = Position::select('id','position_name','position_department_id')->where('position_department_id',$request->emp_dept_id)->get();
            return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function insert(Request $request){
        
        $rules = array( 'employee_name'             => 'required',
                        'gender'                    => 'required',
                        'join_date'                 => 'required',
                        'dob'                       => 'required',
                        'employee_department_id'    => 'required|not_in:0',
                        'employee_position_id'      => 'required|not_in:0',
                        'known_technology_id'       => 'required', 
                        'salary'                    => 'required',
                        'id_proof'                  => 'required',
                        'prev_office'               => 'required' 
                      );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $form_data = array( 'employee_name'             => $request->employee_name,
                            'gender'                    => $request->gender,
                            'join_date'                 => date('Y-m-d', strtotime($request->join_date)),
                            'dob'                       => date('Y-m-d', strtotime($request->dob)),
                            'employee_age'              => $request->employee_age,
                            'employee_department_id'    => $request->employee_department_id,
                            'employee_position_id'      => $request->employee_position_id,
                            'known_technology_id'       => $request->known_technology_id,
                            'salary'                    => $request->salary,
                            'id_proof'                  => $request->id_proof,
                            'prev_office'               => $request->prev_office

                             );
        //dd($form_data);
        Employee::create($form_data);
        return response()->json(['success' => 'Data Inserted Successfully.']);

    }

    public function edit($id){
        if(request()->ajax()){
            $data = Employee::findOrFail($id);
            return response()->json(['data' => $data]);
            //dd($data['employee_position_id']);
            //$positions = Position::all(['id', 'position_name']);
            //$positions = Position::select('id','position_name','position_department_id')->where('position_department_id',$data['employee_position_id'])->get();
            //return response()->json(['data' => $data,'positions' => $positions]);
        }
    }

    public function update(Request $request){
        
        $rules = array( 'employee_name'             => 'required',
                        'gender'                    => 'required',
                        'join_date'                 => 'required',
                        'dob'                       => 'required',
                        'employee_department_id'    => 'required|not_in:0',
                        'employee_position_id'      => 'required|not_in:0',
                        'known_technology_id'       => 'required',
                        'salary'                    => 'required',
                        'id_proof'                  => 'required',
                        'prev_office'               => 'required'  
                      );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $form_data = array( 'employee_name'             => $request->employee_name,
                            'gender'                    => $request->gender,
                            'join_date'                 => date('Y-m-d', strtotime($request->join_date)),
                            'dob'                       => date('Y-m-d', strtotime($request->dob)),
                            'employee_age'              => $request->employee_age,
                            'employee_department_id'    => $request->employee_department_id,
                            'employee_position_id'      => $request->employee_position_id,
                            'known_technology_id'       => implode(',',$request->known_technology_id),
                            'salary'                    => $request->salary,
                            'id_proof'                  => implode(',',$request->id_proof),
                            'prev_office'                    => $request->prev_office

                           );
        Employee::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Data Updated Successfully.']);

    }

    public function delete($id){
        $data = Employee::findOrFail($id);
        $data->delete();
    }

   
}
