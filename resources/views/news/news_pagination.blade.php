@extends('layouts.pagination')
@section('content')
<div class="jumbotron">
  <div class="row"> 
      <div id="table_data">
           @include('news.news_pagination_data')
      </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
      $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
      });
      function fetch_data(page){
         $.ajax({
            url:"/news_pagination/fetch_data?page="+page,
            success:function(data){
              $('#table_data').html(data);
            }
         });
      }
});
</script>
@endsection