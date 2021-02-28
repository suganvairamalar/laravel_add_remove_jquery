@extends('layouts.known_technology_app')
@section('content')
<div class="jumbotron">
   <div class="row">
      <div class="pull-left">
         <button type="button" name="known_technology_create_record" id="known_technology_create_record" class="btn btn-success btn-sm">TECHNOLOGY ADD</button>
      </div>
      <div class="pull-right">
         <div class="form-group form-inline">
            <form id="known_technology_search_form" action="/known_technologies">
               {{ csrf_field() }}
               {{ method_field('GET') }}
               <label >SEARCH</label>
               <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
               <input type="text" class="form-control" name="search" id="search">
               <button type="submit" class="btn btn-warning" id="known_technology_search_submit" name="known_technology_search_submit">
               <span class="glyphicon glyphicon-search"></span></button> 
               <a href="{{route('known_technology.index')}}" class="btn btn-primary"><span class="reloadbtn glyphicon glyphicon-refresh"></span></a>                      
            </form>
         </div>
      </div>
   </div>
   <div class="row">
      @include('known_technologies.known_technology_list')   
   </div>
</div>
<div class="row">
   <div id="known_technology_form_Modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">TECHNOLOGY ADD FORM</label>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes"><span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" id="known_technology_form" class="form-horizontal">
               <div class="modal-body bg-primary">
                  <span id="known_technology_form_result"></span>
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">NAME</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="known_technology_name" id="known_technology_name" placeholder="Enter a Technology Name">
                     </div>
                  </div>
               </div>
               <div class="modal-footer bg-danger">
                  <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">   
                  <input type="hidden" name="known_technology_action" id="known_technology_action" />                  
                  <button type="button" class="btn btn-secondary" id="cloes" data-dismiss="modal">CLOSE</button>
                  <input type="submit" name="known_technology_action_button" id="known_technology_action_button" class="btn btn-primary" value="ADD">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div id="known_technology_confirm_Modal" class="modal fade" role="dialog">
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
               <button type="button" name="known_technology_ok_button" id="known_technology_ok_button" class="btn btn-danger">OK</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection