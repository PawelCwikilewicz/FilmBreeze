<x-layout>
    <x-slot:heading>
        Filmy i Seriale
    </x-slot:heading>
    <x-slot:movies>
        <h2 class="movie-header"> Filmy </h2>
        @for ($i = 0; $i < 3; $i++) <!-- WYJEBAĆ TEGO FORA-->
        @foreach($movies as $movie) <!-- CIEKAWA RZECZ BO JAK WYŚWIETLA SIE INNY FILM NIŻ HP np. TEST. to to gówno jest zupełnie inaczej osadzone na stronie -->
            <li id="movie-list">
                <strong>{{ $movie->title }}</strong><br>
                Description: {{ $movie->description }}<br>
                Release Date: {{ $movie->release_date }}<br>
                <img src="{{ $movie->imagePath }}" alt="{{ $movie->title }}">
            </li>
        @endforeach
    @endfor <!-- WYJEBAĆ TEGO FORA -->
    <li id="movie-list">
        <strong> MOVIEEEEEEEEEEEEEE A </strong><br>   <!--  DZIWNE BŁĘDY PRZY SKALOWANIU STRONY DO 175% -->
        Description: <br>
        Release Date: <br>
        <img src="/images/harryPotter3.jpg">
    </li>
    <li id="movie-list">
        <strong> Test </strong><br>   <!--  DZIWNE BŁĘDY PRZY SKALOWANIU STRONY DO 175% -->
        Description: <br>
        Release Date: <br>
        <img src="/images/harryPotter1.jpg">
    </li>
    <li id="movie-list">
        <strong> Test </strong><br>   <!--  DZIWNE BŁĘDY PRZY SKALOWANIU STRONY DO 175% -->
        Description: <br>
        Release Date: <br>
        <img src="/images/harryPotter1.jpg">
    </li>
    <li id="movie-list">
        <strong> test </strong><br>   <!--  DZIWNE BŁĘDY PRZY SKALOWANIU STRONY DO 175% -->
        Description: <br>
        Release Date: <br>
        <img src="/images/harryPotter1.jpg">
    </li>
    <li id="movie-list">
        <strong> ASGFasgsdg </strong><br>   <!--  DZIWNE BŁĘDY PRZY SKALOWANIU STRONY DO 175% -->
        Description: <br>
        Release Date: <br>
        <img src="/images/harryPotter1.jpg">
    </li>
    <li id="movie-list">
        <strong> Test </strong><br>   <!--  DZIWNE BŁĘDY PRZY SKALOWANIU STRONY DO 175% -->
        Description: <br>
        Release Date: <br>
        <img src="/images/harryPotter1.jpg">
    </li>
    <h2 class="movie-header"> Seriale </h2>
        @for ($i = 0; $i < 3; $i++) <!-- WYJEBAĆ TEGO FORA-->
        @foreach($movies as $movie) <!-- CIEKAWA RZECZ BO JAK WYŚWIETLA SIE INNY FILM NIŻ HP np. TEST. to to gówno jest zupełnie inaczej osadzone na stronie -->
            <li id="movie-list">
                <strong>{{ $movie->title }}</strong><br>
                Description: {{ $movie->description }}<br>
                Release Date: {{ $movie->release_date }}<br>
                <img src="{{ $movie->imagePath }}" alt="{{ $movie->title }}">
            </li>
        @endforeach
    @endfor <!-- WYJEBAĆ TEGO FORA -->
    <li id="movie-list">
        <strong> SERIEEEES A </strong><br>   <!--  DZIWNE BŁĘDY PRZY SKALOWANIU STRONY DO 175% -->
        Description: <br>
        Release Date: <br>
        <img src="/images/harryPotter3.jpg">
    </li>
    <li id="movie-list">
        <strong> Test </strong><br>   <!--  DZIWNE BŁĘDY PRZY SKALOWANIU STRONY DO 175% -->
        Description: <br>
        Release Date: <br>
        <img src="/images/harryPotter1.jpg">
    </li>
    </x-slot:movies>
</x-layout>
