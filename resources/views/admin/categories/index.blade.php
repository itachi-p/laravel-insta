@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content')
{{-- Show all categories here --}}

{{-- 新しいカテゴリーの入力フィールドとボタン(別画面には移動せず、下部のリストに直接追加する) --}}
<div class="d-flex justify-content-between">
    <form action="#" method="POST">
        @csrf
        <div    class = "input-group mb-3">
        <input  type  = "text" class           = "form-control" name = "name" placeholder = "Add new Category" required>
        <button class = "btn btn-primary" type = "submit">
                <i class="fa-solid fa-plus"></i> Add
            </button>
        </div>
    </form>
</div>

<table class = "table table-hover align-middle bg-white border text-secondary w-75">
<thead class = "small table-warning text-secondary">
        <tr>
            <th>#</th>
            <th>NAME</th>
            <th>COUNT</th>
            <th>LAST_UPDATED</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        {{-- {{ dd($all_categories) }} --}}
        @foreach ($all_categories as $category)
        <tr>
            <td class="text-dark">{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            {{-- categoryが含まれるpostの数を表示 --}}
            <td>{{ $category->posts->count() }}</td>
            <td>
                {{ date('M d, Y', strtotime($category->updated_at)) }}
            </td>

            {{-- 編集と削除ボタン（モーダル action.blade.phpで表示） --}}
            <td>
                <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal"
                        data-bs-target="#editCategory{{ $category->id }}">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteCategory{{ $category->id }}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
