@extends('layouts.employee_app')
@section('content')
<div class="jumbotron">
   <div class="row">
      <div class="pull-left">
         <button type="button" name="employee_create_record" id="employee_create_record" class="btn btn-success btn-sm">EMPLOYEE ADD</button>
      </div>
      <div class="pull-right">
         <div class="form-group form-inline">
            <form id="employee_search_form" action="/employees">
               {{ csrf_field() }}
               {{ method_field('GET') }}
               <label >SEARCH</label>
               <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
               <select class="form-control" name="search_dropdown" id="search_dropdown">
                          <option value="">Select Search</option>
                          <option value="name">NAME</option>
                          <option value="dob">DOB</option>
                          <option value="join_date">JOIN DATE</option>
                          <option value="department">DEPARTMENT</option>
                          <option value="position">POSITION</option>
                        </select>
               <input type="text" class="form-control" name="search" id="search">
               <button type="submit" class="btn btn-warning" id="employee_search_submit" name="employee_search_submit">
               <span class="glyphicon glyphicon-search"></span></button> 
               <a href="{{route('employee.index')}}" class="btn btn-primary"><span class="reloadbtn glyphicon glyphicon-refresh"></span></a>                      
            </form>
         </div>
      </div>
   </div>
   <div class="row">
      @include('employees.employee_list')
   </div>
</div>
<div class="row">
   <div id="employee_form_Modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">EMPLOYEE ADD FORM</label>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes"><span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" id="employee_form" class="form-horizontal">
               <div class="modal-body bg-primary">
                  <span id="employee_form_result"></span>
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                  <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">NAME</label>
                     <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">
                        <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Enter a Employee Name">
                     </div>
                  </div>
                   <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">GENDER</label>
                     <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" class="rbtn" value="1" >Male</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" class="rbtn" value="2" >Female</label>
                     </div>
                  </div>   

                  <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">DATE OF JOINING</label>
                     <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                        <input type="text" id="join_date" name="join_date" class="form-control datepicker join_date" placeholder="DD-MM-YYYY" style="width:100%;line-height: 65px;">
                     </div>                    
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">DOB</label>
                     <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                        <input type="text" id="dob" name="dob" class="form-control dob" placeholder="DD-MM-YYYY">
                     </div> 
                     <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                     <input type="hidden" id="sdob_date" name="sdob_date" class="form-control" placeholder="MM-DD-YYYY" style="width:100%;line-height: 65px;">     
                     </div>                
                  </div>

                  <div class="form-group">
                      <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">AGE</label>
                     <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                        <input type="text" class="form-control" name="employee_age" id="employee_age" placeholder="" value=""><span class="error"></span> 
                     </div>
                  </div>


                   <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">DEPARTMENT</label>
                     <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">
                        <select class="form-control employee_department_id" name="employee_department_id" id="employee_department_id" style="width:100%;line-height: 65px;">
                          <option disabled="disabled" selected="true">Select Department</option>
                           @foreach($departments as $department)
                           <option value="{{$department->id}}">{{$department->department_name}}</option>
                           @endforeach
                        </select>    
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">POSITION</label>
                     <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">
                        <select class="form-control employee_position_id" name="employee_position_id" id="employee_position_id" style="width:100%;line-height: 65px;">
                          <option disabled="disabled" selected="true">Select Position</option>
                           @foreach($positions as $position)
                           <option value="{{$position->id}}">{{$position->position_name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                              
                  <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">KNOWN TECHNOLOGIES</label>
                     <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">
                        <label for="known_technology_id">(hold shift or ctrl to select more than one):</label>
                        <select multiple class="form-control" name="known_technology_id[]" id="known_technology_id" style="width:100%;line-height: 65px;">
                            
                           <option disabled="disabled">Select Technology(s)</option>
                           <!-- @if(!empty($known_technologies)) -->
                           @foreach($known_technologies as $known_technology)
                           <option value="{{$known_technology->id}}">{{$known_technology->known_technology_name}}</option>
                           @endforeach
                           <!-- @endif -->
                        </select>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">SALARY</label>
                     <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">
                        <input type="text" class="form-control" name="salary" id="salary" placeholder="Enter a Employee Salary">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">ID PROOF(S)</label>
                     <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">
                        <label class="checkbox"><input type="checkbox"  name="id_proof[]" id="id_proof" value="1" >Aadhaar Card</label>
                        <label class="checkbox"><input type="checkbox"  name="id_proof[]" id="id_proof" value="2" >Voter ID</label>
                        <label class="checkbox"><input type="checkbox"  name="id_proof[]" id="id_proof" value="3" >Driving License</label>
                        <label class="checkbox"><input type="checkbox"  name="id_proof[]" id="id_proof" value="4" >Pan Card</label>
                        <label class="checkbox"><input type="checkbox"  name="id_proof[]" id="id_proof" value="5" >Passport</label>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">PREV OffICE(s)</label>
                     <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">
                        <textarea class="form-control" name="prev_office" id="prev_office" rows="3" placeholder="Enter a Prev Office Details"></textarea>
                     </div>
                  </div>

               </div>
               <div class="modal-footer bg-danger">
                  
                  <input type="hidden" name="hidden_id" id="hidden_id" class="form-control"> 
                  <input type="hidden" name="hidden_gender" id="hidden_gender" class="form-control">
                  <input type="text" name="hidden_employee_department_id" id="hidden_employee_department_id" class="form-control">
                  <input type="text" name="hidden_employee_position_id" id="hidden_employee_position_id" class="form-control">
                  <input type="hidden" name="hidden_known_technology_id" id="hidden_known_technology_id" class="form-control">
                  <input type="hidden" name="hidden_id_proof" id="hidden_id_proof" class="form-control">
                  <input type="hidden" name="employee_action" id="employee_action" />
                  <button type="button" class="btn btn-secondary" id="cloes" data-dismiss="modal">CLOSE</button>
                  <input type="submit" name="employee_action_button" id="employee_action_button" class="btn btn-primary" value="ADD">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div id="employee_confirm_Modal" class="modal fade" role="dialog">
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
               <button type="button" name="employee_ok_button" id="employee_ok_button" class="btn btn-danger">OK</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection