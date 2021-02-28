<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Author;
use DB;
class AuthorController extends Controller
{
   /* public function index(){
    	$authors = Author::orderBy('id','asc')->paginate(5);
    	return view('authors.authors_pagination',compact('authors'));
    }*/

    public function index(Request $request){ 
        if($request->search==""){
                $authors = Author::orderBy('id','asc')->paginate(5);
                return view('authors.authors_pagination',compact('authors'));
            }else{
            $authors = Author::where('id','LIKE','%'.$request->search.'%')
                       ->orWhere('first_name','LIKE','%'.$request->search.'%')
                       ->orWhere('last_name','LIKE','%'.$request->search.'%')
                       ->orderBy('id','asc')
                       ->paginate(5);

                $authors->appends($request->only('search')); //intha line code add pannathumthaan search correct ah work aachu..before without this line search first page work aaguthu more thaan one page data irukkum pothu second page filter aagama yella datavum 2nd page la show aachu...intha line command panni run panna u have to understand what is the problem in searching in 2nd page pagination problem... 
                          
            return view('authors.authors_pagination',compact('authors'));
           
        } 
    }

        
    /*public function fetchdata(Request $request){
    	if($request->ajax()){
    		$sort_by = $request->get('sortby');
    		$sort_type = $request->get('sorttype');
    		$query = $request->get('query');
    		//$query = str_replace(" ", "%", $query);
 			$authors = DB::table('authors')
 					   ->where('id','like','%'.$query.'%')
 					   ->orWhere('first_name','like','%'.$query.'%')
 					   ->orWhere('last_name','like','%'.$query.'%')
 					   ->orderBy($sort_by,$sort_type)
 					   ->paginate(5);
 			return view('authors.authors_pagination_data',compact('authors'))->render();
    	}
    }*/

    public function insert(Request $request){
        //VALIDATE DATA
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            ]);
    
        //GET POST DATA
        $authorData = $request->all();

        //INSERT POST DATA
        Author::create($authorData);
        
         //STORE STATUS MESSAGE
        //$response = Session::flash('success_msg', 'State added Successfully');

        //return redirect()->route('author.index');
        return redirect()->back();
   }


   public function update($id,Request $request){
        $author = Author::findOrFail($id);

        $this->validate($request,[
               'first_name' => 'required',
               'last_name' => 'required'
            ]);
        $authorData = $request->all();
        Author::findOrFail($id)->update($authorData);
        //return redirect()->route('author.fetchdata');
        return redirect()->back();

   }

   
   public function delete($id){
     $author = Author::findOrFail($id);
     $author->delete();
     //return redirect()->route('author.fetchdata');
     return redirect()->back();
   }









}
