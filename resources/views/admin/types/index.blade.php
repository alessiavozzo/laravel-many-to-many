@extends('layouts.admin')

@section('content')
    {{-- @dd($types) --}}
    <section id="types-content">

        <div class="container" data-bs-theme="dash-dark">

            <a class="text-decoration-none d-flex justify-content-end my-4 new-type" href="{{ route('admin.types.create') }}">
                <i class="fa-solid fa-plus"></i>
            </a>

            @include('admin.partials.session-messages')

            <div class="row row-cols-sm-1 row-cols-md-3 gy-3">
                @forelse ($types as $type)
                    <div class="col">
                        <div class="card" style="border-color:{{ $type->color }}">
                            <div class="card-header text-center fw-bold" style="background-color:{{ $type->color }}"
                                style="border-color: {{ $type->color }}; color: black">
                                {{ $type->name }}
                            </div>
                            <div class="card-body">
                                {{-- <div class="card-text">{{ $type->slug }}</div> --}}
                                {{-- <a href="{{ route('admin.types.show', $type) }}" class="btn view-btn">Details</a> --}}

                                {{-- show details collapse menu --}}
                                <div class="show-details collapse" id="details-collapse-{{ $type->id }}">

                                    <div class="card-text mb-2">
                                        <strong style="color: {{ $type->color }}">ID: </strong>
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

                                </div>

                                {{-- show edit form collapse --}}
                                <div class="edit-content collapse" id="edit-collapse-{{ $type->id }}">
                                    <form data-bs-theme="dash-dark" action="{{ route('admin.types.update', $type) }}"
                                        method="post">
                                        @csrf

                                        @method('PUT')

                                        {{-- name --}}
                                        <div class="mb-3">
                                            <label for="name" class="form-label"><strong>Name</strong></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" aria-describedby="nameHelper"
                                                placeholder="Project name" value="{{ old('name', $type->name) }}" />
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

                                        <button class="btn edit-btn mb-3" type="submit">Confirm changes</button>

                                    </form>


                                </div>

                                {{-- buttons --}}
                                <div class="buttons d-flex justify-content-center align-items-center gap-2">

                                    <a class="btn view-btn" data-bs-toggle="collapse"
                                        href="#details-collapse-{{ $type->id }}" role="button" aria-expanded="false"
                                        aria-controls="details-collapse-{{ $type->id }}">
                                        Details
                                    </a>
                                    {{-- <a href="{{ route('admin.types.edit', $type) }}" class="btn edit-btn">Edit</a> --}}
                                    <a class="btn edit-btn" data-bs-toggle="collapse"
                                        href="#edit-collapse-{{ $type->id }}" role="button" aria-expanded="false"
                                        aria-controls="edit-collapse-{{ $type->id }}">
                                        Edit
                                    </a>

                                    <button type="button" class="btn delete-btn" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $type->id }}">
                                        Delete
                                    </button>
                                    {{-- @include('admin.partials.type-delete') --}}
                                    <x-delete-modal :id="$type->id" :name="$type->name" :route="route('admin.types.destroy', $type)" />

                                </div>


                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p>No types defined</p>
                    </div>
                @endforelse
            </div>

        </div>

    </section>
@endsection
