@extends('layouts.position_app')
@section('content')
<div class="row">
   <div class="panel panel-default">
      <div class="header_form panel-heading">POSITION ADD FORM</div>
      <div class="panel-body">
         <span id="position_form_result"></span>
         <div class="table-responsive">
            <form method="post" id="position_form">
                {{ csrf_field() }}
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
               <div class="form-group">
                  <label for="position_name">DEPARTMENT</label>
                  <select class="form-control position_department_id" name="position_department_id" id="position_department_id">
                           <option disabled="disabled" selected="true" value="">Select Department</option>
                           @foreach($departments as $department)
                           <option value="{{$department->id}}">{{$department->department_name}}</option>
                           @endforeach
                        </select>               
               </div>
               <div class="form-group">
                  <label for="position_name">POSITION NAME</label>
                  <input type="text" class="form-control" name="position_name" id="position_name" placeholder="Enter Position Name">                 
               </div>
               <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">   
                <input type="hidden" name="hidden_position_department_id" id="hidden_position_department_id" class="form-control">
                  <input type="hidden" name="position_action" id="position_action" />                  
                  <button type="button" class="btn btn-danger" id="reset" data-dismiss="modal">RESET</button>
                  <input type="submit" name="position_action_button" id="position_action_button" class="btn btn-success" value="ADD">
            </form>
         </div>
      </div>
   </div>
</div>

   <div class="row">
     @include('positions.position_list')
   </div>

   <div class="row">
      <div id="position_confirm_Modal" class="modal fade" role="dialog">
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
                  <button type="button" name="position_ok_button" id="position_ok_button" class="btn btn-danger">OK</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </div>
            </div>
         </div>
      </div>
   </div>


@endsection


