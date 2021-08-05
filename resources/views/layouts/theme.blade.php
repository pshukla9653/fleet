<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Global stylesheets -->
	
	
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
	<link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/datatables_responsive.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/form_bootstrap_select.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/daterangepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>


	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
	<!-- /theme JS files -->

	<style>
		body{
			font-family: 'Montserrat', sans-serif !important;
			font-weight: 400 !important;
		}
		.btn{

			text-transform: initial !important;
		}
		
	</style>	

</head>

<body>

	


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user-material">
						<div class="category-content">
							<div class="sidebar-user-material-content">
								<a href="{{ url('/') }}"><img src="{{ asset('assets/images/Bentley-symbol-black-1920x1080_ba@2x.png') }}" class="img-responsive" alt=""></a>
								
							</div>
														
							
						</div>
						
						
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Menu</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="{{ url('/') }}"><i class="icon-home4"></i> <span>DASHBOARD</span></a><span class="sidebar-control sidebar-main-toggle hidden-xs"><i class="fa fa-angle-double-left pull-right" style="position: absolute;
									margin-top: -6.5em;
									margin-left: 18.2em;"></i></span></li>
								@if(session()->get('company_id') == null)	
								<li class="{{ (request()->segment(1) == 'companies') ? 'active' : '' }}">
									<a href="{{ route('companies.index') }}"><i class="icon-stack2"></i> <span>Companies</span></a>
									
								</li>
								@endif
								@can('overview')	
								<li class="{{ (request()->segment(1) == 'overview') ? 'active' : '' }}">
									<a href="#"><i class="icon-stack2"></i> <span>OVERVIEW</span></a>
									
								</li>
								@endcan
								@can('configure')
								<li>
									<a href="#"><i class="icon-car"></i> <span>CONFIGURE</span></a>
									<ul>
										@can('role-list')
										<li style="margin-left:12px;" class="{{ (request()->segment(1) == 'roles') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Roles</a></li>
										@endcan
										@can('vehicle-list')
										<li class="{{ (request()->segment(1) == 'vehicle') ? 'active' : '' }}"><a href="#">Vehicles</a></li>
										@endcan
										@can('region-list')
										<li class="{{ (request()->segment(1) == 'regions') ? 'active' : '' }}"><a href="{{ route('regions.index') }}">Regions</a></li>
										@endcan
										@can('department-list')
										<li class="{{ (request()->segment(1) == 'departments') ? 'active' : '' }}"><a href="{{ route('departments.index') }}">Department</a></li>
										@endcan
										@can('brand-list')
										<li class="{{ (request()->segment(1) == 'brands') ? 'active' : '' }}"><a href="{{ route('brands.index') }}">Brands</a></li>
										@endcan
										@can('loantype-list')
										<li class="{{ (request()->segment(1) == 'loantype') ? 'active' : '' }}"><a href="{{ route('loantypes.index') }}">Loan Type</a></li>
										@endcan
										@can('email_template-list')
										<li><a href="#">Email Templates</a></li>
										@endcan
										@can('history-list')
										<li><a href="#">History</a></li>
										@endcan
										@can('user-list')
										<li class="{{ (request()->segment(1) == 'users') ? 'active' : '' }}"><a href="{{ route('users.index') }}">Users</a></li>
										@endcan
										@can('list')
										<li><a href="#">Lists</a></li>
										@endcan
										@can('system-configuration')
										<li><a href="#">System Configuration</a></li>
										@endcan
									</ul>
								</li>
								@endcan
								@can('contact-list')
								<li class="{{ (request()->segment(1) == 'contacts') ? 'active' : '' }}">
									<a href="{{ route('contacts.index') }}"><i class="icon-user-plus"></i> <span>CONTACT PROFILES</span></a>
									
								</li>
								@endcan
								@can('report-list')
								<li class="{{ (request()->segment(1) == 'reports') ? 'active' : '' }}">
									<a href="#"><i class="icon-file-text2"></i> <span>REPORTS</span></a>
									<ul>
										@can('report-by-vehicles')
										<li style="margin-left:12px;"><a href="#">By Vehicles</a></li>
										@endcan
										@can('report-by-company')
										<li><a href="#">By Company</a></li>
										@endcan
									</ul>
								</li>
								@endcan
								<!-- /page kits -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
<!-- Main navbar -->
<div class="navbar navbar-default header-highlight" style="margin: 20px; border-radius: 3px; box-shadow:rgb(99 99 99 / 20%) 0px 2px 8px 0px; height: 30px !important;">
	<div class="nav navbar-nav visible-xs-block">
		<div style="text-align: right; margin: 15px; padding: 5px;"><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a>
		<a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></div>
	</div>

	<div class="navbar-collapse collapse" id="navbar-mobile">
		
		<div class="nav navbar-nav"><h2 style="margin-top: 10px; text-transform: uppercase;">@yield('heading')</h2></div>
		<ul class="nav navbar-nav navbar-right">
				

				

			<li class="dropdown dropdown-user">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="{{ asset('assets/images/placeholder.jpg') }}" alt="">
					<span>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</span>
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
		
		
	</div>
</div>
<div class="page-header">
	<div class="page-header-content">
	  <div class="page-title">
		<h6><i class="icon-home2 position-left"></i> <i class="fa fa-angle-double-right"></i> @yield('heading')</h6>
	  </div>
  <hr>
	  
	</div>
	</div>
<!-- /main navbar -->
			<!-- Page header -->
			@yield('content')
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<script>
		window.setTimeout(function () {
			$(".alert-success").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 3000);
    	window.setTimeout(function () {
			$(".alert-info").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 3000);
		window.setTimeout(function () {
			$(".alert-danger").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 3000);
    
		window.setTimeout(function () {
			$(".alert-warning").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 3000);
    
	
    </script>
</body>
</html>
