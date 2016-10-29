@extends('layouts.frontMaster')

@inject('Topico', 'App\Models\Topico')


@section('content')

<div class="container-fluid">

	<section class="content">
		


		<div class="container">
				
			<div class="col-lg-8 breadcrumbf">
				<a href="{{ url('/') }}">Home</a> 
				<span class="diviver">&gt;</span> 
				<span>{{ $categoriaInfo->name }}</span>
			</div>

			<div class="row">

				

				<div class="col-lg-8 col-md-8">
						
					<div class="post" style="margin-bottom: 30px;">

						<div class="postinfotop">
							<h2 style="font-size: 20px;">{{ $categoriaInfo->name }}</h2>
						</div>

						<div class="clearfix"></div>
					</div>
					
					@foreach($subcategorias as $subcategoria)

					<!-- POST -->
					<div class="post">
						<div class="wrap-ut pull-left">
							<div class="posttext pull-left" style="padding-left: 30px;">
								<h2><a href="{{ url('subcategoria/'.$subcategoria->id) }}">{{ $subcategoria->name }}</a></h2>
								<p>{{ str_limit($subcategoria->description, 150)  }}</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="postinfo pull-left">
							<div class="comments">
								<div class="commentbg" style="margin-bottom: 10px;"">
									{{ $subcategoria->qtTopics }}
									<div class="mark"></div>

								</div><br><span>{{ ($subcategoria->qtTopics == 1) ? 'Topic' : 'Topics' }}</span>

							</div>                                   
						</div>
						<div class="clearfix"></div>
						
					</div><!-- POST -->
					@endforeach

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