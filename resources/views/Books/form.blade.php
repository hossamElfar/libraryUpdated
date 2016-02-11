
<div class="form-group">
    {!! Form::label('name','Name : ') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}

</div>

<br>
<div class="form-group">
    {!! Form::label('author','Author : ') !!}
    {!! Form::text('author',null,['class'=>'form-control']) !!}
</div>
<br>


<div class="form-group">
    {!! Form::label('ISBN', 'ISBN', ['class' => 'control-label']) !!}
    {!! Form::text('ISBN', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">

    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>
