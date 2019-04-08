<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Styles -->


    </head>
    <body>
       <div class="container">
           <div class="row">
               <h1>Welcome to this App</h1>

           </div>
           <p>Register as a Regular user or register your company here to create a workspace for your workers</p>
           <div class="row">
               <div class="col-md-4">
                   <a href="{{ route('regularuser.create') }}" class="btn btn-primary" role="button" aria-pressed="true">Regular User</a>
               </div>
               <div class="col-md-4">
                   <a href="{{ url('register') }}" class="btn btn-danger" role="button" aria-pressed="true">Admin User</a>
               </div>
           </div>
       </div>
    </body>
</html>
