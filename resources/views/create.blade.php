@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Add new Book</h1>
    <hr>


    {!! Form::open(['url' => 'Books', 'method' => 'post']) !!}
    @include('Books.form',['submitButton'=>'Add Book'])

    {!! Form::close() !!}

    @include('Books.errors')
     </div>

@stop