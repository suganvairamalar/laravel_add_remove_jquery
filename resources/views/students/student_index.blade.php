@extends('layouts.student_app')
@section('content')
<div class="jumbotron">
   <div class="row">
      <div class="pull-left">
         <button type="button" name="student_create_record" id="student_create_record" class="btn btn-success btn-sm" >STUDENT ADD</button> <!-- class="btn btn-primary glyphicon glyphicon-plus" -->  
      </div>
   </div>
   <div class="row">
      @include('students.student_list')   
   </div>
</div>
<div class="row">
   <div id="studentformModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">STUDENT ADD FORM</label>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes"><span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" id="student_form" class="form-horizontal" enctype="multipart/form-data">
               <div class="modal-body bg-primary">
                  <span id="student_form_result"></span>
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                   <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">NAME</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="student_name" id="student_name" placeholder="Enter a Student Name With Initial">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">GENDER</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" class="rbtn" value="1" >Male</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" class="rbtn" value="2" >Female</label>
                     </div>
                  </div>   

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">DATE OF JOINING</label>
                     <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                        <input type="text" id="join_date" name="join_date" class="form-control datepicker join_date" placeholder="DD-MM-YYYY">
                     </div>                    
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">DOB</label>
                     <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                        <input type="text" id="dob" name="dob" class="form-control dob" placeholder="DD-MM-YYYY">
                     </div> 
                     <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                     <input type="hidden" id="sdob_date" name="sdob_date" class="form-control" placeholder="MM-DD-YYYY">     
                     </div>                
                  </div>

                  <div class="form-group">
                      <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">AGE</label>
                     <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                        <input type="text" class="form-control" name="student_age" id="student_age" placeholder="" value=""><span class="error"></span> 
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">PROFILE IMAGE</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="file" name="student_image" id="student_image" class="form-control"> 
                        <span id="store_student_image"></span>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">FATHER NAME</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Enter a Student Father Name">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">CONTACT NUMBER</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter a Student Contact Number">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">CONTACT EMAIL</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="contact_email" id="contact_email" placeholder="Enter a Student Contact Email">
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">ADDRESS</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter a Student Contact Address"></textarea>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">MOTHER TONGUE</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <label for="mother_tongue">(select one):</label>
                         <select class="form-control" name="mother_tongue" id="mother_tongue">
                          <option>Select Language</option>
                          <option value="1">Tamil</option>
                          <option value="2">Malayalam</option>
                          <option value="3">Telugu</option>
                          <option value="4">Kannada</option>
                          <option value="5">Hindi</option>
                        </select>
                     </div>
                  </div>

                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">KNOWN LANGUAGES</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <label for="known_languages">(hold shift or ctrl to select more than one):</label>
                         <select multiple class="form-control" name="known_languages[]" id="known_languages">
                          <option>Select Language(s)</option>
                          <option value="1">Tamil</option>
                          <option value="2">Malayalam</option>
                          <option value="3">Telugu</option>
                          <option value="4">Kannada</option>
                          <option value="5">Hindi</option>
                        </select>
                     </div>
                  </div> 

                  <div class="form-group">
                     <label class="control-label1 col-md-5 col-lg-5 col-xs-5 col-sm-5">VERIFY CERTIFICATE(S)</label>
                     <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">
                        <label class="checkbox"><input type="checkbox"  name="certificates[]" id="certificates" value="1" >Aadhaar Card</label>
                        <label class="checkbox"><input type="checkbox"  name="certificates[]" id="certificates" value="2" >Birth Certificate</label>
                        <label class="checkbox"><input type="checkbox"  name="certificates[]" id="certificates" value="3" >Community Certificate</label>
                     </div>
                  </div> 
               </div>
              <div class="modal-footer bg-danger">
                <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">
                   
                  <input type="hidden" name="hidden_gender" id="hidden_gender" class="form-control"><br>
                  
                  <input type="hidden" name="hidden_mother_tongue" id="hidden_mother_tongue" class="form-control"><br>
                  
                  <input type="hidden" name="hidden_known_languages" id="hidden_known_languages" class="form-control"><br>
                 
                  <input type="hidden" name="hidden_certificates" id="hidden_certificates" class="form-control">
                  <input type="hidden" name="student_action" id="student_action" />                  
                  <button type="button" class="btn btn-secondary" id="cloes" data-dismiss="modal">CLOSE</button>
                  <input type="submit" name="student_action_button" id="student_action_button" class="btn btn-primary" value="ADD">
               </div>               
            </form>
         </div>
      </div>
   </div>
</div>

<div class="row">
   <div id="student_confirmModal" class="modal fade" role="dialog">
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
               <button type="button" name="student_ok_button" id="student_ok_button" class="btn btn-danger">OK</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection