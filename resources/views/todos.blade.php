@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">To-Do List</div>

                    <div class="card-body">
                        <ul>
                        @foreach($todos as $todo)
                            <li><a href="/todos/{{$todo->id}}">{{$todo->subject}}</a> </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
