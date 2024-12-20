@extends('components.base')

@section('content')
<div class="flex items-center justify-between w-full">
    @include('components.organisms.pagination-limit')
    <a href="{{ route('customer_create') }}" class="btn btn-primary w-fit ml-auto">Create</a>
</div>
@if (session('success_message'))
<div class="alert alert-success">
    {{ session('success_message') }}
</div>
@endif
<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th class="th th-left">Fullname</th>
                <th class="th th-left">Email</th>
                <th class="th th-left">ID Card Number</th>
                <th class="th th-left">Address</th>
                <th class="th th-left">Created By</th>
                <th class="th th-left">Created On</th>
                <th class="th th-left">Updated On</th>
                <th class="th th-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lists->items() as $data)
            <tr>
                <td class="td">
                    <a href="{{ route('customer_show',  $data->id ) }}">{{ $data->fullname }}</a>
                </td>
                <td class="td">
                    {{ $data->email }}
                </td>
                <td class="td whitespace-nowrap">
                    {{ $data->id_card_number ?? "-" }}
                </td>
                <td class="td max-w-sm">
                    <div class="line-clamp-3">
                        {!! html_entity_decode($data->address ?? '') !!}
                    </div>
                </td>
                <td class="td whitespace-nowrap">
                    {{ $data->createdBy->name }}
                </td>
                <td class="td whitespace-nowrap">
                    {{ $data->created_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td whitespace-nowrap">
                    {{ $data->updated_at->format('H:i, d/m/Y') }}
                </td>
                <td class="td flex items-center gap-4 justify-center">
                    <a href="{{ route('customer_edit', $data->id) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('customer_destroy') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('components.organisms.pagination')

@endsection