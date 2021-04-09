<?php

namespace App\Http\Controllers;

// use App\Holiday;
use Illuminate\Http\Request;
use App\Calendar;
use App\Todo;
use App\Memo;




class CalendarController extends Controller
{
    // public function show(Request $request)
    // {
    //     // 休日データ取得
    //     $data = new Holiday();
    //     $list = Holiday::all();
    //     return view('calendar.holiday', ['list' => $list, 'data' => $data]);        
    // }
    // public function update($id)
    // {
        // 休日データ取得
        // $data = new Holiday();
        // if(isset($id)) {
        //     $data = Holiday::where('id', '=', $id)->first();
        // }
        // $list = Holiday::all();
        // return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    // }
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'day' => 'required|date_format:Y-m-d',
    //         'description' => 'required',
    //     ]);
        
        // POSTで受信した休日データの登録
        // if(isset($request->id)){
        //     $holiday = Holiday::where('id', '=', $request->id)->first(); 
        //     $holiday->day = $request->day;
        //     $holiday->description = $request->description;        
        //     $holiday->save();
        // } else {
        //     $holiday = new Holiday();
        //     $holiday->day = $request->day;
        //     $holiday->description = $request->description;
        //     $holiday->save();
        // }
        // 休日データ取得
    //     $data = new Holiday();
    //     $list = Holiday::all();
    //    return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    // }

    public function index(Request $request)
    {
        // $cal = new Calendar();
        // $list = Holiday::all();
        $list = Todo::all();
        $cal = new Calendar($list);
        // dd($cal);
        $tag = $cal->showCalendarTag($request->month, $request->year);

        // todoリスト表示部分
        // deadlineを参照にして期限の近い順に並べる
        $todos = Todo::orderByRaw('`deadline` IS NULL ASC')->orderBy('deadline')->get();

        // todo完了、残りのタスク表示
        $memos = Memo::with('todos:id')->get(['todo_id']);
        // dd($memos);
        // ------------------------------------------
        $count = Memo::where('todo_id',1)
        ->where(function($i){
            $i->where('memo_flag', 0);
        })->get()->count();
        
        return view('calendar.index', ['cal_tag' => $tag,'todos' => $todos, 'count' => $count]);
    }

    public function delete(Request $request)
    {
        //DELETEで受信した休日データの削除
        if(isset($request->id)) {
            $holiday = Holiday::where('id', $request->id)->first();
            $holiday->delete();

        // 休日データの取得
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list, 'data'=> $data]);
        }
    }
}
