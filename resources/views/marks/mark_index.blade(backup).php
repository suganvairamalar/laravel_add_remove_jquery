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
           
            <table class="table1 table-bordered" id="mark_field">
            <thead>
            <tr class="">
            <th class="col-xs-2 col-sm-2 col-md-2">STUDENT NAME</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK1</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK1</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK3</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK4</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK5</th>
            <th class="col-xs-1 col-sm-1 col-md-1">TOTAL</th>
            <th class="col-xs-1 col-sm-1 col-md-1">PERCENTAGE</th>
            <th class="col-xs-1 col-sm-1 col-md-1">RANK</th>
            <th class="col-xs-1 col-sm-1 col-md-1">ACTION</th>
            </tr>
            </thead> 
            <tbody id="mark_tbody">
            <tr class='tr1' id="">
            
            <td class="col-xs-2 col-sm-2 col-md-2 tdselect"> 
            <select class="form-control td2" name="student_id[]">
               <option disabled="disabled" selected="true">Select Student</option>
                  @foreach($students as $student)
                     <option value="{!!$student->id!!}">{!!$student->student_name!!}</option>           
                  @endforeach
            </select></td>
            <td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark1[]" id="mark1" class="form-control name" placeholder=""/></td>
            <td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark2[]" id="mark2" class="form-control name" placeholder="" /></td>
            <td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark3[]" id="mark3" class="form-control name" placeholder="" /></td>
            <td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark4[]" id="mark4" class="form-control name" placeholder="" /></td>
            <td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark5[]" id="mark5" class="form-control name" placeholder="" /></td>
            <td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="total[]" id="total" class="form-control name" placeholder="" /></td>
            <td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="percentage[]" id="percentage" class="form-control name" placeholder="" /></td>
            <td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="rank[]" id="rank" class="form-control name" placeholder="" /></td>
            <td class="col-xs-1 col-sm-1 col-md-1 td1"><button type="button" name="add_mark" id="add_mark" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
            </td>
            
            </tr>
            </tbody>                             
            </table>   
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