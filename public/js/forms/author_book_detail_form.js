$(document).ready(function(){
  $( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

    $('#author_book_detail_create_record').click(function(){
  	$('.modal-title').text('ADD NEW RECORD');
  	$('#author_book_detail_action_button').val('ADD');
  	$('#author_book_detail_action').val('ADD');
  	$('#author_book_detail_form_Modal').modal('show');
  });

   $(document).on('click','.addRow', function(){
        addRow();
   });

   function addRow(){
   	 var tr ='<tr>'+
   	 			 '<td class="td1"><input type="text" name="book_name[]" id="book_name" class="form-control book_name_list" placeholder="Add book name" /></td>'+
   	 			 '<td class="td1"><button type="button" name="remove" id="remove" class="remove btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>'+
   	 			 '</tr>';
   	 $('tbody').append(tr);
   }

   $(document).on('click', '#remove', function(){
		$(this).parent().parent().remove();
	});

   /*$(document).delegate('.remove', 'click',function(){
		$(this).parent().parent().remove();
	});*/

$('#author_book_detail_form').on('click','#author_book_detail_action_button',function(e){
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
      if($('#author_book_detail_action_button').val()=='ADD'){
        
          $.ajax({
            url:'/author_book_detail_add_data',
            method:'post',
            data:$('#author_book_detail_form').serialize(),
                dataType:"json",
                beforeSend:function(){
                        $('#author_book_detail_action_button').attr('disabled','disabled');
                        },
                success:function(data){
                  if(data.error)
                      {
                          var error_html = '';
                          for(var count = 0; count < data.error.length; count++)
                          {
                              error_html += '<p>'+data.error[count]+'</p>';
                          }
                          $('#author_book_detail_form_result').html('<div class="alert alert-danger">'+error_html+'</div>');
                      }

                      else
                      {
                          //dynamic_field(1);
                          $('#author_book_detail_form_result').html('<div class="alert alert-success">'+data.success+'</div>');
                           $('#author_book_detail_form')[0].reset();
                           location.reload();
                      }                     
                      $('#author_book_detail_action_button').attr('disabled', false);
                  }

          });

    }

    
    });


  

});