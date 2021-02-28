$(document).ready(function(){

 
  $('#department_search_form').on('click','#department_search_submit',function(){
            var _token = $('#token').val();
            $value = $('#search').val();
            $.ajax({
               type:'GET',
               url:'/departments',
               data:{'search':$value,_token:_token},
               success: function(data){
                console.log(data);
               }
            });
   });


  var _token = $('input[name="_token"]').val();
  $(document).on('click', '#departmeent_add', function(e){
       e.preventDefault();
              var department_name = $('#department_name').val();
 /*alert("HIIII");
 return;*/
          $.ajax({
            url:'/department_add_data',
            method:'POST',
            data:{department_name:department_name,_token:_token},
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
                    //$('#known_technology_form')[0].reset();
                    location.reload();
                  }
                  $('#department_form_result').html(html);
              }
          });
      
   });

$('.departmentname').blur(function(e){
  e.preventDefault();
  var _token = $('input[name="_token"]').val();
  var id = $(this).attr('id');
  var department_name = $("#"+id).html();
  /*alert(department_name);
  return;*/
      $.ajax({
            url:'/department_update_data',
            method:'POST',
            data:{department_name:department_name,id:id,_token:_token},
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
                    //$('#known_technology_form')[0].reset();
                    location.reload();
                  }
                  $('#department_form_result').html(html);
              }
          });
  });

$(document).on('click', '.edit', function(e){
       e.preventDefault();
  var _token = $('input[name="_token"]').val();
  var id = $(this).attr('id');
  var department_name = $("#"+id).html();
      $.ajax({
            url:'/department_update_data',
            method:'POST',
            data:{department_name:department_name,id:id,_token:_token},
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
                    //$('#known_technology_form')[0].reset();
                    location.reload();
                  }
                  $('#department_form_result').html(html);
              }
          });
  });


var department_id;
  $(document).on('click', '.delete', function(){
        department_id = $(this).attr('id');
        $('#department_confirm_Modal').modal('show');
  });

  $('#department_ok_button').click(function(){
        $.ajax({
          url:'/department_delete_data/'+department_id,
          beforeSend:function(){
            $('#department_ok_button').text('Deleting.....');
          },
          success:function(data){
            setTimeout(function(){
              $('#department_confirm_Modal').modal('hide');
              location.reload();
            },2000);
          }
        });
  });



});