@extends('layouts.mark_app')
@section('content')
<div class="jumbotron">
   <div class="row">
      <div class="pull-left">
         <button type="button" name="mark_create_record" id="mark_create_record" class="btn btn-success btn-sm">MARK ADD</button>
      </div>
      <div class="pull-right">
      </div>
   </div>
   <div class="row">
      @include('marks.mark_list')   
   </div>
</div>
<div class="row">
   <div id="mark_form_Modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-xl">
         <div class="modal-content">
            <div class="modal-header bg-danger">
               <label class="modal-title">MARK ADD FORM</label>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="start_cloes"><span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="post" id="mark_form">
            <span id="mark_form_result"></span>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            {{ csrf_field() }}
               <div class="modal-body">
                  <div class="table-responsive">
           
               
                     <div id="boxes-wrap">
  <div>
    <div class="form-group">
      <label>Gas Container Type</label>
      <select class="form-control input-sm" name="gas[]">
        <option value="gas-1">Container 1</option>
        <option value="gas-2">Container 2</option>
      </select><!-- end of Item_Drop_Down -->
    </div>
     <div class="form-group">
    <input name="name[]" type="text" class="name" placeholder="Input 1"> 
    <button class="btn btn-danger remove-gas-row" type="button">Remove</button>
    </div>
  </div>
</div>


<button class="btn btn-success" type="button" id="add">ADD</button>
             <b>Number of row(s):</b> <span id="counter" style="color:#FF69B4;font-size:16px;font-weight: bold;font-style: italic;"></span>         
            </div>
            </div>
            <div class="modal-footer bg-danger">
            <input type="hidden" name="hidden_id" id="hidden_id" class="form-control"> 
            <input type="hidden" name="hidden_student_id" id="hidden_student_id" class="form-control"> 
            <input type="hidden" name="mark_action" id="mark_action" />  
            <button type="button" class="btn btn-secondary" id="cloes" data-dismiss="modal">CLOSE</button>     
            <input type="submit" name="mark_action_button" id="mark_action_button" class="btn btn-primary" value="ADD">
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection