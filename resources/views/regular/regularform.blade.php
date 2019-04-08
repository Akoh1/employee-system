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
               <h1>Sign up to your workplace</h1>
           </div>
           @if ($errors->any())
     <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
           @endforeach
       </ul>
     </div><br />
   @endif
           <div class="row">
               <form method="post" action="{{ route('regularuser.store') }}" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group">
                   <label for="exampleInputEmail1">name</label>
                   <input name="name" type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter name">
                   <small id="nameHelp" class="form-text text-muted"></small>
                 </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Organization</label>
                    <input name="organization" type="text" class="form-control" id="organization" aria-describedby="emailHelp" placeholder="Enter company">

                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Password">
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
           </div>
       </div>
    </body>
</html>
