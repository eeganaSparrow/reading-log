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
    
    <form action="{{ route('readinglog.book.delete.deleteselect', ['display' => 'home']) }}" method="post">
        @csrf
        @method('DELETE')

        @foreach ($categories as $category)
        @if ($category->category_name !== '未カテゴリー')
        <p>
            {{$category->category_name}}
        </p>
            @foreach($books as $book)
                @if ($book->category_id === $category->id)
                    <input type="checkbox" name="booksId[]" value="{{ $book->id }}" id="{{ $book->id }}">
                    <label for="{{ $book->id }}">{{$book->tytle}}：{{$book->author}}</label> <br>
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
                <input type="checkbox" name="booksId[]" value="{{ $book->id }}" id="{{ $book->id }}">
                <label for="{{ $book->id }}">{{$book->tytle}}：{{$book->author}}</label> <br>
                @endif
            @endforeach
        @endif
        @endforeach
        <button type="submit">削除</button>
    </form>
</body>
</html>