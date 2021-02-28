<div class="panel panel-default">
      <div class="panel-heading">POSITION DATA</div>
      <div class="panel-body">
         <span id="position_form_result"></span>
         <div class="table-responsive">
            @if(!empty($positions))   
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
                     @foreach($positions as $position)
                     <?php $i++; ?>
                     <tr>
                        <td >{{ $i }}</td>
                        <td >{{ $position->position_name }}</td>
                        <td>
                           <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
                           <button type="button" name="edit" id="{{ $position->id }}" class="edit btn btn-warning btn-sm">Edit</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
                           <button type="button" name="delete" id="{{ $position->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
                        </td>
                     </tr>
                     @endforeach       
                  </tbody>
               </table>              
            </div>
            @endif    
            {!!$positions->render()!!} 
         </div>
      </div>
   </div>