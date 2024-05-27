@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.types.index') }}" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i>
        <span>back</span>
    </a>
    <div class="container">
        <form data-bs-theme="dash-dark" action="{{ route('admin.types.store') }}" method="post">
            @csrf

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Name</strong></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="New type name" value="{{ old('name') }}" />
                <small id="nameHelper" class="form-text text-muted">Write type name</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- description --}}
            <div class="mb-3">
                <label for="description"
                    class="form-label @error('description') is-invalid @enderror"><strong>Description</strong></label>
                <textarea class="form-control" name="description" id="description"
                    placeholder="A brief text describing the project type" rows="8">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn add-btn text-white" type="submit">Add</button>

        </form>
    </div>
@endsection
