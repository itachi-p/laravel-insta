@extends('layouts.app')

@section('title', 'Explore People')


@section('content')
    <div class = "row justify-content-center">
    <div class = "col-5">

        <p class = "h5 text-muted mb-4">Search results for "<span class="fw-bold">{{ $search }}</span>"</p>

        @forelse ($users as $user)
            <div class = "row align-items-center mb-3">
                {{-- avatar --}}
                <div class = "col-auto">

                </div>

                {{-- name + email --}}
                <div class = "col ps-0 text-truncate">

                </div>

                {{-- button follow/following --}}
                <div class = "col-auto">

                </div>
            </div>
        @empty
            <p class = "lead text-muted text-center">No results found.</p>
        @endforelse
        </div>
    </div>
@endsection
