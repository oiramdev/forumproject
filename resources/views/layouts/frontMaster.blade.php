@inject('appfunction', 'App\AppFunction')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<!-- Latest compiled and minified CSS -->
	
	{{ Html::style('/front/css/bootstrap.min.css') }}

	{{ Html::style('front/css/style.css')}}

	{{ Html::style('front/css/font-awesome.min.css')}}

	{{ Html::style('front/css/custom.css')}}

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->

	{{ Html::script('front/js/bootstrap.min.js')}}

</head>




<body>
	
		<div class="container-fluid">
				
				<div class="headernav">
				                <div class="container">
				                    <div class="row">
				                        <div class="col-lg-4 col-xs-12 col-sm-6 col-md-5 search ">
				                        	<a href="{{ url('/') }}" style="text-decoration: none;"><span style="font-size: 25px;">
												<span>{<i style="color: #bdc3c7;">Project</i><b style="color: #444;"> FORUM</b>}</span>
				                        	</a>
				                        </div>
				                        <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
				                            <div class="wrap">
				                                <form action="{{ url('/search') }}" id="searchForm" method="get" class="form">
				                                    <div class="pull-left txt">
				                                    	<input id="searchBox" type="text" name="search" class="form-control" placeholder="Search Topics" required="required">
				                                    </div>
				                                    <div class="pull-right">
				                                    <button id="searchBtn" class="btn btn-default" type="button"><i class="fa fa-search" disabled="disabled"></i></button></div>
				                                    <div class="clearfix"></div>
				                                </form>
				                            </div>
				                        </div>

				                        <script>
				                        	$('#searchBtn').on('click',function(){
				                        		var length = $('#searchBox').val().trim().length;
				                        		if(length > 0){
				                        			$('#searchForm').submit();
				                        		}
				                        	});
				                        </script>
			

										<div class="col-lg-4 col-xs-12 col-sm-6 col-md-4 avt">

												@if (Auth::guest())
													<div class="stnt pull-left">                            
													    <a href="{{ url('/login') }}" class="btn btn-primary" style="margin-right: 20px;">Login</a>
													</div>
													<div class="stnt pull-left">                            
													     <a href="{{ url('/register') }}" class="btn btn-primary">Register</a>
													</div>
												@else
																			                        
						                            <div class="stnt pull-left">  
						                            	{!!link_to('topic/create', $title = 'Start New Topic', $attributes = array('class'=>'btn btn-primary'), $secure = null)!!}
						                            </div>
						                            <div class="env pull-left avatar">
						                            	<a href="{{ url('profile/notifications/'.Auth::user()->id) }}"><i class="fa fa-envelope fa-lg"></i></a>
						                            	<div class="status red" style="text-align: center; right: 10px;font-size: 12px; width: 20px;height: 20px; color: white; top: 0;">{{$notificationsCount}}</div>
						                            </div>

						                            <div class="avatar pull-left dropdown">
						                                <a data-toggle="dropdown" href="#">{{ Html::image('/uploads/avatars/'.Auth::user()->avatar, 'a picture', array('style'=> 'width:37px')) }}</a> <b class="caret"></b>

														

						                                <div class="status green">&nbsp;</div>
						                                <ul class="dropdown-menu" role="menu">
																@if(Auth::user()->rol == 2)
																	<li role="presentation"><a role="menuitem" href="{{ url('/backoffice') }}">Dashboard</a></li>
																@endif
						                                	
						                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('/profile') }}">My Profile</a></li>
						                                    <li role="presentation">
						                                    	
						                                    	<a href="{{ url('/logout') }}"
						                                    	    onclick="event.preventDefault();
						                                    	             document.getElementById('logout-form').submit();">
						                                    	    Logout
						                                    	</a>

						                                    	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
						                                    	    {{ csrf_field() }}
						                                    	</form>

						                                    </li>
						                                </ul>
						                            </div>
						                            
						                            <div class="clearfix"></div>
				                        

										@endif

										</div>

				                    </div>
				                </div>
				            </div>

		





				 @yield('content')
					





		
			
				 <footer>
				 	<div class="container">
				 		<div class="row">
				 			<div class="col-lg-4 col-xs-12 col-sm-4 search ">
				 				<a href="#">
				 					<a href="{{ url('/') }}" style="text-decoration: none;"><span style="font-size: 25px;">
												<span>{<i style="color: #bdc3c7;">Project</i><b style="color: #444;"> FORUM</b>}</span>
				                        	</a>
				 				</a>
				 			</div>
				 			

				 			<div class="col-lg-5 col-xs-9 col-sm-5 ">Copyrights <?php echo date('Y'); ?>, websitename.com</div>
				 			<div class="col-lg-3 col-xs-12 col-sm-3 sociconcent">
				 				<ul class="socialicons">
				 					<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
				 					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				 					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				 					<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
				 					<li><a href="#"><i class="fa fa-cloud"></i></a></li>
				 					<li><a href="#"><i class="fa fa-rss"></i></a></li>
				 				</ul>
				 			</div>
				 		</div>
				 	</div>
				 </footer>

		</div>


</body>

</html>