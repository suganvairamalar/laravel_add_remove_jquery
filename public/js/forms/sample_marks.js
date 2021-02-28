$(document).on('change','#tbl_detailMark',function(){
          var rank = 1;
          var row = $(this).closest('tr');
         
          $.ajax({
            type:'get',
            url:'/find_rank',
            data:$('#mark_form').serialize(),


            dataType:"json",
            //between the single quote emp_dept_id should pass the controller page as $request->emp_dept_id

            success:function(data){
              /*console.log(data);
              return;*/
              var totalmarks = data;
              //console.log(data[0].total);
              //console.log(data[total]);
              //return;

              $.each(totalmarks,function(i){
                  console.log(totalmarks[i].total);
                  return;
              });
           
            
              
            }
          });
    });

if(maxtot > tot){
     $('#rank').val(1);
    }
    else{
      $('#rank').val(rank-1);
    }

