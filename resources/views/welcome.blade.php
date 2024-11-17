<x-layout>
    <x-slot:heading>
        Rekomendacje
    </x-slot:heading>
    @auth
    @foreach ($movies as $movie)
    <h2>{{ $movie['title'] }} - {{ $movie['year'] }}</h2>
        @if ($movie['year']<2009)
            <p>Movie is old</p>
        @endif
        <hr>
    @endforeach
    
    @endauth
</x-layout>


