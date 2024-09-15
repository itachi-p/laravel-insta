<div class = "mt-3">
    {{-- show all comments of the post here --}}

    <form action = "#" method = "post">
        @csrf

        <div      class = "input-group">
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
