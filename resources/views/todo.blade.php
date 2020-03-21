@extends('layouts.app')

@section('content')
    <!--suppress HtmlUnknownTag -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex">
                        <a href="/todos" class="btn btn-sm btn-outline-secondary mr-2">Back</a>
                        <p class="my-auto lead">{{$todo->subject}}</p>
                         <div class="ml-auto">
                            <a href="/todos/{{$todo->id}}/toggle" class="btn btn-sm btn-outline-primary mr-2">Mark as done</a>
                            <a href="/todos/{{$todo->id}}/delete" class="btn btn-sm btn-outline-danger ml-2">Delete</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if($todo->context)
                            <!--suppress CheckEmptyScriptTag -->
                            <x-alert subject="Nice!" content="This item is complete." context="success"/>
                        @else
                            <!--suppress CheckEmptyScriptTag -->
                            <x-alert subject="Hey!" content="This item is not complete yet." context="warning"/>

                            @unless($todo->due_at === null)
                                <!--suppress CheckEmptyScriptTag -->
                                <x-alert subject="Heads up!" context="warning">
                                    <x-slot name="content">
                                        This item {{ $todo->imminence }} due
                                        <time class="timeago" datetime="{{ $todo->due_at->toIso8601ZuluString() }}">
                                            {{ $todo->due_at->isoFormat('MMMM Do YYYY, h:mm:ss a') }}
                                        </time>
                                    </x-slot>
                                </x-alert>
                            @endunless
                        @endif
                        <p>{{$todo->content}}
                        <hr>
                        <h6>Created: {{$todo->created_at}}</h6>
                        <h6>Last modified: {{$todo->updated_at}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
