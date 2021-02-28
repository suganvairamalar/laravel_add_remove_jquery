<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Seller;
use Validator;
use Session;
use DB;
use DateTime;
use Carbon\Carbon;
use File;

class SellerController extends Controller
{
    /*public function index(){
    	$sellers = Seller::orderby('id','desc')->paginate(5);
        return view('sellers.seller_index',['sellers'=>$sellers]);
    }*/

     public function index(Request $request){ 
        if($request->search==""){
                $sellers = Seller::orderBy('id','asc')->paginate(5);
                return view('sellers.seller_index',compact('sellers'));
            }else{
            $sellers = Seller::where('first_name','LIKE','%'.$request->search.'%')
                       ->orWhere('last_name','LIKE','%'.$request->search.'%')
                       ->orderBy('id','asc')
                       ->paginate(5);

                $sellers->appends($request->only('search')); //intha line code add pannathumthaan search correct ah work aachu..before without this line search first page work aaguthu more thaan one page data irukkum pothu second page filter aagama yella datavum 2nd page la show aachu...intha line command panni run panna u have to understand what is the problem in searching in 2nd page pagination problem... 
                          
            return view('sellers.seller_index',compact('sellers'));
           
        } 
    }

    public function insert(Request $request){
    	/*$this->validate($request,[
    		'name'    => 'required',
            'email' => 'required|email|unique:employees',
            'join_date' => 'required|date',
            'profile_image' => 'required',
            'known_technologies' => 'required'
            'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		]);*/
			
			$rules = array('first_name'  => 'required',
                           'last_name'   => 'required',
						   'gender'      => 'required',
						   'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' 
						 );
			$error = Validator::make($request->all(), $rules); //if any error occur it will store the $error variable
			
            if($error->fails()){ //this code is used to check if above rules are not correct the its shows a error
				return response()->json(['errors' => $error->errors()->all()]);
			}
			$image = $request->file('image');
            //$gender = $request->gender;
            //dd($gender);
			$new_name = rand() . '.' . $image->getClientOriginalExtension();
			$image->move(public_path('uploads/seller_profile'), $new_name);
			$form_data =  array('first_name'    => $request->first_name,
								'last_name'     => $request->last_name,
                                'gender'        => $request->gender,
								'image'         => $new_name );
			//dd($form_data);
			//INSERT POST DATA
    	    Seller::create($form_data);
    	    return response()->json(['success' => 'Data Inserted Successfully.']);

			
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Seller::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        //$id = $request->hidden_id;
        $image = $request->file('image');
        if($image != '')
        {
                $rules = array(
                          'first_name'  => 'required',
                          'last_name'   => 'required',
                          'gender'      => 'required',
                          'image'       => 'image|max:2048' 
                        );
                $error = Validator::make($request->all(), $rules);
                if($error->fails()){
                    return response()->json(['errors' => $error->errors()->all()]);
                }
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/seller_profile'), $image_name);
        }
        else
        {
                 $rules = array(
                            'first_name'    =>  'required',
                            'last_name'     =>  'required',
                            'gender'        =>  'required',
                         );
                 $error = Validator::make($request->all(), $rules);
                 if($error->fails())
                 {
                        return response()->json(['errors' => $error->errors()->all()]);
                 }
        }

         $form_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'gender'           =>   $request->gender,
            'image'            =>   $image_name
        );

         Seller::whereId($request->hidden_id)->update($form_data);
         //Seller::find($id)->update($form_data);
         return response()->json(['success' => 'Data is successfully updated']);

        
    }

    public function delete($id){
     $data = Seller::findOrFail($id);
     $data->delete();     
   }

}
