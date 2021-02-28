@extends('layouts.taglist_app')
@section('content')

<html>
<head>
    <title>Laravel - Dynamically Add or Remove input fields using JQuery</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<div class="container">
    <h2 align="center">Laravel - Dynamically Add or Remove input fields using JQuery</h2>  
    <div class="form-group">
         <form name="add_name" id="add_name"> 
         	 {{ csrf_field() }}
            <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
            </div>


            <div class="alert alert-success print-success-msg" style="display:none">
            <ul></ul>
            </div>


            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                        <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
            </div>


         </form>  
    </div> 
</div>

@endsection