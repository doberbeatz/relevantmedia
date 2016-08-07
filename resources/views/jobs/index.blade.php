@extends('layout.base')

@section('content')
    <h1>Home page</h1>
    @if(\Auth::check() && !\Auth::user()->isAdmin())
        <p><a href="{{ route('jobs.create') }}" class="btn btn-info">Add Job</a></p>
    @endif

    @include('jobs.list', ['text'=>'There is not posted jobs yet. Coming soon...'])

@endsection