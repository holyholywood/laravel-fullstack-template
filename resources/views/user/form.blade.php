@extends('components.base')

@section('content')

@session("errors")
<div class="alert alert-danger">Please fill form correctly!</div>
@endsession
@session("err_message")
<div class="alert alert-danger">{{ $value }}</div>
@endsession

<form method="POST" class="space-y-4 card">
    @csrf
    <div class="row">
        <div class="form-control cols-6">
            <label class="block font-medium" for="first_name">First Name</label>
            <input class="input w-full input-required" type="text" name="first_name" id="first_name"
                value="{{ $data->first_name ??'' }}" />
        </div>
        <div class="form-control cols-6">
            <label class="block font-medium" for="middle_name">Middle Name</label>
            <input class="input w-full" type="text" name="middle_name" id="middle_name"
                value="{{ $data->middle_name ??'' }}" />
        </div>
    </div>
    <div class="row">
        <div class="form-control cols-6">
            <label class="block font-medium" for="last_name">Last Name</label>
            <input class="input w-full" type="text" name="last_name" id="last_name"
                value="{{ $data->last_name ??'' }}" />
        </div>
        <div class="form-control cols-6">
            <label class="block font-medium" for="email">Email</label>
            <input class="input w-full input-required" type="email" name="email" id="email"
                value="{{ $data->email ??'' }}" />
        </div>
    </div>
    <div class="row">
        <div class="form-control cols-6">
            <label class="block font-medium" for="phone_number">Phone Number</label>
            <input class="input w-full input-required" type="tel" name="phone_number" id="phone_number"
                value="{{ $data->phone_number ??'' }}" />
        </div>

        <div class="form-control cols-6">
            <label for="select-income" class="block font-medium">Customer Income</label>
            <select name="income_id" id="select-income" class="input-select">
                <option value="" disabled selected>Select customer income</option>
            </select>
        </div>
    </div>
    <div class="flex gap-8">
        <div class="space-y-4 basis-1/2">
            <div class="form-control cols-12">
                <label class="block font-medium" for="id_card_number">ID Card Number <span
                        class="text-gray-500 text-sm">(ID
                        Card,
                        Passport,
                        Driver License
                        Number)</span></label>
                <input class="input w-full input-required" type="text" name="id_card_number" id="id_card_number"
                    value="{{ $data->id_card_number ??'' }}" />
            </div>
            <div class="form-control cols-12">
                <label for="id-card-img" class="block font-medium">ID Card Image</label>
                <input type="file" class="input w-full" name="id_card_img" id="id-card-img" placeholder="Select file"
                    multiple="false" />
            </div>
        </div>

        <div class=" gap-4 basis-1/2 form-control cols-6 aspect-video rounded-lg overflow-hidden border bg-gray-100"
            id="id-card-preview"></div>
    </div>
    <div class="row">
        <div class="form-control cols-12">
            <label class="block font-medium" for="address">Address</label>
            <textarea id="address" class="tinymce-editor" name="address">
                {{ $data->address ?? '' }}
            </textarea>
        </div>
    </div>
    <button class="btn btn-primary ml-auto">Submit</button>
</form>
@endsection