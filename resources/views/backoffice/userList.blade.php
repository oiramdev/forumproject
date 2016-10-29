@inject('appfunction', 'App\AppFunction')
@extends('layouts.backMaster')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Users</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Avatar</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Update Status</th>
                      <th>Last Activity</th>
                      <th>Last IP Address</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            
                            <tr>
                              <td>{{ Html::image('/uploads/avatars/'.$user->avatar, 'a picture', array('style'=> 'width:50px')) }}</td>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $appfunction->userRole($user->rol) }}</td>
                              <td>{{ ($user->status == 1) ? 'Active' : 'Suspended' }}</td>
                              <td>
                                  <form action="{{ url('backoffice/updateUserStatus') }}" class="form newtopic">
                                  <select name="updateUserStatus" class="form-control" onchange="this.form.submit();">
                                    <option value="" disabled="" selected="">Select option</option>
                                    @if($user->status == 1)
                                      <option value="0">Suspend</option>
                                    @else
                                      <option value="1">Active</option>
                                    @endif
                                  </select>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                                  </form>
                              </td>
                              <td>{{ $appfunction->userLastActivity($user->id) }}</td>
                              <td>{{ $appfunction->userLastIpAddress($user->id) }}</td>
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
<!-- End page content -->

@endsection