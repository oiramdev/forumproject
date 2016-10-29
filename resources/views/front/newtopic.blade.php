@extends('layouts.frontMaster')

@section('content')

<div class="container-fluid">

	<section class="content">
		


		<div class="container">
				
			<div class="col-lg-8 breadcrumbf">
				<a href="{{ url('/') }}">Home</a> 
				<span class="diviver">&gt;</span>
				<span>New Topic</span>
			</div>

			<div class="row">


				<div class="col-lg-8 col-md-8">
					<div class="post">
						{!!Form::open(['route'=>'topic.store', 'method'=>'POST', 'class' => 'form newtopic'])!!}
							@include('front.formTopic')
						{!!Form::close()!!}
					</div>

						

				</div>

				@include('front.sidebar', array(
											'categoriasList' => $categoriasList, 
											'topicsList' => $topicsList,
											'topicsListGuest' => $topicsListGuest,
											'topicsForSidebar' => $topicsForSidebar))



			</div>
		</div>


	</section>

</div>

@endsection		