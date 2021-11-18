<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js"></script>
</head>
<body>
    <h1>Fernando  <strong>Publicações</strong></h1>
    <article>
        <h2>
            {{ $post->title }}
        </h2>
        <div>
            {!! $post->body !!}
        </div>
    </article>
    <a href="/">Voltar</a>
</body>
</html>