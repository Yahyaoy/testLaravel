<x-layout>
    <article>
        <h1>
            <a>{{$post->title}}</a>
        </h1>
        <p>
            <a href="#">{{ $post->category->name }}</a>
        </p>
        <p>
            {!! $post->body !!}
        </p>
    </article>

    <a href="/">Go Back</a>
</x-layout>
