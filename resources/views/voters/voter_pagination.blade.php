@extends('layouts.pagination')
@section('content')
<div class="jumbotron">
   <div class="row">
      <div id="table_data">
         @if(!empty($voters))  
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 tableFixHead">
               <table class="table table-striped table-bordered">
                  <thead>
                     <tr class="bg-primary">
                        <th class="col-xs-1 col-sm-1 col-md-1 sorting" >S.NO</th>
                        <th class="col-xs-1 col-sm-1 col-md-1 sorting" data-sorting_type="asc" data-column_name="id" style="cursor : pointer">ID <span id="id_icon"></span></th>
                        <!-- style='visibility: hidden;' -->
                        <th class="col-xs-1 col-sm-1 col-md-1 sorting" data-sorting_type="asc" data-column_name="name" style="cursor : pointer">NAME <span id="name_icon"></span></th>
                        <th class="col-xs-1 col-sm-1 col-md-1 sorting" data-sorting_type="asc" data-column_name="gender" style="cursor : pointer">GENDER <span id="gender_icon"></span></th>
                        <th class="col-xs-2 col-sm-2 col-md-2 sorting" data-sorting_type="asc" data-column_name="dob" style="cursor : pointer">DOB <span id="dob_icon"></span></th>
                        <th class="col-xs-1 col-sm-1 col-md-1 sorting" data-sorting_type="asc" data-column_name="voter_id" style="cursor : pointer">VOTER ID <span id="voter_id_icon"></span></th>
                        <th class="col-xs-1 col-sm-1 col-md-1 sorting" data-sorting_type="asc" data-column_name="mobile" style="cursor : pointer">MOBILE <span id="mobile_icon"></span></th>
                        <th class="col-xs-2 col-sm-2 col-md-2 sorting" data-sorting_type="asc" data-column_name="address" style="cursor : pointer">ADDRESS <span id="address_icon"></span></th>
                        <th class="col-xs-2 col-sm-2 col-md-2 sorting" data-sorting_type="asc" data-column_name="city" style="cursor : pointer">CITY <span id="city_icon"></span></th>
                        <th class="col-xs-1 col-sm-1 col-md-1 sorting" data-sorting_type="asc" data-column_name="postcode" style="cursor : pointer">POSTCODE <span id="postcode_icon"></span></th>
                        <!-- <th>ACTION</th> -->
                     </tr>
                  </thead>
                  <tbody >
                     @include('voters.voter_pagination_data')
                  </tbody>
               </table>
               
               <input type="hidden" name="hidden_page" id="hidden_page" value="1">     
               <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id">         
               <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc">       
            </div>
         </div>         
         @endif
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
   
         function clear_icon(){
           $('#id_icon').html('');
           $('#name_icon').html('');
           $('#gender_icon').html('');
           $('#voter_id_icon').html('');
           $('#mobile_icon').html('');
           $('#address_icon').html('');
           $('#city_icon').html('');
           $('#postcode_icon').html('');
         }
       
         function fetch_data(page, sort_type, sort_by){
            $.ajax({
               url:"/voter_pagination/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type,
               success:function(data){
                 $('tbody').html('');
                 $('tbody').html(data);
               }
              
            });
         }
   
       $(document).on('click', '.sorting', function(){
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
   
            if(order_type == 'asc'){
             //alert("ascending");
               $(this).data('sorting_type', 'desc');
               reverse_order = 'desc';
               clear_icon();
               $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
            }
            
            if(order_type == 'desc'){
             //alert("descending");
               $(this).data('sorting_type', 'asc');
               reverse_order = 'asc';
               clear_icon();
               $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
            }
            
            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);
            var page = $('#hidden_page').val();
            fetch_data(page, reverse_order, column_name);
   
       });
   
          $(document).on('click', '.pagination a', function(event){
              event.preventDefault();
              var page = $(this).attr('href').split('page=')[1];
              $('#hidden_page').val(page);
              var column_name = $('#hidden_column_name').val();
              var sort_type = $('#hidden_sort_type').val();
              fetch_data(page, sort_type, column_name);
          });
   });
</script>
@endsection