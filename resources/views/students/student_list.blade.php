@if(!empty($students))   
<div class="table-responsive tableFixHead">
   <table class="table table-striped table-bordered table-hover">
      <thead>
         <tr class="bg-primary">
            <th class="col-xs-1 col-sm-1 col-md-1">S.NO</th>
            <th class="col-xs-1 col-sm-1 col-md-1">PHOTO</th>
            <th class="col-xs-2 col-sm-2 col-md-2">NAME</th>
            <th class="col-xs-2 col-sm-2 col-md-2">DOB</th>
            <th class="col-xs-2 col-sm-2 col-md-2">FATHER NAME</th>
            <th class="col-xs-2 col-sm-2 col-md-2">CONTACT NUMBER</th>
            <th class="col-xs-2 col-sm-2 col-md-2">ACTION</th>
         </tr>
      </thead>
      <tbody >
         <?php $i=0; ?>
         @foreach($students as $student)
         <?php $i++; ?>
         <tr>
            <td >{{ $i }}</td>
            <td ><div><img src="{{ asset('uploads/student_profile/'.$student->student_image)}}" style="width:100px;height:100px;" class='img-thumbnail'></div>
            </td>
            <td >{{ $student->student_name }}</td>
            <td >{{ $student->dob }}</td> 
            <td >{{ $student->father_name }}</td> 
            <td >{{ $student->contact_number }}</td> 
            <td>
                <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
               <button type="button" name="edit" id="{{ $student->id }}" class="edit btn btn-warning btn-sm">Edit</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
               <button type="button" name="delete" id="{{ $student->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
            </td>
         </tr>
         @endforeach       
      </tbody>
   </table>
</div>
@endif     
</div>
{!!$students->render()!!}