<x-layout>
    <x-slot:heading>
        Forum
    </x-slot:heading>
    <x-slot:forum>
        <body>
            <main>
                @include('components.forumAddForm',['movies' => $movies])
                    @foreach ($forum_posts as $post)
                    <section class="post">
                    <div class="post-image">
                        <img src={{$post->movie->imagePath}}>
                    </div>
                    <div class="post-content">
                        <h1>{{$post->user->name}}</h1>
                        <h2><b>{{$post->movie->title}}</b></h2>
                        <p>{{$post->content}}</p>
                    </div>
                </section>
                    @endforeach
            </main>
        </body>
        </html>
    </x-slot:forum>
</x-layout>