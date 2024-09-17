@extends('layouts.app')

@section('title', 'Edit Profile')


@section('content')
    <div class="row fustify-content-center">
        <div class="col-8">
            <form action="#" method="post" class="bg-white shadow rounded-3 p-5" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <h2 class="h3 mb-3 fw-light text-muted">Update Profile</h2>

                {{-- avatar & upload image --}}
                <div class="row mb-3">

                </div>

                {{-- name --}}
                <div class="mb-3">

                </div>

                {{-- email --}}
                <div class="mb-3">

                </div>

                {{-- introduction --}}
                <div class="mb-3">

                </div>

                <button type="submit" class="btn btn-warning px-5">Save</button>
            </form>
        </div>
    </div>
@endsection
