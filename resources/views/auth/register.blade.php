@extends('layout.base')
@inject('captcha', 'App\RelevantMedia\Contracts\Captcha')

@section('content')

    <div class="col-sm-offset-4 col-sm-4">
        <h1 class="text-center">Registration</h1>
        <hr>

        @include('partials.errors', ['errors'=>$errors])

        <form action="{{ route('register') }}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password confirm">
                </div>
            </div>

            {{-- Here is Captcha --}}
            {!! $captcha->getCaptcha()  !!}

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-default">Register</button>
                </div>
            </div>
        </form>
    </div>
@endsection