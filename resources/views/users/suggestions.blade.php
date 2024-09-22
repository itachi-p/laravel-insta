@extends('layouts.app')

@section('title', 'Suggested Users')

@section('content')
@foreach($suggested_users as $user)
{{-- Avatar --}}
<div class="row">
    <div class="col-auto">
        <a href="{{ route('profile.show', $user->id) }}">
            @if ($user->avatar)
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle avatar-sm">
            @else
            <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
            @endif
        </a>

    </div>
    <div>{{ $user->name }}</div>
    @endforeach
    @endsection
