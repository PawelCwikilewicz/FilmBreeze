<x-layout>
    <x-slot:heading>
        Top 10 pozycji
    </x-slot:heading>
    @auth
        <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
        <!-- TOP 10 -->
        <body>
            <div class="ratings">
                @foreach($ratings as $rating)
             <div class="rating">
                <img src={{$rating['imagePath']}}>
                    <h2>{{$rating['title']}}</h2>
                    <p>SCORE: {{$rating['avg_score']}}</p>
             </div>
                @endforeach
            </div>
        </body>
    @endauth
    @guest
    <p> pls log in</p>
    @endguest
</x-layout>

