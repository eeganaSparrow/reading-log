<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading-Log</title>
</head>
<body>
    <h1>読書メモ</h1>
    <p>
        カテゴリー：
        @foreach ($categories as $category)
        {{$category->category_name}}、
        @endforeach
    </p>
    
    @foreach ($categories as $category)
    <p>
        {{$category->category_name}}
    </p>
        @foreach($books as $book)
            @if ($book->category_id === $category->id)
                <p>{{$book->tytle}}：{{$book->author}}</p>
            @endif
        @endforeach
    @endforeach
</body>
</html>