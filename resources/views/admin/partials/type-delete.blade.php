<div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId-{{ $type->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- name --}}
                <h5 class="modal-title" id="modalTitleId-{{ $type->id }}">
                    You are deleting {{ $type->name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- body - longer msg --}}
            <div class="modal-body">You are about to delete this record. Do you want to
                proceed?</div>

            {{-- buttons --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>

                <form action="{{ route('admin.types.destroy', $type) }}" method="post">
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
