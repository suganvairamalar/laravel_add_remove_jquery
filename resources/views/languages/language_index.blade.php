@extends('layouts.language_app')
@section('content')
<div class="jumbotron">
   <div class="row">
      <div class="pull-left">
         <button type="button" name="language_create_record" id="language_create_record" class="btn btn-success btn-sm">LANGUAGE ADD</button>
      </div>
      <div class="pull-right">
      </div>
   </div>
   <div class="row">
      @include('languages.language_list')   
   </div>
</div>
<div class="row">
   <div id="language_form_Modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">LANGUAGE ADD FORM</label>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes"><span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" id="language_form" class="form-horizontal">
               <div class="modal-body bg-primary">
                  <span id="language_form_result"></span>
                  {{ csrf_field() }}
                  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                  <div class="form-group">
                     <label class="control-label1 col-md-4 col-lg-4 col-xs-4 col-sm-4">NAME</label>
                     <div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
                        <input type="text" class="form-control" name="person_name" id="person_name" placeholder="Enter Name">
                     </div>
                  </div>
                  <div class="table-responsive1">
                     <table class="table1 table-bordered" id="language_field">
                        <thead>
                           <tr class="bg-primary">
                              <th >LANGUAGE NAME</th>
                              <th >ACTION</th>
                           </tr>
                        </thead>
                        <tbody id="mytbody">
                           <tr class='tr1'>
                              <td class='td2'><input type="text" name="languages_name[]" id="languages_name" class="form-control language_list" placeholder="Add Language name" /></td>
                              <td class='td1'><button type="button" name="add" id="add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button></td>
                           </tr>
                        </tbody>
                     </table>
                     <b>Number of row(s):</b> <span id="counter" style="color:#FF69B4;font-size:16px;font-weight: bold;font-style: italic;"></span>
                  </div>
               </div>
               <div class="modal-footer bg-danger">
                  <input type="hidden" name="hidden_id" id="hidden_id" class="form-control"> 
                  <input type="hidden" name="hidden_languages_name" id="hidden_languages_name" class="form-control"> 
                  <input type="hidden" name="language_action" id="language_action" />  
                  <button type="button" class="btn btn-secondary" id="cloes" data-dismiss="modal">CLOSE</button>     
                  <input type="submit" name="language_action_button" id="language_action_button" class="btn btn-primary" value="ADD">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<div class="row">
   <div id="language_confirm_Modal" class="modal fade" role="dialog">
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
               <button type="button" name="language_ok_button" id="language_ok_button" class="btn btn-danger">OK</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection