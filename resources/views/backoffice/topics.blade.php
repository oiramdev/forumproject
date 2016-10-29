@inject('appfunction', 'App\AppFunction')
@extends('layouts.backMaster')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
    	<div class="page-title">
      		<div class="title_left">
        		<h3>All Topics</h3>
      		</div>
    	</div>
    	<div class="clearfix"></div>
    	<div class="row">
      		<div class="col-md-12 col-sm-12 col-xs-12">

      			<div class="x_panel">
      				<div class="x_title">
      					<h2><i class="fa fa-align-left"></i>List of Topics</h2>
      					<ul class="nav navbar-right panel_toolbox">
      						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
      						</li>
      						<li class="dropdown">
      							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
      							<ul class="dropdown-menu" role="menu">
      								<li><a href="#">Settings 1</a>
      								</li>
      								<li><a href="#">Settings 2</a>
      								</li>
      							</ul>
      						</li>
      						<li><a class="close-link"><i class="fa fa-close"></i></a>
      						</li>
      					</ul>
      					<div class="clearfix"></div>
      				</div>
      				<div class="x_content">

      					<table id="datatable" class="table table-striped table-bordered">
      					  <thead>
      					    <tr>
      					      <th>ID</th>
      					      <th>User</th>
      					      <th>Name</th>
      					      <th>Content</th>
      					      <th>Category</th>
      					      <th>Subcategory</th>
      					      <th>Posted</th>
      					      <th>Replies</th>
      					      <th>Views</th>
      					      <th>Private</th>
      					      <th>Status</th>
      					      <th>Update Status</th>
      					    </tr>
      					    </thead>
      					    <tbody>
      					        @foreach($allTopics as $topic)
      					            
      					            <tr>
      					            	<td>{{$topic->id}}</td>
      					            	<td>
      					            		{{ Html::image('/uploads/avatars/'.$topic->user->avatar, 'a picture', array('style'=> 'width:50px')) }}
      					            		{{$topic->user->name}}
      					            	</td>
      					            	<td>{{$topic->name}}</td>
      					            	<td>{{ str_limit($topic->body, 150) }}</td>
      					                <td>{{$topic->categoria->name}}</td>
      					                <td>{{ $topic->subcategoria->name }}</td>
      					                <td>{{ $topic->created_at }}</td>
      					                <td>{{ $topic->qtMessages }}</td>
      					                <td>{{ $topic->qtViews }}</td>
      					                <td>{{ ($topic->isPrivate == 1) ? 'Yes' : 'NO' }}</td>
      					                <td>{{ ($topic->isOpen == 1) ? 'Open' : 'Close' }}</td>
      					                <td>
      					                  <form action="{{ url('backoffice/updateTopicStatus') }}" class="form newtopic">
      					                  <select name="updateTopicStatus" class="form-control" onchange="this.form.submit();">
      					                    <option value="" disabled="" selected="">Select option</option>
      					                    @if($topic->isOpen == 1)
      					                      <option value="0">Close</option>
      					                    @else
      					                      <option value="1">Open</option>
      					                    @endif
      					                  </select>
      					                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
      					                  <input type="hidden" name="topic_id" value="{{ $topic->id }}">
      					                  </form>
      					                </td>
      					            </tr>

      					        @endforeach
      					  </tbody>
      					</table>


      				</div>
      			</div>	

      		</div>
    	</div>
    </div>
</div>

@endsection
