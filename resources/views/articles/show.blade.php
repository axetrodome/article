@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<span>
						Article by Axel Mhar
						@if(Auth::user()->id == $article->user_id)					
							<a href="/articles/{{ $article->id }}/edit" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
						@endif
					</span>
					<span class="pull-right">
						{{ $article->created_at->diffForHumans() }}
					</span>
				</div>
				<div class="panel-body">
					{{ $article->content }}

				</div>
				<div class="comment-container" id="comments">
					@foreach($article->comments as $comment)
					<div class="comment">
						<img src="/uploads/avatars/{{ $comment->user->avatar }}" style="height:32px;width:32px;border-radius:100%;display:inline-block;">
						<div class="actions pull-right">
						@if($comment->user_id == Auth::user()->id)
						<div class="dropdown">
						  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu dropdown-menu-right" style="min-width:90px">
						    <li>    
							    <form method="POST" action="/comments/{{ $comment->id }}" style="text-align:center">
							
									<a class="btn btn-primary btn-sm" href="/comments/{{ $comment->id }}/edit"><i class="fa fa-pencil"></i></a>
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
									<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
								</form>
							</li>
						  </ul>
						</div>
						@endif						
					</div>
						<p class="name">{{ $comment->user->name }}<span class="time"><i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}</span><p>
												
					</div>
						<p class="body">{{ $comment->body }}</p>
					@endforeach					
				</div>
				<form action="/comments" method="POST" class="clearfix comment-forms">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="hidden" id="id">
						<input type="hidden" name="commentable_id" value="{{ $article->id }}" id="commentable_id">
						<input type="hidden" name="user_id" value="{{ Auth::user()->id  }}" id="user_id">
						<textarea class="form-control" placeholder="Comment.." style="height:50px" name="body" id="body"></textarea>
						<button type="submit" class="btn btn-primary btn-sm pull-right" style="margin:5px" id="submit"><i class="fa fa-comments-o"></i> Comment</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection