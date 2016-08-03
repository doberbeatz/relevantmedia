@extends('layout.base')

@section('content')
    <h1>Profile</h1>
    <h2>{{ \Auth::user()->getName() }}</h2>
@endsection