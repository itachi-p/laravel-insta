{{-- Likes Modal --}}
<div class="modal fade" id="likes-users-{{ $post->id }}" tabindex="-1" aria-labelledby="likesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <div class="h5 modal-title text-secondary mx-auto">
                    <i class="fa-solid fa-heart text-danger"></i> Likes
                </div>
            </div>
            <div class = "modal-body mx-auto">
            <ul  class = "list-group">
                    @foreach($post->likes as $like)
                    <li class="d-flex align-items-center mb-2">
                        @if ($like->user->avatar)
                        <img src="{{ $like->user->avatar }}" alt="{{ $like->user->name }}"
                            class="rounded-circle avatar-md">
                        @else
                        <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                        @endif
                        <p class="d-inline">{{ $like->user->name }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                </div>
            </div>
            --}}
        </div>
    </div>
</div>
