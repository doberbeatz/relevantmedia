@extends('layout.base')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
        <h1>Add Job</h1>
        <hr>

        @include('partials.errors')

        {!! Form::open(['route' => 'jobs.store', 'class' => 'form-horizontal']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-sm-12">
                    {!! Form::text('name', old('name'), [
                        'class'=>'form-control', 'placeholder'=>'Name']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    {!! Form::textarea('description', old('description'), [
                        'class'=>'form-control',
                        'rows' => 10, 'placeholder' => 'Description'
                        ]) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('visible', old('visible')) !!} Visible
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-default">Post job</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection