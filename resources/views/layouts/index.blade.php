<!DOCTYPE html>
<html lang='en'>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Employee Management System</title>
	<!-- Don't forget to add your metadata here -->
	{{-- <link rel='stylesheet' href="{{ asset('css/style.min.css') }}" /> --}}
	<link href="css/style.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- Hero(extended) navbar -->
	<div class="navbar navbar--extended">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="{{ url('/') }}" class="navbar__logo">EMPOSYS</a>
				<nav class="navbar__menu">
					<ul>
						<li><a href="{{ route('admin.logout') }}">Logout</a></li>
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>
	<!-- Hero unit -->

  <main>
      @yield('content')
  </main>
	<!-- Footer -->
	<div class="footer footer--dark">
		<div class="container">
			<div class="footer__inner">
				<a href="index.html" class="footer__textLogo">Evie theme</a>
				<div class="footer__data">
					<div class="footer__data__item">
						{{-- <div class="footer__row">
							Created by <a href="https://twitter.com/ninalimpi" target="_blank" class="footer__link">Katerina Limpitsouni</a>
						</div>
						<div class="footer__row">
						Code/design by <a href="https://twitter.com/anges244" target="_blank" class="footer__link">Aggelos Gesoulis</a>
						</div>
					</div> --}}
					<div class="footer__data__item">
						<div class="footer__row">My <a href="https://www.linkedin.com/in/samuel-akoh-ab4576148/" target="_blank" class="footer__link">linkedin Profile</a>
						</div>
					</div>
					<div class="footer__data__item">
					<div class="footer__row">
						<a href="https://github.com/Akoh1/employee-system" target="_blank" class="footer__link">GitHub</a>
					</div>
					<div class="footer__row">
						<a href="https://twitter.com/undraw_co" target="_blank" class="footer__link">Twitter</a>
					</div>
					{{-- <div class="footer__row">
						<a href="https://www.facebook.com/undraw.co/" target="_blank" class="footer__link">Facebook</a>
					</div> --}}
					<div class="footer__row">
						<a href="./additional.html" class="footer__link">MIT license</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src='js/app.min.js'></script>
</body>
</html>
