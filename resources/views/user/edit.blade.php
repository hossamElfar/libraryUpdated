@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Edit your profile</h1>
    {!! Form::model($user,['url' => 'user/store', 'method' => 'post']) !!}
    	<div class="form-group">
            {!! Form::label('age', 'Age', ['class' => 'control-label']) !!}
            {!! Form::text('age', null, ['class' => 'form-control']) !!}
        </div>
    <div class="form-group">
        {!! Form::label('relationship', 'Relationship', ['class' => 'control-label']) !!}
        {!! Form::text('relationship', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
        {!! Form::text('status', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('prefeared Type', 'Prefeared Type', ['class' => 'control-label']) !!}
         {!! Form::text('preferredType', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Country', 'Country', ['class' => 'control-label']) !!}
          {!! Form::text('country', null, ['class' => 'form-control']) !!}
    </div>
        <div class="form-group">
            {!! Form::submit('update Your Profile', ['class' => 'form-control btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    @include('Books.errors')
    </div>
@stop