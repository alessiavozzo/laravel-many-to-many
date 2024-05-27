@extends('layouts.admin')

@section('content')
    <section id="all_projects" class="mb-5">
        <div class="card projects-card">
            <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center">
                <h3 class="text-white">My Projects</h3>
                <div class="add-filter d-flex gap-5 justify-content-center align-items-center">

                    {{-- Filter by type --}}

                    <form data-bs-theme="dash-dark" class="d-flex justify-content-end align-items-center gap-2"
                        action="{{ route('admin.projects.index') }}" method="get">
                        {{-- type --}}
                        <div class="">
                            <select class="form-select form-select" name="type_id" id="type_id">
                                <option selected disabled>All</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                                        {{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn filter-btn" type="submit">Filter</button>
                        <a class="btn filter-btn" href="{{ route('admin.projects.index') }}">Cancel</a>
                    </form>

                    <a class="btn add-btn" href="{{ route('admin.projects.create') }}">Add new project</a>
                </div>
            </div>

            <div class="card-body p-4">
                @include('admin.partials.session-messages')
                <div class="table-responsive rounded">
                    <table data-bs-theme="dash-dark" class="table projects-table table-hover m-0">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">TITLE</th>
                                {{-- <th scope="col">SLUG</th> --}}
                                <th scope="col">PROJECT IMAGE</th>
                                <th scopre="col">TECHNOLOGIES</th>
                                <th scope="col">TYPE</th>
                                <th scope="col">CREATION DATE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($projects as $project)
                                <tr class="align-middle">
                                    <td scope="row">{{ $project->id }}</td>
                                    <td>{{ $project->title }}</td>
                                    {{-- <td>{{ $project->slug }}</td> --}}
                                    <td>
                                        {{-- <img width="100" src="{{ $project->project_image }}" alt="{{ $project->title }}"> --}}
                                        @if (Str::startsWith($project->project_image, 'https://'))
                                            <img width="100" loading="lazy" src="{{ $project->project_image }}"
                                                alt="{{ $project->title }}">
                                        @else
                                            <img width="100" loading="lazy"
                                                src="{{ asset('storage/' . $project->project_image) }}"
                                                alt="{{ $project->title }}">
                                        @endif
                                    </td>

                                    <td>
                                        @foreach ($project->technologies as $tech)
                                            {{ $tech->name }}
                                        @endforeach
                                    </td>

                                    <td>
                                        @if ($project->type)
                                            <a class=" type-link text-decoration-none badge p-2"
                                                style="background-color: {{ $project->type->color }}"
                                                href="{{ route('admin.types.show', $project->type) }}">{{ $project->type->name }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td>{{ $project->creation_date }}</td>
                                    <td style="width: 15%">
                                        <a class="btn view-btn" href="{{ route('admin.projects.show', $project) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

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
        {{-- {{ $projects->links('pagination::bootstrap-5') }} --}}
        {{-- @dd($projects) --}}




    </section>
@endsection
