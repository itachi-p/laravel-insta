@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content')
{{-- Show all categories here --}}
<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf

    <div class="row gx-2 mb-4">
        <div class="col-4">
            <input type="text" name="name" class="form-control" placeholder="Add a Category..." value="{{ old('name') }}" autofocus>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> Add
            </button>
        </div>
        {{-- Error --}}
        @error('name')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
</form>

<table class="table table-hover align-middle bg-white border text-secondary w-75">
    <thead class="small table-warning text-secondary">
        <tr>
            <th>#</th>
            <th>NAME</th>
            <th>COUNT</th>
            <th>LAST_UPDATED</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($all_categories as $category)
        <tr>
            <td class="text-dark">{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->categoryPost->count() }}</td>
            <td>{{ date('M d, Y', strtotime($category->updated_at)) }}</td>

            <td>
                <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal"
                        data-bs-target="#edit-category-{{ $category->id }}">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#delete-category-{{ $category->id }}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                @include('admin.categories.modals.action')
            </td>
        </tr>
        @endforeach
            <tr>
                <td></td>
                <td class = "text-dark">
                    Uncategorized
                    <p class="xsmall mb-0 text-muted">Hidden posts are not included.</p>
                </td>
                <td>{{ $uncategorized_count }}</td>
                <td></td>
                <td></td>
            </tr>
    </tbody>
    {{ $all_categories->links() }}
</table>
@endsection
