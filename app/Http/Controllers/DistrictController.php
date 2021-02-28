<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\District;
use App\State;
use DB;
use Session;


class DistrictController extends Controller
{
    public function index(){
      
      
     /* $districts = DB::table('districts')
                  ->leftJoin('states', 'districts.state_id', '=', 'states.id')
                  ->select('districts.district_name','states.state_name')
                  ->orderby('districts.id', '=', 'desc')
                  ->paginate(8);*/

      $districts = District::select('districts.*','states.state_name')
                  ->leftJoin('states', 'districts.state_id', '=', 'states.id')
                  ->orderBy('districts.id', '=', 'desc')
                  ->paginate(7);
      //dd($districts);

      $states = State::orderBy('state_name','asc')->get();
      
    	return view('districts.district_form',['districts' => $districts])->with('states',$states);
    }

    public function check(Request $request){

    	$district_name = $request->get('district_name');

    	if($district_name){

    	$district_name = District::where('district_name','=',$district_name)->count();
          $response = "<span style='color: green;'>Available.</span>";
    	if($district_name > 0){
          $response = "<span style='color: red;'>Already Taken.</span>";
    	}
        return $response;
     }
   }

   public function insert(Request $request){
      $this->validate($request,[
           'state_id' => 'required',
           'district_name' => 'required|unique:districts'
        ]);

      //GET DISTRICT DATA
      $districtData = $request->all();

      //INSERT POST DATA
      District::create($districtData);

      return redirect()->back();      

   }

   public function update($id, Request $request){
    $district = District::findOrFail($id);
       $this->validate($request,[
           'state_id' => 'required',
           'district_name' => 'required'
           //'district_name' => 'required|unique:districts'
        ]);

        
        //GET DISTRICT DATA
        $districtData = $request->all();

        District::findOrFail($id)->update($districtData);

        return redirect()->back()->with('district',$district);  
        //return redirect()->back();  

   }

   public function delete($id){
     $district = District::findOrFail($id);
     $district->delete();
     return redirect()->back();
   }





   


    













}
