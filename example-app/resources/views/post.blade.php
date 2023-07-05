<x-layout>
    <article>
        <h1>
            <a>{{$post->title}}</a>
        </h1>
        <p>
            {!! $post->body !!}
        </p>
    </article>

    <a href="/">Go Back</a>
</x-layout>
