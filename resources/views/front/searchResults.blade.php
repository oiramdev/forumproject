@extends('layouts.frontMaster')
@inject('appfunction', 'App\AppFunction')
@section('content')

<div class="container-fluid">

	<section class="content">


	
		<div class="container" style="margin-top: 50px;">

		<div class="col-lg-8 col-md-8">

			@include('backoffice.resources.alerts')
			

			@if (Auth::guest())

@foreach($guestTopics as $guestTopic)



<!-- POST -->
<div class="post">
	<div class="wrap-ut pull-left">
		<div class="userinfo pull-left">
			<div class="avatar">
				{{ Html::image('/uploads/avatars/'.$guestTopic->user->avatar, 'a picture', array('style'=> 'width:37px')) }}

				@if($activities->contains('user_id',$guestTopic->user->id))
				<div class="status green">&nbsp;</div>
				@else
				<div class="status red">&nbsp;</div>
				@endif
			</div>
		</div>
		<div class="posttext pull-left">
			<h2><a href="{{ url('topic/'.$guestTopic->id) }}">{{ $guestTopic->name }}</a></h2>
			<p>{{ str_limit($guestTopic->body, 150)  }}</p>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="postinfo pull-left">
		<div class="comments">
			<div class="commentbg">
				{{ $guestTopic->qtMessages }}
				<div class="mark"></div>
			</div>

		</div>
		<div class="views"><i class="fa fa-eye"></i> {{ $guestTopic->qtViews }}</div>

			
		<div class="time"><i class="fa fa-clock-o"></i> {{ $appfunction->diffData($guestTopic->created_at) }}</div>                                    
	</div>
	<div class="clearfix"></div>
</div><!-- POST -->

@endforeach
{{ $guestTopics->links() }}

@else
	
	@foreach($topics as $topic)



	<!-- POST -->
	<div class="post">
		<div class="wrap-ut pull-left">
			<div class="userinfo pull-left">
				<div class="avatar">
					{{ Html::image('/uploads/avatars/'.$topic->user->avatar, 'a picture', array('style'=> 'width:37px')) }}

					@if($activities->contains('user_id',$topic->user->id))
					<div class="status green">&nbsp;</div>
					@else
					<div class="status red">&nbsp;</div>
					@endif
				</div>
			</div>
			<div class="posttext pull-left">
				<h2><a href="{{ url('topic/'.$topic->id) }}">{{ $topic->name }}</a></h2>
				<p>{{ str_limit($topic->body, 150)  }}</p>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="postinfo pull-left">
			<div class="comments">
				<div class="commentbg">
					{{ $topic->qtMessages }}
					<div class="mark"></div>
				</div>

			</div>
			<div class="views"><i class="fa fa-eye"></i> {{ $topic->qtViews }}</div>

				
			<div class="time"><i class="fa fa-clock-o"></i> {{ $appfunction->diffData($topic->created_at) }}</div>                                    
		</div>
		<div class="clearfix"></div>
	</div><!-- POST -->

	@endforeach
	{{ $topics->links() }}

@endif



			<div class="clearfix"></div>

		</div>
			
			@include('front.sidebar')
		</div>

	</section>

</div>

@endsection		