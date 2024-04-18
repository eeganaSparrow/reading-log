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

    <form action="{{ route('readinglog.book.delete.deleteselect', ['display' => 'category', 'categoryId' => $oneCategory->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <p>
        {{ $oneCategory->category_name }}
        </p>
        @foreach($books as $book)
            <input type="checkbox" name="booksId[]" value="{{ $book->id }}" id="{{ $book->id }}">
            <label for="{{ $book->id }}">{{$book->tytle}}：{{$book->author}}</label> <br>
        @endforeach
        <button type="submit">削除</button>
    </form>
</body>
</html>