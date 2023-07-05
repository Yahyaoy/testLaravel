<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/app.css">

    <title>My Blog!</title>
</head>
<body>
<?php foreach ($posts as $post) :?>
    <article>
        <?= $post;?>
    </article>
<?php endforeach; ?>
{{--<article>--}}
{{--    <h1>--}}
{{--        <a href="/posts/my-first-post">My First Post</a>--}}
{{--    </h1>--}}
{{--    <p>--}}
{{--        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto consectetur dolore doloremque eius eligendi, eos ex in mollitia non odit, officiis quisquam unde vel voluptatibus! Cupiditate nemo recusandae voluptates.--}}
{{--    </p>--}}
{{--</article>--}}

</body>
