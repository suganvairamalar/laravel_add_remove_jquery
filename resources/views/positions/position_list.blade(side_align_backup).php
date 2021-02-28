 <div class="panel panel-default">
      <div class="panel-heading">POSITION DATA</div>
      <div class="panel-body">
         <span id="position_form_result"></span>
         <div class="table-responsive">
            <div class="col-xs-7 col-sm-7 col-md-7">
            @if(!empty($positions))               
               <table class="table table-striped table-bordered table-hover">
                  <thead>
                     <tr class="bg-primary">
                        <th class="col-xs-1 col-sm-1 col-md-1">S.NO</th>
                        <th class="col-xs-4 col-sm-4 col-md-4">NAME</th>
                        <th class="col-xs-2 col-sm-2 col-md-2">ACTION</th>
                     </tr>
                  </thead>
                  <tbody >
                     <?php $i=0; ?>
                     @foreach($positions as $position)
                     <?php $i++; ?>
                     <tr>
                        <td  class="col-xs-1 col-sm-1 col-md-1">{{ $i }}</td>
                        <td  class="col-xs-4 col-sm-4 col-md-4">{{ $position->position_name }}</td>
                        <td  class="col-xs-2 col-sm-2 col-md-2">
                           <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
                           <button type="button" name="edit" id="{{ $position->id }}" class="edit btn btn-warning btn-sm">Edit</button> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
                           <button type="button" name="delete" id="{{ $position->id }}" class="delete btn btn-danger btn-sm">Delete</button> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
                        </td>
                     </tr>
                     @endforeach       
                  </tbody>
               </table>
            @endif    
         </div>
         <div class="col-xs-5 col-sm-5 col-md-5">
            <table>
                              <tr >
                                 <td valign="top">
                           <div class="form-group form-inline">
            <form id="position_search_form" action="/positions">
               {{ csrf_field() }}
               {{ method_field('GET') }}
               <label >SEARCH</label>
               <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
               <input type="text" class="form-control" name="search" id="search">
               <button type="submit" class="btn btn-warning" id="position_search_submit" name="position_search_submit">
               <span class="glyphicon glyphicon-search"></span></button> 
               <a href="{{route('position.index')}}" class="btn btn-primary"><span class="reloadbtn glyphicon glyphicon-refresh"></span></a>
            </form>
         </div>
         </td>
         </tr>
         </table>
         </div>
           
         </div>
          {!!$positions->render()!!} 
      </div>
   </div>