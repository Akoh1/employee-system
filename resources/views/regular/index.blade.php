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

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Last Name</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($test as $key => $value)
                          <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->last_name}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
