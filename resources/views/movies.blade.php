<x-layout>
    <x-slot:heading>
        Filmy i Seriale
    </x-slot:heading>
@auth
    <x-slot:movies>
        @include('components.movieInfoForm')
        <!-- FILMY -->
        <h2 class="movie-header"> Filmy </h2>
        <div class="movie-list">
        @foreach($movies as $movie)
            <li id="movie-list" class="movie-item" data-title="{{ $movie->title }}" data-movie-id="{{ $movie->id }}" data-description="{{ $movie->description }}">
                <img src="{{ $movie->imagePath }}" alt="{{ $movie->title }}">
            </li>
        @endforeach
    </div>
    <!-- SERIALE -->
    <h2 class="movie-header"> Seriale </h2>
    <div class="movie-list">
        @foreach($series as $serie)
            <li id="movie-list" class="movie-item" data-title="{{ $serie->title }}" data-movie-id="{{ $serie->id }}" data-description="{{ $serie->description }}">
                <img src="{{ $serie->imagePath }}" alt="{{ $serie->title }}">
            </li>
        @endforeach
    </div>
    </x-slot:movies>
    @endauth
    @guest
    <p> pls log in</p>
@endguest
</x-layout>
