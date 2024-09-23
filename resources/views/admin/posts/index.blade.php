@extends('layouts.app')

@section('title', 'Admin: Posts')

@section('content')
{{-- Show all posts here --}}
<table class="table table-hover align-middle bt-white border text-secondary">
    <thead class="small table-success text-secondary">
        <tr>
            <th></th>
            <th></th>
            <th>CATEGORY</th>
            <th>OWNER</th>
            <th>CREATED_AT</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($all_posts as $post)
        <tr>

        </tr>
        @endforeach
    </tbody>
</table>
{{ $all_posts->links() }}
@endsection
