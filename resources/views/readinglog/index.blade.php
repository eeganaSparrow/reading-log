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
            {{$category->category_name}}
            </a>
            <a href="{{ route('readinglog.category.update.index', ['categoryId' => $category->id, 'display' => 'home']) }}">　　編集</a>
            <form style="display: inline-block;" action="{{ route('readinglog.category.delete', ['categoryId' => $category->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button>削除</button>
        </form>
        <br>
        @endif
        @endforeach
        @foreach ($categories as $category)
        @if ($category->category_name === '未カテゴリー')
        <a href="{{ route('readinglog.category.index', ['categoryId' => $category->id]) }}">
        {{$category->category_name}} <br>
        </a>
        @endif
        @endforeach
        
        <details>
            <summary>＋カテゴリーの追加</summary>
            <div>
                <form action="{{ route('readinglog.category.create')}}" method="post">
                    @csrf
                    <textarea name="category_name" type="text" placeholder="カテゴリー名"></textarea>
                    <button>追加</button>
                </form>
            </div>
        </details>
        
        
    </p>
    <p>
        <a href="{{ route('readinglog.book.create.index') }}">
            <button>＋本の追加</button></a>
    </p>
    <p>
        <a href="{{ route('readinglog.book.delete.index', ['display' => 'home']) }}">
            <button>ー本の削除</button></a>
    </p>
    <p>
        <form action="{{ route('readinglog.book.search') }}">
            @csrf
            <label for="search_str"></label>
            <textarea name="search_str" id="search_str" type="text" placeholder="タイトルや作家名を検索"></textarea>
            <button>検索</button>
        </form>
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