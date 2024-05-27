@extends('layouts.admin')

@section('content')
    <a href="{{ route('admin.technologies.index') }}" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i>
        <span>back</span>
    </a>
    <div class="container">
        <form data-bs-theme="dash-dark" action="{{ route('admin.technologies.store') }}" method="post">
            @csrf

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Name</strong></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="New technology name" value="{{ old('name') }}" />
                <small id="nameHelper" class="form-text text-muted">Write technology name</small>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn add-btn text-white" type="submit">Add</button>

        </form>
    </div>
@endsection
