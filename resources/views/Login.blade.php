@extends('layout')

@section('content')
    
<div class="container">

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    @if (session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif
    <h1>Login</h1>
    <form action="{{ route('postLogin') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="mb-3">
            <a href="{{ route('register') }}">Register</a>
        </div>
    </form>

</div>
@endsection
