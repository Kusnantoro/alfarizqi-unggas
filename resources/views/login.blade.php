@extends('layouts.main_log_reg')
@section('container')
    <div class="img">
        <img src="assets/img/login.svg">
    </div>
    <div class="login-container">
        <form action="/" method="POST">
            @csrf
            <img class="avatar" src="assets/img/logo-unggas.png">
            <h2>Alfarizqi Unggas</h2>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h5>Email</h5>
                    <input class="input @error('email') is-invalid @enderror" type="text" name="email" id="email"
                        required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="input-div two">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5>Password</h5>
                    <input class="input @error('password') is-invalid @enderror" type="password" name="password"
                        id="password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <input class="btn text-white" type="submit" value="Login">
        </form>
    </div>
@endsection
