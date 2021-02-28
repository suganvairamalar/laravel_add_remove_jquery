$(document).ready(function(){

	if($('#language_action_button').val()=='ADD'){
					var count = $('#mytbody tr').length;
				    $('#counter').html(1);
				}
				
	$( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

   $('#language_create_record').click(function(){
  	//alert('hi');
  	$('.modal-title').text('ADD NEW RECORD');
  	$('#language_action_button').val('ADD');
  	//$('#language_action_button').val('ADD');
  	$('#language_form_Modal').modal('show');

  });

	
	$(document).on('click', '#add', function(){
		//alert('hi');
		//count++;
		//dynamic_field(count);
		var tr ='<tr>'+
   	 			 '<td class="td1"><input type="text" name="languages_name[]" id="languages_name" class="form-control languages_name_list" placeholder="Add language name" /></td>'+
   	 			 '<td class="td1"><button type="button" name="remove" id="remove" class="remove btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>'+
   	 			 '</tr>';
   	

	var action = $('#language_action_button').val();
	if($('#language_action_button').val()=='ADD'){
		var count = $('#mytbody tr').length;
	    $('#counter').html(count+1);
	}
	if($('#language_action_button').val()=='EDIT'){
		var count = $('#mytbody tr').length;
	    $('#counter').html(count);
	}
   	 
   	 $('#language_field').append(tr);
	});

	$(document).on('click', '#remove', function(){
		var action = $('#language_action_button').val();

		if($('#language_action_button').val()=='ADD'){
			$('#remove').prop("disabled",false);
			var count = $('#mytbody tr').length;
	    	$('#counter').html(count-1);
			
		}
		if($('#language_action_button').val()=='EDIT'){
			var count = $('#mytbody tr').length;
			$('#counter').html(count-2);
		    if($('#mytbody tr').length==2){		    	
				alert("Does Not Delete All Rows");
				$('#remove').prop("disabled",true);	
				$('#counter').html(1);
				return false;
				location.reload(true);

			}
		}

		$(this).parent().parent().remove();

		//alert(language.length);
		//return;
		
		
	});

	

	$('#language_form').on('click','#language_action_button',function(e){
		//alert('hi');
			e.preventDefault();
			
			if($('#language_action_button').val()=='ADD'){
				
					$.ajax({
						url:'/language_add_data',
						method:'post',
						data:$('#language_form').serialize(),
   	   					dataType:"json",
   	   					beforeSend:function(){
                        $('#language_action_button').attr('disabled','disabled');
                        },
   	   					success:function(data){
   	   						if(data.error)
                			{
			                    var error_html = '';
			                    for(var count = 0; count < data.error.length; count++)
			                    {
			                        error_html += '<p>'+data.error[count]+'</p>';
			                    }
			                    $('#language_form_result').html('<div class="alert alert-danger">'+error_html+'</div>');
			                }

			                else
			                {
			                    //dynamic_field(1);
			                    $('#language_form_result').html('<div class="alert alert-success">'+data.success+'</div>');
			                     $('#language_form')[0].reset();
                    			 location.reload();
			                }	   	   							
					            $('#language_action_button').attr('disabled', false);
					            //$('#remove').attr('disabled', false);


			            }

					});

		}

		if($('#language_action_button').val()=='EDIT'){
				
					$.ajax({
						url:'/language_update_data',
						method:'post',
						data:$('#language_form').serialize(),
   	   					dataType:"json",
   	   					beforeSend:function(){
                        $('#language_action_button').attr('disabled','disabled');
                        },
   	   					success:function(data){
   	   						if(data.error)
                			{
			                    var error_html = '';
			                    for(var count = 0; count < data.error.length; count++)
			                    {
			                        error_html += '<p>'+data.error[count]+'</p>';
			                    }
			                    $('#language_form_result').html('<div class="alert alert-danger">'+error_html+'</div>');
			                }
			                else
			                {
			                    //dynamic_field(1);
			                    $('#language_form_result').html('<div class="alert alert-warning">'+data.success+'</div>');
			                     $('#language_form')[0].reset();
                    			 location.reload();
			                }	   	   							
					            $('#language_action_button').attr('disabled', false);
			            }

					});

		}
	/*}*/
    });

	

	$(document).on('click', '.edit', function(){ 
    	/*alert('edit');
   		return;*/
   		var id = $(this).attr('id');
   		$('#language_form_result').html('');
   		$.ajax({
   			url:'/language_edit_data/'+id,
   			dataType:"json",
   			success:function(html){
   				
   				$('#person_name').val(html.data.person_name); 		   				

   				var hidden_id = $('#hidden_id').val(html.data.id);

				var languages_name = $('#hidden_languages_name').val(html.data.languages_name);
			
   				var array = $(languages_name).val().split(','); 	

   				//console.log(array);
   				

				$.each(array,function(i){
					
			
						var tr ='<tr>'+
			   	 			 '<td class="td1"><input type="text" name="languages_name[]" id="languages_name" class="form-control languages_name_list" placeholder="Add language name" value="'+array[i]+'" /></td>'+
			   	 			 '<td class="td1"><button type="button" name="remove" id="remove" class="remove btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>'+
			   	 			'</tr>';
   	 			 			$('#language_field').append(tr);
   	 			 			$('#languages_name').val(html.data.languages_name[array[i]]);

   	 			
   	 				
	         });

    var count = $('#mytbody tr').length;
	
	$('#counter').html(count-1);
   				
   				$('#languages_name').append(html.data.hidden_languages_name);
   				$('#hidden_id').val(html.data.id);
   				$('#hidden_languages_name').val(html.data.languages_name);
   				
   				$('.modal-title').text("EDIT THE RECORD");
			    $(".modal-body").removeClass('bg-primary').addClass('bg-success');
			    $(".modal-header").removeClass('bg-danger').addClass('bg-primary');
			    $(".modal-footer").removeClass('bg-danger').addClass('bg-primary');
			    $('#language_action_button').val("EDIT");
			    $('#language_action').val("EDIT");
			    $('#language_action_button').removeClass('btn btn-primary').addClass('btn btn-warning');
			    $('#cloes').removeClass('btn btn-secondary').addClass('btn btn-success');
			    $('#language_form_Modal').modal('show');
			    $('#languages_name').remove(); //use to edit first row array[0] to relocate to first remove button place 

			    //$(".language_list").append("BOOK NAME");
			    $('.td2').html('CLICK TO ADD LANGUAGE NAME MORE');
   			}
   		});
   });


 var language_id;
  $(document).on('click', '.delete', function(){
      language_id = $(this).attr('id');
      $('#language_confirm_Modal').modal('show');      
  });

  $('#language_ok_button').click(function(){
        $.ajax({
          url:'/language_delete_data/'+language_id,
          beforeSend:function(){
            $('#language_ok_button').text('Deleting.....');
            },
            success:function(data){
              setTimeout(function(){
                $('language_confirm_Modal').modal('hide');
                location.reload();
              }, 2000);
            }
        });
  });



   

});