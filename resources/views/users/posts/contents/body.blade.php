{{-- clickable image --}}
<div class="container p-0">
    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ $post->image }}" alt="post id {{ $post->id }}" class="w-100">
    </a>
</div>

<div class="card-body">
    {{-- heart button + No. of likes + categories --}}
    <div class="row align-items-center">
        {{-- heart button --}}
        <div class="col-auto">
            {{-- like post --}}
            <form action="#" method="post">
                @csrf
                <button type="submit" class="btn btn-sm shadow-none p-0">
                    <i class="fa-regular fa-heart"></i>
                </button>
            </form>
        </div>

        {{-- No. of likes --}}
        <div class="col-auto px-0 ">
            <span>3</span>
        </div>

        {{-- categories --}}
        <div class="col text-end">
            @forelse ($post->categoryPost as $category_post)
                <span class="badge bg-secondary bg-opacity-50">
                    {{ $category_post->category->name }}
                </span>
            @empty
                <div class="badge bg-dark text-wrap">Uncategorized</div>
            @endforelse
        </div>
    </div>

    {{-- owner + description --}}
    <a href="{{ route('profile.show', $post->user->id) }}" class="text-decoration-none text-dark fw-bold">
        {{ $post->user->name }}
    </a>
    &nbsp;
    <p class="fw-light d-inline">{{ $post->description }}</p>
    <p class="text-uppercase text-muted xsmall">{{ date('M d, Y', strtotime($post->created_at)) }}</p>

    {{-- include comment form here --}}
    @include('users.posts.contents.comments')

</div>
