@extends('layouts.app')

@section('content')
    <button>
        <a href="{{route('task.edit',[$task->id])}}">Update</a>
    </button>
    <button>
        <form action="{{route('task.destroy',[$task->id])}}" method="post">
            @csrf
            <input class="btn btn-default" type="submit" value="Delete"/>
            <input type="hidden" name="_method" value="delete"/>
        </form>
    </button>
    <table class="table table-dark">
        <tbody>
        <tr>
            <td>Title</td>
            <td>{{$task->title}}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{$task->description}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{$task->status}}</td>
        </tr>
        </tbody>
    </table>

@endsection