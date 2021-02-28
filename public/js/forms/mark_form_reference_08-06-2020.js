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
  	$('.modal-title').text('ADD NEW RECORD');
  	$('#mark_action_button').val('ADD');
  	$('#mark_action_button').val('ADD');
  	$('#mark_form_Modal').modal('show');

  });

	

	/*$(document).on('click','#add_mark', function(){	
		var tr ='<tr>'+   	 			            
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
   	 			 '</tr>';

   	 			var newRow = boxRowTemplate.clone();
   	 		 $('#add_mark').prop("disabled",false);
    			inputCount++;
                 newRow.find('.td2').attr('placeholder', 'Input '+inputCount);
                 boxesWrap.append(newRow);
                 $('#mark_field').append(tr);
                 var newRow = boxRowTemplate.clone();
    inputCount++;
    newRow.find('input.name').attr('placeholder', 'Input '+inputCount);
    boxesWrap.append(newRow);

   	 			 var $tr = $(table).find('tr:last').clone(); 
     						$tr.find('input').attr('id', function(){ 
          					var parts = this.id.match(/(\D+)(\d+)$/); 
          					return parts[1] + ++parts[2]; 
    						 }); 
   							  $(table).append($tr); 
    						 return true; 
   	 			 var action = $('#mark_action_button').val();

				if($('#mark_action_button').val()=='ADD'){
					var count = $('#mark_tbody tr').length;
				    $('#counter').html(inputCount);
				}
   	 	        $('#mark_field').append(tr);
   	 	        $('#mark_tbody').append(tr);
	});

	$(document).on('click','#mark_remove', function(){
		$(this).parent().parent().remove();
		if($('#mark_action_button').val()=='ADD'){
			$('#mark_remove').prop("disabled",false);
			var count = $('#mark_tbody tr').length;
	    	$('#counter').html(count);			
		}
			
	});*/

$("#btn_add_mark").click(function(){
                var $tableBody = $('#tbl_detailMark').find("tbody"),
                //$trLast = $tableBody.find("tr:last"),
                $trLast = $tableBody.find("tr:last"),
                $trNew = $trLast.clone();
                $trLast.after($trNew); 
                inputCount++;
              
                $trNew.find("input.student_id,input.name,input.total,input.percentage,input.rank").val("").end()
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
  
  
  
    //$('#tbl_detailMark .data_tr').each(function(){
      //alert('hi');
   
   /* $("#tbl_detailMark .name").each(function() {
        sum += Number($(this).val());
        $(this).find(".name").val('');
         if(!isNaN(sum)){
            $("#total").val(sum);
          }
           
    });*/
    $('.data_tr').each(function(){
      //alert("Hiiii");
    var totalmarks=0;
    var percmarks =0;
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
        //$('#perc_marks').val((obt_marks * 100) / total_marks);
        //alert(percmarks);
      }
      }
    });

    $(this).find('#total').val(+totalmarks);
    $(this).find('#percentage').val(+percmarks);
    //
    /*$(this).find('#total').val("").end()
                          .appendTo('tr.total');*/
    //$(this).find('#total').val('');
  });

     
     
});

  /*$("#items").keyup(function(event) {
     var total = 0;
     $("#items .name").each(function() {
         var qty = parseInt($(this).find(".quantity").val());
         var rate = parseInt($(this).find(".rate").val());
         var subtotal = qty * rate;
         $(this).find(".subtotal").val(subtotal);
         if(!isNaN(subtotal))
             total+=subtotal;
     });
     $("#total").html(total);
    });*/


/*$(".name").each(function() {

      $(this).keyup(function(){
        calculateSum();
      });
    });

  function calculateSum() {

    var sum = 0;
    //iterate through each textboxes and add the values
    $(".name").each(function() {

      //add only if the value is number
      if(!isNaN(this.value) && this.value.length!=0) {
        sum += parseFloat(this.value);
      }
      $("#total").val(sum);
    });
  }*/

  
   /* var sum = 0;
    $(document).on('keyup', '.name', function(){
        $('.name').each(function() {
           sum += Number($(this).val());
           $("#total").val(sum);
        });
    });*/
    


/*var sum =0;

    $(document).on('keyup', '.name', function(){
    var mark1 = parseFloat($('#mark1').val()) || 0;
    var mark2 = parseFloat($('#mark2').val()) || 0;
    var mark3 = parseFloat($('#mark3').val()) || 0;
    var mark4 = parseFloat($('#mark4').val()) || 0;
    var mark5 = parseFloat($('#mark5').val()) || 0;

    var sum = mark1 + mark2 + mark3 + mark4 + mark5;
    //alert(sum);
    $('#total').val(sum); 

     
  
    });*/
   
    
    
    
 
   
            


	$('#mark_form').on('click','#mark_action_button',function(e){
		//alert('hi');
			e.preventDefault();

			
			if($('#mark_action_button').val()=='ADD'){
        /*var student_id = $('#student_id').val();
        //alert(student_id);
        //return;
      if(student_id==null){
        $('#student_id').focus();
        alert("should not empty");
        return false;
      }*/

         /*$(function() {
    $("#student_id option").each(function(i){

         var student_id = $(this).val();

        //alert($(this).text() + " : " + $(this).val());
        
        if(student_id[i]==0){
          $('#student_id').focus();
          return;
        }
        //return;
    });
});*/

        /*$(function(){ // DOM is ready

    var myOptions = [] ;

    $('#student_id option').each(function(){
      var selectopt = myOptions.push(this.value);
      
      alert(myOptions); // 1,2,3
     //alert(myOptions); // 1,2,3

      if(myOptions==0){
        $('#student_id').focus();
      }
       //alert(myOptions); // 1,2,3

    });

     

   
});*/

				
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

		}
	});


});