@extends('layouts.admin')

@section('content')
    <section id="technologies-content">
        {{-- @dd($technologies) --}}
        <div class="container-fluid" data-bs-theme="dash-dark">
            <div class="row g-5">

                <div class="col-12 col-lg-4">
                    <form data-bs-theme="dash-dark" action="{{ route('admin.technologies.store') }}" method="post">
                        @csrf

                        {{-- name --}}
                        <div class="mb-2">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" aria-describedby="nameHelper" placeholder="New technology name"
                                value="{{ old('name') }}" />
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn add-btn text-white" type="submit">Add new technology</button>

                    </form>

                </div>

                <div class="col-12 col-lg-8">
                    <div class="card p-4">
                        @include('admin.partials.session-messages')
                        <div class="table-responsive rounded">
                            <table data-bs-theme="dash-dark" class="table projects-table table-hover m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">NAME</th>
                                        <th scope="col">SLUG</th>
                                        <th scope="col">PROJECTS</th>
                                        <th scope="col">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($technologies as $technology)
                                        <tr class="align-middle">
                                            <td>
                                                <form data-bs-theme="dash-dark"
                                                    action="{{ route('admin.technologies.update', $technology) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')

                                                    {{-- name --}}
                                                    <div class="mb-3">
                                                        <a class="btn" data-bs-toggle="collapse"
                                                            href="#edit-collapse-{{ $technology->id }}" role="button"
                                                            aria-expanded="false"
                                                            aria-controls="edit-collapse-{{ $technology->id }}">
                                                            {{ $technology->name }}
                                                        </a>
                                                        <div class="collapse w-50" id="edit-collapse-{{ $technology->id }}">

                                                            <input type="text"
                                                                class="form-control mb-2 @error('name') is-invalid @enderror edit-input"
                                                                name="name" id="name" aria-describedby="nameHelper"
                                                                value="{{ $technology->name }}" />


                                                            <button class="btn edit-btn" type="submit">Edit</button>
                                                        </div>


                                                        @error('name')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                </form>

                                            </td>

                                            {{-- <td scope="row">{{ $technology->name }}</td> --}}

                                            <td>{{ $technology->slug }}</td>

                                            <td>{{ $technology->projects()->count() }}</td>


                                            <td style="width: 30%">
                                                <a href="{{ route('admin.technologies.show', $technology) }}"
                                                    class="btn view-btn text-white">View
                                                    projects</a>



                                                {{-- @include('admin.partials.project-delete') --}}
                                                <button technology="button" class="btn delete-btn" data-bs-toggle="modal"
                                                    data-bs-target="#modalId-{{ $technology->id }}">
                                                    Delete
                                                </button>
                                                <x-delete-modal :id="$technology->id" :name="$technology->name" :route="route('admin.technologies.destroy', $technology)" />

                                            </td>
                                        </tr>

                                    @empty

                                        <tr class="">
                                            <td scope="row" colspan="6">No projects found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>

            {{-- <a class="text-decoration-none d-flex justify-content-end my-4 new-type"
                href="{{ route('admin.technologies.create') }}">
                <i class="fa-solid fa-plus"></i>
            </a>
 --}}



            {{-- @include('admin.partials.session-messages') --}}

            {{-- <div class="row row-cols-sm-1 row-cols-md-3 gy-3">
                @forelse ($technologies as $technology)
                    <div class="col">
                        <div class="card" style="border-color:{{ $technology->color }}">
                            <div class="card-header text-center fw-bold">
                                {{ $technology->name }}
                            </div>
                            <div class="card-body text-center">
                                
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
            </div> --}}



        </div>
    </section>
@endsection
