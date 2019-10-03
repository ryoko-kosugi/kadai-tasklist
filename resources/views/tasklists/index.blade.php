@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>
    
    @if (count($tasklist) > 0) 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>status</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasklist as $onetask)
                <tr>
                    <td>{!! link_to_route('tasklists.show', $onetask->id, ['id' => $onetask->id]) !!}</td>
                    <td>{{ $onetask->status }}</td>
                    <td>{{ $onetask->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {!! link_to_route('tasklists.create','タスクを作成する', [], ['class' => 'btn btn-primary']) !!}
   

@endsection

