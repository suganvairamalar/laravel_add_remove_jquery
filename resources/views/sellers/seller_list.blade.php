@if(!empty($sellers))   
<div class="table-responsive tableFixHead">
   <table class="table table-striped table-bordered table-hover">
      <thead>
         <tr class="bg-primary">
            <th class="col-xs-1 col-sm-1 col-md-1">S.NO</th>
            <th class="col-xs-2 col-sm-2 col-md-2">IMAGE</th>
            <th class="col-xs-3 col-sm-3 col-md-3">FIRST NAME</th>
            <th class="col-xs-3 col-sm-3 col-md-3">LAST NAME</th>
            <th class="col-xs-3 col-sm-3 col-md-3">ACTION</th>
         </tr>
      </thead>
      <tbody >
         <?php $i=0; ?>
         @foreach($sellers as $seller)
         <?php $i++; ?>
         <tr>
            <td >{{ $i }}</td>
            <td ><div><img src="{{ asset('uploads/seller_profile/'.$seller->image)}}" style="width:100px;height:100px;" class='img-thumbnail'></div>
            </td>
            <td >{{ $seller->first_name }}</td>
            <td >{{ $seller->last_name }}</td> 
            <td>
                <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
               <button type="button" name="edit" id="{{ $seller->id }}" class="edit btn btn-warning btn-sm">Edit</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
               <button type="button" name="delete" id="{{ $seller->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
            </td>
         </tr>
         @endforeach       
      </tbody>
   </table>
</div>
@endif     
</div>
{!!$sellers->render()!!}