@inject('appfunction', 'App\AppFunction')
@extends('layouts.backMaster')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
            
            <div class="row">
              
                  <div class="col-md-12">
                      
                        <div class="x_panel">
                          
                            <div class="x_title">
                                <h2>Dashboard</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                              
                                        
                                        <div class="">          
                                          <div class="row top_tiles">
                                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                              <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                                                <div class="count">{{ $allUsers }}</div>
                                                <h3>All Users</h3>
                                              </div>
                                            </div>
                                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                              <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-comments-o"></i></div>
                                                <div class="count">{{ $activeUsers }}</div>
                                                <h3>Active Users</h3>
                                              </div>
                                            </div>
                                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                              <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                                                <div class="count">{{ $guestUsers }}</div>
                                                <h3>Active Guests</h3>
                                              </div>
                                            </div>
                                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                              <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                                                <div class="count">{{$usersLastMonth}}</div>
                                                <h3>New Sign ups</h3>
                                              </div>
                                            </div>
                                          </div>




                                      <div class="row">

                                          <div class="x_title">
                                                  <h2>Users Statistics</h2>
                                                  <div class="clearfix"></div>
                                                </div>

                                          <div class="col-md-4 col-sm-12 col-xs-12">
                                              <div class="x_panel">
                                                <div class="x_title">
                                                  <h2>Top Users by Topics</h2>
                                                  <ul class="nav navbar-right panel_toolbox" style="min-width: 0;">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                  </ul>
                                                  <div class="clearfix"></div>
                                                </div>


                                                <div class="x_content">
                                                  <ul class="list-unstyled top_profiles scroll-view">
                                                   @foreach($top5UsersByTopics as $usersByTopic)
                                                   <li class="media event">
                                                    <a class="pull-left border-aero profile_thumb" style="padding: 0; overflow: hidden;">
                                                      {{ Html::image('/uploads/avatars/'.$appfunction->userInfo($usersByTopic->user_id)->avatar, 'a picture', array('style'=> 'width:50px')) }}
                                                    </a>
                                                    <div class="media-body">
                                                      <a class="title" href="#">{{$appfunction->userInfo($usersByTopic->user_id)->name}}</a>
                                                      <div class="count">{{$usersByTopic->count}} Topics</div>
                                                      <p> <small>Registered : {{$appfunction->userInfo($usersByTopic->user_id)->created_at}}</small>
                                                      </p>
                                                    </div>
                                                  </li>
                                                  @endforeach        
                                                </ul>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="col-md-4 col-sm-12 col-xs-12">
                                              <div class="x_panel">
                                                <div class="x_title">
                                                  <h2>Top Users by Replies</h2>
                                                  <ul class="nav navbar-right panel_toolbox" style="min-width: 0;">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                  </ul>
                                                  <div class="clearfix"></div>
                                                </div>


                                                <div class="x_content">
                                                  <ul class="list-unstyled top_profiles scroll-view">
                                                   @foreach($top5UsersByReplies as $usersByReply)
                                                   <li class="media event">
                                                    <a class="pull-left border-aero profile_thumb" style="padding: 0; overflow: hidden;">
                                                      {{ Html::image('/uploads/avatars/'.$appfunction->userInfo($usersByReply->user_id)->avatar, 'a picture', array('style'=> 'width:50px')) }}
                                                    </a>
                                                    <div class="media-body">
                                                      <a class="title" href="#">{{$appfunction->userInfo($usersByReply->user_id)->name}}</a>
                                                      <div class="count">{{$usersByReply->count}} Replies</div>
                                                      <p> <small>Registered : {{$appfunction->userInfo($usersByReply->user_id)->created_at}}</small>
                                                      </p>
                                                    </div>
                                                  </li>
                                                  @endforeach        
                                                </ul>
                                              </div>
                                            </div>
                                          </div>


                                          <div class="col-md-4 col-sm-12 col-xs-12">
                                              <div class="x_panel">
                                                <div class="x_title">
                                                  <h2>New Sign ups</h2>
                                                  <ul class="nav navbar-right panel_toolbox" style="min-width: 0;">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                  </ul>
                                                  <div class="clearfix"></div>
                                                </div>


                                                <div class="x_content">
                                                  <ul class="list-unstyled top_profiles scroll-view">
                                                   @foreach($lastestSignUps as $lastestSignUp)
                                                   <li class="media event">
                                                    <a class="pull-left border-aero profile_thumb" style="padding: 0; overflow: hidden;">
                                                      {{ Html::image('/uploads/avatars/'.$lastestSignUp->avatar, 'a picture', array('style'=> 'width:50px')) }}
                                                    </a>
                                                    <div class="media-body">
                                                      <a class="title" href="#">{{$lastestSignUp->name}}</a>
                                                      <div class="count"></div>
                                                      <p> <small>Registered : {{$lastestSignUp->created_at}}</small></p>
                                                      <p><small> {{$appfunction->diffData($lastestSignUp->created_at)}} </small></p>
                                                    </div>
                                                  </li>
                                                  @endforeach        
                                                </ul>
                                              </div>
                                            </div>
                                          </div>

                                    </div>


                                    <div class="row">

                                          <div class="x_title">
                                                  <h2>Topics Statistics</h2>
                                                  <div class="clearfix"></div>
                                                </div>


                                                  <div class="col-md-4">
                                                    <div class="x_panel">
                                                      <div class="x_title">
                                                        <h2>Top Categories by Topics</h2>
                                                        <ul class="nav navbar-right panel_toolbox" style="min-width: 0;">
                                                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                          </li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                      </div>
                                                      <div class="x_content">
                                                        @foreach($topCategoriasByTopics as $categoriaByTopic)
                                                            <?php $topicByCategoria = $appfunction->lastTopicByCategoria($categoriaByTopic->id); ?>
                                                            <article class="media event">
                                                              <a class="pull-left date">
                                                                <p class="day">{{$categoriaByTopic->qtTopics}}</p>
                                                                 <p class="month">Topics</p>
                                                              </a>
                                                              <div class="media-body">
                                                                <a class="title" href="#">{{$categoriaByTopic->name}}</a>
                                                                <p><b>Last Topic: </b><a href="{{ ($topicByCategoria) ? url('topic/'.$topicByCategoria->id) : '' }}">{{ ($topicByCategoria) ? $topicByCategoria->name : 'There no topics' }}</a></p>
                                                              </div>
                                                            </article>
                                                        @endforeach
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="col-md-4">
                                                    <div class="x_panel">
                                                      <div class="x_title">
                                                        <h2>Top Subcategories by Topics</h2>
                                                        <ul class="nav navbar-right panel_toolbox" style="min-width: 0;">
                                                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                          </li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                      </div>
                                                      <div class="x_content">
                                                        @foreach($topSubcategoriasByTopics as $subcategoriaByTopipc)
                                                            <?php $topicBySubcategoria = $appfunction->lastTopicBySubcategoria($subcategoriaByTopipc->id); ?>
                                                            <article class="media event">
                                                              <a class="pull-left date">
                                                                <p class="day">{{ $subcategoriaByTopipc->qtTopics }}</p>
                                                                <p class="month">Topics</p>
                                                              </a>
                                                              <div class="media-body">
                                                                <a class="title" href="#">{{ $subcategoriaByTopipc->name }}</a>
                                                                <p><b>Last Topic: </b><a href="{{ ($topicBySubcategoria) ? url('topic/'.$topicBySubcategoria->id) : '' }}">{{ ($topicBySubcategoria) ? $topicBySubcategoria->name : 'There no topics' }}</a></p>
                                                              </div>
                                                            </article>
                                                        @endforeach
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="col-md-4">
                                                    <div class="x_panel">
                                                      <div class="x_title">
                                                        <h2>Top Topics by Views</h2>
                                                        <ul class="nav navbar-right panel_toolbox" style="min-width: 0;">
                                                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                          </li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                      </div>
                                                      <div class="x_content" style="display: block;">
                                                        @foreach($topTopicsByViews as $topicbyView)
                                                            <article class="media event">
                                                              <a class="pull-left date">
                                                                <p class="day">{{$topicbyView->qtViews}}</p>
                                                                <p class="month">Views</p>
                                                              </a>
                                                              <div class="media-body">
                                                                <a class="title" href="#">{{$topicbyView->name}}</a>
                                                                <p><b>Posted by: </b>{{$topicbyView->user->name}}</p>
                                                                <p><b> Posted on: </b><small>{{$topicbyView->created_at}}</small></p>
                                                              </div>
                                                            </article>
                                                        @endforeach
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
        <!-- /page content -->


@endsection