<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\State;
use DB;
use Session;

class StateController extends Controller
{
    public function index(){
    	
        //FETCH ALL POSTS DATA 
        //$states = State::orderBy('state_name','asc')get();
        $states = State::orderBy('id','asc')->paginate(7);

        //PASS POSTS DATA TO VIEW & LOAD LIST VIEW
        return view('states.state_form',['states' => $states]);
    }

    public function check(Request $request){
    	$state_name = $request->get('state_name');
    	if($state_name){
        //$state_name = State::where('state_name','=',$state_name)->count();
        //$state_name =DB::table("states")->where('state_name', $state_name)->count();
         $state_name_count =   State::where('state_name','=', $state_name)->count();
        //dd($state_name);
        $response = "<span style='color: green;'>Available.</span>";
        if($state_name_count > 0){
        	$response = "<span style='color: red;'>Already Taken.</span>";
        }
        return $response;
    }
   }

   public function insert(Request $request){


        //VALIDATE DATA
        $this->validate($request,[
            'state_name' => 'required|unique:states',
            ]);
    
        //GET POST DATA
        $stateData = $request->all();

        //INSERT POST DATA
        State::create($stateData);
        
         //STORE STATUS MESSAGE
        //$response = Session::flash('success_msg', 'State added Successfully');

        return redirect()->back();
   }


   public function update($id,Request $request){
    $state = State::findOrFail($id);
    
        $this->validate($request,[
            'state_name' => 'required|unique:states'
            //'state_name' => 'required'
            
            ]);

        $stateData = $request->all();
        
        State::findOrFail($id)->update($stateData);

        //UPDATE STATUS MESSAGE
        //$response = Session::flash('update_msg', 'State added Successfully');

        return redirect()->back();
    }

  public function delete($id){
     $state = State::findOrFail($id);
     $state->delete();
     return redirect()->back();
  }
 
}
