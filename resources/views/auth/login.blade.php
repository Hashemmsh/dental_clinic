{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


 {{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login.{{ config('app.name') }}</title>
</head>
<style>
    #login {
		font-family: Avenir, sans-serif;
		width: 33%;
		margin: 0 auto;
		background-image: linear-gradient(175deg, transparent 40%, white 40%), url(https://images.unsplash.com/photo-1607278843240-419b8d83672d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80);
		text-align: center;
		background-size: 100%, cover;
		background-repeat: no-repeat;
	}
    body{
      background:hsl(242, 59%, 67%);

    }
	#login h1 {
    font-weight: 100;
    padding-top: 6rem;
}
	#login img {
		width: 33%;
		height: auto;
		border-radius: 50%;
		border: 5px solid white;
	}
	#login label {
    color: #666;
    margin-top: 1rem;
}
	#login input, #login label {
    display: block;
    width: 90%;
    padding: .5rem;
    margin: 0 auto;
}
	#login input {
    text-align: left;
    border: none;
    border-bottom: 1px solid #aaa;
    font-size: 1rem;
}
	#login button[type="submit"] {
    width: 100%;
    margin-top: 0.5rem;
    background: rgb(15, 13, 13);
    color: #fff;
    padding: 1rem;
    text-transform: uppercase;
}
@media all and (max-width: 500px) {
  #login { width: 100%; }
}
#msg span{
    color: red;
}
</style>
<body>
    <div id="login">
        <h1>{{ config('app.name') }}</h1>
        <img src="{{ asset('adminassets/clinic.jpg') }}" alt>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div id="msg">
                <label>Email</label>

                <input id="email" type="email"
                    class="w-full px-4 py-3 rounded-lg bg-gray-200
            mt-2 border focus:border-blue-500 focus:bg-white
            focus:outline-none"
                    name="email" value="{{ old('email') }}" placeholder="Enter your Email" autocomplete="email" autofocus>

                @error('email')
                    <span  class="text-red-500" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mt-4" id="msg" >
                <label>Password</label>
                <input  type="password" name="password" id="password" placeholder="Enter Password" minlength="6"
                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
            focus:bg-white focus:outline-none"
                    >
                    @error('password')
                    <span class="text-red-500" role="alert">
                        {{ $message }}
                    </span>
            @enderror
        </div>
        <hr class="my-6 border-gray-300 w-full">

        @if (Route::has('password.request'))
        <div class="text-right mt-5 ">
            <a href="{{ route('password.request') }}"
                class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Forgot
                Password?</a>
        </div>
        @endif

        <button type="submit">Login</button>
    </form>

  </div>

</body>
</html> --}}

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Login.{{ config('app.name') }}</title>
<style>
    html,body {
margin: 0;
height: 100%;
background: url({{ asset('adminassets/dental-background-design-vector-7423515.jpg') }});
background-size: cover;
}
.log-in {
position: relative;
width: 18rem;
top: calc(50% - 9.25rem);
margin: auto;
font-family: 'Roboto', sans-serif;
font-weight: 300;
text-align: center;
}
.title {
margin: 0 0 1.5rem;
padding: 0;
font-size: 2.5rem;
line-height: 1;
font-weight: 300;
color: #fff;
}
.input {
box-sizing: border-box;
display: block;
margin-top:5px;
margin-bottom:30px;
padding-top: 2px;
width: 100%; height: 3rem;
appearance: none;
font-family: 'Roboto', sans-serif;
font-size: 1.2rem;
font-weight: 300;
color: #556;
text-align: center;
border: 0;
border-radius: 1.5rem;
background: #fff;
}
.submit {
margin-bottom: .6rem;
font-weight: 500;
cursor: pointer;
color: #fff;
background: #00B0FF;
transition: 200ms;
}
.submit:hover {
background: #10C0FF;
}
.forgot {
color: #ddd;
text-decoration: none;
font-size: .9rem;
}
.forgot:hover {
color: #fff;
text-decoration: none;
}


.label{
    margin-bottom: 20%;
    color: #0b9bcf;
}
</style>
</head>
<body>
<form class="log-in" action="{{ route('login') }}" method="POST">
    @csrf
    <h1 class="title">{{ __(config('app.name')) }}</h1>
       <div id="msg">
        @error('email')
        <span style="color: red" class="text-red-500" role="alert">
            {{ $message }}
        </span>
       @enderror
        <input id="email" type="email" class="input" name="email"
          value="{{ old('email') }}"
          placeholder="Enter your Email"
          autocomplete="email"
          autofocus>

    </div>
    <div id="msg" >
        @error('password')
        <span style="color: red" class="text-red-500" role="alert">
            {{ $message }}
        </span>
@enderror
        <input
          type="password"
          name="password"
          placeholder="Enter Password"
          class="input"
        >

    </div>

    @if (Route::has('password.request'))
    <div class="text-right mt-5 ">
        <a href="{{ route('password.request') }}"
            class="forgot">Forgot
            Password?</a>
    </div>
    @endif
  <button class="input submit"type="submit" >Log in</button>

</form>
</body>
</html>
