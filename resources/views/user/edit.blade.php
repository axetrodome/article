@extends('layouts.app')
<style type="text/css">
	.profile-img{
		max-width:150px;max-height:150px;border-radius:100%;border:5px solid #fff;box-shadow:0 2px 2px rgba(0,0,0,0.3)
	}
</style>
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			@if(Session::has('success'))
			<div class="alert alert-success">
				<strong>Success!</strong> {{ Session::get('success') }}
			</div>
			@endif
			@if(count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</ul>
				</div>
			@endif
			<div class="panel panel-default">
				<div class="panel panel-body">
					<div class="text-center">
						<img src="/uploads/avatars/{{ $user->avatar }}" class="profile-img">
					</div>
					<form enctype="multipart/form-data" action="/prof" method="POST">
					{{ csrf_field() }}
	                <label>Update Profile Image</label>
		                <input type="file" name="avatar">
		                <input type="submit" class="pull-right btn btn-sm btn-primary">
            		</form>
					<form method="POST" action="/profile/{{ $user->id }}">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="name">Name</label>
						<input type="text" name="name" value="{{ $user->name }}" class="form-control">
					</div>
					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						<label for="email">Email</label>
						<input type="email" name="email" value="{{ $user->email }}" class="form-control">
					</div>
					<div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
						<label for="dob">Date of Birth</label>
						<input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
					</div>
					<input type="submit" class="btn btn-success btn-sm">
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
<!-- ({{ Carbon\Carbon::createFromFormat('Y-m-d',$user->dob)->age }} Years old ) -->