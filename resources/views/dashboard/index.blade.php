@extends('dashboard.templates.main')

@section('content')
    <h1>Hello {{ auth()->user()->username }}</h1>
@endsection