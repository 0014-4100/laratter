<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日記を作成</title>
    <link rel="stylesheet" href="{{ asset('css/diary.css') }}">
</head>
<body>

    <h1>日記を作成</h1>
    @if ($errors->any())
    <p>{{ $errors->first('photo') }}</p>
    @endif
    @if ($todayDiary)
    <p>今日はすでに日記を記録しています。</p>
     <p>
        <a href="{{ route('diaries.index') }}">
            <button type="button">日記一覧に戻る</button>
        </a>
    </p>

    @else

    <form action="{{ route('diaries.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <p>
        <label for="date">日付</label>
        <input type="date" id="date" name="date">
    </p>

    <p>
        <label for="comment">コメント</label>
        <textarea id="comment" name="comment"></textarea>
    </p>
    <p>
    <label for="photo">写真</label>
    <input type="file" id="photo" name="photo">
</p>

    <button type="submit">保存</button>
    <p>
    <a href="{{ route('diaries.index') }}">日記一覧に戻る</a>
</p>
</form>
@endif

</body>
</html>