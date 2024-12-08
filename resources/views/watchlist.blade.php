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
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                @foreach ($watchlistItems as $item)
                      <div class="swiper-slide" data-movie-id="{{ $item->movie->id }}">@if($item->movie->imagePath)
                        <img src="{{ asset($item->movie->imagePath) }}" alt="{{ $item->movie->title }}">
                    @else<p>No image available</p>
                    @endif<!-- Remove -->
                    <form action="{{ route('watchlist.remove') }}" method="POST" class="remove-form">
                        <p class="font-bold justify-center">{{$item->movie->title}}</p>
                        <br>
                        <p id="movie-description" class="text-justify ml-1 mr-1 text-base">{{$item->movie->description}}</p>
                        <br>
                        @csrf
                        <input type="hidden" name="movieId" value="{{ $item->movie->id }}">
                        <button type="submit" class="remove-button classic-button" id="close-form-button-forum">Usuń</button>
                    </form></div>
                
                    
                    {{-- <div class="watchlist-item" data-movie-id="{{ $item->movie->id }}">
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
                    </div> --}}
                @endforeach
            </div>
            
          </div>
          
          <div class="swiper-pagination"></div>
            @endif
        </div>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
              pagination: {
                el: ".swiper-pagination",
              },
            });
          </script>
    </x-slot:container1>
    @endauth

    @guest
        <p>pls log in</p>
    @endguest
</x-layout>
