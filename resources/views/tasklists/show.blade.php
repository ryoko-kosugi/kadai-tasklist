@extends('layouts.app')

@section('content')

    <h1>id = {{ $showtask->id }} のタスク詳細ページ</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $showtask->id }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $showtask->content }}</td>
        </tr>
    </table>

    {!! link_to_route('tasklists.edit', 'このタスクを編集する', ['id' => $showtask->id], ['class' => 'btn btn-light']) !!}
    
    {!! Form::model($showtask, ['route' => ['tasklists.destroy', $showtask->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection

    