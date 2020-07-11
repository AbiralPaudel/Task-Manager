@extends('layouts.app')

@section('content')

<h1 class ="text-center my-5"> Editing Todos</h1>
            <div class="row justify-content-center">
                <div class="col md-4 offset-md-2">
                    <div class="card card-default">
                        <card class="card-header">
                            Edit the Todo
                        </card> 

                        <card class="card-body">
                        
                        @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-group">
                                        @foreach($errors->all() as $error)
                                         <li class="list-group-item">
                                            {{$error}}
                                         </li>
                                    
                                        @endforeach
                                    </ul>

                                </div>
                            @endif

                           
                            <form action="/todos/{{ $todo->id}}" method ="POST">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ $todo->name }}" name="name" placeholder="Name" id="">
                                
                                </div>
                                <div class="form-group">
                                    <textarea name="description" id="" placeholder="Description"  cols="5" rows="5" class="form-control">{{ $todo->description }}</textarea>

                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success">Update Todo</button>
                                </div>

                            </form>
                        
                        </card>
                    </div>

                </div>
            </div>



@endsection