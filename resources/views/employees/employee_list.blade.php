@if(!empty($employees))   
<div class="row">
</div>
<div class="table-responsive tableFixHead">
   <table class="table table-striped table-bordered " id="employee_table">
      <thead>
         <tr style="border-top-color: #FF0000;">
         <td class="col-xs-2 col-sm-2 col-md-2" colspan="7" >
         <button type="button" class="btn btn-warning" id="edit_btn">Edit</button>
          <button type="button" class="btn btn-danger" id="delete_btn">Delete</button></td> 
          </tr>
         <input type="hidden" name="edit_id" id="edit_id">
         <input type="hidden" name="delete_id" id="delete_id">
         <tr class="bg-primary">
            <th class="col-xs-1 col-sm-1 col-md-1">S.NO</th>           
           <!--  <th class="col-xs-1 col-sm-1 col-md-1">id</th>      -->      
            <th class="col-xs-1 col-sm-1 col-md-1">NAME</th>   
            <th class="col-xs-2 col-sm-2 col-md-2">DOB</th>        
            <th class="col-xs-2 col-sm-2 col-md-2">JOIN DATE</th>        
            <th class="col-xs-2 col-sm-2 col-md-2">DEPARTMENT</th>        
            <th class="col-xs-2 col-sm-2 col-md-2">POSITION</th>        
            <th class="col-xs-2 col-sm-2 col-md-2">ACTION</th>
         </tr>
      </thead>
      <tbody >
         <?php $i=0; ?>
         @foreach($employees as $employee)
         <?php $i++; ?>
         <tr id="{{ $employee->id }}">
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $i }}</td>
           <!--  <td class="col-xs-1 col-sm-1 col-md-1">{{ $employee->id  }}</td> -->
            <td class="col-xs-1 col-sm-1 col-md-1">{{ $employee->employee_name }}</td>
            <td class="col-xs-2 col-sm-2 col-md-2">{{ $employee->dob }}</td>
            <td class="col-xs-2 col-sm-2 col-md-2">{{ $employee->join_date }}</td>
            <td class="col-xs-2 col-sm-2 col-md-2">{{ $employee->department_name }}</td>
            <td class="col-xs-2 col-sm-2 col-md-2">{{ $employee->position_name }}</td>
            <td class="col-xs-2 col-sm-2 col-md-2">
                <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
               <button type="button" name="edit" id="{{ $employee->id }}" class="edit btn btn-warning btn-sm">Edit</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
               <button type="button" name="delete" id="{{ $employee->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
            </td>
         </tr> 
         @endforeach       
      </tbody>
   </table>
</div>
@endif     
</div>
<!-- {!!$employees->render()!!} -->
<!-- {!! $employees->appends(Input::except('page'))->render() !!}
 -->
{!! $employees->appends(Request::capture()->except('page'))->render() !!}

   <!-- above code is used to dropdown search filter 
        {!!$employees->render()!!} this code is not working for dropdown field search
 -->
 