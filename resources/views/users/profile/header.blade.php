<div class = "row">
    {{-- profile avatar --}}
    <div class = "col-4">
        @if ($user->avatar)
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}"
                class="img-thumnail rounded-circle d-block mx-auto avatar-lg">
        @else
            <i class = "fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
        @endif
    </div>

    {{-- profile info --}}
    <div class = "col-8">
        <div class = "row mb-3">
            {{-- name --}}
            <div class = "col-auto">
                <h2 class="display-6 mb-0">{{ $user->name }}</h2>
            </div>

            {{-- Action buttons: edit/follow/following --}}
            <div class = "col-auto p-2">
                @if (Auth::user()->id === $user->id)
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary btn-sm fw-bold">Edit
                        Profile</a>
                @else
                    @if ($user->isFollowed())
                        {{-- unfollow user --}}
                        <form action = "{{ route('follow.destroy', $user->id) }}" method = "post" class = "d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">Following</button>
                        </form>
                    @else
                        {{-- follow user --}}
                        <form action="{{ route('follow.store', $user->id) }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>

        <div class = "row mb-3">
            {{-- num of posts --}}
            <div class = "col-auto">
            <a   href  = "{{ route('profile.show', $user->id) }}" class = "text-decoration-none text-dark">
                    {{-- condition ? true statement : false statement --}}
                    <strong>{{ $user->posts->count() }}</strong> {{ $user->posts->count() == 1 ? 'post' : 'posts' }}
                </a>
            </div>

            {{-- num of followers --}}
            <div class="col-auto">
                <a href="{{ route('profile.followers', $user->id) }}" class="text-decoration-none text-dark">
                    <strong>{{ $user->followers->count() }}</strong> {{ $user->followers->count() == 1 ? 'follower' : 'followers' }}
                </a>

            </div>

            {{-- num of following --}}
            <div class = "col-auto">
                <a href  = "{{ route('profile.following', $user->id) }}" class = "text-decoration-none text-dark">
                    <strong>{{ $user->following->count() }}</strong> following
                </a>
            </div>

            <p class="fw-bold">{{ $user->introduction }}</p>
        </div>
    </div>
</div>
