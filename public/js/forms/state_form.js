$(document).ready(function(){
     
	
    
    //ADD VALIDATION
	 $('#stateaddform').bootstrapValidator({
	 	message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	 state_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your full state name'
                    }
                }
            },
        }

	 });

   //EDIT VALIDATION
    $('#stateeditform').bootstrapValidator({
    message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           state_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your full state name'
                    }
                }
            },
        }

   });
   //END VALIDATION

   //CHECK NAME AVAILABILITY
    $("#state_name").keyup(function(){
      //alert("Hi");      
      var state_name = $(this).val().trim();
      //alert(state_name);
      //var _token = $('input[state_name="_token"]').val();
      var _token = $('#token').val();
      //alert(_token);
      if(state_name != ''){
         $.ajax({
         //url:"{{ route('state.check') }}",
   			 url:"/state/check",
   			 method:"POST",
    		 data:{state_name:state_name, _token: $('#token').val()},
             success: function(response){
                $('#statename_response').html(response);
                //$("#submit").attr("disabled", true);
                
                //$(':input[type="submit"]').prop('disabled', 'disabled');
                //return false;
             }
         });
      }else{
         $("#statename_response").html("");
         //$("#submit").attr("disabled", false);
        
           //$(':input[type="submit"]').prop('disabled', false);
           //$('input[type="submit"]').removeAttr('disabled');
           //return;
      }

    });
 
   //END NAME AVAILABILITY

   //ADD FORM SUBMIT
   $('#stateaddform').on('submit',function(e){
            e.preventDefault();
          
            //var name = $(this).val().trim();
          //if(name!=''){
             var _token = $('#token').val();
           $.ajax({
              type:'post',
              url:'/stateadd',
              data:$('#stateaddform').serialize(),
              success:function(response){
                console.log(response);
                $('#stateaddmodal').modal('hide');    
                //$(':button[type="submit"]').prop('disabled', false);     
                 alert('data saved');

                  $("#stateaddform").trigger("reset");
                  location.reload();
                  //$('#crud_msg').html(response);     
                 
              }
//}
              /*error: function(response){
                //console.log(response);

                alert('data not saved');
              }*/
//stateaddmodal
            });
   });
   //END ADD FORM SUBMIT

   //EDIT DATA
      $('.editbtn').on('click', function(){
            //$("#stateeditmodal").modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
            return $(this).text();
            }).get();
            console.log(data);
             $('#edit_id').val(data[1]);
             $('#edit_statename').val(data[2]);
      });

   //END EDIT DATA

    //EDIT FORM SUBMIT
   $('#stateeditform').on('submit',function(e){
            e.preventDefault();
            //var name = $(this).val().trim();
          //if(name!=''){
             var _token = $('#token').val();
             var id = $('#edit_id').val();
           $.ajax({
              type:'post',
              url:'/stateupdate/'+id,
              data:$('#stateeditform').serialize(),
              success:function(response){
                console.log(response);
                $('#stateeditmodal').modal('hide');    
                //$(':button[type="submit"]').prop('disabled', false);  
                alert('data updated');   
                 $("#stateeditform").trigger("reset");
                  location.reload();
                  //$('#crud_msg').html(response);     
                 
              }
//}
              /*error: function(response){
                //console.log(response);

                alert('data not updated');
              }*/
//stateeditmodal
            });
   });
   //END EDIT FORM SUBMIT

//DETAIL DATA
      $('.detailbtn').on('click', function(){
            //$("#stateeditmodal").modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
            return $(this).text();
            }).get();
            console.log(data);
             $('#detail_id').val(data[1]);
             $('#detail_statename').val(data[2]);
      });

   //END DETAIL DATA   


   //DELETE DATA
      $('.deletebtn').on('click', function(){
            //$("#stateeditmodal").modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
            return $(this).text();
            }).get();
            console.log(data);
             $('#delete_id').val(data[1]);
             
      });

   //END DELETE DATA


   //DELETE FORM SUBMIT
   $('#statedeleteform').on('submit',function(e){
            e.preventDefault();
            //var name = $(this).val().trim();
          //if(name!=''){
             var _token = $('#token').val();
             var id = $('#delete_id').val();
           $.ajax({
              type:'post',
              url:'/statedelete/'+id,
              data:$('#statedeleteform').serialize(),
              success:function(response){
                console.log(response);
                $('#statedeletemodal').modal('hide');    
                
                 //alert('data deleted');

                  //$("#stateeditform").trigger("reset");
                  location.reload();
                  //$('#crud_msg').html(response);     
                 
              }
//}
              /*error: function(response){
                //console.log(response);

                alert('data not deleted');
              }*/
//statedeletemodal
            });
   });
   //END DELETE FORM SUBMIT




});



