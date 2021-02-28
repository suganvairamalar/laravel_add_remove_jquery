@extends('layouts.author_book_detail_app')
@section('content')
<div class="jumbotron">
   <div class="row">
      <div class="pull-left">
         <button type="button" name="author_book_detail_create_record" id="author_book_detail_create_record" class="btn btn-success btn-sm">ADD</button>
      </div>
      <div class="pull-right">
         <div class="form-group form-inline">
            
         </div>
      </div>
   </div>
   <div class="row">
      @include('author_book_details.author_book_detail_list')   
   </div>
</div>

<div class="row">
	<div id="author_book_detail_form_Modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">AUTHOR BOOK DETAIL ADD FORM</label>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes"><span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" id="author_book_detail_form" class="form-horizontal">
               <div class="modal-body bg-primary">
                  <span id="author_book_detail_form_result"></span>
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">AUTHOR</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <!--  <label for="author_id">(select one):</label> -->
                         <select class="form-control" name="author_id" id="author_id">
                          <option disabled="disabled" selected="true">Select Author</option>
                           @foreach($authors as $author)
                           <option value="{{$author->id}}">{{$author->first_name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="table-responsive1">                      
                     <table class="table1 table-bordered" id="book_name_field">
                     	<tbody>
                        <tr class='tr1'>
                           <td class='td2'><input type="text" name="book_name[]" id="book_name" class="form-control book_name_list" placeholder="Add book name" /></td>
                           <td class='td1'><button type="button" name="add" id="add" class="addRow btn btn-success"><span class="glyphicon glyphicon-plus"></span></button></td>
                        </tr>
                        </tbody>
                     </table>
                  </div>
               </div>

               <div class="modal-footer bg-danger">
                  <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">   
                  <input type="hidden" name="author_book_detail_action" id="author_book_detail_action" />                  
                  <button type="button" class="btn btn-secondary" id="cloes" data-dismiss="modal">CLOSE</button>
                  <input type="submit" name="author_book_detail_action_button" id="author_book_detail_action_button" class="btn btn-primary" value="ADD">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection