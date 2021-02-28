$(document).ready(function(){	
    //alert( $('#position_department_id').val());
    //return;
  $( "#reset").click(function() { 
    /*alert('Hi');
    return;*/
    $("#position_department_id").select2("val", 'null');
    $('#position_name').val('');
   });

   //DROPDOWN
    /*$(".position_department_id").select2({
    dropdownParent: $("#position_form"),
    allowClear:true  
    });*/
    $('#position_department_id').select2(); 

 $('#position_search_submit').on('click',function(){
            var _token = $('#token').val();
            $value = $('#search').val();
            $.ajax({
               type:'GET',
               url:'/position_name',
               data:{'search':$value,_token:_token},
               success: function(data){
                console.log(data);
               }
            });
   });


 $('#position_form').on('click','#position_action_button',function(e){
       e.preventDefault();
       
       if($('#position_action').val()==''){
 /*alert("HIIII");
 return;*/
          $.ajax({
            url:'/position_add_data',
            method:'POST',
            data:$('#position_form').serialize(),
            dataType:"json",
            success:function(data)
              {
                /*console.log(data);
            return;*/
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
                    //$('#position_form')[0].reset();
                    //$("#position_form").trigger("reset");
                    location.reload();
                  }
                  $('#position_form_result').html(html);
              }
          });
       }

       if($('#position_action').val()=='UPDATE'){
          //alert("edit");
          //return;
          $.ajax({
            url:'/position_update_data',
            method:'POST',
            data:$('#position_form').serialize(),            
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
                    //$('#position_form')[0].reset();
                   // $("#position_form").trigger("reset");
                    location.reload();
                  }
                  $('#position_form_result').html(html);
              }

      });

        }

   });


   $(document).on('click', '.edit', function(){ 
      /*alert('edit');
      return;*/
      var id = $(this).attr('id');
      $('#position_form_result').html('');
      $.ajax({
        url:'/position_edit_data/'+id,
        dataType:"json",
        success:function(html){
          $('#position_name').focus();
          $('#position_name').val(html.data.position_name);
          //below code is for normal dropdown box..but this dropdown box change to select2 dropdown box
         // $("select[name=position_department_id]").val(html.data.position_department_id);
          //below code is for select2 dropdown box
          $("#position_department_id").select2().select2('val',html.data.position_department_id);
          $('#position_department_id').append("<input type='hidden' name='hidden_position_department_id' value='"+html.data.position_department_id+"' />");  
          $('#hidden_id').val(html.data.id);
          $('#hidden_position_department_id').val(html.data.position_department_id); 
                 
          $('.header_form panel-heading').text("POSITION EDIT FORM");          
          $('#position_action_button').val("UPDATE");
          $('#position_action').val("UPDATE");
          $('#position_action_button').removeClass('btn btn-success').addClass('btn btn-warning');          
        }
      });
   });

    var position_id;
  $(document).on('click', '.delete', function(){
      position_id = $(this).attr('id');
      $('#position_confirm_Modal').modal('show');      
  });

  $('#position_ok_button').click(function(){
        $.ajax({
          url:'/position_delete_data/'+position_id,
          beforeSend:function(){
            $('#position_ok_button').text('Deleting.....');
            },
            success:function(data){
              setTimeout(function(){
                $('position_confirm_Modal').modal('hide');
                location.reload();
              }, 2000);
            }
        });
  });
 
});