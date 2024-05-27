@extends('layouts.admin')

@section('content')
<a href="{{ route('admin.types.index') }}" class="back-btn">
            <i class="fa-solid fa-arrow-left"></i>
            <span>back</span>
        </a>
    <div class="container">
        <form data-bs-theme="dash-dark" action="{{ route('admin.types.update', $type) }}" method="post">
            @csrf

            @method('PUT')

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Name</strong></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Project name" value="{{ old('name', $type->name) }}" />
                <small id="nameHelper" class="form-text text-muted">Edit type name</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- description --}}
            <div class="mb-3">
                <label for="description"
                    class="form-label @error('description') is-invalid @enderror"><strong>Description</strong></label>
                <textarea class="form-control" placeholder="A brief text describing the project type" name="description"
                    id="description" rows="8">{{ old('description', $type->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Edit</button>

        </form>
    </div>
@endsection
