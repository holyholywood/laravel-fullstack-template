@extends('components.base')

@section('content')
@isset($err_message)
<div class="alert alert-danger">{{ $err_message }}</div>

@endisset
<form method="POST" class="space-y-4 card">
    @csrf
    <div class="row">
        <div class="form-control cols-12">
            <label class="block font-medium" for="name">Name</label>
            <input class="input w-full" type="text" name="name" id="name" value="{{ $data->name ??'' }}" />
        </div>
    </div>
    <div class="row">
        <div class="form-control cols-6">
            <label class="block font-medium" for="start_amount">Start Range Amount</label>
            <input class="input w-full" type="number" min="0" name="start_amount" id="start_amount"
                value="{{ $data->start_amount ??'' }}" />
        </div>
        <div class="form-control cols-6">
            <label class="block font-medium" for="end_amount">End Range Amount</label>
            <input class="input w-full" type="number" min="0" name="end_amount" id="end_amount"
                value="{{ $data->end_amount ??'' }}" />
        </div>
    </div>
    <button class="btn btn-primary ml-auto">Submit</button>
</form>
@endsection