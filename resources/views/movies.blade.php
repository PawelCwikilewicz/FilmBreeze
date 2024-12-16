<x-layout>
    <x-slot:heading>
        Filmy i Seriale
    </x-slot:heading>
@auth
    <x-slot:movies>
        @include('components.movieInfoForm')
        <!-- FILMY -->
        <h2 class="movie-header" id="hideMovies">Filmy</h2>
        <div class="movie-list" id="MoviesList">
        @foreach($movies as $movie)
        @if ($movie->isMovie==1)
        <li id="movie-list" class="movie-item" data-title="{{ $movie->title }}" data-movie-id="{{ $movie->id }}" data-description="{{ $movie->description }}">
            <img src="{{ $movie->imagePath }}" alt="{{ $movie->title }}">
        </li>
        @endif
        @endforeach
    </div>
    <!-- SERIALE -->
    <h2 class="movie-header" id="hideSeries"> Seriale </h2>
    <div class="movie-list" id="SeriesList">
        @foreach($movies as $movie)
        @if ($movie->isMovie==0)
        <li id="movie-list" class="movie-item" data-title="{{ $movie->title }}" data-movie-id="{{ $movie->id }}" data-description="{{ $movie->description }}">
            <img src="{{ $movie->imagePath }}" alt="{{ $movie->title }}">
        </li>
        @endif
        @endforeach
    </div>
    <script>
        document.getElementById("hideMovies").addEventListener('click', function() {
        const movieList = document.getElementById('MoviesList');
        console.log(movieList.style.display);
        if(movieList.style.display == "none") {
            movieList.style.display = "flex";
        } else {
           movieList.style.display = "none";
        }
    });
        document.getElementById("hideSeries").addEventListener('click', function() {
        const movieList = document.getElementById('SeriesList');
        console.log(movieList.style.display);
        if(movieList.style.display == "none") {
            movieList.style.display = "flex";
        } else {
            movieList.style.display = "none";
        }
    });
    </script>
    </x-slot:movies>
    @endauth
    @guest
    <p> pls log in</p>
@endguest
</x-layout>
