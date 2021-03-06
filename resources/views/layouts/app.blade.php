<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
	<link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->


	
	<style>
		body{
			font-family: 'Montserrat', sans-serif !important;
			font-weight: 400 !important;
		}
		
		input[type="email"]::placeholder { /* Firefox, Chrome, Opera */
    	color:#abb5ce;
		font-weight: 800;
		}
		input[type="password"]::placeholder { /* Firefox, Chrome, Opera */
    	color: #abb5ce;
		font-weight: 800;
		}
		input[type="checkbox"] { /* change "blue" browser chrome to yellow */
		filter: invert(26%) sepia(13%) saturate(582%) hue-rotate(180deg) brightness(97%) contrast(85%) grayscale(100%);
		}
		
		
	</style>	
</head>

<body class="login-container bg-slate-800 bg-login-f">

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

@yield('content')
</div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>