@extends('layouts.frontMaster')
@inject('appfunction', 'App\AppFunction')


@section('content')

<div class="container-fluid">

	<section class="content">
		


		<div class="container">
				
			<div class="col-lg-8 breadcrumbf">
				<a href="{{ url('/') }}">Home</a> 
				<span class="diviver">&gt;</span>
				<a href="{{ url('categoria/'.$subcategoriaInfo->categoria->id) }}">{{ $subcategoriaInfo->categoria->name }}</a>
				<span class="diviver">&gt;</span>
				<span>{{ $subcategoriaInfo->name }}</span>
			</div>

			<div class="row">

				

				<div class="col-lg-8 col-md-8">

					@if($subcategoriaInfo->qtTopics > 0)

							@if (Auth::guest())

							@foreach($guestTopicsBySubCategoria as $guestTopic)

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
							{{ $guestTopicsBySubCategoria->links() }}

							@else
								
								@foreach($topicsBySubCategoria as $topic)



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
								{{ $topicsBySubCategoria->links() }}

							@endif

						@else


						
					<div class="post" style="margin-bottom: 30px;">

						<div class="postinfotop">
							<h2 style="font-size: 20px;">{{ $subcategoriaInfo->name }}</h2>
						</div>

						<div class="clearfix"></div>
					</div>
					
					
						<div class="post">
							<div class="wrap-ut pull-left">
								<div class="posttext pull-left" style="padding-left: 30px;">
									<h2>There are no topics...</h2>
										<h2>Be first...!</h2>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
						</div><!-- POST -->
					@endif	

					</div>


							


				@include('front.sidebar', array(
											'categoriasList' => $categoriasList, 
											'topicsList' => $topicsList,
											'topicsListGuest' => $topicsListGuest,
											'topicsForSidebar' => $topicsForSidebar))
					
					

					


				</div>

			


			</div>
		</div>


	</section>

</div>


@endsection