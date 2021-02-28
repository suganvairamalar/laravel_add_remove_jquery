  
  @if(!empty($news))  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 tableFixHead">
        <table class="table table-striped table-bordered">
          <thead>
            <tr class="bg-primary">
              <th >S.NO</th>
              <!-- <th>ID</th> --> <!-- style='visibility: hidden;' -->
              <th >TITLE</th>
              <th >DESCRIPTION</th>
              <th >AUTHOR</th>
              <!-- <th>ACTION</th> -->
            </tr>
          </thead>
          <tbody >
            <?php $i=0; ?>
            @foreach($news as $new)
            <?php $i++; ?>
            <tr>
              <td class="table-text">{{ $i }}</td>
             <!--  <td class="table-text">{{ $new->id }}</td> --> <!-- style='visibility: collapse;' -->
              <td class="table-text">{{ $new->title }}</td>              
              <td class="table-text">{{ $new->description }}</td>              
              <td class="table-text">{{ $new->author }}</td>              
              <!-- <td><a href="" class="btn btn-info detailbtn" data-toggle="modal" data-target="">DETAIL</a>
                <a href="" class="btn btn-warning editbtn" data-toggle="modal" data-target="">EDIT</a>
                <a href="" class="btn btn-danger deletebtn" data-toggle="modal" data-target="" >DELETE</a>
            </td> -->
            </tr>
            @endforeach
          </tbody>
        </table>            
      </div>       
   </div>
    {!!$news->render()!!}
  @endif