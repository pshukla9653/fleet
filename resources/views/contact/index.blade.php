@extends('layouts.theme')

@section('heading','CONTACTS')
@section('content')
<div class="row">		
  <div class="col-md-8" style="padding: 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><i class="icon-reload-alt position-left"></i> Refresh @yield('heading')</a>
  @can('contact-create')	
  <a href="{{ route('contacts.create') }}" class="btn btn-primary"><i class="icon-plus-circle2 position-left"></i> Add New Item</a>
  @endcan
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
      <div class="heading-elements"></div>
      
    </div>
    <div class="panel-body">
      <div class="row"> 
      @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

        
          <table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th>Job Title</th>
     <th>E-Mail Address</th>
     <th>Phone Number</th>
     
     <th width="280px">Action</th>
  </tr>
    @foreach ($contacts as $key => $contact)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $contact->first_name.' '.$contact->last_name }}</td>
       
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
      </div>
    </div>
  </div>
</div>

@endsection