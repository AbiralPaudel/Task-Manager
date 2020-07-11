@extends('layouts.app')



<!-- @section('title')
    Todos List
endsection -->
@section('content')
    <h1 class ="text-center my-5">Todos Page</h1>
        <div class="row justify-content-center">
            <div class="col md-8 offset-md-2">
            <div class="card card-default">
                <card class="card-header">
                    Todos
                </card> 

                <card class="card-body">
                    <ul class="list group">
                        @foreach($todos as $todo)
                            <li class ="list-group-item">
                                {{ $todo->name }}
                                @if(!$todo->completed)
                                <a href ="/todos/{{$todo->id}}/complete"class="button btn btn-warning btn-sm float-right">
                                    Complete
                                </a>
                                @endif
                                <a href ="/todos/{{$todo->id}}"class="button btn btn-primary btn-sm float-right mr-2">
                                    View
                                </a>

                            </li>
                        @endforeach 
                    </ul>
                
                </card>
            </div>

            </div>
        </div>

@endsection