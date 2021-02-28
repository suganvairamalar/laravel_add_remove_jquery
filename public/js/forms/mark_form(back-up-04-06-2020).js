$(document).ready(function(){

	if($('#mark_action_button').val()=='ADD'){
					var count = $('#mark_tbody tr').length;
				    $('#counter').html(1);
				}

	$( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

   $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

	$('#mark_create_record').click(function(){
  	//alert('hi');
  	$('.modal-title').text('ADD NEW RECORD');
  	$('#mark_action_button').val('ADD');
  	$('#mark_action_button').val('ADD');
  	$('#mark_form_Modal').modal('show');

  });

	var options = '';
    var serviceArray = ["Living Room","Dining Room","Bedroom(s)","Family Room","Kitchen","Den","Hallway(s)","Ste(s)","Bathroom","Landing(s)"];

    //alert(serviceArray);
    var i;
    var index;
     var value;
    var myobj_array= $.map(serviceArray, function(value, index) {
    return [[index,value]];
	});

	console.log(myobj_array);
    //return;
    /*for (var i=0;i<data.length;i++) {
                 op+='<option value="'+data[i].id+'">'+data[i].position_name+'</option>';
              }*/

    //var array = $(serviceArray).val().split(','); 
    //var array = $(serviceArray).val().split(','); 
   



    

    /*$(serviceArray).each(function(){
$('<option>'+this+'</option>').appendTo('.services_list');
});*/

    
   

    /*$("select[name='student_id']").change(function(){
     		 var student_id = $(this).val();
     		 var token = $("input[name='_token']").val();
		      $.ajax({
			          url:'/findstudent',
			          method: 'get',
			          data: {student_id:student_id, _token:token},
			          success: function(data) {
			            $("select[name='student_id'").html('');
			            $("select[name='student_id'").html(data.options);
			            $('.tdselect').append(data.options);
			           //console.log(data.options);
			           // return;

			          }
		      });
  		});*/

   var boxesWrap = $('#boxes-wrap');
  var boxRow = boxesWrap.children(":first");
  var boxRowTemplate = boxRow.clone();
  boxRow.find('button.remove-gas-row').remove();
  
  // nb can't use .length for inputCount as we are dynamically removing from middle of collection
  var inputCount = 1; 


   $('#add').click(function () {
    var newRow = boxRowTemplate.clone();
    inputCount++;
    newRow.find('input.name').attr('placeholder', 'Input '+inputCount);
    boxesWrap.append(newRow);
    $('#counter').html(inputCount);
  });  
  
  $('#boxes-wrap').on('click', 'button.remove-gas-row', function () {
    //$(this).parent().remove();
    $(this).parent().parent().remove();
    inputCount--;
    $('#counter').html(inputCount);
  }); 

	$(document).on('click','#add_mark', function(){	
		/*var tr ='<tr>'+   	 			            
                '<td class="col-xs-2 col-sm-2 col-md-2 tdselect">'+

                '<select name="student_id[]" class="form-control student_id" id="student_id">'+
                '<option value="">Select Unit</option>'+ 
                '<option value="'+ boxRowTemplate +'">'+ boxRowTemplate +'</option>'+
                'inputCount++'+
                '</select>'+
                '</td>'+ 
            	'<td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark1[]" id="mark1" class="form-control" placeholder="" style="text-align: left;"/></td>'+
            	'<td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark2[]" id="mark2" class="form-control" placeholder="" /></td>'+
            	'<td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark3[]" id="mark3" class="form-control" placeholder="" /></td>'+
            	'<td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark4[]" id="mark4" class="form-control" placeholder="" /></td>'+
            	'<td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="mark5[]" id="mark5" class="form-control" placeholder="" /></td>'+
            	'<td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="total[]" id="total" class="form-control" placeholder="" /></td>'+
            	'<td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="percentage[]" id="percentage" class="form-control" placeholder="" /></td>'+
            	'<td class="col-xs-1 col-sm-1 col-md-1 td2"><input type="text" name="rank[]" id="rank" class="form-control" placeholder="" /></td>'+
   	 			'<td class="td1"><button type="button" name="mark_remove" id="mark_remove" class="mark_remove btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>'+
   	 			 '</tr>';*/

   	 			// var newRow = boxRowTemplate.clone();
   	 			// $('#add_mark').prop("disabled",false);
    			// inputCount++;
                 //newRow.find('.td2').attr('placeholder', 'Input '+inputCount);
                 //boxesWrap.append(newRow);
                 //$('#mark_field').append(tr);
                 var newRow = boxRowTemplate.clone();
    inputCount++;
    newRow.find('input.name').attr('placeholder', 'Input '+inputCount);
    boxesWrap.append(newRow);

   	 			/* var $tr = $(table).find('tr:last').clone(); 
     						$tr.find('input').attr('id', function(){ 
          					var parts = this.id.match(/(\D+)(\d+)$/); 
          					return parts[1] + ++parts[2]; 
    						 }); 
   							  $(table).append($tr); 
    						 return true; */
   	 			 var action = $('#mark_action_button').val();

				if($('#mark_action_button').val()=='ADD'){
					var count = $('#mark_tbody tr').length;
				    $('#counter').html(inputCount);
				}
   	 	        //$('#mark_field').append(tr);
   	 	        //$('#mark_tbody').append(tr);
	});

	$(document).on('click','#mark_remove', function(){
		$(this).parent().parent().remove();
		if($('#mark_action_button').val()=='ADD'){
			$('#mark_remove').prop("disabled",false);
			var count = $('#mark_tbody tr').length;
	    	$('#counter').html(count);			
		}
			
	});


	//$('#hidden_employee_department_id').val(html.data.employee_department_id);

	$('#mark_form').on('click','#mark_action_button',function(e){
		//alert('hi');
			e.preventDefault();
			
			if($('#mark_action_button').val()=='ADD'){
				
					$.ajax({
						url:'/mark_add_data',
						method:'post',
						data:$('#mark_form').serialize(),
   	   					dataType:"json",
   	   					beforeSend:function(){
                        $('#mark_action_button').attr('disabled','disabled');
                        },
   	   					success:function(data){
   	   						if(data.error)
                			{
			                    var error_html = '';
			                    for(var count = 0; count < data.error.length; count++)
			                    {
			                        error_html += '<p>'+data.error[count]+'</p>';
			                    }
			                    $('#mark_form_result').html('<div class="alert alert-danger">'+error_html+'</div>');
			                }

			                else
			                {
			                    //dynamic_field(1);
			                    $('#mark_form_result').html('<div class="alert alert-success">'+data.success+'</div>');
			                     $('#mark_form')[0].reset();
                    			 location.reload();
			                }	   	   							
					            $('#mark_form_action_button').attr('disabled', false);
					            //$('#remove').attr('disabled', false);


			            }

					});

		}
	});


});