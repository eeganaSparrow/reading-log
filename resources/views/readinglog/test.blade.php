<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        @foreach($memos as $memo)
            {{$memo->content}} <br>
        @endforeach
        @foreach($books as $book)
            {{$book->title}} <br>
        @endforeach
    </pre>
</body>
</html>