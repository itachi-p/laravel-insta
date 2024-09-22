@extends('layouts.app')

@section('title', 'Suggested Users')

@section('content')
    @foreach ($suggested_users as $user)
        {{-- Avatar --}}
        <div class="row justify-content-center mb-3 border border-1">
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
            <div class = "col-6">
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">
                            {{ $user->name }}
                        </a>
                    </div>
                    <p class = "m-0">{{ $user->email }}</p>
                    <p class="m-0">
                        {{ $user->posts->count() }} {{ $user->posts->count() == 1 ? 'post' : 'posts' }},
                        {{ $user->followers->count() }} {{ $user->followers->count() == 1 ? 'follower' : 'followers' }},
                        {{ $user->following->count() }} following
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
