@extends('layouts.theme')

@section('heading','Roles')
@section('content')
<div class="page-header">
	<div class="page-header-content">
	  <div class="page-title" style="margin: 0px 20px;">
		<h6><i class="icon-home2 position-left"></i> <i class="fa fa-angle-double-right"></i> <span style="color: #3a6d7f;">Configure</span> <i class="fa fa-angle-double-right"></i> @yield('heading')</h6>
	  </div>
  
	  
	</div>
	</div>
  <hr style="margin: 0px 20px;">
<!-- /main navbar -->
<div class="row">		
<div class="col-md-8" style="padding: 15px 30px;">
  <a onclick="location.reload();" class="btn btn-primary"><img src="{{ asset('assets/images/icon/refresh.png') }}" alt="refresh" style="width: 20px;margin-left: -8px;"/>&nbsp; Refresh @yield('heading')</a>
  @can('role-create')	
  <a href="javascript:void(0);" onclick="addNew();" class="btn btn-primary" style="margin-left: 20px;"><img src="{{ asset('assets/images/icon/add.png') }}" alt="add" style="width: 21px;margin-left: -8px;"/>&nbsp; Add New Item</a>
  @endcan
  </div>
  <div class="col-md-4" style="padding: 15px 30px;">
    <form class="example" action="">
      <input type="text" placeholder="Search" name="search">
      <button type="submit"><img src="{{ asset('assets/images/icon/search.png') }}" alt="search"/></button>
      </form>		
    </div>
  
  </div>	

<div class="content"> 
  
  <!-- Main charts --> 
  <!-- Quick stats boxes --> 
  
  <!-- /quick stats boxes --> 
  <!-- /main charts -->
  <div class="panel panel-flat">
    <div class="panel-heading" style="padding: 0px;">
      <h5 class="panel-title">Role</h5>
      <div class="heading-elements">
        </div>
      
    </div>
    <div class="panel-body" style="padding: 0px 10px 10px 10px;">
      <div class="row"> 
        <span id="message"></span>
       
      @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif

        
          <table class="table table-bordered table-responsive" id="dataTables">
            @foreach ($roles as $key => $role)
    <tr>
        
        <td style="width: 15%">
          @can('role-edit')
          <a onclick="edititem({{ $role->id }})">
            <img src="{{ asset('assets/images/icon/edit.png') }}" alt="edit"/>
          </a>
          @endcan
          &nbsp;
          {{ $role->name }}
        </td>
        <td style="width: 80%"></td>
        <td style="width: 4%">
            
          @can('role-delete')
            <a onclick="deleteitem({{ $role->id }})">
              <img src="{{ asset('assets/images/icon/delete.png') }}" alt="delete"/>
            </a>
          @endcan  
          
           
        </td>
        
    </tr>
    @endforeach
        </table>
        <br>
        {!! $roles->render() !!}
        
      </div>
    </div>
  </div>
</div>


<div id="popup_model" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #f2f2f2;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="icon-cancel-circle2"></i></button>
        
      </div>
      <h6 class="modal-title md-heading-custom" id="form_heading"></h6>
      <div class="modal-body md-body-custom">
        <div class="alert alert-danger print-error-msg" style="display:none">
          <ul></ul>
      </div>
        <form action="javascript:void(0)" id="itemform"  class="form-horizontal" style="padding: 20px 20px;" method="POST">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <input type="hidden" id="item_id" name="id">
                <div class="form-group"><strong>Name:</strong> 
                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control custom-modal-textbox')) !!} 
                  <div class="text-danger"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group"> <strong>Permission:</strong> <br/>
                @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                  {{ $value->name }}</label>
                <br/>
                @endforeach 
              </div>
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer md-footer-custom">
        <hr style="margin-top: 0px;">
        <button type="submit" class="btn custom-modal-btn btn-success" id="btn"></button>
        <button type="button" class="btn custom-modal-btn btn-danger" data-dismiss="modal">Cancel</button>
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

  function addNew() {
    $('#message').html('');
    $('#btn').html('Save');
    $("#itemform")[0].reset();
    $('#form_heading').html("Add Role");
    $('#popup_model').modal('show');
  }
  $("#itemform").submit(function(event) {
  event.preventDefault();
    $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
      $('#message').html('');
      $.ajax({
          type:"POST",
          url: "{{url('roles-add')}}",
          data: $("#itemform").serialize(),
          dataType: 'json',
          success: function(res){
            if(res.status==1)
            {
              window.location.reload();
            }else{
              $('#message').html('<div id="warning" class="alert alert-warning">'+res.message+' </div>');
            }  
         }
      });
  })
  

  function deleteitem(id)
  {
     $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
      $('#message').html('');
      $.ajax({
          type:"POST",
          url: "{{url('roles-delete')}}",
          data: {id:id},
          dataType: 'json',
          success: function(res){
            if(res.status==1)
            {
              window.location.reload();
            }else{
              $('#message').html('<div id="warning" class="alert alert-warning">'+res.message+' </div>');
            }  
         }
      });
  }


</script>
@endsection