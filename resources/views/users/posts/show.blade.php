@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    <div class="row border shadow">
        {{-- post image --}}
        <div class="col p-0 border-end">
            <img src="{{ $post->image }}" alt="post id {{ $post->id }}" class="w-100">
        </div>

        {{-- details of a post --}}
        <div class = "col-4 px-0 bg-white">
            <div class = "card border-0">
                <div class = "card-header bg-white py-3">
                    <div class = "row align-items-center">
                        {{-- avatar --}}
                        <div class = "col-auto">
                            <a href  = "#">
                                @if ($post->user->avatar)
                                    <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}"
                                        class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif
                            </a>
                        </div>

                        {{-- name --}}
                        <div class = "col ps-0">
                            <a href  = "#" class = "text-decoration-none text-dark">
                                {{ $post->user->name }}
                            </a>
                        </div>

                        {{-- Action Buttons --}}
                        <div class = "col-auto">
                            {{-- If you are the owner of th post, you can edit or delete this post --}}
                            @if (Auth::user()->id === $post->user->id)
                                <button class = "btn btn-sm shadow-none" data-bs-toggle = "dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div class = "dropdown-menu">
                                    {{-- edit --}}
                                    <a href  = "{{ route('post.edit', $post->id) }}" class = "dropdown-item">
                                        <i class = "fa-regular fa-pen-to-square"></i> Edit
                                    </a>

                                    {{-- delete --}}
                                    <button class = "dropdown-item text-danger" data-bs-toggle = "modal"
                                        data-bs-target = "#delete-post-{{ $post->id }}">
                                        <i class="fa-regular fa-trash-can"></i> Delete
                                    </button>
                                </div>
                                {{-- include modal here --}}
                                @include('users.posts.contents.modals.delete')
                            @else
                                <form action = "#" method = "post">
                                    @csrf

                                    <button type="submit" class="border-0 bg-transparent p-0 text-primary">Follow</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- DETAILS --}}
                <div class = "card-body w-100 bg-white">
                    {{-- heart button + No. of likes + categories --}}
                    <div class = "row align-items-center">
                        {{-- heart button --}}
                        <div class = "col-auto">
                            {{-- like post --}}
                            <form action = "#" method = "post">
                                @csrf
                                <button type = "submit" class = "btn btn-sm shadow-none p-0">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                            </form>
                        </div>

                        {{-- No. of likes --}}
                        <div class = "col-auto px-0">
                            <span>3</span>
                        </div>

                        {{-- categories --}}
                        <div class = "col text-end">
                            @forelse ($post->categoryPost as $category_post)
                                <span class = "badge bg-secondary bg-opacity-50">
                                    {{ $category_post->category->name }}
                                </span>
                            @empty
                                <div class="badge bg-dark text-wrap">Uncategorized</div>
                            @endforelse
                        </div>
                    </div>

                    {{-- owner + description --}}
                    <a href = "#" class = "text-decoration-none text-dark fw-bold">
                        {{ $post->user->name }}
                    </a>
                    &nbsp;
                    <p class = "fw-light d-inline">{{ $post->description }}</p>
                    <p class = "text-uppercase text-muted xsmall">{{ date('M d, Y', strtotime($post->created_at)) }}</p>

                    {{-- form comment --}}

                </div>
            </div>
        </div>
    </div>
@endsection
