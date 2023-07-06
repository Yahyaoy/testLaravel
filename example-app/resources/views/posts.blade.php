<x-layout>
    @foreach($posts as $post)
        <article class="{{$loop->even ? 'even' : 'odd'}}">
            <h1>
                <a href="posts/{{$post->slug}}">
                    {{$post->title}}
                </a>
            </h1>
            <p>
                <a href="#">{{ $post->category->name }}</a>
            </p>
            <div>
                {!!  $post->body  !!}
            </div>
        </article>
    @endforeach
</x-layout>
