<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        
    <form method="POST" action="{{ route('posts.update', $posts->id) }}"   >
        {{ method_field('PATCH') }}
        @csrf
        <input type="text" name="title" value="{{$posts->title}}">
        <input type="text" value="{{$posts->title}}">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>