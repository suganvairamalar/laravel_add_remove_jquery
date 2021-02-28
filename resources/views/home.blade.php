<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="{{URL::asset('js/jqueryv3.min.js')}}"></script> 
<script type="text/javascript" src="{{URL::asset('js/bootstrapv3.min.js')}}"></script>
<link rel="stylesheet" href="{{URL::asset('css/bootstrapv3.min.css')}}" type="text/css"/>
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: salmon;
  color: lemonchiffon;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <a href="#default" class="logo">CRUD LARAVEL/JQUERY</a>
  <div class="header-right">
    <!-- <a class="" href="#home">HOME</a>
   <a href="{{route('state.index')}}">STATE</a>
       <a href="{{route('district.index')}}">DISTRICT</a>
      <a href="{{route('news.index')}}">NEWS</a>
       <a href="{{route('voter.index')}}">VOTERS</a> 
       <a href="{{route('author.index')}}">AUTHORS</a>-->
    <!-- <a href="{{route('seller.index')}}">SELLERS</a> -->
    <a href="{{route('mark.index')}}">MARKS</a>   
    <a href="{{route('language.index')}}">LANGUAGE</a>   
    <!-- <a href="{{route('taglist.index')}}">TAGLIST</a>  -->  
    <a href="{{route('author_book_detail.index')}}">AUTHOR BOOK DETAILS</a>   
    <a href="{{route('dynamic_field.index')}}">DYNAMIC FIELDS</a>   
    <a href="{{route('department.index')}}">DEPARTMENT</a>   
    <a href="{{route('position.index')}}">POSITION</a>   
    <a href="{{route('known_technology.index')}}">KNOWN TECHNOLOGY</a>   
    <a href="{{route('employee.index')}}">EMPLOYEES</a>   

    <!-- <a href="{{route('student.index')}}">STUDENTS</a> -->
    
  </div>
</div>

<div style="padding-left:20px">
  
</div>
<script type="text/javascript">
$('.header-right').on('click', function() {
    $(this).closest('.header-right').find('a.active').removeClass('active');
    $(this).addClass('active');
  });

</script>
</body>
</html>
