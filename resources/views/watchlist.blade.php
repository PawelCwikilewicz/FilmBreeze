<x-layout>
    <x-slot:heading>
        Watchlist
    </x-slot:heading>
    @auth
    <x-slot:container1>
    <div class="container">
        <img src="/images/harryPotter1.jpg">
        <img src="/images/harryPotter2.jpg">
        <img src="/images/harryPotter3.jpg">
        <img src="/images/harryPotter1.jpg">
        <img src="/images/harryPotter2.jpg">
        <img src="/images/harryPotter3.jpg">
        <img src="/images/harryPotter1.jpg">
        <img src="/images/harryPotter2.jpg">
    </div>
</x-slot:container1>
@endauth
@guest
<p> pls log in</p>
@endguest
</x-layout>

