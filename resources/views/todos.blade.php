@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">To-Do List</div>

                    <div class="card-body">
                        <ul class="px-0" style="list-style: none;">
                        @foreach($todos as $todo)
                                <li>
                                    <!--suppress CheckEmptyScriptTag, JSUnresolvedVariable -->
                                    <x-todo :todo="$todo"/>
                                </li>
                            <li> </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
