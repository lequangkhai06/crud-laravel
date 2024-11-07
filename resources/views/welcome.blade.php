@extends('layouts.master')

@section('title', 'Home page')

@section('content')
<div class="text-center mt-5">
    <img src="{{ asset('laravel.png') }}" alt="Laravel Logo" class="mb-4" width="300px">
    <h1 class="fw-bold">CRUD LARAVEL</h1>
    <p class="lead">Welcome to the Laravel CRUD application. Manage your students easily.</p>
    <a href="{{ url('/students') }}" class="btn btn-primary btn-lg mt-3">Go to student list</a>
</div>
@endsection