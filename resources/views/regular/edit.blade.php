@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header">
    Edit User
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('admins.update', $user->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value={{ $user->name }} />
        </div>
        <div class="form-group">
          <label for="price">Last Name :</label>
          <input type="text" class="form-control" name="last_name" value={{ $user->last_name }} />
        </div>
        <div class="form-group">
          <label for="quantity">Email:</label>
          <input type="text" class="form-control" name="email" value={{ $user->email }} />
        </div>
        <div class="form-group">
          <label for="quantity">Active:</label>
          <select name="is_active">
            @if ($user->is_active == 0)
              <option value="1">Activate</option>
            @elseif ($user->is_active == 1)
              <option value="0">Dectivate</option>
            @endif
          </select>
          
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
