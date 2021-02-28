<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel CRUD Operations - Basic</title>

       
        
        <!-- CSS --> 
       
         <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" type="text/css"/>
         <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" type="text/css"/>
         <link rel="stylesheet" href="{{URL::asset('css/mdb.lite.css')}}" type="text/css"/>
         <link rel="stylesheet" href="{{URL::asset('css/mdb.lite.min.css')}}" type="text/css"/>
         <link rel="stylesheet" href="{{URL::asset('css/mdb.css')}}" type="text/css"/> 
         <link rel="stylesheet" href="{{URL::asset('css/mdb.min.css')}}" type="text/css"/>
         <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" type="text/css"/>
         
         <link rel="stylesheet" href="{{URL::asset('css/addons/datatables.min.css')}}" type="text/css"/>
         <link rel="stylesheet" href="{{URL::asset('css/addons/datatables-select.min.css')}}" type="text/css"/>
         <link rel="stylesheet" href="{{URL::asset('css/modules/animations-extended.min.css')}}" type="text/css"/>
        
        
        <!-- CUSTOM CSS --> 
        
        <link rel="stylesheet" href="{{URL::asset('css/select2.css')}}" type="text/css"/>       
        <link rel="stylesheet" href="{{URL::asset('css/webfonts.css')}}" type="text/css"/>



       <!-- JS -->

        <script type="text/javascript" src="{{URL::asset('js/jquery.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('js/bootstrap.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('js/mdb.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('js/mdb.min.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('js/popper.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('js/popper.min.js')}}"></script> 
        <script type="text/javascript" src="{{URL::asset('js/addons/datatables.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/addons/datatables-select.min.js')}}"></script>

        <script type="text/javascript" src="{{URL::asset('js/addons/directives.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/addons/flag.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/addons/imagesloaded.pkgd.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/addons/jquery.zmd.hierarchical-display.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/addons/masonry.pkgd.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/addons/rating.min.js')}}"></script>

        <script type="text/javascript" src="{{URL::asset('js/modules/animations-extended.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/modules/forms-free.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/modules/scrolling-navbar.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/modules/treeview.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/modules/wow.min.js')}}"></script>

        <!--  JS -->        

        <style>
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_asc_disabled:before,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_desc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
            }
            
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
                             <h6>CRUD Operations in Laravel/Jquery</h6>
                        </div>
                        <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
                            <a href="{{route('home')}}" class="btn btn-info">BACK</a>
                        </div>
                    </div>
            </div>
            @yield('content')
        </div>
    </body>
</html>