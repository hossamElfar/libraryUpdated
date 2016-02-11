@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
        <h1>
            {{$user->name}}
        </h1>
            <h4>{{$user->email}}</h4>
            @if($user->age)
                <h4>   Age :  {{$user->age}}</h4>
                @else
                   <div class="alert alert-info">
                       You can update/or add your age <a href={{url('user/update')}}>here </a>
                   </div>
            @endif
            @if($user->status)
                <h4>   status : {{$user->status}}</h4>
            @else
                <div class="alert alert-info">
                    You can update/or add your status <a href={{url('user/update')}}>here </a>
                </div>
            @endif
            @if($user->relationship)
                <h4>   relationship : {{$user->relationship}}</h4>
            @else
                <div class="alert alert-info">
                    You can update/or add your relationship <a href={{url('user/update')}}>here </a>
                </div>
            @endif
            @if($user->country)
                <h4>   From : {{$user->country}}</h4>
            @else
                <div class="alert alert-info">
                    You can update/or add your country <a href={{url('user/update')}}>here </a>
                </div>
            @endif
        </div>

        <div class="form-group">
        {!! Form::open(['url' => 'user/status', 'method' => 'post']) !!}
        	{!! Form::label('What is on your mind', 'What is on your mind', ['class' => 'control-label']) !!}
            {!! Form::text('status',null, ['class' => 'form-control']) !!}
            <br>
            {!! Form::submit('Add a status', ['class' => 'form-control btn btn-primary']) !!}
        {!! Form::close() !!}
        </div>
        @if(count($status)!=0)
            @foreach($status as $element)
                <div class="jumbotron">
                  <h4> {{$element->status}}</h4>
                    <h6> posted {{$element->typedOn->diffForHumans()}}</h6>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">
                <h3>You have no status yet</h3>
            </div>
        @endif
        <h2>All rented Books</h2>
        @if(count($rentedBooks)!=0)
            @foreach($rentedBooks as $element)
                <div class="jumbotron">
                    <h1>{{$element->name}}</h1>
                    <h2>writen By {{$element->author}}</h2>
                    <h4><a href={{url('Books/unrent').'/'.$element->id}}>return This Book</a></h4>
                    <h5>added {{$element->addedDate->diffForHumans()}}</h5>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">
                <h3>There is no any books That you have rented yet To rent Books Go to <a href={{url('/')}}>home page </a>and start renting !!!</h3>
            </div>
        @endif
    </div>
@stop