@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->

<div class="jumbotron">
  <div class="row">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stateaddmodal">
  STATE ADD
  </button>




  <!--LIST PAGE -->
  @if(!empty($states))
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <table class="table table-striped table-bordered">
          <thead>
            <tr class="bg-primary">
              <th>S.NO</th>
              <th >ID</th> <!-- style='visibility: hidden;' -->
              <th>STATE NAME</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; ?>
            @foreach($states as $state)
            <?php $i++; ?>
            <tr>
              <td class="table-text">{{ $i }}</td>
              <td class="table-text">{{ $state->id }}</td> <!-- style='visibility: collapse;' -->
              <td class="table-text">{{ $state->state_name }}</td>              
              <td> <a href="" class="btn btn-info detailbtn" data-toggle="modal" data-target="#statedetailmodal">DETAIL</a>
                <a href="" class="btn btn-warning editbtn" data-toggle="modal" data-target="#stateeditmodal">EDIT</a>
                <a href="" data-toggle="modal" data-target="#statedeletemodal" class="btn btn-danger deletebtn">DELETE</a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endif
    {!!$states->render()!!} <!--this is for pagination-->
  </div>
</div>


  

    <!-- Add state Modal -->
<div class="modal fade" id="stateaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">STATE ADD FORM</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="stateaddform">        
      <div class="modal-body">
        {{ csrf_field() }}
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
       
        <div class="form-group">
                <label>State Name</label>
                <input type="text" class="form-control state_name" name="state_name" id="state_name" placeholder="Enter a name">
                <!-- Response -->
          <div id="statename_response" ></div>
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
<!--End Add state Modal-->

@if(!empty($state))  
<!-- Edit state Modal -->
<div class="modal fade" id="stateeditmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">STATE EDIT FORM</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="stateeditform">        
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}
         
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" class="form-control" name="id" id="edit_id">
       
        <div class="form-group">
                <label>State Name</label>
                <input type="text" class="form-control state_name" name="state_name" id="edit_statename" placeholder="Enter a name">
                <!-- Response -->
          <!-- <div id="estatename_response" ></div> -->
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
@endif
<!--End Edit state Modal -->

@if(!empty($state)) 
<!-- Detail State Modal -->
<div class="modal fade" id="statedetailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title" id="exampleModalLabel">STATE DETAIL FORM</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="statedetailform">        
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('GET') }}
         
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        
        <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" name="id" id="detail_id" placeholder="Enter a name" disabled="disabled">                
           </div>      
        <div class="form-group">
                <label>State Name</label>
                <input type="text" class="form-control state_name" name="state_name" id="detail_statename" disabled="disabled">                
           </div>

      </div>
      
      </form>
    </div>
  </div>
</div>
@endif
<!--End Detail State Modal -->

 <!-- Delete State Modal -->
<div class="modal fade" id="statedeletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <label class="modal-title" id="exampleModalLabel">STATE DELETE FORM</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="statedeleteform">        
      <div class="modal-body">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" class="form-control" name="id" id="delete_id">
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
<!--End Delete State Modal-->



@endsection