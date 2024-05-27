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
                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div data-bs-theme="dash-dark" class="modal fade" id="modalId-{{ $technology->id }}"
                                    tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $technology->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                {{-- title --}}
                                                <h5 class="modal-title" id="modalTitleId-{{ $technology->id }}">
                                                    You are deleting {{ $technology->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            {{-- body - longer msg --}}
                                            <div class="modal-body">You are about to delete this record. Do you want to
                                                proceed?</div>

                                            {{-- buttons --}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>

                                                <form action="{{ route('admin.technologies.destroy', $technology) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>



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
