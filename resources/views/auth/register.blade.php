@extends('layout.base')
@inject('captcha', 'App\RelevantMedia\Contracts\Captcha')

@section('content')

    <div class="col-sm-offset-4 col-sm-4">
        <h1 class="text-center">Registration</h1>
        <hr>

        @include('partials.errors', ['errors'=>$errors])

        {!! Form::open(['route' => 'register',
            'class' => 'form-horizontal'
            ]) !!}

            {!! Form::token() !!}

            <div class="form-group">
                <div class="col-sm-12">
                    {!! Form::text('name', old('name'),
                                    ['class'=>'form-control','placeholder'=>'Name']) !!}
                </div>
            </div>
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
                <div class="col-sm-12">
                    {!! Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'Password confirm']) !!}
                </div>
            </div>

            {{-- Here is Captcha --}}
            {!! $captcha->getCaptcha()  !!}

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-default">Register</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection