@extends('video.layout')
@section('content')
<div class="row">
<div class="col-lg-12" style="text-align: center">
<div >
<h2>English Video Listening</h2>
</div>
<br/>
</div>
</div>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
<a href="javascript:void(0)" class="btn btn-success mb-2" id="new-video" data-toggle="modal">New video</a>
</div>
</div>
</div>
<br/>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p id="msg">{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>ID</th>
<th>Title</th>
<th width="280px">Action</th>
</tr>

@if(isset($videos))
	@foreach ($videos as $video)
	<tr id="video_id_{{ $video->id }}">
	<td>{{ $video->id }}</td>
	<td>{{ $video->title }}</td>
	<td>
	<form action="{{ route('videos.destroy',$video->id) }}" method="POST">
	<a class="btn btn-info" id="show-video" data-toggle="modal" data-id="{{ $video->id }}" >Show</a>
	<a href="javascript:void(0)" class="btn btn-success" id="edit-video" data-toggle="modal" data-id="{{ $video->id }}">Edit </a>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<a id="delete-video" data-id="{{ $video->id }}" class="btn btn-danger delete-user">Delete</a></td>
	</form>
	</td>
	</tr>
@endforeach
@endif

</table>
@if(isset($videos))
	{!! $videos->links() !!}
@endif
<!-- Add and Edit video modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="videoCrudModal"></h4>
</div>
<div class="modal-body">
<form name="custForm" action="{{ route('videos.store') }}" method="POST">
<input type="hidden" name="cust_id" id="cust_id" >
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Title:</strong>
<input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Link:</strong>
<input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
<a href="{{ route('videos.index') }}" class="btn btn-danger">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- Show video modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="videoCrudModal-show"></h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-xs-2 col-sm-2 col-md-2"></div>
<div class="col-xs-10 col-sm-10 col-md-10 ">
@if(isset($video->name))

<table>
<tr><td><strong>Name:</strong></td><td>{{$video->name}}</td></tr>
<tr><td><strong>Email:</strong></td><td>{{$video->email}}</td></tr>
<tr><td><strong>Address:</strong></td><td>{{$video->address}}</td></tr>
<tr><td colspan="2" style="text-align: right "><a href="{{ route('videos.index') }}" class="btn btn-danger">OK</a> </td></tr>
</table>
@endif
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
<script>
error=false

function validate()
{
	if(document.custForm.name.value !='' && document.custForm.email.value !='')
	    document.custForm.btnsave.disabled=false
	else
		document.custForm.btnsave.disabled=true
}
</script>