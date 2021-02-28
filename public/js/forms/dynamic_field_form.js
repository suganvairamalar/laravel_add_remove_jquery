$(document).ready(function(){

	var count = 1;

	dynamic_field(count);

	function dynamic_field(number){

		var html = '<tr>';
		html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
		html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';

		if(number > 1){
			html+= '<td><button type="button" name="remove" id="remove" class="btn btn-danger">REMOVE</button></td></tr>';
			$('tbody').append(html);
		}
		else{
			html+='<td><button type="button" name="add" id="add" class="btn btn-success">ADD</button></td></tr>';
			$('tbody').html(html);
		}

	}

	$(document).on('click', '#add', function(){
		//alert('hi');
		count++;
		dynamic_field(count);
	});

	$(document).on('click', '#remove', function(){
		count--;
		//dynamic_field(count);
		$(this).closest("tr").remove();
	});

	$(document).on('submit',function(e){
		e.preventDefault();
		$.ajax({
			url:'/dynamic_field_add_data',
			method:'POST',
			data:$('#dynamic_field_form').serialize(),
            dataType:"json",
             beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#dynamic_field_form_result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    dynamic_field(1);
                    $('#dynamic_field_form_result').html('<div class="alert alert-success">'+data.success+'</div>');
                    $('#dynamic_field_form')[0].reset();
                    location.reload();
                }
                $('#save').attr('disabled', false);
            }

		});
	});

			


});