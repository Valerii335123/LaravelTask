@extends('layouts.app')

@section('content')

    <button>
    <a href="{{route('task.create')}}">Create new</a>
    </button>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">status</th>
            <th scope="col">Show</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->status}}</td>
                <td><a href="{{route('task.show',[$item->id])}}">Show</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{$data->links()}}
    </div>
@endsection