@extends('layouts.app')
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
					<form method="POST" action="/settings/{{ $user->id }}">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
						<label for="username">Username</label>
						<input type="text" name="username" value="{{ $user->username }}" class="form-control">
					</div>
					<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
						<label for="password">New Password</label>
						<input type="password" name="password" value="{{ $user->password }}" class="form-control">
					</div>
					<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
						<label for="password_confirmation">Confirm New password</label>
						<input type="password" name="password_confirmation" class="form-control" value="{{ $user->password }}">

					</div>
					<input type="submit" class="btn btn-success btn-sm">
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
<!-- ({{ Carbon\Carbon::createFromFormat('Y-m-d',$user->dob)->age }} Years old ) -->