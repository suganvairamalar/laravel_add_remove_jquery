$(document).ready(function(){

 	$( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $(".join_date").datepicker({
      showOn: 'button',
      showAnim: 'slideDown',
      //dateFormat: "dd-mm-yy",
      dateFormat: 'dd-mm-yy',
      /*changeMonth: true,
      changeYear: true*/
   });

   
  
 $('.dob').datepicker({
                showOn: 'button',
                showAnim: 'slideDown',
                //dateFormat: "dd-mm-yy",
                dateFormat: 'dd-mm-yy'
               /* changeMonth: true,
                changeYear: true*/
            });
            
            $(document).on('change', '.dob', function(){
                var sdate = $('#dob').val().split("-");
                month = sdate[1];
                day = sdate[0];
                year = sdate[2];
                var date_form = ([month, day, year].join('-'));
                var dob_date = $('#sdob_date').val(date_form);
                
                $('.error, #student_age').text('');
                var dob = $('#sdob_date').val();
                var student_age = $('#student_age').val();
                if(dob == ''){
                    $('.error').text('Select DOB!');
                    $('#student_age').val('');
                    $('#sdob_date').val('');
                }else{
                    dobDate = new Date(dob);
                    nowDate = new Date();
                    
                    var diff = nowDate.getTime() - dobDate.getTime();
                    
                    var ageDate = new Date(diff); // miliseconds from epoch
                    var age = Math.abs(ageDate.getUTCFullYear() - 1970); 
                    //alert(age);                 
                    //$('#std_age').append(age);
                    $('#student_age').val(age);    
                }
            });
            
         $(document).on('keyup', '.dob', function(){
                var sdate = $('#dob').val().split("-");
                month = sdate[1];
                day = sdate[0];
                year = sdate[2];
                var date_form = ([month, day, year].join('-'));
                var dob_date = $('#sdob_date').val(date_form);
               
                $('.error, #student_age').text('');
                var dob = $('#sdob_date').val();
                var student_age = $('#student_age').val();
                if(dob == ''){
                    $('.error').text('Select DOB!');
                    $('#student_age').val('');
                    $('#sdob_date').val('');
                }else{
                    dobDate = new Date(dob);
                    nowDate = new Date();                    
                    var diff = nowDate.getTime() - dobDate.getTime();                    
                    var ageDate = new Date(diff); // miliseconds from epoch
                    var age = Math.abs(ageDate.getUTCFullYear() - 1970); 
                    //alert(age);                 
                    //$('#std_age').append(age);
                    $('#student_age').val(age);   
                }
            });


  $('#student_create_record').click(function(){
  		//alert("Hi");
  		$('.modal-title').text("ADD NEW RECORD");
  		$('#student_action_button').val("ADD");
  		$('#student_action').val("ADD");
  		$('#studentformModal').modal('show');
  });

  $('#student_form').on('click',"#student_action_button",function(e){
        e.preventDefault();
        if($('#student_action').val()=='ADD'){
        // alert("HIIII");
            $.ajax({
              url:'/studentadd',
              method:"POST",
              data:new FormData($('#student_form')[0]),
              contentType: false,
              cache: false,
              processData: false,
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
                    $('#student_form')[0].reset();
                    location.reload();
                  }
                  $('#student_form_result').html(html);
              }
            });
        }

        if($('#student_action').val()=='EDIT'){
          //alert("edit");
          //return;
          $.ajax({
           url:'/studentupdate',
           method:"POST",
           data:new FormData($('#student_form')[0]),
           contentType: false,
           cache:false,
           processData: false,
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
                    $('#student_form')[0].reset();
                    $('#student_store_image').html('');
                    location.reload();
                  }
                  $('#student_form_result').html(html);
              }

      });

        }

  });


$(document).on('click', '.edit', function(){ 
  var id = $(this).attr('id');   
  $('#student_form_result').html('');
  $.ajax({
   //url:"/seller/"+id+"/edit",
    url:'/studentedit/'+id,
    dataType:"json",
   success:function(html){
    $('#student_name').val(html.data.student_name);
    $('#dob').val(html.data.dob);
    $('#student_age').val(html.data.student_age);
    $('#join_date').val(html.data.join_date);
    $('#father_name').val(html.data.father_name);
    $('#contact_number').val(html.data.contact_number);
    $('#contact_email').val(html.data.contact_email);
    $('#address').val(html.data.address);
    //$('#gender').val(html.data.gender);
    $('input[id="gender"]').filter("[value='"+html.data.gender+"']").prop('checked', true); 

    //BOTH ARE BELOW WORKING DROPDOWN SINGLE VALUE
    //$("#student_form select[name=mother_tongue]").val(html.data.mother_tongue);
    $("select[name=mother_tongue]").val(html.data.mother_tongue);   

    //MULTIPLE VALUE CHECK DROPDOWN 
    $("select[id=known_languages]").val(html.data.known_languages);    

    //MULTIPLE VALUE CHECKBOX 
    $('input[id="certificates"]').val(html.data.certificates);  

    var image_path  = "http://localhost:8000/uploads/student_profile";
     /*alert(image_path);
     return;*/
    $('#store_student_image').html("<img src="+image_path+'/'+html.data.student_image+" width='60' height='40' class='img-thumbnail' />");
    //return;
    $('#store_student_image').append("<input type='hidden' name='hidden_image' value='"+html.data.student_image+"' />");
    $('#gender').append("<input type='hidden' name='hidden_gender' value='"+html.data.gender+"' />");

    $('#certificates').append("<input type='hidden' name='hidden_certificates' value='"+html.data.certificates+"' />");
    
    $('#mother_tongue').append("<input type='hidden' name='hidden_mother_tongue' value='"+html.data.mother_tongue+"' />");
    
    $('#known_languages').append("<input type='hidden' name='hidden_known_languages' value='"+html.data.known_languages+"' />");

    $('#hidden_id').val(html.data.id);
    $('#hidden_gender').val(html.data.gender); 
    $('#hidden_mother_tongue').val(html.data.mother_tongue); 
    $('#hidden_certificates').val(html.data.certificates);      
    $('#hidden_known_languages').val(html.data.known_languages);  
    $('.modal-title').text("EDIT THE RECORD");
    $(".modal-body").removeClass('bg-primary').addClass('bg-success');
    $(".modal-header").removeClass('bg-danger').addClass('bg-primary');
    $(".modal-footer").removeClass('bg-danger').addClass('bg-primary');
    $('#student_action_button').val("EDIT");
    $('#student_action').val("EDIT");
    $('#student_action_button').removeClass('btn btn-primary').addClass('btn btn-warning');
    $('#cloes').removeClass('btn btn-secondary').addClass('btn btn-success');
    $('#studentformModal').modal('show');
    //location.reload();
   }
  });

 });
   
  var student_id;
  $(document).on('click', '.delete', function(){
      student_id = $(this).attr('id');
      $('#student_confirmModal').modal('show');      
  });

  $('#student_ok_button').click(function(){
        $.ajax({
          url:'/studentdelete/'+student_id,
          beforeSend:function(){
            $('#student_ok_button').text('Deleting.....');
            },
            success:function(data){
              setTimeout(function(){
                $('student_confirmModal').modal('hide');
                location.reload();
              }, 2000);
            }
        });
  });



  

});