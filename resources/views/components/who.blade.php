@if(Auth::guard('web')->check())
  <p class="text-success">
    You are logged In as a <strong>User</strong>
  </p>
@else
  <p class="text-danger">
    You are logged out as a <strong>User</strong>
  </p>
@endif

@if(Auth::guard('regularuser')->check())
  <p class="text-success">
    You are logged In as a <strong>Admin</strong>
  </p>
@else
  <p class="text-danger">
    You are logged out as a <strong>Admin</strong>
  </p>
@endif
