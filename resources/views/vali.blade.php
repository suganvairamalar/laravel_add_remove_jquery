
<!DOCTYPE html>
<html>
<head>
<title>JQuery-validation demo | Bootstrap</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<script type="text/javascript" src="../../lib/jquery-1.11.1.js"></script>
<script type="text/javascript" src="../../dist/jquery.validate.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<div class="page-header">
<div class="alert alert-info" role="alert">
<h4>This demo shows how to integrate JQuery-validation and the Bootstrap framework.</h4>
<ul>
<li><a href="https://getbootstrap.com/" class="alert-link">Bootstrap home project</a>.</li>
</ul>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Simple Form</h3>
</div>
<div class="panel-body">
<form id="signupForm" method="post" class="form-horizontal" action="">
	{{ csrf_field() }}
               <input type="text" name="_token" id="token" value="{{ csrf_token() }}">
<div class="form-group">
<label class="col-sm-4 control-label" for="firstname">First name</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="lastname">Last name</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="username">Username</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="username" name="username" placeholder="Username" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="email">Email</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="email" name="email" placeholder="Email" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="password">Password</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="confirm_password">Confirm password</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
</div>
</div>
<div class="form-group">
<div class="col-sm-5 col-sm-offset-4">
<div class="checkbox">
<label>
<input type="checkbox" id="agree" name="agree" value="agree" />Please agree to our policy
</label>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-9 col-sm-offset-4">
<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Sign up</button>
</div>
</div>
</form>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Using feedback icons</h3>
</div>
<div class="panel-body">
<form id="signupForm1" method="post" class="form-horizontal" action="">
	{{ csrf_field() }}
               <input type="text" name="_token" id="token" value="{{ csrf_token() }}">
<div class="form-group">
<label class="col-sm-4 control-label" for="firstname1">First name</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="firstname1" name="firstname1" placeholder="First name" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="lastname1">Last name</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="lastname1" name="lastname1" placeholder="Last name" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="username1">Username</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="username1" name="username1" placeholder="Username" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="email1">Email</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="email1" name="email1" placeholder="Email" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="password1">Password</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="password1" name="password1" placeholder="Password" />
</div>
</div>
<div class="form-group">
<label class="col-sm-4 control-label" for="confirm_password1">Confirm password</label>
<div class="col-sm-5">
<input type="password" class="form-control" id="confirm_password1" name="confirm_password1" placeholder="Confirm password" />
</div>
</div>
<div class="form-group">
<div class="col-sm-5 col-sm-offset-4">
<div class="checkbox">
<label>
<input type="checkbox" id="agree1" name="agree1" value="agree" />Please agree to our policy
</label>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-9 col-sm-offset-4">
<button type="submit" class="btn btn-primary" name="signup1" value="Sign up">Sign up</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
		$.validator.setDefaults( {
			submitHandler: function () {
				alert( "submitted!" );
			}
		} );

		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					firstname: "required",
					lastname: "required",
					username: {
						required: true,
						minlength: 2
					},
					password: {
						required: true,
						minlength: 5
					},
					confirm_password: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					agree: "required"
				},
				messages: {
					firstname: "Please enter your firstname",
					lastname: "Please enter your lastname",
					username: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					agree: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			} );

			$( "#signupForm1" ).validate( {
				rules: {
					firstname1: "required",
					lastname1: "required",
					username1: {
						required: true,
						minlength: 2
					},
					password1: {
						required: true,
						minlength: 5
					},
					confirm_password1: {
						required: true,
						minlength: 5,
						equalTo: "#password1"
					},
					email1: {
						required: true,
						email: true
					},
					agree1: "required"
				},
				messages: {
					firstname1: "Please enter your firstname",
					lastname1: "Please enter your lastname",
					username1: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 2 characters"
					},
					password1: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password1: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email1: "Please enter a valid email address",
					agree1: "Please accept our policy"
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-sm-5" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
	</script>
</body>
</html>
