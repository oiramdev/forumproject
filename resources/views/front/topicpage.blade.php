@inject('appfunction', 'App\AppFunction')
@extends('layouts.frontMaster')

@section('content')

<div class="container-fluid">

	<section class="content">
		


		<div class="container">
				
			<div class="col-lg-8 breadcrumbf">
				<a href="{{ url('/') }}">Home</a> 
				<span class="diviver">&gt;</span>
				<a href="{{ url('categoria/'.$topic->categoria->id) }}">{{ $topic->categoria->name }}</a>
				<span class="diviver">&gt;</span>
				<a href="{{ url('subcategoria/'.$topic->subcategoria->id) }}">{{ $topic->subcategoria->name }}</a>
				<span class="diviver">&gt;</span>
				<span>{{ str_limit($topic->name, 30) }}</span>
			</div>

			<div class="row">

				

				<div class="col-lg-8 col-md-8">
						
					<div class="post beforepagination" style="margin-bottom: 50px;">
						<div class="topwrap">
							<div class="userinfo pull-left">
								<div class="avatar">
									{{ Html::image('/uploads/avatars/'.$topic->user->avatar, 'a picture', array('style'=> 'width:37px')) }}
									<div class="status green">&nbsp;</div>
								</div>
							</div>
							<div class="posttext pull-left">
							<h2>{{ $topic->name }}</h2>
								<p>{{ $topic->body }}</p>
							</div>
							<div class="clearfix"></div>
						</div>                              
						<div class="postinfobot">

							<div class="likeblock pull-left">
								<a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>25</a>
								<a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>3</a>
							</div>

							<div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{ $appfunction->dateToString($topic->created_at) }}</div>

							<div class="next pull-right">                                        
								<button class="btn btn-primary" id="toPostReply">Post Reply</button>
							</div>

							<div class="clearfix"></div>
						</div>
					</div>
					
					

					@include('front.messageBlock', array('activities' => $activities, 
														 'showSelectMessageByPage' => $showSelectMessageByPage,
														 'topicsList' => $topicsList,
														 'topicsListGuest' => $topicsListGuest,
														 'topicsForSidebar' => $topicsForSidebar))


					@if (Auth::guest())
						
						@include('front.noLogedAlert')

					@else

						@include('front.replyTopicForm', array('activities' => $activities))
					
					@endif

				</div>

				@include('front.sidebar', array('categoriasList' => $categoriasList))



			</div>
		</div>


	</section>

</div>

<script>
	$('#toPostReply').on('click',function(){
		$('html, body').animate({
			        scrollTop: $("#formNewMessage").offset().top
			    }, 2000);
	});
	
</script>

@endsection		