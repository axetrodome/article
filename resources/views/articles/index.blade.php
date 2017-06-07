@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		@if(Session::has('success'))
			<div class="alert alert-success">
				<strong>Success! </strong>{{ Session::get('success') }}
			</div>
		@endif
		</div>
		@forelse($articles as $article)
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary " style="border-left:none;border-right:none;">
				<div class="panel-heading">
					<img src="/uploads/avatars/{{ $article->user->avatar }}" style="height:32px;width:32px;border-radius:100%;">
					<span>{{ $article->user->name }}</span>
					<span class="pull-right">
						{{ $article->created_at->diffForHumans() }}
					</span>
				</div>
				<div class="panel-body">
				<!-- start at 0 and end at 100 --> 
				@if(strlen($article->ShortContent) > 60)
					{{ $article->ShortContent }}...
					<a href="/articles/{{ $article->id }}">Read more</a>
				@else
					{{ $article->ShortContent }}
					<br>
					<a href="/articles/{{ $article->id }}">View</a>
				@endif
				</div>
				<div class="panel-footer clearfix">
				@if( $article->user_id == Auth::user()->id )
					<form class="pull-right" style="margin-left:25px" action="/articles/{{ $article->id }}" method="POST" id="myForm">
						{{ csrf_field() }}
						{{  method_field('DELETE') }}  
					<button class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i> Delete</button>
					</form>
				@endif
					<i class="fa fa-heart pull-right"></i>
				</div>
			</div>
			<small style="border-bottom:1px solid cornflowerblue;display:block;"><strong>Comments</strong></small>

<!--=============================================== 'comments'====================================================-->
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
<!--=============================================== 'replies'====================================================-->						
						<small style="font-weight:bold;" class="replies">Replies <i class="caret"></i></small><br>
						@foreach($comment->replies as $reply)
							<div class="replies">
								<img src="/uploads/avatars/{{ $reply->user->avatar }}" style="height:22px;width:22px;border-radius:100%;display:inline-block;">
								<div class="actions pull-right">
								@if($reply->user_id == Auth::user()->id)
								<div class="dropdown">
								  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu dropdown-menu-right" style="min-width:90px">
								    <li>    
									    <form method="POST" action="/reply/{{ $reply->id }}" style="text-align:center">
											<a class="btn btn-primary btn-sm" href="/reply/{{ $reply->id }}/edit"><i class="fa fa-pencil"></i></a>
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
											<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
										</form>
									</li>
								  </ul>
								</div>
								@endif						
							</div>
								<small class="replyer">{{ $reply->user->name }} <br><small style="padding:0px 15px"><i class="fa fa-clock-o"></i> {{ $reply->created_at->diffForHumans() }}</small></small>
								<p style="padding:0px 15px">{{ $reply->reply }}</p>
							</div>					
						@endforeach
									<form method="POST" class="clearfix" id="replyForm" action="/reply">
										{{ csrf_field() }}
										<div class="form-group">
											<input type="hidden" name="parent_id" value="{{ $comment->id }}" id="parent_id">
											<input type="hidden" name="user_id" value="{{ Auth::user()->id  }}" id="user_id">
											  <div class="input-group">
											    <input type="text" class="reply form-control" placeholder="Comment.." name="reply" id="reply">
											    <span class="input-group-btn">
											      <button type="submit" class="btn btn-primary btn-sm pull-right" style="margin:5px"><i class="fa fa-comments-o"></i> Reply</button>
											    </span>
											  </div>
										</div>
									</form>
<!--=============================================== 'end of replies'====================================================-->						
					@endforeach
				</div>
			<form method="POST" class="clearfix" id="commentForm">
				{{ csrf_field() }}
				<div class="form-group">
					<input type="hidden" id="id">
					<input type="hidden" name="commentable_id" value="{{ $article->id }}" id="commentable_id">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id  }}" id="user_id">
					<textarea type="text" class="form-control" placeholder="Comment.." style="height:50px" name="body" id="body"></textarea>
					<button class="btn btn-primary btn-sm pull-right" style="margin:5px" id="submit"><i class="fa fa-comments-o"></i> Comment</button>
				</div>
			</form>	
<!--====================================== end of comment ====================================================================-->
		</div>
		@empty
			<h1 style="text-align:center;">Create your first Article</h1>
		@endforelse
	</div>
	<!-- pagination -->
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			{{ $articles->links() }}
		</div>
	</div>
@endsection
<!-- http://way2php.com/crud-operations-using-jquery-ajax-laravel-5-3/ -->