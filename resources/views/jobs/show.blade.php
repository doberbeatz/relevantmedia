@extends('layout.base')

@section('content')
    <h1>{{ $job->getName() }}</h1>

    @include('jobs.single', ['job' => $job])

@endsection