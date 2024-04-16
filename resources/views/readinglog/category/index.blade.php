<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading-Log</title>
</head>
<body>
    <a href="{{ route('readinglog.index') }}">
    <h1>読書メモ</h1>
    </a>
    <p>
        カテゴリー<br>
        @foreach ($categories as $category)
        <a href="{{ route('readinglog.category.index', ['categoryId' => $category->id]) }}">
        {{$category->category_name}} <br>
        </a>
        @endforeach
    </p>
    
    <p>
    {{ $oneCategory->category_name }}
    </p>
    @foreach($books as $book)
        <a href="{{ route('readinglog.book.index', ['bookId' => $book->id]) }}">
        {{$book->tytle}}：{{$book->author}} <br>
        </a>
    @endforeach
    
</body>
</html>