@extends('layouts.app')

@section('title', 'Admin: Posts')

@section('content')
{{-- Show all posts here --}}
<table class="table table-hover align-middle bt-white border text-secondary">
    <thead class="small table-primary text-secondary">
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
            <td>
                {{ $post->id }}
            </td>
            <td>
                <img src = "{{ $post->image }}" alt = "{{ $post->name }}" class = "d-block mx-auto image-lg">
            </td>
            <td>
                {{-- CATEGORY --}}
                <a href="{{ route('profile.show', $post->id) }}" class="text-decoration-none text-dark fw-bold">
                    {{ $post->name }}
                </a>
            </td>
            <td>{{ $post->user->name }}</td>
            <td>{{ date('M d, Y', strtotime($post->created_at)) }}</td>

        </tr>
        @endforeach
    </tbody>
</table>
{{ $all_posts->links() }}
@endsection
