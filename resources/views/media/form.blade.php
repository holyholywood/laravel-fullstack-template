@extends('components.base')

@section('content')

@isset($err_message)
<div class="alert alert-danger">{{ $err_message }}</div>
@endisset

@session("errors")
<div class="alert alert-danger">{{ $value }}</div>
@endsession

<form method="POST" class="space-y-4 card" enctype="multipart/form-data">
    @csrf
    <div class="flex items-center justify-center">
        <div class="max-w-xl col-start-5 cols-4 aspect-video bg-gray-100 overflow-hidden border rounded-lg"
            id="file-preview"></div>
    </div>
    <div class="flex items-center justify-center">
        <div class="w-full">
            <label class="block font-medium" for="file">File</label>
            <input class="input w-full" type="file" name="file" id="file" />
        </div>
    </div>
    <button class="btn btn-primary ml-auto">Submit</button>
</form>
@endsection