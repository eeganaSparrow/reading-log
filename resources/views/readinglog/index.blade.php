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
        @if ($category->category_name !== '未カテゴリー')
        <a href="{{ route('readinglog.category.index', ['categoryId' => $category->id]) }}">
        {{$category->category_name}} <br>
        </a>
        @endif
        @endforeach
        @foreach ($categories as $category)
        @if ($category->category_name === '未カテゴリー')
        <a href="{{ route('readinglog.category.index', ['categoryId' => $category->id]) }}">
        {{$category->category_name}} <br>
        </a>
        @endif
        @endforeach
        
    </p>
    <p>
        <a href="{{ route('readinglog.book.create.index') }}">
            <button>＋本の追加</button></a>
    </p>
    <p>
        <a href="{{ route('readinglog.book.delete.index', ['display' => 'home']) }}">
            <button>ー本の削除</button></a>
    </p>
    
    
    @foreach ($categories as $category)
    @if ($category->category_name !== '未カテゴリー')
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
    @endif
    @endforeach
    @foreach ($categories as $category)
    @if ($category->category_name === '未カテゴリー')
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
    @endif
    @endforeach
</body>
</html>