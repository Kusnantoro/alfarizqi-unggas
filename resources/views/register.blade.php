@extends('layouts.main_log_reg')
@section('container')
    <div class="img">
        <img src="assets/img/register.svg">
    </div>
    <div class="login-container">
        <form action="register" method="POST">
            @csrf
            <img class="avatar" src="assets/img/logo-unggas.png">
            <h2>Alfarizqi Unggas</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>Username</h5>
                    <input class="input @error('name') is-invalid @enderror" type="text" name="name" id="name"
                        required value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
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
            <a href="/">Sudah punya akun? Login</a>
            <input class="btn text-white" type="submit" value="Register">
        </form>
    </div>
@endsection
