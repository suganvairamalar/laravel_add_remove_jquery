@extends('layouts.seller_app')
@section('content')
<div class="jumbotron">
   
   <div class="row">            
      <div class="pull-left">
        <button type="button" name="create_record" id="create_record" class="btn btn-primary btn-sm" >SELLER ADD</button> <!-- class="btn btn-primary glyphicon glyphicon-plus" -->  
      </div>

      <div class="pull-right">
         <div class="form-group form-inline">
           <form id="sellersearchform" action="/sellers">
            {{ csrf_field() }}
            {{ method_field('GET') }}
            <label >SEARCH</label>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="text" class="form-control" name="search" id="search">
            <button type="submit" class="btn btn-warning" id="seller_search_submit" name="seller_search_submit">
             <span class="glyphicon glyphicon-search"></span></button> 
            <a href="{{route('seller.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span></a>                      
            </form>
         </div>
      </div>
   </div>   
   <div class="row">
      @include('sellers.seller_list')   
   </div>
</div>

<div class="row">
   <div id="formModal" class="modal fade" role="dialog" >
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">SELLER ADD FORM</label>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body bg-primary">
               <span id="form_result"></span>
               <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label class="control-label col-md-4 col-lg-4 col-xs-4 col-sm-4">FIRST NAME</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter a First Name">
                     </div>
                  </div>
                  <!-- <br> -->
                  <div class="form-group">
                     <label class="control-label col-md-4 col-lg-4 col-xs-4 col-sm-4">LAST NAME</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter a last Name">
                     </div>
                  </div>

                   <div class="form-group">
                     <label class="control-label col-md-4 col-lg-4 col-xs-4 col-sm-4">GENDER</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" class="rbtn" value="1" >Male</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" class="rbtn" value="2" >Female</label>
                     </div>
                  </div>   
                  <!-- <br> -->
                  <div class="form-group">
                     <label class="control-label col-md-4 col-lg-4 col-xs-4 col-sm-4">PROFILE IMAGE</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="file" name="image" id="image" class="form-control"> 
                        <span id="store_image"></span>
                     </div>
                  </div>

                 <!--  <div class="form-group">
                     <label class="control-label col-md-4 col-lg-4 col-xs-4 col-sm-4">MUTIPLE IMAGE</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="file" class="form-control" name="multi_images[]" id="multi_images" accept="image/*" multiple > 
                        <span id="multiple_image"></span>
                     </div>
                  </div> -->
                 
                  <div class="form-group" align="center">
                     <input type="hidden" name="action" id="action" />
                     <input type="hidden" name="hidden_id" id="hidden_id">
                     <input type="hidden" name="hidden_gender" id="hidden_gender">
                     <button type="button" class="btn btn-secondary" id ="cloes" data-dismiss="modal">CLOSE</button>
                     <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add">
                  </div>
               </form>
               <br>
               <div class="progress">
                  <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                     0%
                  </div>
               </div>
               <br>
               <div>
                  <div id="success" class="row">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row">
   <div id="confirmModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">CONFIRMATION</label>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <p style="color:red;font-size:16px;font-weight: bold;font-style: italic;">Are you sure !! want to delete this record?</p>      
            </div>
            <div class="modal-footer bg-danger">
               <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection