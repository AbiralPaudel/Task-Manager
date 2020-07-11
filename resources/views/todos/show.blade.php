@extends('layouts.app')

<!-- @section('title')
    Single Todo : {{$todo->name}}
endsection -->

@section('content')
<h1 class ="text-center my-5"> {{$todo->name}} </h1>
            <div class="row justify-content-center">
                <div class="col md-8 offset-md-2">
                    <div class="card card-default">
                        <card class="card-header">
                            Details
                        </card> 

                        <card class="card-body">
                            {{$todo->description}}
                        
                        </card>
                        
                    </div>
                    <a href="/todos/{{$todo->id}}/edit" class="button btn btn-secondary btn-sm my-3">Edit</a>
                    <a href="/todos/{{$todo->id}}/delete" class="button btn btn-danger btn-sm my-3">Delete</a>
                </div>
            </div>
@endsection