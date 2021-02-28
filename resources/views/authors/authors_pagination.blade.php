@extends('layouts.pagination')
@section('content')

<div class="jumbotron">
   <!--LIST DATA -->
   <div class="row">
      <div class="pull-left">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#authoraddmodal">AUTHOR ADD</button> <!-- class="btn btn-primary glyphicon glyphicon-plus" -->
      </div>
      <div class="pull-right">
         <div class="form-group form-inline">
           <form id="authorsearchform" action="/author_pagination">
            {{ csrf_field() }}
            {{ method_field('GET') }}
            <label >SEARCH</label>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="text" class="form-control" name="search" id="search">
            <button type="submit" class="btn btn-warning" id="author_search_submit" name="author_search_submit">
             <span class="glyphicon glyphicon-search"></span></button> 
            <a href="{{route('author.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span></a>                      
            </form>
         </div>
      </div>
   </div>

   <div class="row">      
         @if(!empty($authors))   
         <div class="table-responsive tableFixHead">
            <table class="table table-striped table-bordered table-hover">
               <thead>
                  <tr class="bg-primary">
                     <th class="col-xs-1 col-sm-1 col-md-1 sorting" >S.NO</th>
                     <th class="col-xs-1 col-sm-1 col-md-1 sorting" data-sorting_type="asc" data-column_name="id" style="cursor : pointer">ID<span id="id_icon"></span></th>
                     <th class="col-xs-3 col-sm-3 col-md-3 sorting" data-sorting_type="asc" data-column_name="first_name" style="cursor : pointer" >FIRST NAME<span id="first_name_icon"></span></th>
                     <th class="col-xs-3 col-sm-3 col-md-3 sorting" data-sorting_type="asc" data-column_name="last_name" style="cursor : pointer" >LAST NAME<span id="last_name_icon"></span></th>
                     <th class="col-xs-4 col-sm-4 col-md-4 sorting">ACTION</th>
                  </tr>
               </thead>
               <tbody id="search_data">
                  @include('authors.authors_pagination_data')
               </tbody>
            </table>
           <!--  <input type="text" name="hidden_page" id="hidden_page" value="1">
            <input type="text" name="hidden_column_name" id="hidden_column_name" value="id">
            <input type="text" name="hidden_sort_type" id="hidden_sort_type" value="asc"> -->
         </div>
         @endif     
   </div>
  {!!$authors->render()!!}
</div>
 <!--END LIST DATA -->


<!-- Add author Modal -->
<div class="modal fade" id="authoraddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header bg-danger">
            <label class="modal-title" id="exampleModalLabel">AUTHOR ADD FORM</label>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="authoraddform">
            <div class="modal-body bg-primary">
               {{ csrf_field() }}
               <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
               <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter a First Name">          
                 <p id="firstname_response"></p>
               </div>
               <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter a Last Name">          
                 <p id="lastname_response" ></p>
               </div>
            </div>
            <div class="modal-footer bg-danger">
               <button type="button" class="btn btn-secondary" id ="cloes" data-dismiss="modal">CLOSE</button>
               <button type="submit" id="author_insert_submit" name="author_insert_submit" class="btn btn-primary">ADD DATA</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!--End Add author Modal-->


<!-- Edit author Modal -->

<div class="modal fade" id="authoreditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header bg-warning">
            <label class="modal-title" id="exampleModalLabel">AUTHOR EDIT FORM</label>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="authoreditform">
            <div class="modal-body bg-primary">
               {{ csrf_field() }}
               {{ method_field('POST') }}
               <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
               <input type="hidden" name="id" id="edit_id">
               
               <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="first_name" id="edit_first_name" placeholder="Enter a First Name">          
                 <p id="edit_firstname_response"></p>
               </div>
               <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="last_name" id="edit_last_name" placeholder="Enter a Last Name">          
                 <p id="edit_lastname_response" ></p>
               </div>
            </div>
            <div class="modal-footer bg-warning">
               <button type="button" class="btn btn-secondary" id ="cloes" data-dismiss="modal">CLOSE</button>
               <button type="submit" id="author_update_submit" name="author_update_submit" class="btn btn-primary">EDIT DATA</button>
            </div>
         </form>
      </div>
   </div>
</div>

<!--End Edit author Modal-->


<!-- Detail author Modal -->
<div class="modal fade" id="authordetailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header bg-info">
            <label class="modal-title" id="exampleModalLabel">AUTHOR DETAIL FORM</label>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="authordetailform">
            <div class="modal-body bg-primary">
               {{ csrf_field() }}
               {{ method_field('GET') }}
               <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
               <input type="hidden" name="id" id="detail_id">
               <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control" name="first_name" id="detail_first_name" placeholder="Enter a First Name" disabled="disabled"> 
               </div>
               <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="last_name" id="detail_last_name" placeholder="Enter a Last Name" disabled="disabled">
               </div>
            </div>
            <!--  <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id ="cloes" data-dismiss="modal">CLOSE</button>
               <button type="submit" id="author_detail_submit" name="author_detail_submit" class="btn btn-primary">DETAIL DATA</button> 
            </div> -->
         </form>
      </div>
   </div>
</div>
<!--End Detail author Modal-->

<!-- Delete Author Modal -->
<div class="modal fade" id="authordeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <label class="modal-title" id="exampleModalLabel">AUTHOR DELETE FORM</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="authordeleteform" name="authordeleteform">        
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" class="form-control" name="delete_id" id="delete_id">
        <p style="color:red;font-size:16px;font-weight: bold;font-style: italic;">Are you sure !! want to delete this record?</p>
      </div>
      <div class="modal-footer bg-danger">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" id="author_delete_submit" name="author_delete_submit" class="btn btn-danger">DELETE DATA</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Delete Author Modal-->

@endsection