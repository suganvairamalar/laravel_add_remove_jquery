$(document).on('click', '.edit', function(){ 
  var id = $(this).attr('id');   
  $('#form_result').html('');
  $.ajax({
   //url:"/seller/"+id+"/edit",
    url:'/studentedit/'+id,
   dataType:"json",
   success:function(html){
    $('#student_name').val(html.data.student_name);
    $('#dob').val(html.data.dob);
    $('#join_date').val(html.data.join_date);
    $('#father_name').val(html.data.father_name);
    $('#contact_number').val(html.data.contact_number);
    $('#contact_email').val(html.data.contact_email);
    $('#address').val(html.data.address);
    //$('#gender').val(html.data.gender);
    $('input[id="gender"]').filter("[value='"+html.data.gender+"']").prop('checked', true); 
    //BOTH ARE BELOW WORKING
    //$("#student_form select[name=mother_tongue]").val(html.data.mother_tongue);
    $("select[name=mother_tongue]").val(html.data.mother_tongue);    

   //$('#certificates[value='+html.data.certificates+']').prop('checked', true);

        
       
    //$('input[name="certificates"]').append("[value='"+html.data.certificates+"']").prop('checked', true); 

   /* var selected_ids = [];
    $('#certificates input:checked').each(function() {
        selected_ids.push($(this).attr('id'));
    });

    $('input[id="certificates"]').filter("[value='"+html.data.selected_ids+"']").prop('checked', true); */

    /*var selected_ids = $("input[id='certificates']").filter("[value='"+html.data.certificates+"']").prop('checked', true);
    console.log(selected_ids);*/

   
     
          

    //$('input[id="certificates"]').value(html.data.certificates).prop('checked', true); 


    $('input[id="certificates"]').val(html.data.certificates);  
           
    


    var image_path  = "http://localhost:8000/uploads/student_profile";
     /*alert(image_path);
     return;*/

    $('#store_student_image').html("<img src="+image_path+'/'+html.data.student_image+" width='60' height='40' class='img-thumbnail' />");
    //return;
    $('#store_student_image').append("<input type='hidden' name='hidden_image' value='"+html.data.student_image+"' />");
    $('#gender').append("<input type='hidden' name='hidden_gender' value='"+html.data.gender+"' />");

    $('#certificates').append("<input type='hidden' name='hidden_certificates' value='"+html.data.certificates+"' />");

    $('#hidden_id').val(html.data.id);
    $('#hidden_gender').val(html.data.gender); 
    $('#hidden_certificates').val(html.data.certificates);      

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
  })
 });