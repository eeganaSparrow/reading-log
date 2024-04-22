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
    @if ($display === 'home')
    <form action="{{ route('readinglog.book.create.post', ['display' => 'home']) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="todo-content"><h2>本情報の追加</h2></label><br>
        画像の追加：<input type="file" name="picture_name" id="book-info"><br>
        @error('picture_name')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        タイトル：<textarea name="title" id="book-info" type="text" placeholder="タイトルを入力"></textarea><br>
        @error('title')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        作者：<textarea name="author" id="book-info" type="text" placeholder="作者名を入力"></textarea><br>
        @error('author')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        出版社：<textarea name="publisher" id="book-info" type="text" placeholder="出版社名を入力"></textarea><br>
        @error('publisher')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        出版年：<input name="publication_year" id="book-info" type="text" placeholder="">年<br>
        @error('publication_year')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        カテゴリー：
            <select name="category_id" id="book-info">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select><br>
        <button type="submit">追加</button>
    </form>
    @elseif ($display === 'category')
    <form action="{{ route('readinglog.book.create.post', ['display' => 'category', 'categoryId' => $categoryId]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="todo-content"><h2>本情報の追加</h2></label><br>
        画像の追加：<input type="file" name="picture_name" id="book-info"><br>
        @error('picture_name')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        タイトル：<textarea name="title" id="book-info" type="text" placeholder="タイトルを入力"></textarea><br>
        @error('title')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        作者：<textarea name="author" id="book-info" type="text" placeholder="作者名を入力"></textarea><br>
        @error('author')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        出版社：<textarea name="publisher" id="book-info" type="text" placeholder="出版社名を入力"></textarea><br>
        @error('publisher')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        出版年：<input name="publication_year" id="book-info" type="text" placeholder="">年<br>
        @error('publication_year')
        <p style="color: red;">{{ $message }}</p>
        @enderror
        カテゴリー：
            <select name="category_id" id="book-info">
                @foreach ($categories as $category)
                @if ($category->id === $categoryId)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endif
                @endforeach
                @foreach ($categories as $category)
                @if ($category->id !== $categoryId)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endif
                @endforeach
            </select><br>
        <button type="submit">追加</button>
    </form>
    @endif
</body>
</html>