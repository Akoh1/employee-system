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
          <input type="text" class="form-control" name="email" value={{ $user->email }} disabled />
        </div>

        <div class="form-group">
          <label for="quantity">Sex:</label>

            @if ($user->sex == 'Male')
              <p>Male</p>
            @elseif ($user->sex == 'Female')
              <p>Female</p>
            @endif

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

        <div class="form-group">
          <label for="quantity">DOB:</label>
          <input type="date" class="form-control" name="dob" value={{ $user->dob }} />
        </div>

        <div class="form-group">
          <label for="quantity">Marital Status:</label>
          <select name="maritial_status">
            @if ($user->maritial_status == 'single')
              <option value="married">Married</option>
              <option value="engaged">Engaged</option>
              <option value="divorced">Divorced</option>
            @elseif ($user->maritial_status == 'married')
              <option value="single">Single</option>
              <option value="engaged">Engaged</option>
              <option value="divorced">Divorced</option>
            @elseif ($user->maritial_status == 'engaged')
              <option value="single">Single</option>
              <option value="married">Married</option>
              <option value="divorced">Divorced</option>
            @elseif ($user->maritial_status == 'divorced')
              <option value="single">Single</option>
              <option value="married">Married</option>
              <option value="engaged">Engaged</option>
            @endif
          </select>
        </div>

        <div class="form-group">
          <label for="quantity">Date Joined:</label>
          <input type="date" class="form-control" name="date_joined" value={{ $user->date_joined }} />
        </div>

        <div class="form-group">
          <label for="quantity">Position:</label>
          <input type="text" class="form-control" name="position" value={{ $user->position}} />
        </div>

        <div class="form-group">
          <label for="quantity">Annual Salary:</label>
          <input type="text" class="form-control" name="annual_salary" value={{ $user->annual_salary }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
