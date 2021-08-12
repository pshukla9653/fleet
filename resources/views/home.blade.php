@extends('layouts.theme')

@section('heading','Dashboard')
@section('content')
<div class="page-header">
	<div class="page-header-content">
	  <div class="page-title">
		<h6><i class="icon-home2 position-left"></i> <i class="fa fa-angle-double-right"></i>  @yield('heading')</h6>
	  </div>
  <hr>
	  
	</div>
	</div>
<div class="row">		
<div class="col-md-8" style="padding: 30px;">
<a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>

</div>
<div class="col-md-4" style="padding: 30px;">
<form class="example" action="#">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
  </form>		
</div>

</div>	

<div class="content"> 
  
  <!-- Main charts --> 
  <!-- Quick stats boxes --> 
  
  <!-- /quick stats boxes --> 
  <!-- /main charts -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">@yield('heading')</h5>
      <div class="heading-elements">
        </div>
      
    </div>
    <div class="panel-body">
      <div class="row"> 
      @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

	
      </div>
    </div>
  </div>
</div>

@endsection
