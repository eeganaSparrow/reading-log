<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    {{$word}}
    <br>
    @foreach ($books as $book)
    {{$book->tytle}}:{{$book->author}}
    @endforeach
</body>
</html>