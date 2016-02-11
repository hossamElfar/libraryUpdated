@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Available Books</div>
                <div class="panel-body">
                    @if(count($books)!=0)
                        @foreach($books as $book)
                            <div class="jumbotron">
                                <h1>{{$book->name}}</h1>
                                <h2>writen By {{$book->author}}</h2>
                                <h4><a href={{url('Books/rent').'/'.$book->id}}>Rent This Book</a></h4>
                                <h5>added {{$book->addedDate->diffForHumans()}}</h5>
                            </div>
                        @endforeach
                        @else
                           <div class="alert alert-warning">
                               <h3>There is no any books in the library . Want to <a href={{url('Books/create')}}>add one ?? </a></h3>
                           </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
