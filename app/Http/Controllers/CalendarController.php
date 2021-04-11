<?php

namespace App\Http\Controllers;

// use App\Holiday;
use Illuminate\Http\Request;
use App\Calendar;
use App\Todo;
use App\Memo;




class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $list = Todo::all();
        $cal = new Calendar($list);

        $tag = $cal->showCalendarTag($request->month, $request->year);

        // todoリスト表示部分
        // deadlineを参照にして期限の近い順に並べる
        $todos = Todo::orderByRaw('`deadline` IS NULL ASC')->orderBy('deadline')->get();

        // todo完了、残りのタスク表示
        // $memos = Memo::with('todos:id')->get(['todo_id']);
        // dd($memos);
        // ------------------------------------------
        $count = Memo::where('memo_flag', 0)
        ->where(function($i){
            $i->where('todo_id',1);
        })->get()->count();
        
        return view('calendar.index', ['cal_tag' => $tag,'todos' => $todos, 'count' => $count]);
    }
}
