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
    //  getでtasklist/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->get();
         
            return view('tasklists.index', [
                'tasklist' => $tasks,
            ]);
        }
        
        return view('welcome'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  getでtasklists/にアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $gettask = new Task;
        
        return view('tasklists.create',[
            'gettask' => $gettask        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //  postでtasklistsにアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'status' => 'required|max:10',
            'content' => 'required|max:191', 
        ]);
        
        $task = new Task;
        $task->user_id = \Auth::id();
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //  getでtasklists/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
        
            return view('tasklists.show', [
                'showtask' => $task,
            ]);
        }
        
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //  getでtasklists/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            
            return view('tasklists.edit',[
                'edittask' => $task,    
            ]);
            
        }
        
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //  putまたはpatchでtasklists/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'status' => 'required|max:10',
            'content' => 'required|max:191', 
        ]);
        
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            
            $task->status = $request->status;
            $task->content = $request->content;
            $task->save();
            
        }
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //  deleteでtasklists/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            
            $task->delete();
            
        }
        
        return redirect('/');
    }
    
}
