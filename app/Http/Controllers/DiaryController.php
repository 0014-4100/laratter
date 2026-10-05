<?php

namespace App\Http\Controllers;
use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
   public function index(Request $request)
{
    $diaries = Diary::where('user_id', auth()->id())->get();

    $year = $request->input('year', now()->year);
    $month = $request->input('month', now()->month);

    $firstDay = \Carbon\Carbon::create($year, $month, 1);
    $lastDay = $firstDay->copy()->endOfMonth();

    return view('diaries.index', compact(
        'diaries',
        'year',
        'month',
        'firstDay',
        'lastDay'
    ));
} 
    public function create()
{
    $todayDiary = Diary::where('user_id', auth()->id())
        ->where('date', now()->toDateString())
        ->first();

    return view('diaries.create', compact('todayDiary'));
}

public function show(Diary $diary)
{
    if ($diary->user_id !== auth()->id()) {
        abort(403);
    }

    return view('diaries.show', compact('diary'));
}
public function store(Request $request)
{   $request->validate(
    [
        'photo' => 'required|image',
    ],
    [
        'photo.required' => '画像が選択されていません。',
        'photo.image' => '画像ファイルを選択してください。',
    ]
); 
    $exists = Diary::where('user_id', auth()->id())
        ->where('date', $request->date)
        ->exists();

    if ($exists) {
        return back()->with('error', 'この日の日記はすでに登録されています。');
    }

    $diary = new Diary();
    $diary->date = $request->date;
    $diary->comment = $request->comment;
    $diary->user_id = auth()->id();
    $diary->photo = $request->file('photo')->store('diaries', 'public');

    $diary->save();

    return redirect()->route('diaries.index');
}
}

