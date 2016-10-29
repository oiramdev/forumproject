@extends('layouts.frontMaster')

@section('content')

		<div class="container-fluid">
			
			<section class="content">

				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-xs-12 col-md-8">
							<div class="row">


								<div class="col-lg-6 col-md-6">
									<form action="{{ url('/') }}" class="form newtopic" style="margin-top: 20px;">
										<label for="">Topics by Categoria</label>
										
										<select name="topicsByCategoria" id="topicsByCategoria" class="form-control" onchange="this.form.submit();">
											<option value="" disabled="" selected="">Select a Category</option>
											@foreach($categoriasList as $categoria)
												<option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
											@endforeach			
											<option value="all">All Topics</option>
										</select>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
									</form>
								</div>


								<div class="col-lg-6 col-md-6">
									<form action="{{ url('/') }}" class="form newtopic" style="margin-top: 20px;">
										<label for="">Topics per page</label>
										<select name="topicsPerPage" class="form-control" onchange="this.form.submit();">
											<option value="" disabled="" selected="">Topics per page</option>
											<option value="10">10 Topics</option>
											<option value="20">20 Topics</option>
											<option value="50">50 Topics</option>
											<option value="100">100 Topics</option>
										</select>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
									</form>
								</div>
							</div>


							<div class="clearfix"></div>
						</div>

						
					</div>
				</div>

			                


			                <div class="container">
			                    <div class="row">


			                        <div class="col-lg-8 col-md-8">
			                           
			                           @include('front.topicBlock')

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