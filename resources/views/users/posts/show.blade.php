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
                        <a   href  = "#">
                                @if ($post->user->avatar)
                                    <img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="rounded-circle avatar-sm">
                                @else
                                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                @endif
                            </a>
                        </div>

                        {{-- name --}}
                        <div class = "col ps-0">

                        </div>

                        {{-- Action Buttons --}}
                        <div class = "col-auto">

                        </div>
                    </div>
                </div>

                <div class="card-body w-100 bg-white"></div>
            </div>
        </div>
    </div>
@endsection
