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
        カテゴリー<br>
        @foreach ($categories as $category)
        <a href="{{ route('readinglog.category.index', ['categoryId' => $category->id]) }}">
        {{$category->category_name}} <br>
        </a>
        @endforeach
    </p>
    
    @foreach ($categories as $category)
    <p>
        {{$category->category_name}}
    </p>
        @foreach($books as $book)
            @if ($book->category_id === $category->id)
                <a href="{{ route('readinglog.book.index', ['bookId' => $book->id]) }}">
                {{$book->tytle}}：{{$book->author}} <br>
                </a>
            @endif
        @endforeach
    @endforeach
</body>
</html>