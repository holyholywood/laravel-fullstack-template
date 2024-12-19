@extends('components.base')

@section('content')

@isset($err_message)
<div class="alert alert-danger">{{ $err_message }}</div>
@endisset

@session("errors")
<div class="alert alert-danger">{{ $value }}</div>
@endsession

<form method="POST" class="space-y-4 card">
    @csrf
    <div class="row">
        <div class="form-control cols-6">
            <label class="block font-medium" for="name">Name</label>
            <input class="input w-full" type="text" name="name" id="name" placeholder="eg: Dollar, Rupiah"
                value="{{ $data->name ??'' }}" />
        </div>
        <div class="form-control cols-6">
            <label class="block font-medium" for="region">Region</label>
            <input class="input w-full" type="text" name="region" id="region" placeholder="eg: United States, Indonesia"
                value="{{ $data->region ??'' }}" />
        </div>
    </div>
    <div class="row">
        <div class="form-control cols-6">
            <label class="block font-medium" for="abbr">Abbreviation</label>
            <input class="input w-full" type="text" name="abbr" id="abbr" placeholder="eg: $, Rp."
                value="{{ $data->abbr ??'' }}" />
        </div>
        <div class="form-control cols-6">
            <label class="block font-medium" for="code">International Code</label>
            <input class="input w-full" type="text" name="code" id="code" placeholder="eg: USD, IDR"
                value="{{ $data->code ??'' }}" />
        </div>
    </div>
    <button class="btn btn-primary ml-auto">Submit</button>
</form>
@endsection