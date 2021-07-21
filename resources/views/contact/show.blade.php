@extends('layouts.theme')


@section('content')
<div class="page-header page-header-default">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Contact</h4>
    </div>
  </div>
  <div class="breadcrumb-line">
    <ul class="breadcrumb">
      <li><a href="#"><i class="icon-home2 position-left active"></i> Contact</a></li>
    </ul>
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
      <h5 class="panel-title"></h5>
      <div class="heading-elements"> </div>
      <div class="pull-right"> <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a> </div>
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
        <fieldset>
          <legend class="text-semibold"> Show Contact</legend>
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
        </fieldset>
      </div>
    </div>
  </div>
</div>




@endsection