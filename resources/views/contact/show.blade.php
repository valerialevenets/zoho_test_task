@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@stop

@section('content')

    <form method="post" id="report_form" action="{{ route('contact_update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <input type="hidden" name="id" value="{{$record['CONTACTID']}}">
            {{ Form::label('Fill Percentage', null, ['class' => 'control-label']) }}
            {{ Form::number('fill_percentage', $record['fill percentage'], array_merge(['class' => 'form-control','step'=>'any','min'=>0,'max'=>100])) }}
        </div>
        <button type="submit" class="btn btn-primary">update</button>
    </form>

@stop