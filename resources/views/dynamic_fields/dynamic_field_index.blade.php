@extends('layouts.dynamic_field_app')
@section('content')
<div class="row">
  <div class="panel panel-default">
      <div class="header_form panel-heading">DYNAMIC FIELDS ADD FORM</div>
      <div class="panel-body">
         
         <div class="table-responsive">
            <form method="post" id="dynamic_field_form">
            	<span id="dynamic_field_form_result"></span>
               <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                {{ csrf_field() }}
                <table>
                	<thead>
                		<tr class="bg-primary">
                        <th class="col-xs-2 col-sm-2 col-md-2">FIRST NAME</th>
                        <th class="col-xs-2 col-sm-2 col-md-2">LAST NAME</th>
                        <th class="col-xs-2 col-sm-2 col-md-2">ACTION</th>
                     </tr>
                	</thead>	
                	<tbody>

                	</tbody>
                	<tfoot>
                		<tr>
                		<td colspan="2" align="right">&nbsp;</td>
                		<td>
                		<input type="submit" name="save" id="save" class="btn btn-primary" value="SAVE">
                		</td>
                	  </tr>
                	</tfoot>
              
               <input type="hidden" name="hidden_id" id="hidden_id" class="form-control">   
               <input type="hidden" name="dynamic_field_action" id="dynamic_field_action" />
               
               </table>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection