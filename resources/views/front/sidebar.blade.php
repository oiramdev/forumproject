<div class="col-lg-4 col-md-4">

	<!-- -->
	<div class="sidebarblock">
		<h3>Categories</h3>
		<div class="divline"></div>
		<div class="blocktxt">
			<ul class="cats">
				@foreach($categoriasList as $categoriaList)
				<li><a href="{{ url('categoria/'.$categoriaList->id) }}">{{ $categoriaList->name }} <span class="badge pull-right">{{ $categoriaList->qtTopics }}</span></a></li>
				@endforeach


			</ul>
		</div>
	</div>

	<!-- -->
	<div class="sidebarblock">
		<h3>Latest topics</h3>
		<div class="divline"></div>
		<div class="blocktxt">
			<ul class="cats">
				@if(Auth::guest())
					@if($topicsListGuest->count() > 0)
						@foreach($topicsListGuest as $topicListGuest)
							<li><a href="{{ url('topic/'.$topicListGuest->id) }}">{{ str_limit($topicListGuest->name,40) }} <span class="badge pull-right">{{ $topicListGuest->qtMessages }}</span></a></li>
						@endforeach
					@else
						<h2>There are no topics...</h2>
						<h2>Be first...!</h2>
					@endif
				@else
					@if($topicsListGuest->count() > 0)
						@foreach($topicsList as $topicList)
							<li><a href="{{ url('topic/'.$topicList->id) }}">{{ str_limit($topicList->name,40) }} <span class="badge pull-right">{{ $topicList->qtMessages }}</span></a></li>
						@endforeach
					@else
						<h4>There are no topics...</h4>
						<h4>Be first...!</h4>
					@endif
				@endif
			</ul>			
		</div>
	</div>


	@if(!Auth::guest())
		<!-- -->
	<div class="sidebarblock">
		<h3>My Active Threads</h3>
		@foreach($topicsForSidebar as $topicForSidebar)
			@if(Auth::user()->id == $topicForSidebar->user_id)
				<div class="divline"></div>
				<div class="blocktxt">
					<a href="{{ url('topic/'.$topicForSidebar->id) }}">{{ $topicForSidebar->name }}</a>
				</div>
			@endif
		@endforeach
		
	</div>
	@endif


</div>