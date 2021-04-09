<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Calendar;
use App\Memo;

use Brian2694\Toastr\Facades\Toastr;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $request->validate([
            'newTodo' => 'required|max:100',
            'newDeadline' => 'nullable|after:"now',
        ]);

        //DBに保存
        $todo = Todo::create([
            'todo' => $request->newTodo,
            'deadline' => $request->newDeadline,
        ]);

        // フラッシュメッセージ
        Toastr::success('新しいタスクが追加されました！');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todos = Todo::find($id);
        return view('todos.edit', [
            'todos' => $todos,
        ]);
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
        $request->validate([
            'updateTodo' =>'required|max:100',
            'updateDeadline' => 'nullable|after."now"',
        ]);

        $todo = Todo::find($id);
        $todo->todo = $request->updateTodo;
        $todo->deadline = $request->updateDeadline;
        $todo->save();

        // フラッシュメッセージ
        Toastr::success('タスクが変更されました');

        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Todo::where('id', $request->id)->first();
            $delete->delete();

        // フラッシュメッセージ
        Toastr::success('タスクが削除されました');

        return redirect()->back();
    }
}
