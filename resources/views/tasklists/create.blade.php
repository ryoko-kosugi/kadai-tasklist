@extends('layouts.app')

@section('content')

    <h1>作成ページ</h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form::model($gettask,['route' => 'tasklists.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
            
                {!! Form::submit('タスクリストに入れる', ['class' => 'btn btn-primary']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection