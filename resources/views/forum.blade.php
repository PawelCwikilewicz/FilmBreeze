<x-layout>
    <x-slot:heading>
        Forum
    </x-slot:heading>
@auth
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
                    @if ($post->user->id == $active_user->id || $active_user->id == 1)
                    <div class="text-right" id="forumRemoveButton"><form action="{{ route('forum.remove') }}" method="POST">
                        @csrf
                        <input type="hidden" name="postId" value="{{ $post->id }}">
                        <button type="submit" class="remove-button classic-button" id="close-form-button-forum">Usuń</button>
                    </form> </div>
                    @endif
                </section>
                    @endforeach
            </main>
        </body>
        </html>
    </x-slot:forum>
    @endauth
    @guest
    <p> pls log in</p>
    @endguest
</x-layout>
