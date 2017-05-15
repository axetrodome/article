@extends('layouts.app')
<style type="text/css">
	.profile-img{
		max-width:150px;max-height:150px;border-radius:100%;border:5px solid #fff;box-shadow:0 2px 2px rgba(0,0,0,0.3)
	}		
</style>
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel panel-body text-center">
					<img src="/uploads/avatars/{{ $user->avatar }}" class="profile-img">
					<h1>{{ $user->name }}</h1>
					<h5>{{ $user->email }}</h5>
					<h5>{{ $user->dob }} ({{ Carbon\Carbon::createFromFormat('Y-m-d',$user->dob)->age }} Years old )</h5>
					<a href="/profile/{{ $user->id }}/edit" class="btn btn-success btn-sm">Edit</a>
				</div>
			</div>
		</div>
	</div>
@endsection
<!-- ({{ Carbon\Carbon::createFromFormat('Y-m-d',$user->dob)->age }} Years old ) -->
<!-- https://www.youtube.com/watch?v=N_i3UFw0_84 -->