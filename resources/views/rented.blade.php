@extends('layouts.app')
@section('content')

    <div class="container">
        @if(count($books)!=0)
            @foreach($books as $book)
                <div class="jumbotron">
                    <h1>{{$book->name}}</h1>
                    <h2>writen By {{$book->author}}</h2>
                    <h4><a href={{url('Books/unrent').'/'.$book->id}}>return This Book</a></h4>
                    <h5>added {{$book->addedDate->diffForHumans()}}</h5>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">
                <h3>There is no any books That you have rented yet To rent Books Go to <a href={{url('/')}}>home page </a>and start renting !!!</h3>
            </div>
        @endif
    </div>


@stop