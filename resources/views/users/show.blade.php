@extends('layouts.theme')

@section('heading','Users')
@section('content')
<div class="row">		
  <div class="col-md-8" style="padding: 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
  <a href="{{ route('users.index') }}" class="btn btn-primary"><i class=" icon-list-unordered position-left"></i> Item List</a>
  </div>
  <div class="col-md-4" style="padding: 30px;">
  <form class="example" action="#">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
    </form>		
  </div>
  
  </div>
<!-- /page header --> 

<!-- Content area -->
<div class="content"> 
  
  <!-- Main charts --> 
  <!-- Quick stats boxes --> 
  
  <!-- /quick stats boxes --> 
  <!-- /main charts -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title">@yield('heading')</h5>
      <div class="heading-elements"> </div>
      
    </div>
    <div class="panel-body">
      <div class="row"> 
     @if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
       
          <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->first_name.' '.$user->last_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
      </div>
    </div>
  </div>
</div>
@endsection