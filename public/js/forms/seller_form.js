$(document).ready(function(){

	$( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });
  
  $("#create_record").click(function () {
    //$("#addModal").on("click", "#create_record", function () {
    	//alert("Hi");s	
  		 $('.modal-title').text("Add New Record");
       $('#action_button').val("Add");
       $('#action').val("Add");
       $('#formModal').modal('show');
	});

  $('#seller_search_submit').on('click', function () {
            var _token = $('#token').val();
                $value = $('#search').val();
                $.ajax({
                    type:'GET',
                    url:'/sellers',
                    data: {'search': $value,_token:_token},
                    success: function (data) {
                        //$('#search_data').html(data);
                        console.log(data);
                    }
                });           
      });


  
    
  $("#sample_form").on("click", "#action_button", function (e) {
    //$('#student_insert_submit').on('click', function(e){
	//$('#sample_form').on('submit', function(e){
         
		e.preventDefault();
		if($('#action').val() == 'Add')
     {
       //var formData = new FormData($('#sample_form')[0]);

      
      /* console.log(formData);
       return;*/
       $.ajax({
        url:'/selleradd',
        method:"POST",
          //data: new FormData(this),
          data:new FormData($('#sample_form')[0]),
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          success:function(data)
          {
            var html = '';
           if(data.errors)
           {
            html = '<div class="alert alert-danger">';
            for(var count = 0; count < data.errors.length; count++)
            {
             html += '<p>' + data.errors[count] + '</p>';
            }
            html += '</div>';
           }
          if(data.success)
          {
          html = '<div class="alert alert-success">' + data.success + '</div>';
          $('#sample_form')[0].reset();
          location.reload();
          }
          $('#form_result').html(html);
          }
        });
      }
    if($('#action').val() == 'Edit'){
      //alert("Update");
      //return;
      $.ajax({
          url:'/sellerupdate',
           method:"POST",
           data:new FormData($('#sample_form')[0]),
           contentType: false,
           cache:false,
           processData: false,
           dataType:"json",
           success:function(data){
               var html='';
               if(data.errors){
                  html = '<div class="alert alert-danger">';
                  for(var count = 0; count < data.errors.length; count++){
                      html += '<p>' + data.errors[count] + '</p>';
                  }
                  html += '</div>';
               }
               if(data.success){
                  html = '<div class="alert alert-success">' + data.success + '</div>';
                  $('#sample_form')[0].reset();
                  $('#store_image').html('');
                  location.reload();
               }
               $('#form_result').html(html);
           }

      });
    }
  });


  $(document).on('click', '.edit', function(){ 
  var id = $(this).attr('id');   
  $('#form_result').html('');
  $.ajax({
   url:"/seller/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#first_name').val(html.data.first_name);
    $('#last_name').val(html.data.last_name);
    //$('#gender').val(html.data.gender);
    $('input[id="gender"]').filter("[value='"+html.data.gender+"']").prop('checked', true);     
    var image_path  = "http://localhost:8000/uploads/seller_profile";
     /*alert(image_path);
     return;*/

    $('#store_image').html("<img src="+image_path+'/'+html.data.image+" width='60' class='img-thumbnail' />");
    //return;
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('#gender').append("<input type='hidden' name='hidden_gender' value='"+html.data.gender+"' />");

    $('#hidden_id').val(html.data.id);
    $('#hidden_gender').val(html.data.gender);    
    $('.modal-title').text("Edit New Record");
    //$(".modal-body").removeClass('bg-primary').addClass('bg-danger');
    $('#action_button').val("Edit");
    $('#action').val("Edit");
    $('#formModal').modal('show');
    //location.reload();
   }
  })
 });

  var seller_id;
  $(document).on('click', '.delete', function(){
      seller_id = $(this).attr('id');
      $('#confirmModal').modal('show');      
  });

  $('#ok_button').click(function(){
        $.ajax({
          url:'/sellerdelete/'+seller_id,
          beforeSend:function(){
            $('#ok_button').text('Deleting.....');
            },
            success:function(data){
              setTimeout(function(){
                $('confirmModal').modal('hide');
                location.reload();
              }, 2000);
            }
        });
  });

	
});