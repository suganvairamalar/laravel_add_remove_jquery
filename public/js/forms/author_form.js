$(document).ready(function(){
  //ADD VALIDATION

     /* function clear_icon(){
                   $('#id_icon').html('');
                   $('#first_name_icon').html('');
                   $('#last_name_icon').html('');
              }
   
              function fetch_data(page, sort_type, sort_by, query){
                $.ajax({
                       url:"/author_pagination/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
   
                       success:function(data){
                        $('tbody').html();
                        $('tbody').html(data);
                       }
                });
              }
              
              $(document).on('keyup', '#serach', function(){
                  var query = $('#serach').val();
                  var column_name = $('#hidden_column_name').val();
                  var sort_type = $('#hidden_sort_type').val();
                  var page = $('#hidden_page').val();
                  fetch_data(page, sort_type, column_name, query);
   
              });
   
              $(document).on('click', '.sorting', function(){
                   var column_name = $(this).data('column_name');
                   var order_type = $(this).data('sorting_type');
                   var reverse_order = '';
   
                   if(order_type == 'asc'){
                     $(this).data('sorting_type','desc');
                     reverse_order = 'desc';
                     clear_icon();
                     $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>')
                   }
   
                   if(order_type == 'desc'){
                      $(this).data('sorting_type','asc');
                      reverse_order = 'asc';
                      clear_icon();
                      $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
                   }
   
                   $('#hidden_column_name').val(column_name);
                   $('#hidden_sort_type').val(reverse_order);
                   var page = $('#hidden_page').val();
                   var query = $('#serach').val();
                   fetch_data(page,reverse_order,column_name,query);
              });

              $(document).on('click','.pagination a', function(event){
                   event.preventDefault();
                   var page = $(this).attr('href').split('page=')[1];
                   $('#hidden_page').val(page);
                   var column_name = $('#hidden_column_name').val();
                   var sort_type = $('#hidden_sort_type').val();
                   var query = $('#serach').val();
                   $('li').removeClass('active');
                   $(this).parent().addClass('active');
                   fetch_data(page, sort_type, column_name, query);
   
   
              });

*/            /*$.ajaxSetup({
              headers:{
                 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
               }
              });*/

    
    //search

    $('#author_search_submit').on('click', function () {
      /*$('.pagination a').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');*/
                var _token = $('#token').val();
                $value = $('#search').val();
                $.ajax({
                    type:'GET',
                    url:'/author_pagination',
                    data: {'search': $value,_token:_token},
                    success: function (data) {
                        //$('#search_data').html(data);
                        console.log(data);

                    }
                });

            /*});*/
      });

     

   //ADD FORM SUBMIT
  // $('#authoraddform').on('submit',function(e){ //if u give like this u will get twice entry to database
$('#author_insert_submit').on('click', function(e){ //if u give it will prevent database twice entry
            e.preventDefault();   //use to prevent the refresh page   
            var first_name = $('#first_name').val()    
            var last_name = $('#last_name').val()    
            var _token = $('#token').val();
            if (first_name.length == 0) {            
            $('#firstname_response').text("* Please enter first name *"); // This Segment Displays The Validation Rule For All Fields
            $('#lastname_response').text("* Please enter last name *");
            $("#first_name").focus();
            return false;
            }
            else if(last_name.length == 0){              
            $("#last_name").focus();
            return false;
            }                  
            else {
            $.ajax({
              type:'post',
              url:'/authoradd',
              data:$('#authoraddform').serialize(),
              success:function(response){
                console.log(response);
               // $('#authoraddmodal').modal('hide');                  
                 alert('data saved');
                 $("#authoraddform").trigger("reset");
                 location.reload();
              }/*,
              error: function(error){
                 console.log(error);
                 alert('data not saved');
              }*/

            });
            $('#firstname_response').text(""); 
            $('#lastname_response').text("");
            return true;

            }
   });
   //END ADD FORM SUBMIT

    //DETAIL BUTTON
    $('.detailbtn').on('click', function(){
        //alert('edit');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        return $(this).text();         
        }).get();
        console.log(data);
        $('#detail_id').val(data[1]);
        $('#detail_first_name').val(data[2]);
        $('#detail_last_name').val(data[3]);

   });

   //EDIT BUTTON
   $('.editbtn').on('click', function(){
        //alert('edit');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
        return $(this).text();         
        }).get();              
        console.log(data);        
        $('#edit_id').val(data[1]);
        $('#edit_first_name').val(data[2]);
        $('#edit_last_name').val(data[3]);
        

   });


//EDIT FORM SUBMIT START
   $('#author_update_submit').on('click', function(e){
           e.preventDefault();
            //var name = $(this).val().trim();
          //if(name!=''){
             var _token = $('#token').val();
             var id = $('#edit_id').val();
             var first_name = $('#edit_first_name').val()    
             var last_name = $('#edit_last_name').val()  
            if (first_name.length == 0) {            
            $('#firstname_response').text("* Please enter first name *"); // This Segment Displays The Validation Rule For All Fields
            $('#lastname_response').text("* Please enter last name *");
            $("#first_name").focus();
            return false;
            }
            else if(last_name.length == 0){              
            $("#last_name").focus();
            return false;
            }                  
            else {
           $.ajax({
              type:'post',
              url:'/authorupdate/'+id,
              data:$('#authoreditform').serialize(),
              success:function(response){
                console.log(response);
                $('#authoreditmodal').modal('hide');    
                alert('data updated');   
                 $("#authoreditform").trigger("reset");
                  location.reload();
              }
//}
              /*error: function(response){
                //console.log(response);

                alert('data not updated');
              }*/
//stateeditmodal
            });
           $('#firstname_response').text(""); 
            $('#lastname_response').text("");
            return true;

            }


   });
    //END EDIT FORM SUBMIT

    //DELETE BUTTON
    $('.deletebtn').on('click', function(){
       $tr = $(this).closest('tr');
       var data = $tr.children("td").map(function(){
        return $(this).text();
       }).get();
       console.log(data);
       $('#delete_id').val(data[1]);
    });


    //DELETE FORM SUBMIT
    $('#author_delete_submit').on('click', function(e){
          e.preventDefault();
          var _token = $('#token').val();
          var id = $('#delete_id').val();
          //alert(id);
          $.ajax({
            type:'post',
            url:'/authordelete/'+id,
            data:$('#authordeleteform').serialize(),
            success:function(response){
              console.log(response);
             $('#authordeletemodal').modal('hide');
             location.reload();
            }/*,
            error: function(response){
                //console.log(response);

                alert('data not deleted');
            }*/
          });

    });


   
   



   $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
});


 /**/


   



});