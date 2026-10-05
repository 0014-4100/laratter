<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日記</title>

    <link rel="stylesheet" href="{{ asset('css/diary.css') }}">
</head>

<body>

    <h1>日記</h1>

    <p>
        <a href="{{ url('diaries/create') }}">
            <button type="button">日記を作成する</button>
        </a>
    </p>

    <div class="calendar-header">

    <a href="{{ url('diaries') }}?year={{ $firstDay->copy()->subMonth()->year }}&month={{ $firstDay->copy()->subMonth()->month }}">
        ← 前の月
    </a>

    <h2>
        {{ $year }}年{{ $month }}月
    </h2>

    <a href="{{ url('diaries') }}?year={{ $firstDay->copy()->addMonth()->year }}&month={{ $firstDay->copy()->addMonth()->month }}">
        次の月 →
    </a>

</div>

    <div class="calendar">

        <!-- 曜日 -->
        <div class="calendar-weekdays">
            <div>日</div>
            <div>月</div>
            <div>火</div>
            <div>水</div>
            <div>木</div>
            <div>金</div>
            <div>土</div>
        </div>

        <!-- 日付 -->
        <div class="calendar-days">

            @for ($i = 0; $i < $firstDay->dayOfWeek; $i++)
                <div class="calendar-day empty"></div>
            @endfor

            @for ($day = 1; $day <= $lastDay->day; $day++)

    @php
        $date = $firstDay->copy()->day($day)->toDateString();
        $diary = $diaries->firstWhere('date', $date);
    @endphp

    <div class="calendar-day {{ $diary ? 'has-diary' : '' }}">

        @if ($diary)
            <a href="{{ route('diaries.show', $diary) }}">
                <span class="day-number">{{ $day }}</span>
                <span class="diary-mark">●</span>
            </a>
        @else
            <span class="day-number">{{ $day }}</span>
        @endif

    </div>

@endfor

        </div>

    </div>

</body>
</html>