@extends('layout.base')

@section('content')
    <h1>Profile: {{ \Auth::user()->getName() }}</h1>
    <p><a href="{{ route('jobs.create') }}" class="btn btn-info">Add Job</a></p>

    @include('jobs.list', ['text'=>'You have not added any job yet.'])

@endsection