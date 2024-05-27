@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.types.index') }}" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i>
        <span>back</span>
    </a>
    <div class="container" data-bs-theme="dash-dark">


        <div class="card w-50 m-auto" style="border-color:{{ $type->color }}">
            <div class="card-header text-center fw-bold" style="background-color:{{ $type->color }}"
                style="border-color: {{ $type->color }}; color: black">
                {{ $type->name }}
            </div>
            <div class="card-body">
                {{-- id --}}
                <div class="card-text mb-2">
                    <strong style="color: {{ $type->color }}">SLUG: </strong>
                    {{ $type->id }}
                </div>
                {{-- slug --}}
                <div class="card-text mb-2">
                    <strong style="color: {{ $type->color }}">SLUG: </strong>
                    {{ $type->slug }}
                </div>
                {{-- description --}}
                <div class="card-text mb-4">
                    <strong style="color: {{ $type->color }}">DESCRIPTION: </strong>
                    {{ $type->description }}
                </div>
                {{-- buttons --}}
                <div class="actions text-center">
                    <a href="{{ route('admin.types.edit', $type) }}" class="btn edit-btn">Edit</a>

                    <button type="button" class="btn delete-btn" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $type->id }}">
                        Delete
                    </button>
                    @include('admin.partials.type-delete')
                </div>


            </div>
        </div>
        <div class="card-header">
            {{ $type->name }}
        </div>
        <div class="card-body">
            <div class="card-text">{{ $type->id }}</div>

        </div>

    </div>
@endsection
