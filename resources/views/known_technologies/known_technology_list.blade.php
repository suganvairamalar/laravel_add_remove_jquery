@if(!empty($known_technologies))   
<div class="table-responsive tableFixHead">
   <table class="table table-striped table-bordered table-hover">
      <thead>
         <tr class="bg-primary">
            <th class="col-xs-1 col-sm-1 col-md-1">S.NO</th>           
            <th class="col-xs-2 col-sm-2 col-md-2">NAME</th>           
            <th class="col-xs-2 col-sm-2 col-md-2">ACTION</th>
         </tr>
      </thead>
      <tbody >
         <?php $i=0; ?>
         @foreach($known_technologies as $known_technology)
         <?php $i++; ?>
         <tr>
            <td >{{ $i }}</td>
            <td >{{ $known_technology->known_technology_name }}</td>
            <td>
                <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
               <button type="button" name="edit" id="{{ $known_technology->id }}" class="edit btn btn-warning btn-sm">Edit</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
               <button type="button" name="delete" id="{{ $known_technology->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
            </td>
         </tr>
         @endforeach       
      </tbody>
   </table>
</div>
@endif     
<!-- </div> -->
{!!$known_technologies->render()!!}