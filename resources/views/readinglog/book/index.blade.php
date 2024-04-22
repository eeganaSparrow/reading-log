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
        <a href="{{ route('readinglog.category.update.index', ['categoryId' => $category->id, 'bookId' => $book->id, 'display' => 'memo']) }}">　　編集</a>
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
        <img src="{{ asset('storage/images/'. $book->picture_name) }}" alt="{{ $book->picture_name }}">
        {{ $book->title }}：{{ $book->author }}
    </p>
    <p>
        <a href="{{ route('readinglog.book.update.index', ['bookId' => $book->id]) }}">
            <button>本情報の編集</button></a>
    </p>
    <p>
        <form action="{{ route('readinglog.book.delete.delete', ['bookId' => $book->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button>本情報の削除</button>
        </form>
    </p>
    <p>
        <form action="{{ route('readinglog.memo.search', ['bookId' => $book->id]) }}">
            @csrf
            <label for="search_str"></label>
            <textarea name="search_str" id="search_str" type="text" placeholder="メモを検索"></textarea>
            <button>検索</button>
        </form>
    </p>
    <p>
    @foreach ($memos as $memo)
        p.<a href="{{ route('readinglog.memo.update_page_num.index', ['memoId' => $memo->id, 'bookId' => $book->id])}}">{{ $memo->page_number }}</a>：
        <a href="{{ route('readinglog.memo.update_content.index', ['memoId' => $memo->id, 'bookId' => $book->id])}}">{!! nl2br(e($memo->content)) !!}</a> <br>
        <form action="{{ route('readinglog.memo.delete', ['memoId' => $memo->id, 'bookId' => $book->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button>
        </form>
    @endforeach
    </p>
    <form action="{{ route('readinglog.memo.create', ['bookId' => $book->id]) }}" method="post">
        @csrf
        p.<input name="page_number" type="number" min="0" max="3000" value="0">
        @error('page_number')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <textarea name="content" type="text" placeholder="メモの追加" ></textarea>
        @error('content')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        <button>追加</button>
    </form>
    
</body>
</html>