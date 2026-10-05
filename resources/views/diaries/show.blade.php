<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日記詳細</title>
     <link rel="stylesheet" href="{{ asset('css/diary.css') }}">
</head>
<body>

    <h1>日記詳細</h1>

    <div class="diary-info">
    <div class="diary-date">
        <span>日付</span>
        {{ $diary->date }}
    </div>

    <div class="diary-comment">
        <span>コメント</span>
        {{ $diary->comment ?: 'コメントはありません' }}
    </div>
</div>

    <p>
        写真：
    </p>

    <img src="{{ asset('storage/' . $diary->photo) }}"
         alt="日記の写真"
         width="300">

    <p class="back-button">
    <a href="{{ route('diaries.index') }}">
        ← 日記一覧に戻る
    </a>
</p>

</body>
</html>