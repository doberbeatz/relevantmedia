@extends('layout.base')

@section('content')
    <h1>Administration panel</h1>

    <ul class="nav nav-pills">
        <li role="presentation">
            <a href="{{ route('admin.index') }}">Unmoderated</a>
        </li>
        <li role="presentation">
            <a href="{{ route('admin.all') }}">All</a>
        </li>
    </ul>

    <hr>

    @include('jobs.list', ['text'=>'There are no unmoderated jobs. Coming soon...'])
@endsection