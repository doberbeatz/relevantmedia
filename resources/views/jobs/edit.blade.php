@extends('layout.base')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
        <h1>Add Job</h1>
        <hr>

        @include('partials.errors')

        {!! Form::open(['route' => [
            'jobs.update', $job->getKey()],
            'class' => 'form-horizontal',
            'method' => 'put'
            ]) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-sm-12">
                    {!! Form::text('name', $job->getName(), [
                        'class'=>'form-control', 'placeholder'=>'Name']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    {!! Form::textarea('description', $job->getDescription(), [
                        'class'=>'form-control',
                        'rows' => 10, 'placeholder' => 'Description'
                        ]) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('visible', null, $job->isVisible()) !!} Visible
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-default">Save job</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection