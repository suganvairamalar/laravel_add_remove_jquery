<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AuthorBookDetail;
use App\Author;
use Validator;
use Input;

class AuthorBookDetailController extends Controller
{
    public function index(){
    	$authors = Author::all(['id', 'first_name']);
    	return view('author_book_details.author_book_detail_index',compact('authors'));
    }

    public function insert(Request $request){
    	 /*$author_id = $request->author_id,
    	 foreach( $book_name as $key => $n ) {
                AuthorBookDetail::create(
                    array(
                        'author_id' => $author_id[$key],
                        'book_name' => $book_name[$key]                   
                    )
                );
            }
*/

       $rules = [];
       $rules = array( 'author_id'     => 'required');
       foreach($request->input('book_name') as $key => $value) {
            $rules["book_name.{$key}"] = 'required';
        }

      $error = Validator::make($request->all(), $rules);
      if($error->fails())
      {
       return response()->json(['error'  => $error->errors()->all()]);
      }     

      /*$form_data = array('author_id' => $request->author_id,
                         'book_name' => implode(',',$request->book_name),
                        );*/

		$dynamic_fields  = Input::only('author_id','book_name');

            $author_id = $dynamic_fields['author_id'];
            $book_name = $dynamic_fields['book_name'];
            
            foreach( $book_name as $key => $n ) {
                AuthorBookDetail::create(
                    array(
                        'author_id' => $author_id,
                        'book_name' => $book_name[$key]                   
                    )
                );
            }
      
    	//AuthorBookDetail::create($form_data);
    	return response()->json(['success' => 'Data Inserted Successfully.']);
    }
}
