$(document).ready(function(){
   $( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $('#employee_search_submit').on('click',function(){

            var _token = $('#token').val();
            $value = $('#search').val();
            $search_dropdown = $('#search_dropdown option:selected').val();
            /*alert($search_dropdown);
            return;*/
            if($search_dropdown == "")
            {
            $('#search_dropdown').focus();
            alert("Please select");
            return false;
            }

            if(($search_dropdown!='') && ($value=='')){
              $('#search').focus();
              alert("Please enter to search");
              return false;
            }
           
            
            $.ajax({
               type:'GET',
               url:'/employees',
               data:{'search_dropdown':$search_dropdown,'search':$value,_token:_token},
               success: function(data){
                console.log(data);
               }
            });
   });


  $(document).on("change",'#search_dropdown',function(){
    var select_value = $('#search_dropdown option:selected').val();
      //alert(select_value);
      if(select_value=='name'){
        $('#search').attr('placeholder','Search By Name');
      }
      else if(select_value=='dob'){
        $('#search').attr('placeholder','DD-MM-YYYY');
      }
      else if(select_value=='join_date'){
        $('#search').attr('placeholder','DD-MM-YYYY');
      }
      else if(select_value=='department'){
        $('#search').attr('placeholder','Search By Department');
      }
      else if(select_value=='position'){
        $('#search').attr('placeholder','Search By Position');
      }else{
        $('#search').attr('placeholder','');
      }
  });

  $(".join_date").datepicker({
      showOn: 'button',
      showAnim: 'slideDown',
      //dateFormat: "dd-mm-yy",
      dateFormat: 'dd-mm-yy',
      /*changeMonth: true,
      changeYear: true*/
      changeMonth: true, //use to enable month dropdown
      changeYear: true   //use to enable month dropdown

   });
   
  
 $('.dob').datepicker({
                showOn: 'button',
                showAnim: 'slideDown',
                //dateFormat: "dd-mm-yy",
                dateFormat: 'dd-mm-yy',
               /* changeMonth: true,
                changeYear: true*/
                changeMonth: true,
                changeYear: true,
                maxDate: 0 //use to enable date from today..futute date should disable
                // maxDate: new Date() //use to enable date from today..futute date should disable
                //minDate:(0), maxDate:(365) //use to enable date from today..previous date should disable

  });

         
            $(document).on('change', '.dob', function(){
                var sdate = $('#dob').val().split("-");
                month = sdate[1];
                day = sdate[0];
                year = sdate[2];
                var date_form = ([month, day, year].join('-'));
                var dob_date = $('#sdob_date').val(date_form);
                
                $('.error, #employee_age').text('');
                var dob = $('#sdob_date').val();
                var employee_age = $('#employee_age').val();
                if(dob == ''){
                    $('.error').text('Select DOB!');
                    $('#employee_age').val('');
                    $('#sdob_date').val('');                                                                       
                }else{
                    dobDate = new Date(dob);
                    nowDate = new Date();
                    
                    var diff = nowDate.getTime() - dobDate.getTime();
                    
                    var ageDate = new Date(diff); // miliseconds from epoch
                    var age = Math.abs(ageDate.getUTCFullYear() - 1970); 
                    //alert(age);                 
                    //$('#std_age').append(age);
                    $('#employee_age').val(age);    
                }
            });


            
         $(document).on('keyup', '.dob', function(){
                var sdate = $('#dob').val().split("-");
                month = sdate[1];
                day = sdate[0];
                year = sdate[2];
                var date_form = ([month, day, year].join('-'));
                var dob_date = $('#sdob_date').val(date_form);
               
                $('.error, #employee_age').text('');
                var dob = $('#sdob_date').val();
                var employee_age = $('#employee_age').val();
                if(dob == ''){
                    $('.error').text('Select DOB!');
                    $('#employee_age').val('');
                    $('#sdob_date').val('');
                }else{
                    dobDate = new Date(dob);
                    nowDate = new Date();                    
                    var diff = nowDate.getTime() - dobDate.getTime();                    
                    var ageDate = new Date(diff); // miliseconds from epoch
                    var age = Math.abs(ageDate.getUTCFullYear() - 1970); 
                    //alert(age);                 
                    //$('#std_age').append(age);
                    $('#employee_age').val(age);   
                }
            });

    $('#employee_department_id').select2(); 
    $('#employee_position_id').select2(); 
    $('#known_technology_id').select2(); 

    $(document).on('change','.employee_department_id',function(){
          var op = "";
          
          //var emp_dept_id = $(this).val();
          var emp_dept_id = $(this).val();
          //alert(emp_dept_id);
          //return;
          //var emp_pos_id = '';
          var div = $(this).parent();
          console.log(div);
          var html='';
        //  return;
          $.ajax({
            type:'get',
            url:'/findemployeesposition',
            data:{'emp_dept_id':emp_dept_id},
            //between the single quote emp_dept_id should pass the controller page as $request->emp_dept_id

            success:function(data){
              console.log(data.length);
              op+='<option value="" selected disabled>select position</option>';
              for (var i=0;i<data.length;i++) {
                 op+='<option value="'+data[i].id+'">'+data[i].position_name+'</option>';
              }
              //$("#employee_position_id").html("");
             // $("#employee_position_id").append(op);

              //$("#employee_position_id").select2().html("");
              //$("#employee_position_id").append(op);
              var emp_pos_id = $("#hidden_employee_position_id").val();
              $(".employee_position_id").html("");
              $(".employee_position_id").append(op);
              $("#employee_position_id").val(emp_pos_id);
            }
          });
    });

    $('#employee_create_record').click(function(){
  	//alert('hi');
  	$('.modal-title').text('ADD NEW RECORD');
  	$('#employee_action_button').val('ADD');
  	$('#employee_action').val('ADD');
  	$('#employee_form_Modal').modal('show');

  });



  $('#employee_form').on('click','#employee_action_button',function(e){
  		e.preventDefault();
  		if($('#employee_action').val()=='ADD'){
  				/*alert('hi');
  				return;*/
  				$.ajax({
  					url:'/employeeadd',
  					type:'POST',
  					data:$('#employee_form').serialize(),
  					dataType:"json",
  					success:function(data){
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
  						  	$('#dynamic_field_form')[0].reset();
  						  	location.reload();
  						  }
  						  	$('#employee_form_result').html(html);
  					}
  				});
  		}
  		if($('#employee_action').val()=='EDIT'){
  				/*alert('hi');
  				return;*/
  				$.ajax({
  					url:'/employeeupdate',
  					type:'POST',
  					data:$('#employee_form').serialize(),
  					dataType:"json",
  					success:function(data){
  						var html = '';
  						  if(data.errors){
  						  	html = '<div class="alert alert-danger">';
  						  	for(var count = 0; count < data.errors.length; count++){
  						  		html += '<p>' + data.errors[count] + '</p>';
  						  	}
  						  		html += '</div>';
  						  }
  						  if(data.success){
  						  	html = '<div class="alert alert-warning">' + data.success + '</div>';
  						  	$('#employee_form')[0].reset();
  						  	location.reload();
  						  }
  						  	$('#employee_form_result').html(html);
  					}
  				});
  		}
  		
  });


    $(function() {
      $('#employee_table').on('click', 'tbody tr', function(event) {
        $(this).addClass('highlight').siblings().removeClass('highlight');
      });


      $('#delete_btn').click(function(e){
        e.preventDefault();
        var rows = getHighlightRow();
        if (rows != undefined) {
          var del_id = rows.attr('id');
          $('#delete_id').val(del_id);
          if(del_id == undefined) {
          alert('please select row');
          return false;
          }
          else{
            $('#employee_confirm_Modal').modal('show');            
          }  

          $('#employee_ok_button').click(function(){
                $.ajax({
                  url:'/employeedelete/'+del_id,
                  beforeSend:function(){
                    $('#employee_ok_button').text('Deleting...');
                  },
                  success:function(data){
                    setTimeout(function(){
                      $('employee_confirm_Modal').modal('hide');
                      location.reload();
                    }, 2000);
                  }
                });
           });        
        }
      });

      $('#edit_btn').click(function(e) {
        e.preventDefault();
        var rows = getHighlightRow();
        if (rows != undefined) {
          var id = rows.attr('id');
          $('#edit_id').val(id);
          if (id == undefined) {
          alert('please select row');
          return false;
          }
          else{
            $('#employee_form_result').html('');
        $.ajax({
          url:'/employeeedit/'+id,
          dataType:"json",
          success:function(html){
          $('#employee_name').val(html.data.employee_name);
          $('#dob').val(html.data.dob);
          $('#employee_age').val(html.data.employee_age);
          $('#join_date').val(html.data.join_date);
          $('#salary').val(html.data.salary);
          $('#prev_office').val(html.data.prev_office);          

          $('input[id="gender"]').filter("[value='"+html.data.gender+"']").prop('checked', true);
          //below code is for normal dropdown box
          // $("select[name=employee_department_id]").val(html.data.employee_department_id);
          // $("select[name=employee_position_id]").val(html.data.employee_position_id);
          //below code is for select2 dropdown box
          $("#employee_department_id").select2().select2('val',html.data.employee_department_id);

          $("#employee_position_id").select2().select2('val',html.data.employee_position_id);


          //MULTIPLE VALUE CHECK DROPDOWN 
          //$("select[id=known_technology_id]").val(html.data.known_technology_id);  
          $("#known_technology_id").select2().select2('val',html.data.known_technology_id);

          //MULTIPLE VALUE CHECKBOX 
          $('input[id="id_proof"]').val(html.data.id_proof);  
          
          $('#gender').append("<input type='hidden' name='hidden_gender' value='"+html.data.gender+"' />");
          
          $('#employee_department_id').append("<input type='hidden' name='hidden_employee_department_id' value='"+html.data.employee_department_id+"' />");
          
          $('#employee_position_id').append("<input type='hidden' name='hidden_employee_position_id' value='"+html.data.employee_position_id+"' />");
          
          $('#known_technology_id').append("<input type='hidden' name='hidden_known_technology_id' value='"+html.data.known_technology_id+"' />");
          
          $('#id_proof').append("<input type='hidden' name='hidden_id_proof' value='"+html.data.id_proof+"' />");

          $('#hidden_id').val(html.data.id);
          $('#hidden_gender').val(html.data.gender); 
          $('#hidden_employee_department_id').val(html.data.employee_department_id);
          $('#hidden_employee_position_id').val(html.data.employee_position_id);
          $('#hidden_known_technology_id').val(html.data.known_technology_id);
          $('#hidden_id_proof').val(html.data.id_proof);  
          
          $('.modal-title').text("EDIT THE RECORD");
          $(".modal-body").removeClass('bg-primary').addClass('bg-success');
          $(".modal-header").removeClass('bg-danger').addClass('bg-primary');
          $(".modal-footer").removeClass('bg-danger').addClass('bg-primary');
          $('#employee_action_button').val("EDIT");
          $('#employee_action').val("EDIT");
          $('#employee_action_button').removeClass('btn btn-primary').addClass('btn btn-warning');
          $('#cloes').removeClass('btn btn-secondary').addClass('btn btn-success');
          $('#employee_form_Modal').modal('show');
          }
        });
          }
        }
        
      });      

    });

      var getHighlightRow = function() {
        return $('table > tbody > tr.highlight');
      }



     $("tr").dblclick(function(){
       
          /*$tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
            return $(this).text();
          }).get();            
         $('#edit_id').val(data[1]);
         var id = $('#edit_id').val();*/

         var id = $(this).attr('id');
          /*alert(id);
          return;*/
          $('#employee_form_result').html('');
        $.ajax({
          url:'/employeeedit/'+id,
          dataType:"json",
          success:function(html){
          $('#employee_name').val(html.data.employee_name);
          $('#dob').val(html.data.dob);
          $('#employee_age').val(html.data.employee_age);
          $('#join_date').val(html.data.join_date);
          $('#salary').val(html.data.salary);
          $('#prev_office').val(html.data.prev_office);          

          $('input[id="gender"]').filter("[value='"+html.data.gender+"']").prop('checked', true);
          //below code is for normal dropdown box
          // $("select[name=employee_department_id]").val(html.data.employee_department_id);
          // $("select[name=employee_position_id]").val(html.data.employee_position_id);
          //below code is for select2 dropdown box
          $("#employee_department_id").select2().select2('val',html.data.employee_department_id);

          $("#employee_position_id").select2().select2('val',html.data.employee_position_id);


          //MULTIPLE VALUE CHECK DROPDOWN 
          //$("select[id=known_technology_id]").val(html.data.known_technology_id);  
          $("#known_technology_id").select2().select2('val',html.data.known_technology_id);

          //MULTIPLE VALUE CHECKBOX 
          $('input[id="id_proof"]').val(html.data.id_proof);  
          
          $('#gender').append("<input type='hidden' name='hidden_gender' value='"+html.data.gender+"' />");
          $('#employee_department_id').append("<input type='hidden' name='hidden_employee_department_id' value='"+html.data.employee_department_id+"' />");
          $('#employee_position_id').append("<input type='hidden' name='hidden_employee_position_id' value='"+html.data.employee_position_id+"' />");
          $('#known_technology_id').append("<input type='hidden' name='hidden_known_technology_id' value='"+html.data.known_technology_id+"' />");
          $('#id_proof').append("<input type='hidden' name='hidden_id_proof' value='"+html.data.id_proof+"' />");

          $('#hidden_id').val(html.data.id);
          $('#hidden_gender').val(html.data.gender); 
          $('#hidden_employee_department_id').val(html.data.employee_department_id);
          $('#hidden_employee_position_id').val(html.data.employee_position_id);
          $('#hidden_known_technology_id').val(html.data.known_technology_id);
          $('#hidden_id_proof').val(html.data.id_proof);  
          $('.modal-title').text("EDIT THE RECORD");
          $(".modal-body").removeClass('bg-primary').addClass('bg-success');
          $(".modal-header").removeClass('bg-danger').addClass('bg-primary');
          $(".modal-footer").removeClass('bg-danger').addClass('bg-primary');
          $('#employee_action_button').val("EDIT");
          $('#employee_action').val("EDIT");
          $('#employee_action_button').removeClass('btn btn-primary').addClass('btn btn-warning');
          $('#cloes').removeClass('btn btn-secondary').addClass('btn btn-success');
          $('#employee_form_Modal').modal('show');
          }
        });

     });

  	$(document).on('click', '.edit', function(){
  		var id = $(this).attr('id');
  			//alert('edit');
  			//return;
  			$('#employee_form_result').html('');
  			$.ajax({
  				url:'/employeeedit/'+id,
  				dataType:"json",
  				success:function(html){
  				$('#employee_name').val(html.data.employee_name);
  				$('#dob').val(html.data.dob);
  				$('#employee_age').val(html.data.employee_age);
          $('#join_date').val(html.data.join_date);
          $('#salary').val(html.data.salary);
   			  $('#prev_office').val(html.data.prev_office);   			 

          $('input[id="gender"]').filter("[value='"+html.data.gender+"']").prop('checked', true);
          //below code is for normal dropdown box
          // $("select[name=employee_department_id]").val(html.data.employee_department_id);
          // $("select[name=employee_position_id]").val(html.data.employee_position_id);
          //below code is for select2 dropdown box
          $("#employee_department_id").select2().select2('val',html.data.employee_department_id);

          $("#employee_position_id").select2().select2('val',html.data.employee_position_id);


          //MULTIPLE VALUE CHECK DROPDOWN 
    			//$("select[id=known_technology_id]").val(html.data.known_technology_id);  
          $("#known_technology_id").select2().select2('val',html.data.known_technology_id);

          //MULTIPLE VALUE CHECKBOX 
          $('input[id="id_proof"]').val(html.data.id_proof);  
   				
   				$('#gender').append("<input type='hidden' name='hidden_gender' value='"+html.data.gender+"' />");
          $('#employee_department_id').append("<input type='hidden' name='hidden_employee_department_id' value='"+html.data.employee_department_id+"' />");
          $('#employee_position_id').append("<input type='hidden' name='hidden_employee_position_id' value='"+html.data.employee_position_id+"' />");
   				$('#known_technology_id').append("<input type='hidden' name='hidden_known_technology_id' value='"+html.data.known_technology_id+"' />");
          $('#id_proof').append("<input type='hidden' name='hidden_id_proof' value='"+html.data.id_proof+"' />");

   				$('#hidden_id').val(html.data.id);
   				$('#hidden_gender').val(html.data.gender); 
          $('#hidden_employee_department_id').val(html.data.employee_department_id);
          $('#hidden_employee_position_id').val(html.data.employee_position_id);
   				$('#hidden_known_technology_id').val(html.data.known_technology_id);
          $('#hidden_id_proof').val(html.data.id_proof);	
   				$('.modal-title').text("EDIT THE RECORD");
			    $(".modal-body").removeClass('bg-primary').addClass('bg-success');
			    $(".modal-header").removeClass('bg-danger').addClass('bg-primary');
			    $(".modal-footer").removeClass('bg-danger').addClass('bg-primary');
			    $('#employee_action_button').val("EDIT");
			    $('#employee_action').val("EDIT");
			    $('#employee_action_button').removeClass('btn btn-primary').addClass('btn btn-warning');
			    $('#cloes').removeClass('btn btn-secondary').addClass('btn btn-success');
			    $('#employee_form_Modal').modal('show');
  				}
  			});

  	});

   var employee_id;
   $(document).on('click','.delete',function(){
   		employee_id = $(this).attr('id');
   		$('#employee_confirm_Modal').modal('show');
   });
   $('#employee_ok_button').click(function(){
   		$.ajax({
   			url:'/employeedelete/'+employee_id,
   			beforeSend:function(){
   				$('#employee_ok_button').text('Deleting...');
   			},
   			success:function(data){
   				setTimeout(function(){
   					$('employee_confirm_Modal').modal('hide');
   					location.reload();
   				}, 2000);
   			}
   		});
   });

   

   /*$('input[id=edit_id]' ).click(function() {
    bid = (this.id) ; // button ID 
    trid = $('tr').attr('id'); // table row ID 
    alert(trid);
   });
*/
});