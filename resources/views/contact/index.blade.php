@extends('layouts.app')

@section('title', 'Contacts')



@section('content')


    <form method="post" id="report_form" action="{{ route('contact_show') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="POST">
        <div class="form-group">
            {{ Form::label('Id', null, ['class' => 'control-label']) }}
            {{ Form::text('id', null, array_merge(['class' => 'form-control'])) }}
        </div>
        <button type="submit" class="btn btn-primary">Show</button>
    </form>

@stop