$(document).ready(function(){
     
	
    
    //ADD VALIDATION
	 $('#districtaddform').bootstrapValidator({
	 	message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	 district_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your full district name'
                    }
                }
            },
          state_id: {
                validators: {
                    notEmpty: {
                        message: 'Please choose state'
                    }
                }
            },
        }

	 });

   //ADD VALIDATION
   $('#districteditform').bootstrapValidator({
    message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           district_name: {
                validators: {
                    notEmpty: {
                        message: 'Please enter your full district name'
                    }
                }
            },
          state_id: {
                validators: {
                    notEmpty: {
                        message: 'Please choose state'
                    }
                }
            },
        }

   });

   //CHECK NAME AVAILABILITY
      $(".district_name").keyup(function(){
//alert("Hi");
        var district_name = $(this).val().trim();
        var _token = $('#token').val();
         if(district_name!=''){
          
            $.ajax({
               url:'/district/check',
               method:'POST',
               data:{district_name:district_name, _token: $('#token').val()},
               success:function(response){
                  $('#districtname_response').html(response);
                  $('#edistrictname_response').html(response);
                  return false;
               }
            });
         }else{
                  $('#districtname_response').html('');
                  $('#edistrictname_response').html('');
         }
      });


  
  //DROPDOWN
    $(".state_id").select2({
    dropdownParent: $("#districtaddmodal"),
    placeholder:'select a state',
    allowClear:true  
    });


   //ADD SUBMIT FUNCTION
  $('#districtaddform').on('submit', function(e){
       e.preventDefault();
         //alert("testttttt");
      var _token = $('#token').val();
      $.ajax({
          url:'/districtadd',
          type:'POST',
          data:$('#districtaddform').serialize(),
          success:function(response){
            console.log(response);
            $('#districtaddmodal').modal('hide');
            alert('data saved');
            $('#districtaddform').trigger("reset");
            location.reload();
          }
      });
  });


  //DROPDOWN
    $(".estate_id").select2({
    dropdownParent: $("#districteditmodal"),
    placeholder:'select a state',
    allowClear:true  
    });

  //EDIT DATA
    $(".editbtn").on('click',function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
          return $(this).text();
        }).get();
        console.log(data);
        $('#edit_id').val(data[1]);
        $('#edit_state_id').val(data[2]);
        $('#edit_district_name').val(data[3]);
    });
  //END EDIT DATA
   
  //EDIT SUBMIT DATA
    $('#districteditform').on('submit',function(e){
        e.preventDefault();
        var _token = $('#token').val();
        var id = $('#edit_id').val();
        var edit_state_id = $('#edit_state_id').val();

        //alert(state_id);
        $.ajax({
            type:'POST',
            url:'/districtupdate/'+id,
            data:$('#districteditform').serialize(),
            success:function(response){
              console.log(response);
              $('#districteditmodal').modal('hide');
              alert('data updated');
              $('#districteditform').trigger('reset');
              location.reload();
            }


        });

    })
    //END EDIT SUBMIT DATA

    //DETAIL DATA
      $('.detailbtn').on('click', function(){
            //$("#stateeditmodal").modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
            return $(this).text();
            }).get();
            console.log(data);
             $('#detail_id').val(data[1]);
             $('#detail_state_id').val(data[2]);
             $('#detail_districtname').val(data[3]);
      });

   //END DETAIL DATA 

   //DELETE DATA
   $('.deletebtn').on('click',function(){
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function(){
         return $(this).text();
        }).get();
        console.log(data);
        $('#delete_id').val(data[1]);
   });
  //END DELETE DATA


   //DELETE FORM SUBMIT
  $('#districtdeleteform').on('submit',function(e){
    e.preventDefault();
      var _token = $('#token').val();
      var id = $('#delete_id').val();
      $.ajax({
          type:'post',
          url:'/districtdelete/'+id,
          data:$('#districtdeleteform').serialize(),
          success:function(response){
            console.log(response);
            $('#districtdeletemodal').modal('hide');
             alert('data deleted');
            location.reload();
          }
          /*error: function(response){
                //console.log(response);

                alert('data not deleted');
              }*/
//statedeletemodal
      });

  });
//END DELETE FORM SUBMIT


  



});



