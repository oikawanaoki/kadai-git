<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::check()) { // 認証済みの場合タスク一覧表示
        
         // タスク一覧を取得
        $tasks = $user->tasks;

        // 一覧ビューでそれを表示
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
        }
        //未ログインはウェルカムページ
        return view('welcome');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        // メッセージ作成ビューを表示
        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // バリデーションの指定
        $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10',

        ]);
        
        // メッセージを作成
        $task = new Task;
        $task->status = $request->status; 
        $task->content = $request->content;
        $task->user_id = \Auth::id();
        $task->save();

        // タスク一覧へリダイレクトさせる
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id);
         if (\Auth::id() === $task->user_id) {
        // メッセージ詳細ビューでそれを表示
        return view('tasks.show', [
            'task' => $task,
        ]);
         }
         return redirect('/tasks');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id);
         if (\Auth::id() === $task->user_id) {
        // メッセージ編集ビューでそれを表示
        return view('tasks.edit', [
            'task' => $task,
         ]);
         }
        return redirect('/tasks');

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
        //バリデーションの指定
        $request->validate([
            'content' => 'required|max:255',
            'status' => 'required|max:10',
        ]);

        
         // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id);
        // メッセージを更新
        $task->status = $request->status; 
        $task->content = $request->content;
        $task->save();

        // タスク一覧へリダイレクトさせる
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $task = Task::findOrFail($id);

        if (\Auth::id() === $task->user_id) {
        // メッセージを削除
        $task->delete();
        }
        
        // タスク一覧へリダイレクトさせる
        return redirect('/tasks');
    }
}
