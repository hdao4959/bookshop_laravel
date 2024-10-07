@extends('layout')

@section('content')
    
<div class="container">
    <div class="container w-50">
        <h1>Register</h1>
        <form action="{{ route('postRegister') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Fullname</label>
                <input type="text" name="full_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="user_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="mb-3">
                <a href="{{ route('postLogin') }}">Login</a>
            </div>
        </form>
    </div>
</div>
@endsection
