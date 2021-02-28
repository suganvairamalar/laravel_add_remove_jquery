@extends('layouts.department_app')
@section('content')
<div class="row">
   <div class="panel panel-default">
      <div class="panel-heading">DEPARTMENT DATA</div>
         <div class="panel-body">
            <span id="department_form_result"></span>
               <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                     <thead>
                         <tr>
                     {{ csrf_field() }}
                     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                     <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><label class="control-label1 col-md-1 col-lg-1 col-xs-1 col-sm-1">DEPARTMENT</label></td>
                     <td class="col-md-6 col-lg-6 col-xs-6 col-sm-6"><input type="text" id="department_name" name="department_name" class="form-control" id="department_name" contenteditable></td>
                     <td class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                        <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">   
                        <button type="button" id="departmeent_add" class="btn btn-success">ADD</button>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><label class="control-label1 col-md-1 col-lg-1 col-xs-1 col-sm-1">SEARCH</label></td>
                     <td class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                     <form id="department_search_form" action="/departments">
                        {{ csrf_field() }}
                        {{ method_field('GET') }}
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="text" class="form-control" name="search" id="search">
                        </td>
                        <td class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                        <button type="submit" class="btn btn-warning" id="department_search_submit" name="department_search_submit">
                        <span class="glyphicon glyphicon-search"></span></button> 
                        <a href="{{route('department.index')}}" class="btn btn-primary"><span class="reloadbtn glyphicon glyphicon-refresh"></span></a>
                        </td>
                     </form>
                  </tr> 
                  <tr>
                     <th class="col-md-1 col-lg-1 col-xs-1 col-sm-1">S.NO</th>
                     <th class="col-md-6 col-lg-6 col-xs-6 col-sm-6">DEPARTMENT NAME</th>
                     <th class="col-md-5 col-lg-5 col-xs-5 col-sm-5">ACTION</th>
                  </tr>
                     </thead>
                     @if(!empty($departments)) 
                     <tbody>
                        <?php $i=0; ?>
                  @foreach($departments as $department)
                  <?php $i++; ?>
                  <tr>
                     <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1">{{ $i }}</td>
                     <td id="{{ $department->id }}" class="departmentname col-md-6 col-lg-6 col-xs-6 col-sm-6" contenteditable>{{ $department->department_name }}</td>
                     <td class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                        <button type="button" name="edit" id="{{ $department->id }}" class="edit btn btn-warning btn-sm">Update</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
                        <button type="button" name="delete" id="{{ $department->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
                     </td>
                  </tr>
                  @endforeach 
                     </tbody>
                   @endif   
                  </table>
               </div>
         </div>
   </div>
</div>
{!!$departments->render()!!}

<div class="row">
   <div id="department_confirm_Modal" class="modal fade" role="dialog">
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
            <button type="button" name="department_ok_button" id="department_ok_button" class="btn btn-danger">OK</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
      </div>
   </div>
</div>
</div>

@endsection