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
    <button onClick="history.back();">戻る</button>
    <form action="{{ route('readinglog.book.update.put', ['bookId' => $book->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="todo-content"><h2>本情報の編集</h2></label><br>
        画像の追加：<input type="file" name="picture_name" id="book-info">
        <img src="{{ asset('storage/images/'. $book->picture_name) }}" alt="{{ $book->picture_name }}">
        <br>
        @error('picture_name')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        タイトル：<textarea name="title" id="book-info" type="text" placeholder="タイトルを入力">{{ $book->title }}</textarea><br>
        @error('title')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        作者：<textarea name="author" id="book-info" type="text" placeholder="作者名を入力">{{ $book->author }}</textarea><br>
        @error('author')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        出版社：<textarea name="publisher" id="book-info" type="text" placeholder="出版社名を入力">{{ $book->publisher }}</textarea><br>
        @error('publisher')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        出版年：<input name="publication_year" id="book-info" type="text" value="{{ $book->publication_year }}" placeholder="">年<br>
        @error('publication_year')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        カテゴリー：
            <select name="category_id" id="book-info">
                @foreach ($categories as $category)
                @if ($category->id === $book->category_id)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endif
                @endforeach
                @foreach ($categories as $category)
                @if ($category->id !== $book->category_id)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endif
                @endforeach
            </select><br>
        <button type="submit">編集</button>
    </form>    
</body>
</html>