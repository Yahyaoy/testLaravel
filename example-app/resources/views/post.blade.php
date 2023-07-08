<x-layout>
    <article>
        <h1>
            <a>{{$post->title}}</a>
        </h1>
        <p>
           By <a href="/authors/{{$post->author->username}}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
        <p>
            {!! $post->body !!}
        </p>
    </article>

    <a href="/">Go Back</a>
</x-layout>
