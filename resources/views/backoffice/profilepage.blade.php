@inject('appfunction', 'App\AppFunction')
@extends('layouts.backMaster')

@section('content')

<div class="right_col" role="main" style="min-height: 1239.33px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profile Page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Profile</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">


                      @include('backoffice.userAvatar')


                      <h3>{{ $user->name }}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $user->address }}
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> {{ $user->ocupation }}
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="{{ $user->url }}" target="_blank">{{ $user->url }}</a>
                        </li>
                      </ul>

                      <div class=""><a id="userBtnForm" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a></div>
                      <br>
                      

                      <div class="x_panel" id="userProfileForm" style="display: none;">
                        <div class="x_title">
                          <h2>Profile</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li style="visibility: hidden;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown" style="visibility: hidden;">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                              </ul>
                            </li>
                            <li><a id="closeUserForm"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        
                        <div class="x_content">
                            {!!Form::open(array('url' => 'profile/updateProfile', 'method' => 'PUT'));!!}
                                  <div class="form-group">
                                      <label class="control-label" for="first-name">Name: 
                                          <span class="required">*</span>
                                      </label>
                                      <div class="">
                                          {{ Form::text('name',$user->name, array('class' => 'form-control col-md-7 col-xs-12', 'required')) }}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label" for="first-name">Address: 
                                          <span class="required">*</span>
                                      </label>
                                      <div class="">
                                          {{ Form::text('address',$user->address, array('class' => 'form-control col-md-7 col-xs-12', 'required')) }}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label" for="first-name">Ocupation: 
                                          <span class="required">*</span>
                                      </label>
                                      <div class="">
                                          {{ Form::text('ocupation',$user->ocupation, array('class' => 'form-control col-md-7 col-xs-12', 'required')) }}
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label" for="first-name">Web: 
                                          <span class="required">*</span>
                                      </label>
                                      <div class="">
                                          {{ Form::text('url',$user->url, array('class' => 'form-control col-md-7 col-xs-12', 'required')) }}
                                      </div>
                                  </div>
                                  {!!Form::submit('Submit',['class'=>'pull-right btn btn-success', 'style' => 'margin-top: 10px'])!!}
                            {!!Form::close()!!}
                        </div>
                      </div>
                      <script>
                        $('#userBtnForm').on('click',function(){
                          $(this).parent().css('display','none');
                          $('#userProfileForm').css('display','inline-block');
                        });
                        $('#closeUserForm').on('click', function(){
                          $('#userProfileForm').css('display','none');
                          $('#userBtnForm').parent().css('display','block');
                        });
                      </script>



                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Notifications</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Recent Topics</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Recent Replies</a>
                          </li>
                        </ul>


                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                              @foreach($notifications as $notification)
                                <li>
                                  {{ Html::image('/uploads/avatars/'.$notification->user->avatar, 'a picture', array('class' => 'img-responsive avatar-view avatar')) }}
                                  <div class="message_date">
                                    <h3 class="date text-info">{{ $appfunction->dayByCarbon($notification->created_at) }}</h3>
                                    <p class="month">{{ $appfunction->monthByCarbon($notification->created_at) }}</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">{{ $notification->topico->name }}</h4>
                                    <blockquote class="message"><a href="{{ url('topic/'.$notification->topico->id.'#'.$notification->message->id) }}">{{ $notification->message->body }}</a></blockquote>
                                    <br>
                                    <p class="url">
                                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                      <a href="#"><i class="fa fa-user"></i> {{ $notification->user->name }} </a>
                                    </p>
                                  </div>
                                </li>
                              @endforeach
                            </ul>
                            <!-- end recent activity -->

                          </div>

                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start recent activity -->
                            <ul class="messages">
                              @foreach($topics as $topic)
                                <li>
                                  {{ Html::image('/uploads/avatars/'.$topic->user->avatar, 'a picture', array('class' => 'img-responsive avatar-view avatar')) }}
                                  <div class="message_date">
                                    <h3 class="date text-info">{{ $appfunction->dayByCarbon($topic->created_at) }}</h3>
                                    <p class="month">{{ $appfunction->monthByCarbon($topic->created_at) }}</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">{{ $topic->name }}</h4>
                                    <blockquote><a href="{{ url('topic/'.$topic->id) }}">{{ str_limit($topic->body,150) }}</a></blockquote>
                                    <br>
                                    <p class="url">
                                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                      <span style="border: 1px solid #E4E4E4; border-radius: 5px; padding: 10px; margin-right: 20px;"><i class="fa fa-eye"></i>  {{ $topic->qtViews }} Views</span>   <span style="border: 1px solid #E4E4E4; border-radius: 5px; padding: 10px;"><i class="fa fa-comments" aria-hidden="true"></i>  {{ $topic->qtMessages }} Replies</span>
                                    </p>
                                  </div>
                                </li>
                              @endforeach
                            </ul>
                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <!-- start recent activity -->
                            <ul class="messages">
                              @foreach($messages as $message)
                                <li>
                                  {{ Html::image('/uploads/avatars/'.$message->user->avatar, 'a picture', array('class' => 'img-responsive avatar-view avatar')) }}
                                  <div class="message_date">
                                    <h3 class="date text-info">{{ $appfunction->dayByCarbon($message->created_at) }}</h3>
                                    <p class="month">{{ $appfunction->monthByCarbon($message->created_at) }}</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">{{ $message->topico->name }}</h4>
                                    <blockquote class="message"><a href="{{ url('topic/'.$message->topico->id.'#'.$message->id) }}">{{ $message->body }}</a></blockquote>
                                    <br>
                                    <p class="url">
                                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                      <a href="#"><i class="fa fa-user"></i> {{ $message->user->name }} </a>
                                    </p>
                                  </div>
                                </li>
                              @endforeach
                            </ul>
                            <!-- end recent activity -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection