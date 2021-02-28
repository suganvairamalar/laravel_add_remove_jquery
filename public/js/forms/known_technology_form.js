$(document).ready(function(){

  $( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

   $('#known_technology_search_submit').on('click',function(){
            var _token = $('#token').val();
            $value = $('#search').val();
            $.ajax({
               type:'GET',
               url:'/known_technologies',
               data:{'search':$value,_token:_token},
               success: function(data){
                console.log(data);
               }
            });
   });

   $('#known_technology_create_record').click(function(){
  	//alert('hi');
  	$('.modal-title').text('ADD NEW RECORD');
  	$('#known_technology_action_button').val('ADD');
  	$('#known_technology_action').val('ADD');
  	$('#known_technology_form_Modal').modal('show');

  });

   $('#known_technology_form').on('click','#known_technology_action_button',function(e){
   	   e.preventDefault();
   	   
   	   if($('#known_technology_action').val()=='ADD'){
 //alert("HIIII");
   	   		$.ajax({
   	   			url:'/known_technology_add',
   	   			method:'POST',
   	   			data:$('#known_technology_form').serialize(),
   	   			dataType:"json",
   	   			success:function(data)
              {
               var html = '';
                  if(data.errors){
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++){
                      html += '<p>' + data.errors[count] + '</p>';
                      }
                      html += '</div>';
                    }
                    if(data.success){
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#known_technology_form')[0].reset();
                    location.reload();
                  }
                  $('#known_technology_form_result').html(html);
              }
   	   		});
   	   }

   	   if($('#known_technology_action').val()=='EDIT'){
          //alert("edit");
          //return;
          $.ajax({
          		url:'/known_technology_update',
   	   			method:'POST',
   	   			data:$('#known_technology_form').serialize(),
   	   			dataType:"json",
           success:function(data)
              {
               var html = '';
                  if(data.errors){
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++){
                      html += '<p>' + data.errors[count] + '</p>';
                      }
                      html += '</div>';
                    }
                    if(data.success){
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#known_technology_form')[0].reset();
                    location.reload();
                  }
                  $('#known_technology_form_result').html(html);
              }

      });

        }

   });
   
   $(document).on('click', '.edit', function(){ 
    	/*alert('edit');
   		return;*/
   		var id = $(this).attr('id');
   		$('#known_technology_form_result').html('');
   		$.ajax({
   			url:'/known_technology_edit/'+id,
   			dataType:"json",
   			success:function(html){
   				$('#known_technology_name').val(html.data.known_technology_name);
   				$('#hidden_id').val(html.data.id);
   				$('.modal-title').text("EDIT THE RECORD");
			    $(".modal-body").removeClass('bg-primary').addClass('bg-success');
			    $(".modal-header").removeClass('bg-danger').addClass('bg-primary');
			    $(".modal-footer").removeClass('bg-danger').addClass('bg-primary');
			    $('#known_technology_action_button').val("EDIT");
			    $('#known_technology_action').val("EDIT");
			    $('#known_technology_action_button').removeClass('btn btn-primary').addClass('btn btn-warning');
			    $('#cloes').removeClass('btn btn-secondary').addClass('btn btn-success');
			    $('#known_technology_form_Modal').modal('show');
   			}
   		});
   });


  var known_technology_id;
  $(document).on('click', '.delete', function(){
      known_technology_id = $(this).attr('id');
      $('#known_technology_confirm_Modal').modal('show');      
  });

  $('#known_technology_ok_button').click(function(){
        $.ajax({
          url:'/known_technology_delete/'+known_technology_id,
          beforeSend:function(){
            $('#known_technology_ok_button').text('Deleting.....');
            },
            success:function(data){
              setTimeout(function(){
                $('known_technology_confirm_Modal').modal('hide');
                location.reload();
              }, 2000);
            }
        });
  });


	
});