

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
  </button>
  <div class="ui-pnotify-icon"><span class="glyphicon glyphicon-ok-sign"></span></div>
  <h4 class="ui-pnotify-title">{{Session::get('success')}}</h4>
</div>
@endif



@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <div class="ui-pnotify-icon"><span class="glyphicon glyphicon-warning-sign"></span></div>
    <h4>{{Session::get('error')}}</h4>
  </div>
@endif