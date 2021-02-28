$(document).ready(function(){

	
    $("#create_record").click(function () {
    //$("#addModal").on("click", "#create_record", function () {
    	//alert("Hi");s	
  		 $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
     $('#formModal').modal('show');
	});


    
    $("#sample_form").on("click", "#action_button", function (e) {
    //$('#student_insert_submit').on('click', function(e){
	//$('#sample_form').on('submit', function(e){
         
		e.preventDefault();
		if($('#action').val() == 'Add')
  {
   $.ajax({
    url:'/selleradd',
    method:"POST",
    //data: new FormData(this),
     data:new FormData($('#sample_form')[0]),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      location.reload();
     }
     $('#form_result').html(html);
    }
   })
  }

   
  

	});


  $(document).on('click', '.edit', function(){
    alert('Hi');
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"/seller/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#first_name').val(html.data.first_name);
    $('#last_name').val(html.data.last_name);
    //var img  = html.data.image;
   // alert(img);
    //return;
    var image_path="{{asset('public/uploads/seller_profile)}}";
    
    //alert(image_path);
    //return;
   // $('#store_image').html("<img src={{ URL::to('/uploads/photo.type') }}/seller_profile/" + html.data.image + " width='70' class='img-thumbnail' />");
   //$('#store_image').html("<img src= {{ asset('/')}}/seller_profile/" + html.data.image + " width='70' class='img-thumpnail' />");
   //var img = '<img src="{{asset(Storage::url('/seller_profile/'))}}/'+ html.data.image +'" width="100" height="100" id="insertedImages">';
  var img_loc  = "http://localhost:8000/seller_profile";
  var img = img_loc+'seller_profile/'+ html.data.image;

  var path = "{{ resource_path() }}";
  alert(path);

 // var img_org = '<img src="{{asset(img)}}/'+'" width="100" height="100" id="insertedImages">';
    //alert(img_org);
  //$('#store_image').html("<img src= {{ asset('/')}}/seller_profile/" + html.data.image + " width='70' class='img-thumpnail' />");
  //$('#store_image').html(img);

  //$("#store_image").attr('src',img_loc +"seller_profile/"+html.data.image);
  $('#store_image').html("<img src= {{ asset('/')}}/seller_profile/" + html.data.image + " width='70' class='img-thumpnail' />");
 // console.log(imggg);
  //return;
  //$("#img22").html(img1);

   $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });

	
});