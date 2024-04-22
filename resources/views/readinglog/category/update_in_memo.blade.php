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
            @if ($category->id === $updateCategoryId)
                <form action="{{ route('readinglog.category.update.put', ['categoryId' => $category->id, 'bookId' => $book->id, 'display' => 'memo'])}}" method="post">
                    @csrf
                    @method('PUT')
                    <textarea name="category_name" type="text">{{ $category->category_name }}</textarea>
                    @error('category_name')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <button>編集</button>
                </form>
            @else
                <a href="{{ route('readinglog.category.index', ['categoryId' => $category->id]) }}">
                {{$category->category_name}}
                </a>
                <a href="{{ route('readinglog.category.update.index', ['categoryId' => $category->id, 'bookId' => $book->id, 'display' => 'memo']) }}">　　編集</a><br>
            @endif
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
                    @error('category_name')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <button>追加</button>
                </form>
            </div>
        </details>
    </p>
    <p>
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
    @foreach ($memos as $memo)
        {{ $memo->page_number }}：{{ $memo->content }} <br>
    @endforeach
    </p>
    
</body>
</html>