$(document).ready(function(){

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
  	$('#language_action_button').val('ADD');
  	$('#language_form_Modal').modal('show');

  });


	//alert("Hiiiii");
	var count = 1;

	dynamic_field(count);

	function dynamic_field(number){

		var html = '<tr>';
		html += '<td><input type="text" name="languages_name[]" id="languages_name" class="form-control language_list" placeholder="Add Language name" /></td>';
		

		if(number > 1){
			html+= '<td><button type="button" name="remove" id="remove" class="btn btn-danger">-</button></td></tr>';
			$('#language_field').append(html);
		}
		else{
			html+='<td><button type="button" name="add" id="add" class="btn btn-success">+</button></td></tr>';
			$('#language_field').html(html);
		}

		
		

	}

	$(document).on('click', '#add', function(){
		//alert('hi');
		count++;
		dynamic_field(count);
	});

	$(document).on('click', '#remove', function(){
		count--;
		//dynamic_field(count);
		$(this).closest("tr").remove();
	});

	

	$('#language_form').on('click','#language_action_button',function(e){
		//alert('hi');
			e.preventDefault();
			/*var total_languages = 0;
            $('.language_list').each(function(){
			   if($(this).val() != '')
			   {
			    total_languages = total_languages + 1;
			   }
			  });	

            if(total_languages > 0)
  			{*/
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
   				$('#languages_name').val(html.data.languages_name);
   				

   				/*$.each($('input[id=languages_name]'),function(){
  				alert($(this).val());
  				return;
				});*/
				var languages_name = $('#hidden_languages_name').val(html.data.languages_name);
			
   				var array = $(languages_name).val().split(',');  
   				
   				
   				 
				$.each(array,function(i){
					//console.log(array[i]);
					//if(array.length > 1){
					var html = '<tr>';
					html += '<td><input type="text" name="languages_name[]" id="languages_name" class="form-control language_list" value="'+array[i]+'"/></td>';	
					if(array.length > 1){
						
					html+= '<td><button type="button" name="remove" id="remove" class="btn btn-danger">-</button></td></tr>';
					}
					else{
					html+='<td><button type="button" name="add" id="add" class="btn btn-success">+</button></td></tr>';
					$('#language_field').html(html);
					}
					$('#language_field').append(html);				     
				});


				 /*for(var i=0; i< arr.length; i++){
     $('.language_list').append('<input type="text" name="languages_name[]" id="languages_name" class="form-control language_list" value="'+array[i]+'"/>');
    }*/

				

				
   				
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
   			}
   		});
   });



   

});