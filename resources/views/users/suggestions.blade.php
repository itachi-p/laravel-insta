@extends('layouts.app')

@section('title', 'Suggested Users')

@section('content')
    @foreach ($suggested_users as $user)
        {{-- Avatar --}}
        <div class="row justify-content-center mb-3 align-items-center">
            <div class="col-auto pt-2">
                <a href="{{ route('profile.show', $user->id) }}">
                    @if ($user->avatar)
                        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle avatar-md">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                    @endif
                </a>
            </div>

            {{-- Name + Email --}}
            <div class = "col-3">
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">
                            {{ $user->name }}
                        </a>
                    </div>
                    <p class = "m-0">{{ $user->email }}</p>
                    <p class = "m-0">
                        @if ($user->followers->count() == 0)
                            No followers yet
                        @else
                            {{ $user->followers->count() }} {{ $user->followers->count() == 1 ? 'follower' : 'followers' }}
                        @endif
                    </p>
                </div>
            </div>

            {{-- Follow/Following button --}}
            <div class="col-auto pt-2">
                @if ($user->id != Auth::user()->id)
                    @if ($user->isFollowed())
                        {{-- unfollow user --}}
                        <form action="{{ route('follow.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">Following</button>
                        </form>
                    @else
                        {{-- follow user --}}
                        <form action="{{ route('follow.store', $user->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    @endforeach
@endsection
