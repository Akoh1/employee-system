@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                    @if (Auth::user()->is_active == 1)
                      <p>You are active</p>
                    @else
                      <p>You are not active</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
