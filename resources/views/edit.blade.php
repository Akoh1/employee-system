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
      <form method="post" action="{{ route('home.update', Auth::user()->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">First Name:</label>
          <input type="text" class="form-control" name="name" value={{ Auth::user()->name }} />
        </div>
        <div class="form-group">
          <label for="price">Last Name :</label>
          <input type="text" class="form-control" name="last_name" value={{ Auth::user()->last_name }} />
        </div>
        <div class="form-group">
          <label for="quantity">Email:</label>
          <input type="text" class="form-control" name="email" value={{ Auth::user()->email }} disabled />
        </div>

        <div class="form-group">
          <label for="quantity">DOB:</label>
          <input type="date" class="form-control" name="dob" value={{ Auth::user()->dob }} />
        </div>

        <div class="form-group">
          <label for="quantity">Marital Status:</label>
          <select name="maritial_status">
            @if (Auth::user()->maritial_status == 'single')
              <option disabled>Single</option>
              <option value="married">Married</option>
              <option value="engaged">Engaged</option>
              <option value="divorced">Divorced</option>
            @elseif (Auth::user()->maritial_status == 'married')
              <option disabled>Married</option>
              <option value="single">Single</option>
              <option value="engaged">Engaged</option>
              <option value="divorced">Divorced</option>
            @elseif (Auth::user()->maritial_status == 'engaged')
              <option disabled>Engaged</option>
              <option value="single">Single</option>
              <option value="married">Married</option>
              <option value="divorced">Divorced</option>
            @elseif (Auth::user()->maritial_status == 'divorced')
              <option disabled>Divorced</option>
              <option value="single">Single</option>
              <option value="married">Married</option>
              <option value="engaged">Engaged</option>
            @endif
          </select>
        </div>

        <div class="form-group">
          <label for="quantity">Sex:</label>

            @if (Auth::user()->sex == 'Male')
              <p>Male</p>
            @elseif (Auth::user()->sex == 'Female')
              <p>Female</p>
            @endif

        </div>

        <div class="form-group">
          <label for="quantity">Active:</label>
          <select name="is_active" disabled>
            @if (Auth::user()->is_active == 0)
              <option>Not Activate</option>
            @elseif (Auth::user()->is_active == 1)
              <option >Active</option>
            @endif
          </select>

        </div>



        <div class="form-group">
          <label for="quantity">Date Joined:</label>
          <input type="date" class="form-control" name="date_joined" value={{ Auth::user()->date_joined }} disabled />
        </div>

        <div class="form-group">
          <label for="quantity">Position:</label>
          <input type="text" class="form-control" name="position" value={{ Auth::user()->position}} disabled />
        </div>

        <div class="form-group">
          <label for="quantity">Annual Salary:</label>
          <input type="text" class="form-control" name="annual_salary" value={{ Auth::user()->annual_salary }} disabled />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
