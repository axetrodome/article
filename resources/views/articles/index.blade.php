@extends('layouts.app')
@section('content')
	<div class="row">
		@forelse($articles as $article)
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span>Axel Mhar</span>
					<span class="pull-right">
						{{ $article->created_at->diffForHumans() }}
					</span>
				</div>
				<div class="panel-body">
				<!-- start at 0 and end at 100 --> 
				{{ $article->ShortContent }}
				<a href="/articles/{{ $article->id }}">Read more</a> 
				</div>
				<div class="panel-footer clearfix">
				@if( $article->user_id == Auth::user()->id )
				<form class="pull-right" style="margin-left:25px" action="/articles/{{ $article->id }}" method="POST">
				{{ csrf_field() }}
				{{  method_field('DELETE') }}  
					<button class="btn btn-danger btn-sm">Delete</button>
				</form>
				@endif
					<i class="fa fa-heart pull-right"></i>
				</div>
			</div>
		</div>
		@empty
			<h1>No Articles</h1>
		@endforelse
	</div>
	<!-- pagination -->
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			{{ $articles->links() }}
		</div>
	</div>
@endsection
