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

<div class="content"> 
  
  <!-- Main charts --> 
  <!-- Quick stats boxes --> 
  
  <!-- /quick stats boxes --> 
  <!-- /main charts -->
  <div class="panel panel-flat">
    <div class="panel-heading">
      <h5 class="panel-title"></h5>
      <div class="heading-elements"><div class="pull-right"> 
       @can('contact-create')
            <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create New Contact</a>
            @endcan
       </div> </div>
      
    </div>
    <div class="panel-body">
      <div class="row"> 
      @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

        <fieldset>
          <legend class="text-semibold"> Contact List</legend>
          <table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th>Company Name</th>
     <th>Job Title</th>
     <th>E-Mail Address</th>
     <th>Phone Number</th>
     
     <th width="280px">Action</th>
  </tr>
    @foreach ($contacts as $key => $contact)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $contact->first_name.' '.$contact->last_name }}</td>
         <td>{{ $contact->company_name}}</td>
          <td>{{ $contact->job_title}}</td>
           <td>{{ $contact->email}}</td>
            <td>{{ $contact->phone_number}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Show</a>
            @can('contact-edit')
                <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
            @endcan
            @can('contact-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['contacts.destroy', $contact->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $contacts->render() !!}
        </fieldset>
      </div>
    </div>
  </div>
</div>

@endsection