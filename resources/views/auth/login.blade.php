@extends('layout.base')

@section('content')

    <div class="col-sm-offset-4 col-sm-4">
        <h1 class="text-center">Login</h1>
        <hr>

        @include('partials.errors', ['errors'=>$errors])

        {!! Form::open(['route' => 'login',
            'class' => 'form-horizontal'
            ]) !!}
            {!! Form::token() !!}

            <div class="form-group">
                <div class="col-sm-12">
                    {!! Form::email('email', old('email'),
                                    ['class'=>'form-control','placeholder'=>'Email']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Password']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('remember', old('remember'), old('remember')) !!} Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection