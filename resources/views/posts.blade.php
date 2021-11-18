<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js"></script>
    <title>Larapio</title>
</head>
<body>
    <h1>Fernando <strong>Publicações</strong></h1>
    @foreach ($posts as $post)
        <article class="{{$loop->even ? 'impar' : 'par'}}">
            <h2>
                <a href="/posts/<?= $post->slug; ?>">
                    {{$post->title}}
                </a>
            </h2>
            <h5>{{$post->date}}</h5>
            <div>
                {!! $post->body !!}
            </div>
        </article>
    @endforeach
</body>
</html>