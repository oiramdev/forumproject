<div class="profile_img">
  <div id="crop-avatar">
    <!-- Current avatar -->
    {{ Html::image('/uploads/avatars/'.$user->avatar, 'a picture', array('class' => 'img-responsive avatar-view')) }}
  </div>
  <div><button id="openFormBtn" type="button" class="btn btn-success" style="margin:10px;"><i class="fa fa-edit"></i>Update Profile Image</button></div>
  <div class="x_panel" id="profileImageForm" style="display: none;">
    <div class="x_title">
      <h2>Profile Image </h2>
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
        <li><a id="closeForm"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    
    <div class="x_content">
        <form action="{{ url('/profile') }}" method="POST" enctype="multipart/form-data">
          <label for="">Update profile image</label>
          <input type="file", name="avatar" class="form-control">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="submit" class="pull-right btn btn-success" style="margin-top: 10px;">
        </form>
    </div>
  </div>

</div>

<script>
  $('#openFormBtn').on('click',function(){
    $(this).parent().css('display','none');
    $('#profileImageForm').css('display','inline-block');
  });
  $('#closeForm').on('click', function(){
    $('#profileImageForm').css('display','none');
    $('#openFormBtn').parent().css('display','block');
  });
</script>

