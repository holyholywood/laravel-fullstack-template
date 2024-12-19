@extends('components.base')
@section('content')
<div class="">
    <a href="{{ route('customer_edit', $data->id) }}" class="btn btn-primary-outline w-fit ml-auto">Edit</a>
</div>
<div class="card space-y-4">
    <div class="row">
        <div class="cols-4 space-y-1">
            <div class="font-semibold">Fullname</div>
            <div>{{ $data->fullname }}</div>
        </div>
        <div class="cols-4 space-y-1">
            <div class="font-semibold">Email</div>
            <div>{{ $data->email }}</div>
        </div>
    </div>
    <div class="row">
        <div class="space-y-1 cols-4">
            <div class="font-semibold">First Name</div>
            <div>{{ $data->first_name }}</div>
        </div>
        <div class="space-y-1 cols-4">
            <div class="font-semibold">Middle Name</div>
            <div>{{ $data->middle_name }}</div>
        </div>
        <div class="space-y-1 cols-4">
            <div class="font-semibold">Last Name</div>
            <div>{{ $data->last_name }}</div>
        </div>
    </div>
    <div class="row">
        <div class="space-y-1 cols-4">
            <div class="font-semibold">ID Card Number</div>
            <div>{{ $data->id_card_number ?? "-" }}</div>
        </div>
        <div class="space-y-1 cols-4">
            <div class="font-semibold">Income</div>
            <div>{{ $data->income ?? "-" }}</div>
        </div>
    </div>
    <div class="row">
        <div class="space-y-1 cols-12">
            <div class="font-semibold">Address</div>
            <div>{{ $data->address ?? "-" }}</div>
        </div>
    </div>
</div>
@endsection