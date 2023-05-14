@extends('layouts.app')

@section('content')

    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach

    <form action="{{route('task.update',$task->id)}}" method="post">
        @csrf
        {{ method_field('PUT') }}
        Title <input type="text" name="title" value="{{$task->title}}"><br>
        Description <textarea name="description">{{$task->description}}</textarea>
        <br>
        Status: <select name="status" id="status">
            @foreach($statuses as $key => $status)
                <option value="{{$status}}" {{$task->status ==$status?"selected":''}}>{{$status}}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>

@endsection