@extends('layout.base')

@section('content')

    <div class="col-sm-offset-4 col-sm-4">
        <h1 class="text-center">Login</h1>
        <hr>

        @include('partials.errors', ['errors'=>$errors])

        <form action="{{ route('login') }}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <div class="col-sm-12">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </form>
    </div>
@endsection