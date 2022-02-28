@extends('template.navbar')
@section('title', 'Login')
@section('content')
    <div class="container position-absolute top-50 start-50 translate-middle w-50 text-primary">
        <div class="row justify-content-center h1 mb-5 pb-3">
            Sign Up
        </div>
        <img src="{{asset('login.png')}}" alt="user-icon" class="position-absolute start-50 translate-middle bg-white rounded-circle" style="width:10%">
        <div class="row border border-secondary pb-3 px-5 pt-5 rounded-3 text-secondary">
            <form action="/signup" method="POST">
                @csrf
                <div class="row">
                    <div class="col w-50">
                        <div class="form-floating my-2">
                            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Fullname" value="{{old('fullname')}}" autofocus required>
                            <label for="floatingInput">Fullname</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"  placeholder="Username" value="{{old('username')}}" required>
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="password" name="confpassword" class="form-control @error('confirm password') is-invalid @enderror" placeholder="Confirm Password" required>
                            <label for="floatingPassword">Confirm Password</label>
                        </div>
                    </div>
                    <div class="col w-50">
                        <div class="form-floating my-2">
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" value="{{old('address')}}" required>
                            <label for="floatingInput">Address</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone number" value="{{old('phone')}}" required>
                            <label for="floatingInput">Phone number</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="Age" value="{{old('age')}}" required>
                            <label for="floatingInput">Age</label>
                        </div>
                        <div class="form-floating my-2">
                            <input type="date" name="birth" class="form-control @error('birth') is-invalid @enderror" placeholder="Birth Date" value="{{old('birth')}}" required>
                            <label for="floatingInput">Birth Date</label>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center m-4">
                    <input type="submit" class="btn btn-outline-primary w-50" value="Sign Up">
                </div>
                <div class="row justify-content-center m-3">
                    <a id="nothaveaccount" href="/login" class="text-center text-decoration-none">Already have account?</a>
                </div>
            </form>
            @if($errors->any())
            <div class="alert alert-danger d-flex flex-wrap" role="alert">
                @foreach ($errors->all() as $e)
                    {{$e}} <br>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@endsection
