<x-layout>
    <x-slot:heading>
        Rekomendacje
    </x-slot:heading>
    @auth
    zalogowales sie
@endauth
@guest
<p> pls log in</p>
@endguest
</x-layout>