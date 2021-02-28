@if(!empty($marks))   
<div class="table-responsive tableFixHead">
   <table class="table table-striped table-bordered table-hover std_mark" >
      <thead>
         <tr class="bg-primary">
             <thead>
            <tr class="">
            <th class="col-xs-2 col-sm-2 col-md-2">STUDENT NAME</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK1/100</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK2/100</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK3/100</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK4/100</th>
            <th class="col-xs-1 col-sm-1 col-md-1">MARK5/100</th>
            <th class="col-xs-1 col-sm-1 col-md-1">TOTAL/500</th>
            <th class="col-xs-1 col-sm-1 col-md-1">PERCENTAGE</th>
            <th class="col-xs-1 col-sm-1 col-md-1">RANK</th>         
            <th class="col-xs-2 col-sm-2 col-md-2">ACTION</th>
         </tr>
      </thead>
      <tbody >
         <?php $i=0; ?>
         @foreach($marks as $mark)
         <?php $i++; ?>
         <tr>
            <!-- <td class="col-xs-2 col-sm-2 col-md-2">{{ $i }}</td> -->
            <td class="col-xs-2 col-sm-2 col-md-2">{{ $mark->student_name }}</td>
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $mark->mark1 }}</td>
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $mark->mark2 }}</td>
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $mark->mark3 }}</td>
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $mark->mark4 }}</td>
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $mark->mark5 }}</td>
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $mark->total }}</td>
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $mark->percentage }}</td>
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $mark->rank }}</td>
            <td class="col-xs-2 col-sm-2 col-md-2">
                <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
               <button type="button" name="edit" id="{{ $mark->id }}" class="edit btn btn-warning btn-sm">Edit</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
               <button type="button" name="delete" id="{{ $mark->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
            </td>
         </tr>
         @endforeach       
      </tbody>
   </table>
</div>
@endif     
<!-- </div> -->
{!!$marks->render()!!}