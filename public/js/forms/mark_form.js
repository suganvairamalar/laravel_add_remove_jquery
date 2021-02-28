$(document).ready(function(){
 var inputCount = 1;
	if($('#mark_action_button').val()=='ADD'){
					var count = $('#mark_tbody tr').length;
				    $('#counter').html(inputCount);
				}

	$( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

   $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

	$('#mark_create_record').click(function(){
  	//alert('hi');
  	/*$('.modal-title').text('ADD NEW RECORD');
  	$('#mark_action_button').val('ADD');
  	$('#mark_action_button').val('ADD');*/
  	$('#mark_form_Modal').modal('show');

  });

	

	

$("#btn_add_mark").click(function(){
                var $tableBody = $('#tbl_detailMark').find("tbody"),
                //$trLast = $tableBody.find("tr:last"),
                $trLast = $tableBody.find("tr:last"),
                $trNew = $trLast.clone();
                $trLast.after($trNew); 
                inputCount++;
              
                $trNew.find("input.student_id,input.name,input.total,input.percentage,input.max_total,input.rank").val("").end()
                          .appendTo('tr:last');
                

                $('#counter').html(inputCount);


            });

          

    $('#tbl_detailMark').on('click', "#btn_remove_mark", function () {
                //alert("hiiii");
               //return;
    //$(this).parent().remove();
    inputCount--;
    if($(".data_tr").length > 1){
      
     $(this).parent().parent().remove();
     
    }else{
         inputCount = 1;
         alert("do not delete all record");
         $('#counter').html(inputCount)
    }
    $('#counter').html(inputCount)
  }); 

   
  $('#tbl_detailMark').on('keyup', ".name", function () {
    //alert("Hiii");   
    $('.data_tr').each(function(){
      //alert("Hiiii");
    var totalmarks=0;
    var percmarks =0;
    /*var max;
    var i;
    var elem;
    let rank = 1;*/
       
    $(this).find('.name').each(function(){
    
      if($(this).val() > 100){
        alert("value should not greater than 100");
        $("#mark_action_button").attr("disabled", "disabled");     
        return false;
      }else{
        $("#mark_action_button").removeAttr("disabled");  
      var marks = $(this).val();
      if(marks.length!==0){
        totalmarks+=parseFloat(marks);
        percmarks+=(marks/500)*(100).toFixed(2);  
      //max = Math.max(parseFloat(marks).html(),max);  
      //max = Math.max.apply(Math, $(totalmarks).map(function(i,elem){ 
      //return Number($(elem).text()); 
//  }));
        //rank+=i+1;
      }
      }
    });
       
    $(this).find('#max_total').val(+max);
    //console.log(max);
   //return;
    $(this).find('#total').val(+totalmarks);
    $(this).find('#percentage').val(+percmarks);
   
  });

     
});


  $("#edit_mark_form .editmark").each(function() {
      $(this).keyup(function(){
        calculateSum();       
      });
     
    });


  

  function calculateSum() {

    var sum = 0;
    var edit_percmarks = 0;
    //iterate through each textboxes and add the values
    $(".editmark").each(function() {

      //add only if the value is number
      if(!isNaN(this.value) && this.value.length!=0) {
        sum += parseFloat(this.value);
        /*alert(sum);
        return;*/      
         
      }     

    });
    edit_percmarks+=(sum/500)*(100).toFixed(2); 
    //.toFixed() method will roundoff the final sum to 2 decimal places
    $("#edit_total").val(sum);
    $("#edit_percentage").val(edit_percmarks.toFixed(2));
   
  }


	$('#mark_form').on('click','#mark_action_button',function(e){
		//alert('hi');
			e.preventDefault();
			
					$.ajax({
						url:'/mark_add_data',
						method:'post',
						data:$('#mark_form').serialize(),
   	   					dataType:"json",
   	   					/*beforeSend:function(){
                        $('#mark_action_button').attr('disabled','disabled');
                        },*/
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

	
	});



  $(document).on('click', '.edit', function(){ 
      /*alert('edit');
      return;*/
      $('#edit_mark_form_Modal').modal('show');
      var id = $(this).attr('id');     

      $('#edit_mark_form_result').html('');
      $.ajax({
        url:'/mark_edit_data/'+id,
        dataType:"json",
        success:function(html){
          
          $("select[id=edit_student_id]").val(html.data.student_id);
          $('#edit_mark1').val(html.data.mark1);
          $('#edit_mark2').val(html.data.mark2);
          $('#edit_mark3').val(html.data.mark3);
          $('#edit_mark4').val(html.data.mark4);
          $('#edit_mark5').val(html.data.mark5);
          $('#edit_total').val(html.data.total);
          $('#edit_percentage').val(html.data.percentage);          
          $('#edit_rank').val(html.data.rank);
          $('#edit_student_id').append("<input type='hidden' name='hidden_edit_student_id' value='"+html.data.student_id+"' />");

          $('#hidden_id').val(html.data.id);
          $('#hidden_edit_student_id').val(html.data.student_id); 
          $('#hidden_edit_total').val(html.data.total); 
          $('#hidden_edit_percentage').val(html.data.percentage); 
          $('#hidden_edit_rank').val(html.data.rank);  
        }
      });
   });


$('#edit_mark_form').on('click','#edit_mark_action_button',function(e){
    //alert('hi');
      e.preventDefault();

            $.ajax({
              url:'/mark_update_data',
              method:'POST',
              data:$('#edit_mark_form').serialize(),
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
                          $('#edit_mark_form')[0].reset();
                          location.reload();
                        }
                        $('#edit_mark_form_result').html(html);
                    }

              });

       });




});