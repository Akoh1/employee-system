@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                      @csrf
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('logout') }}
                              </button>
                          </div>
                      </div>
                  </form>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to the Admin page
                    @component('components.who')

                    @endcomponent
                    {{-- {{$admin}} --}}
                    {{-- {{ $admins }} --}}
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Last Name</th>
                          <th>email</th>
                          <th>Date of birth</th>
                          <th>sex</th>
                          <th>Marital Status</th>
                          <th>Date Joined</th>
                          <th>Position</th>
                          <th>Annual Salary</th>
                          <th>Is Active</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      {{-- @foreach ($admin as $id => $admin)

                      @endforeach
                      <tbody> --}}
                        @foreach ($test as $key => $value)
                          @if ($value->organization_id == $admins)
                            <tr>
                              <td>{{$value->name}}</td>
                              <td>{{$value->last_name}}</td>
                              <td>{{$value->email}}</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>
                                <a href="{{ route('admins.edit',$value->id)}}"  type="button" class="btn btn-info">Edit</a>
                              </td>
                              <td>
                                <a type="button" class="btn btn-danger">Delete</a>
                              </td>
                            </tr>

                          @endif

                        @endforeach
                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
