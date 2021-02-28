@extends('layouts.position_app')
@section('content')
<div class="row">
   <div class="panel panel-default">
      <div class="panel-heading">POSITION DATA</div>
      <div class="panel-body">
         <span id="position_form_result"></span>
         <div class="table-responsive">
            <!-- if u wan scroll enable this line <table class="table table-striped table-bordered tableBodyScroll"> -->
            <table class="table table-striped table-bordered">
               <thead>
                  <tr>
                     {{ csrf_field() }}
                     <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                     <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><label class="control-label1 col-md-1 col-lg-1 col-xs-1 col-sm-1">POSITION</label></td>
                     <td class="col-md-6 col-lg-6 col-xs-6 col-sm-6"><input type="text" id="position_name" name="position_name" class="form-control" id="position_name" contenteditable></td>
                     <td class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                        <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">   
                        <button type="button" id="add" class="btn btn-success">ADD</button>
                     </td>
                  </tr>
                  <tr>
                     <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><label class="control-label1 col-md-1 col-lg-1 col-xs-1 col-sm-1">SEARCH</label></td>
                     <td class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                     <form id="position_search_form" action="/positions">
                        {{ csrf_field() }}
                        {{ method_field('GET') }}
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="text" class="form-control" name="search" id="search">
                        </td>
                        <td class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                        <button type="submit" class="btn btn-warning" id="position_search_submit" name="position_search_submit">
                        <span class="glyphicon glyphicon-search"></span></button> 
                        <a href="{{route('position.index')}}" class="btn btn-primary"><span class="reloadbtn glyphicon glyphicon-refresh"></span></a>
                        </td>
                     </form>
                  </tr> 
                  <tr>
                     <th class="col-md-1 col-lg-1 col-xs-1 col-sm-1">S.NO</th>
                     <th class="col-md-6 col-lg-6 col-xs-6 col-sm-6">POSITION NAME</th>
                     <th class="col-md-5 col-lg-5 col-xs-5 col-sm-5">ACTION</th>
                  </tr>
               </thead>
               <tbody >
                  @if(!empty($positions)) 
                  <?php $i=0; ?>
                  @foreach($positions as $position)
                  <?php $i++; ?>
                  <tr>
                     <td class="col-md-1 col-lg-1 col-xs-1 col-sm-1">{{ $i }}</td>
                     <td id="{{ $position->id }}" class="positionname col-md-6 col-lg-6 col-xs-6 col-sm-6" contenteditable>{{ $position->position_name }}</td>
                     <td class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                        <button type="button" name="edit" id="{{ $position->id }}" class="edit btn btn-warning btn-sm">Update</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
                        <button type="button" name="delete" id="{{ $position->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
                     </td>
                  </tr>
                  @endforeach 
                  @endif 
                  </tr>
                 <!--  not working blur <td onblur="positionupdate()" id="{{ $position->id }}" class="positionname col-md-6 col-lg-6 col-xs-6 col-sm-6" contenteditable>{{ $position->position_name }}</td> -->
               </tbody>
            </table>
         </div>
      </div>
   </div>
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
{!!$positions->render()!!}
@endsection