<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/icons/icomoon/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/icons/fontawesome/styles.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/colors.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/croppie.min.css') }}">
        

        <!--Core Scripts -->
        <script src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/core/libraries/jquery.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/editors/summernote/summernote.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/croppie.min.js') }}" defer></script>
        
         <!--Theme Scripts -->
        <script src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/visualization/d3/d3.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/visualization/d3/d3_tooltip.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/pickers/daterangepicker.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/forms/inputs/duallistbox.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/forms/inputs/formatter.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/plugins/notifications/pnotify.min.js') }}" defer></script>
        <script src="{{ asset('assets/js/pages/form_layouts.js') }}" defer></script>
        <script src="{{ asset('assets/js/core/app.js') }}" defer></script>
        <script src="{{ asset('assets/js/pages/components_modals.js') }}" defer></script>
        <script src="{{ asset('assets/js/pages/datatables_data_sources.js') }}" defer></script>
        
        
    </head>

<body class="navbar-top" style="overflow-x:hidden;">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo" src="{{ asset('assets/images/2cd53329007f7006f2163482c685b371.png') }}" title="" alt=""/></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<p class="navbar-text"><span class="label bg-success">Online</span></p>
            
			<ul class="nav navbar-nav navbar-right">
				

				

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('assets/images/placeholder.jpg') }}" alt="">
						<span>{{ Auth::user()->name }}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						
						<li><a href="{{ route('logout') }}" onClick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> {{ __('Logout') }}</a></li>
					</ul>
				</li>
			</ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            <ul class="nav navbar-nav navbar-right">
				<li><a onClick="window.history.go(1); return false;"><i class="fa fa-arrow-right"></i> Forword</a></li>
			</ul>
            <ul class="nav navbar-nav navbar-right">
				<li><a onClick="window.location.href=window.location.href"><i class="fa fa-refresh"></i> Refresh</a></li>
			</ul>
            <ul class="nav navbar-nav navbar-right">
				<li><a onClick="window.history.go(-1); return false;"><i class="fa fa-arrow-left"></i> Back</a></li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="{{ asset('assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Admin</span>
                                    
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
				 <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                 <li class="active"> <a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                 <li class=""> <a href="{{ route('users.index') }}"><i class="fa fa-home"></i> <span>Manage Users</span></a></li>
                 <li class=""> <a href="{{ route('roles.index') }}"><i class="fa fa-home"></i> <span>Manage Role</span></a></li>
                        						

							</ul>
						</div>
					</div>






					
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->

	<div class="content-wrapper"><!-- Page header -->
			<!-- Main content -->
			@yield('content')
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
    

</body>
</html>
