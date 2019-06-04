@extends('layouts.app')

@section('content')
<div class="container">
  @if (Auth::user()->is_active == 1)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to the User page
                    @component('components.who')

                    @endcomponent


                      <div class="container" style="border: 1px solid green">
                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Passport</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Functionality to be implemented soon</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>First Name</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>{{Auth::user()->name}}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Last Name</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>{{Auth::user()->last_name}}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Email</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>{{Auth::user()->email}}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Date of Birth</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>{{Auth::user()->dob}}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Sex</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>{{Auth::user()->sex}}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Marital Status</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>{{Auth::user()->maritial_status}}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Date Joined</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>{{Auth::user()->date_joined}}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Position</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>{{Auth::user()->position}}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Annual Salary</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>{{Auth::user()->annual_salary}}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6" style="border: 1px solid green">
                            <p>Is Active</p>
                          </div>
                          <div class="col-md-6" style="border: 1px solid green">
                            @if (Auth::user()->is_active == 0)
                              <p>Not Active</p>
                            @else
                              <p>Active</p>
                            @endif

                          </div>
                        </div>

                      </div>
                      <br><br>
                      <a href="{{ route('home.edit', $user->id)}}" type="button" class="btn btn-success">Update Record</a>
                      <br><br>


                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card-header">Chat</div>
        <div class="card-body" id="app">
        <chat-app :user="{{auth()->user()}}"></chat-app>
        </div>  
      </div>
    </div>
</div>
@else
  <p>You are not active member of this workspace</p>
@endif
@endsection
