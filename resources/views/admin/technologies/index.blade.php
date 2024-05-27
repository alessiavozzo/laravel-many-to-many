@extends('layouts.admin')

@section('content')
    <section id="technologies-content">
        {{-- @dd($technologies) --}}
        <div class="container" data-bs-theme="dash-dark">

            <a class="text-decoration-none d-flex justify-content-end my-4 new-type"
                href="{{ route('admin.technologies.create') }}">
                <i class="fa-solid fa-plus"></i>
            </a>

            @include('admin.partials.session-messages')

            <div class="row row-cols-sm-1 row-cols-md-3 gy-3">
                @forelse ($technologies as $technology)
                    <div class="col">
                        <div class="card" style="border-color:{{ $technology->color }}">
                            <div class="card-header text-center fw-bold">
                                {{ $technology->name }}
                            </div>
                            <div class="card-body text-center">
                                {{-- <div class="card-text">{{ $technology->slug }}</div> --}}
                                <a href="{{ route('admin.technologies.show', $technology) }}"
                                    class="btn view-btn text-white">View
                                    projects</a>
                                <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn edit-btn">Edit</a>

                                <button technology="button" class="btn delete-btn" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $technology->id }}">
                                    Delete
                                </button>
                                <x-delete-modal :id="$technology->id" :name="$technology->name" :route="route('admin.technologies.destroy', $technology)" />



                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <p>No technologies defined</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>
@endsection
