@extends('template.navbar')
@section('title', 'Login')
@section('content')
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert">
        <strong>{{ session('success')}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show position-absolute" role="alert">
        <strong>{{ session('loginError')}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container position-absolute top-50 start-50 translate-middle w-25 text-primary">
        <div class="row justify-content-center h1 mb-5 pb-3">
            Login
        </div>
    <img src="{{asset('login.png')}}" alt="user-icon" class="w-25 position-absolute start-50 translate-middle bg-white rounded-circle">
    <div class="row border border-secondary pb-3 px-5 pt-5 rounded-3 text-secondary">
        <form action="/login" method="POST">
            @csrf
            <div class="form-floating m-2">
                <input type="text" name="username" class="form-control" @error('username') is-invalid @enderror placeholder="Username" autofocus required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating m-2">
                <input type="password" name="password" class="form-control" @error('password') is-invalid @enderror placeholder="Password" required>
                <label for="floatingPassword" class="form-label">Password</label>
            </div>
            <div class="row justify-content-center m-4">
                <input type="submit" class="btn btn-outline-primary w-50" value="Login">
            </div>
            <div class="row justify-content-center m-3">
                <a id="nothaveaccount" href="/signup" class="text-center">Not have an account?</a>
            </div>
        </form>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $e)
                    {{$e}}.<br>
                @endforeach
            </div>
        @endif
    </div>
@endsection
