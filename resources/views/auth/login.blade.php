@extends('components.base-auth')

@section('content')
<p class="text-lg text-gray-500">Welcome to <span class="font-semibold">{{ env('APP_NAME') }}</span>, please login
    before
    continue.
</p>
@if(Session::has('success_message'))
<div class="alert alert-success">{{ Session::get('success_message') }}</div>
@endif
@isset($err_message)
<div class="alert alert-danger">{{ $err_message }}</div>
@endisset

<form method="POST" class="space-y-6">
    @csrf
    <div class="form-control cols-6">
        <label class="block font-medium" for="email">Email</label>
        <input class="input w-full @error('email') input-error @enderror" type="text" name="email" id="email"
            placeholder="eg: your@example.com" />
        @error('email')
        <div class="input-helper input-helper-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control cols-6">
        <label class="block font-medium" for="password">Password</label>
        <input class="input w-full @error('password') input-error @enderror" type="password" name="password"
            id="password" placeholder="password" />
        @error('password')
        <div class="input-helper input-helper-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row text-sm text-gray-500">
        <p class="cols-6">Not registered yet? <a href="{{ route('auth_register') }}">Register</a></p>
        <p class="cols-6 text-right">Forgot password? <a href="">Click Here</a></p>
    </div>
    <div class="flex items-center gap-4 justify-center">
        <button type="reset" class="btn btn-primary-outline w-full">Reset</button>
        <button class="btn btn-primary w-full">Login</button>
    </div>
</form>
@endsection