@extends('l5starter::admin.layouts.master')

@section('content-header')
    <h1>
        {{ trans('l5starter::general.settings') }}
    </h1>
@stop

@section('content')

    @include('flash::message')

    <div class="box">
        <div class="box-body">
            {!! Form::open(['route' => 'admin.settings.update']) !!}
            @include('l5starter::admin.settings.fields')
            {!! Form::close() !!}
        </div>
    </div>

@endsection