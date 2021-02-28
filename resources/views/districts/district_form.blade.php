@extends('layouts.app')
@section('content')

<div class="jumbotron">
  <div class="row"> 
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#districtaddmodal">DISTRICT ADD</button>
  
  @if(!empty($districts))  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr class="bg-primary">
              <th>S.NO</th>
              <th>ID</th> <!-- style='visibility: hidden;' -->
              <th>STATE NAME</th>
              <th>DISTRICT NAME</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; ?>
            @foreach($districts as $district)
            <?php $i++; ?>
            <tr>
              <td class="table-text">{{ $i }}</td>
              <td class="table-text">{{ $district->id }}</td> <!-- style='visibility: collapse;' -->
              <td class="table-text">{{ $district->state_name }}</td>              
              <td class="table-text">{{ $district->district_name }}</td>              
              <td><a href="" class="btn btn-info detailbtn" data-toggle="modal" data-target="#districtdetailmodal">DETAIL</a>
                <a href="" class="btn btn-warning editbtn" data-toggle="modal" data-target="#districteditmodal">EDIT</a>
                <a href="" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#districtdeletemodal" >DELETE</a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
   </div>
  @endif
</div>
</div>




 <!-- Add district Modal -->
<div class="modal fade" id="districtaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">DISTRICT ADD FORM</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="districtaddform">      
      <div class="modal-body">
        {{ csrf_field() }}
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">        
        <div class="form-group">
                  <label>State</label>                    
                  <select name="state_id" id="state_id" class="form-control state_id"  style="width:100%;">
                  <option></option>
                  @foreach($states as $state)
                  <option value="{{$state->id}}">{{$state->state_name}}</option>
                  @endforeach
                  </select>
      </div>
      <div class="form-group">
                <label>District Name</label>
                <input type="text" class="form-control district_name" name="district_name" id="district_name" placeholder="Enter a name">
                <!-- Response -->
                <div id="districtname_response" ></div>
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" id="submit" name="submit" class="btn btn-primary">ADD DATA</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Add district Modal-->

  @if(!empty($district))  
 <!-- Edit district Modal -->
<div class="modal fade" id="districteditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">DISTRICT EDIT FORM</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="districteditform">      
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" class="form-control" name="id" id="edit_id">
        <input type="hidden" class="form-control" name="id" id="edit_state_id">

       <div class="form-group">
                  <label>State</label>                    
                  <select name="state_id" id="edit_state_id" class="form-control estate_id"  style="width:100%;">
                  <option></option>
                  @foreach($states as $state)
                  <option value="{{$state->id}}" {{$district->state_id == $state->id ? 'selected' : '' }}>{{$state->state_name}}</option>
                  @endforeach
                  </select>
      </div> 
      <div class="form-group">
                <label>District Name</label>
                <input type="text" class="form-control edistrict_name" name="district_name" id="edit_district_name" placeholder="Enter a name">
                <!-- Response -->
               <!--  <div id="edistrictname_response" ></div> -->
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" id="submit" name="submit" class="btn btn-warning">EDIT DATA</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Edit district Modal-->
@endif

@if(!empty($district))  
<!-- Detail district Modal -->
<div class="modal fade" id="districtdetailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">DISTRICT DETAIL FORM</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="districtdetailform">      
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('GET') }}
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label>ID</label> 
        <input type="text" class="form-control" name="id" id="detail_id" disabled="disabled">
         </div>
        
      <div class="form-group">
                <label>District Name</label>
                <input type="text" class="form-control district_name" name="district_name" id="detail_districtname" placeholder="Enter a name" disabled="disabled">      
           </div>


             <div class="form-group">
                  <label>State</label>                    
                  <select name="state_id" id="edit_state_id" class="form-control estate_id"  style="width:100%;" disabled="disabled">
                  <option></option>
                  @foreach($states as $state)
                  <option value="{{$state->id}}" {{$district->state_id == $state->id ? 'selected' : '' }}>{{$state->state_name}}</option>
                  @endforeach
                  </select>
      </div> 
      </div>
      
      </form>
    </div>
  </div>
</div>
@endif
<!--End Detail district Modal-->

<!-- Delete District Modal -->
<div class="modal fade" id="districtdeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <label class="modal-title" id="exampleModalLabel">DISTRICT DELETE FORM</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="districtdeleteform">        
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="text" class="form-control" name="id" id="delete_id">
        <p>Are you sure !! want to delete this record?</p>
      </div>
      <div class="modal-footer bg-danger">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <button type="submit" id="submit" name="submit" class="btn btn-danger">DELETE DATA</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Delete District Modal-->


@endsection
