@extends('layouts.app')

@section('content')

{{--@dd($statuses)--}}
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
{{--    @endif--}}

    <form action="{{route('task.store')}}" method="post">
        @csrf
        Title <input type="text" name="title"><br>
        Description <textarea name="description"> </textarea>
        <br>
        Status: <select name="status" id="status">
            @foreach($statuses as $key => $status)
                <option value="{{$status}}">{{$status}}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>

@endsection