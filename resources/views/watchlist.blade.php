<x-layout>
    <x-slot:heading>
        Watchlist
    </x-slot:heading>

    @auth
    <x-slot:container1>
        <div class="container">
            @if($watchlistItems->isEmpty())
                <p>Twoja lista jest pusta.</p>
            @else
                @foreach ($watchlistItems as $item)
                    <div class="watchlist-item" data-movie-id="{{ $item->movie->id }}">
                        @if($item->movie->imagePath)
                            <img src="{{ asset($item->movie->imagePath) }}" alt="{{ $item->movie->title }}">
                        @else
                            <p>No image available</p>
                        @endif

                        <!-- Remove -->
                        <form action="{{ route('watchlist.remove') }}" method="POST" class="remove-form">
                            @csrf
                            <input type="hidden" name="movieId" value="{{ $item->movie->id }}">
                            <button type="submit" class="remove-button">Remove from Watchlist</button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </x-slot:container1>
    @endauth

    @guest
        <p>pls log in</p>
    @endguest
</x-layout>
