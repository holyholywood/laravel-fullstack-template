@extends('components.base-auth')

@section('content')
<p class="text-lg text-gray-500">Welcome to <span class="font-semibold">{{ env('APP_NAME') }}</span>, please fill
    your data below!
</p>
@session("errors")
<div class="alert alert-danger">Validation Error</div>
@endsession
<form method="POST" class="space-y-6">
    @csrf
    <div class="form-control cols-6">
        <label class="block font-medium" for="email">Email</label>
        <input class="input w-full @error('email') 'input-error' @enderror" type="text" name="email" id="email"
            placeholder="eg: your@example.com" />
        @error('email')
        <div class="input-helper input-helper-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control cols-6">
        <label class="block font-medium" for=fullname>Fullname</label>
        <input class="input w-full @error('fullname') input-error @enderror" type="text" name=fullname id=fullname
            placeholder="eg: John Doe" />
        @error('fullname')
        <div class="input-helper input-helper-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control cols-6">
        <label class="block font-medium" for="password">Password</label>
        <input class="input w-full @error('password') 'input-error' @enderror" type="password" name="password"
            id="password" placeholder="password" />
        @error('password')
        <div class="input-helper input-helper-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control cols-6">
        <label class="block font-medium" for="password_confirmation">Confirm Password</label>
        <input class="input w-full @error('password_confirmation') 'input-error' @enderror" type="password"
            name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" />
        @error('password_confirmation')
        <div class="input-helper input-helper-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row text-sm text-gray-500">
        <p class="cols-6">Already registered? <a href="{{ route('auth_login') }}">Login</a></p>
    </div>
    <div class="flex items-center gap-4 justify-center">
        <button type="reset" class="btn btn-primary-outline w-full">Reset</button>
        <button class="btn btn-primary w-full">Register</button>
    </div>
</form>
@endsection