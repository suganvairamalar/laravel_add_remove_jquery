@extends('layouts.app')

@section('content')
<!-- Button trigger modal -->

<div class="jumbotron">
  <div class="row">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stateaddmodal">
  STATE ADD
  </button>




  <!--LIST PAGE -->
 
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


  

    


@endsection