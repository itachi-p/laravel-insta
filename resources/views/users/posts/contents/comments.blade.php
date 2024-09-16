<div class = "mt-3">
    {{-- show all comments of the post here --}}
    @if ($post->comments->isNotEmpty())
        <hr>

        <ul class = "list-group">
            @foreach ($post->comments->take(3) as $comment)
                <!-- take(3) retrieves only the first(its mean OLDEST) 3 records.-->
                <li class = "list-group-item border-0 p-0 mb-2">
                    <a href  = "{{ route('profile.show', $comment->user->id) }}" class = "text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                    &nbsp;
                    <p class = "d-inline fw-light">{{ $comment->body }}</p>

                    <form action = "{{ route('comment.destroy', $comment->id) }}" method = "post">
                        @csrf
                        @method('DELETE')

                        <span
                            class = "text-uppercase text-muted xsmall">{{ date('M d, Y', strtotime($comment->created_at)) }}</span>

                        {{-- If the AUTH USER is the OWNER of the COMMENT, show the DELETE BUTTON --}}
                        @if (AUTH::user()->id === $comment->user->id)
                            &middot; <!-- middle dot -> "・" -->
                            <button type="submit" class="border-0 bg-transparent text-danger p-0 xsmall">Delete</button>
                        @endif
                    </form>
                </li>
            @endforeach

            <!-- Only executed if there are 4 or more records after the first 3 (or less) are displayed -->
            @if ($post->comments->count() > 3)
                <li class = "list-group-item border-0 px-0 pt-0">
                    <a href  = "{{ route('post.show', $post->id) }}" class = "text-decoration-none small">
                        View all {{ $post->comments->count() }} comments.
                    </a>
                </li>
            @endif
        </ul>
    @endif

    {{-- Comment Form --}}
    <form action = "{{ route('comment.store', $post->id) }}" method = "post">
        @csrf

        <div class = "input-group">
            <textarea name  = "comment_body{{ $post->id }}" rows = "1" placeholder = "Add a comment..."
                class = "form-control form-control-sm">{{ old('comment_body' . $post->id) }}</textarea>

            <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
        </div>
        {{-- Error --}}
        @error('comment_body' . $post->id)
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </form>
</div>
