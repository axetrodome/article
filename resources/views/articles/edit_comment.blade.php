@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Edit Comment
				</div>
				<div class="panel-body">
				@if(Session::has('success'))
					<div class="alert alert-success">
						{{ Session::get('success') }}
					</div>
				@endif

				@if(count($errors)>0)
				<div class="alert alert-danger">
						<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
				</div>	
				@endif	
				<form method="POST" action="/comments/{{ $comment->id }}">
							{{ csrf_field() }}
							{{ method_field('PUT') }} <!-- to edit data -->
				<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<div class="form-group">
						<label for="body">Comment</label>
						<textarea name="body" class="form-control" id="body">{{ $comment->body }}</textarea>
					</div>
					<input type="submit" class="btn btn-success pull-right" value="Submit"i id="edit-submit">
				</form>
				</div>
			</div>
		</div>
	</div>

@endsection
