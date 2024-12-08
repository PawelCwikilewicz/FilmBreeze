<!DOCTYPE html>
<html lang="pl" class="h-full bg-gray-100">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale-1.0, maximum-scale=1.0,minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Home Page</title>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
		@vite('resources/css/app.css')
		@vite('resources/js/app.js')
	</head>
	<body class="">
		<div class="min-h-full">
			<nav style="background-color: #005b87; width:100%" class="fixed" >
				<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
					<div class="flex h-16 items-center justify-between">
						<div class="flex items-center">
							<div class="flex-shrink-0">
								<!-- NVM TO NIE REDIRECTUJE BO NIE XD -->
								<img class="h-16 w-16" src="/images/logo.jpg" alt="FilmBreeze">
							</div>
							<div class="hidden md:block transform">
								<div class="ml-10 flex items-baseline space-x-4">
									@auth
									<x-nav-link href="/movies" :active="request()->is('movies')">Filmy i Seriale</x-nav-link>
									<x-nav-link href="/watchlist" :active="request()->is('watchlist')">Watchlist</x-nav-link>
									<x-nav-link href="/forum" :active="request()->is('forum')">Forum</x-nav-link>
                                    <x-nav-link href="/reviews" :active="request()->is('reviews')">Polecane</x-nav-link>
									{{--
									<x-nav-link href="/" :active="request()->is('/')">{{Auth::user()->name}}</x-nav-link>
									<!-- Na potem do profilu, zwrócenie nazwy użytkownika itd. --> --}}
									@endauth
									@guest
									<x-nav-link href="/register" :active="request()->is('register')">Zarejestruj się</x-nav-link>
									<x-nav-link href="/login" :active="request()->is('login')">Zaloguj się</x-nav-link>
									@endguest
								</div>
							</div>
						</div>
						<div class="hidden md:block">
							@auth
							<div class="ml-4 flex items-center md:ml-6 transform scale-110">
								<form action="{{route('logout')}}" method="POST"> @csrf <button type="submit" class= "font-semibold border-solid border-2 border-black bg-black rounded-md px-3 py-1 text-white"> Logout </button> </form>
								<div class="ml-4 font-bold text-lg text-white"> {{Auth::user()->name}} </div>
							</div>
						</div>
						@endauth
						<div class="-mr-2 flex md:hidden">
							<!-- Mobile menu button -->
							<button type="button"
                                class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                aria-controls="mobile-menu" aria-expanded="false">
								<span class="absolute -inset-0.5"></span>
								<span class="sr-only">Open main menu</span>
								<!-- Menu open: "hidden", Menu closed: "block" -->
								<svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
								</svg>
								<!-- Menu open: "block", Menu closed: "hidden" -->
								<svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
									<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
								</svg>
							</button>
						</div>
					</div>
				</div>
				<!-- Mobile menu, show/hide based on menu state. -->
				@auth
				<div class="hidden md:hidden" id="mobile-menu">
					<div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
						<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
						<a href="/movies" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Filmy i Seriale</a>
						<a href="/watchlist" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Watchlist</a>
						<a href="/forum" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Forum</a>
                        <a href="/reviews" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Polecane</a>
                        <form action="{{route('logout')}}" method="POST"> @csrf <button type="submit" class= "font-semibold border-solid border-2 border-black bg-black rounded-md px-3 py-1 text-white"> Logout </button> </form>
					</div>
				</div>
				@endauth
		</div>
		</nav>
		@if (isset($heading))
		<header class="bg-white shadow">
			<div class="mx-auto max-w-7xl mt-16 px-4 py-6 sm:px-6 lg:px-8">
				<h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$heading}}</h1>
			</div>
		</header>
		@endif
		@if (!isset($heading))
		<header class="bg-transparent">
			<div class="mx-auto max-w-7xl mt-16 px-4 py-6 sm:px-6 lg:px-8">
			</div>
		</header>
		@endif
		<main>
			<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
				<!-- Your content -->
				@if (isset($forum))
				{{ $forum }}
				@endif
				@if (isset($container1))
				{{ $container1 }}
				@endif
				@if (isset($movies))
				{{ $movies }}
				@endif
				@if (isset($slot))
				{{ $slot }}
				@endif
				@if (isset($login))
				{{ $login }}
				@endif
			</div>
		</main>
		</div>
	</body>
</html>
