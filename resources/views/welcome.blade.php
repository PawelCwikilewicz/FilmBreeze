<x-layout>
    <x-slot:heading>
        Rekomendacje
    </x-slot:heading>
    <h1>WELCOME</h1>
</x-layout>


@foreach ($movies as $movie)
<h2>{{ $movie['title'] }} - {{ $movie['year'] }}</h2>
    @if ($movie['year']<2009)
        <p>Movie is old</p>
    @endif
    <hr>
@endforeach

