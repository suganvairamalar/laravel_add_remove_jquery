<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel CRUD Operations - Basic</title>

        <!-- bootstrap minified css 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <!-- jQuery library 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
        <!-- bootstrap minified js 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        
        <!-- custom CSS -->
 
       
        <link rel="stylesheet" href="{{URL::asset('css/bootstrapv3.min.css')}}" type="text/css"/>
        <link rel="stylesheet" href="{{URL::asset('css/select2.css')}}" type="text/css"/>
       
        <link rel="stylesheet" href="{{URL::asset('css/webfonts.css')}}" type="text/css"/>
        
        
        <script type="text/javascript" src="{{URL::asset('js/jqueryv3.min.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('js/bootstrapv3.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/validator.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/select2.full.js')}}"></script> 
       <!--  <script type="text/javascript" src="{{URL::asset('js/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/popper.min.js')}}"></script>  -->
        

       <!-- CRUD JS -->
       <script type="text/javascript" src="{{URL::asset('js/forms/state_form.js')}}"></script>
       <script type="text/javascript" src="{{URL::asset('js/forms/district_form.js')}}"></script>


 <!-- <link import="stylesheet" href="{{URL::asset('css/bootstrap-glyphicons.css')}}" type="text/css"/> -->
        <style>
          /* @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css");*/ 
          /*no need to give this line bcoz its already called file path from localserver....refer line no 19 " <link rel="stylesheet" href="{{URL::asset('css/webfonts.css')}}" type="text/css"/>"*/
          
          /* @import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans');*/

           .glyphicon {
              position: relative;
              top: 1px;
              display: inline-block;
              font-family: 'Glyphicons Halflings';
              font-style: normal;
              font-weight: normal;
              line-height: 1;

              -webkit-font-smoothing: antialiased;
              -moz-osx-font-smoothing: grayscale;
            }
            .glyphicon-asterisk:before {
              content: "\2a";
            }

            body {
                font-family: 'Open Sans', sans-serif;
                font-family: 'Montserrat', sans-serif;
            }
            input[type="text"], input[type="email"] {
                font-size: 1.6rem;
                color: #010100;
                width: 100%;
                line-height: 65px;
                padding-left: 3rem;
            }
            select {
                width: 100%;
                height: 65px;
                color: #010100;
                padding-left: 3rem;
            }
            .h1, h1 {
                font-size: 36px;
            }
            .h1, .h2, .h3, h1, h2, h3 {
                margin-top: 20px;
                margin-bottom: 10px;
            }
            .text-white {
                color: #fff!important;
            }
            .font-w400 {
                font-weight: 400;
            }
            .padding-top-xl {
                padding-top: 5rem!important;
            }
            .padding-bottom-xl {
                padding-bottom: 5rem!important;
            }
            .margin-top-m {
                margin-top: 3rem!important;
            }
            .margin-bottom-m {
                margin-bottom: 3rem!important;
            }
            .section5 h2 {
                line-height: 35px;
            }
            .section5 p {
                font-size: 16px;
                line-height: 26px;
            }
            .has-error input[type="text"], .has-error input[type="email"], .has-error select {
                border: 1px solid #a94442;
            }

            .select2-selection__choice__remove {
              display: none !important;
            }

            .select2-container--focus .select2-autocomplete .select2-selection__choice {
              display: none;
            }

         /*tbody scroll & fixed header*/
        .tableFixHead{ overflow-y: auto; height: 390px; }
        .tableFixHead thead th { position: sticky; top: 0; }

        /* Just common table stuff. Really. */
        table  { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px 16px; }
        th     { background:#337ab7; }
         /*end tbody scroll & fixed header*/
            
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                        <div class="pull-left">
                             <h4>CRUD Operations in Laravel/Jquery</h4>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('home')}}" class="btn btn-info">BACK</a>
                        </div>
                    </div>
            </div>
           
            @yield('content')
        </div>
    </body>
</html>