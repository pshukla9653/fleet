@extends('layouts.theme')

@section('heading','CONTACTS')
@section('content')
<div class="row">		
  <div class="col-md-8" style="padding: 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
  <a href="{{ route('contacts.index') }}" class="btn btn-primary"><i class=" icon-list-unordered position-left"></i> Item List</a>
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
      @if (count($errors) > 0)
        <div class="alert alert-danger"> <strong>Whoops!</strong> There were some problems with your input.<br>
          <br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
          <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First Name:</strong>
            {{ $contact->first_name }}
        </div>
         <div class="form-group">
            <strong>Last Name:</strong>
            {{ $contact->last_name }}
        </div>
         <div class="form-group">
            <strong>Company Name:</strong>
            {{ $contact->company_name }}
        </div>
         <div class="form-group">
            <strong>Job Title:</strong>
            {{ $contact->job_title }}
        </div>
         <div class="form-group">
            <strong>E-Mail Address:</strong>
            {{ $contact->email }}
        </div> <div class="form-group">
            <strong>Phone Number:</strong>
            {{ $contact->phone_number }}
        </div>
         <div class="form-group">
            <strong>Address1:</strong>
            {{ $contact->address1 }}
        </div>
        <div class="form-group">
            <strong>Address2:</strong>
            {{ $contact->address2 }}
        </div>
        <div class="form-group">
            <strong>Address3:</strong>
            {{ $contact->address3 }}
        </div>
         <div class="form-group">
            <strong>Town/City:</strong>
            {{ $contact->city }}
        </div>
         <div class="form-group">
            <strong>Country:</strong>
            {{ $contact->country }}
        </div>
        <div class="form-group">
            <strong>Post Code:</strong>
            {{ $contact->post_code }}
        </div>
    </div>
   
</div>
      </div>
    </div>
  </div>
</div>




@endsection