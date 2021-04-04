<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memo;
use App\Todo;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // todo取得
        $todos = Todo::where('id', $request->id)->get();
        // memo取得
        $memos = Memo::where('todo_id', $request->id)->get();

        return view('memos.index',
            [
            'todos' => $todos,
            'memos' => $memos,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Memo::create([
            'todo_id' => $request->todo_id,
            'memo' => $request->newMemo,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // todo取得
        $todos = Todo::where('id', $request->id)->get();
        // memo取得
        $memos = Memo::where('id', $request->id)->get();
        
        return view('memos', 
        [
            'todos' => $todos,
            'memos' => $memos,
            ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flag = Memo::where('id', $request->id)->update([
            'memo_flag' => $request->memo_flag
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(isset($request->id)) {
            $delete = Memo::where('id', $request->id)->first();
            $delete->delete();
        }

        return redirect()->back();
    }
}
