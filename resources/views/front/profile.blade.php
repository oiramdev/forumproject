@extends('layouts.frontMaster')

@section('content')

	<div class="container-fluid">
		
		<div class="container">
			
			<h2>Profile page</h2>
			<span>{{ Auth::user()->name }}</span>

		</div>

	</div>

@endsection