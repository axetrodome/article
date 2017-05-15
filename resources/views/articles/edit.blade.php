@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Edit Article
				</div>
				<div class="panel-body">
				@if(count($errors)>0)
				<div class="alert alert-danger">
						<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
				</div>	
				@endif	
				<form method="POST" action="/articles/{{ $article->id }}">
							{{ csrf_field() }}
							{{ method_field('PUT') }} <!-- to edit data -->
				<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<div class="form-group">
						<label for="content">Content</label>
						<textarea name="content" class="form-control">{{ $article->content }}</textarea>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="live" {{ $article->live == 1 ? 'checked' : '' }}>
							Live 
						</label>
					</div>
					<div class="form-group">
						<label for="post_on">Post on</label>
						<input type="datetime-local" name="post_on" class="form-control" value="{{ $article->post_on->format('Y-m-d\TH:i:s') }}"><!-- correct date format -->
					</div>
					<input type="submit" class="btn btn-success pull-right" value="Submit">
				</form>
				</div>
			</div>
		</div>
	</div>

@endsection
