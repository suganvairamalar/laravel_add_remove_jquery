<?php $i=0; ?>
            @foreach($authors as $author)
            <?php $i++; ?>
            <tr>
              <td class="table-text">{{ $i }}</td>
              <td class="table-text">{{ $author->id}}</td>              
              <td class="table-text">{{ $author->first_name }}</td>              
              <td class="table-text">{{ $author->last_name }}</td>              
              <td> <a href="" class="btn btn-info detailbtn"  data-toggle="modal" data-id="{{ $author->id }}" data-target="#authordetailmodal">&nbsp;DETAIL</a> <!-- class="btn btn-info glyphicon glyphicon-th detailbtn" -->
                   <a href="" class="btn btn-warning editbtn" data-toggle="modal" data-id="{{ $author->id }}" data-target="#authoreditmodal">&nbsp;EDIT</a> <!-- class="btn btn-warning glyphicon glyphicon-edit editbtn" -->
                   <a href="" class="btn btn-danger deletebtn"data-toggle="modal" data-id="{{ $author->id }}" data-target="#authordeletemodal">&nbsp;DELETE</a> <!-- class="btn btn-danger glyphicon glyphicon-trash deletebtn" -->
            </td>      
            </tr>           
             @endforeach
             <!--  <tr>
              <td colspan="10" align="center"></td>
            </tr> -->