@extends('layouts.app')

@section('title', 'Admin: Users')

@section('content')
{{-- Search for users here --}}
<div class="row justify-content-end">
    <div class="col-auto mb-3">
        <form action = "{{ route('admin.search') }}" style = "width: 300px">
            @php
            $search = $search ?? '';  // if $search is not set, set it to an empty string
            @endphp
            <input type="search" name="search" placeholder="Search..." class="form-control form-control-sm"
                value="{{ $search }}">
        </form>
    </div>
</div>

{{-- Show number of users found --}}
<div class="alert alert-warning text-center" role="alert">
    {{ $all_users->isEmpty() ? "No" : $all_users->total() }} users found
</div>

{{-- Show all users here --}}
<table class="table table-hover align-middle bt-white border text-secondary">
    <thead class="small table-success text-secondary">
        <tr>
            <th></th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>CREATED_AT</th>
            <th>STATUS</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($all_users as $user)
        <tr>
            <td>
                @if ($user->avatar)
                <img src="{{ $user->avatar }}" alt="" class="rounded-circle d-block mx-auto avatar-md">
                @else
                <i class="fa-solid fa-circle-user text-center icon-md d-block"></i>
                @endif
            </td>
            <td>
                <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">
                    {{ $user->name }}
                </a>
            </td>
            <td>{{ $user->email }}</td>
            <td>{{ date('M d, Y', strtotime($user->created_at)) }}</td>

            <td>
                {{-- $user->trashed() returns TRUE if the user was soft deleted. --}}
                @if ($user->trashed())
                <i class="fa-regular fa-circle text-secondary"></i>&nbsp;Inactive
                @else
                <i class="fa-solid fa-circle text-success"></i>&nbsp;Active
                @endif
            </td>

            <td>
                {{-- ellipsis button --}}
                @if (Auth::user()->id != $user->id)
                <div class="dropdown">
                    <button class="btn btn-sm" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>

                    <div class="dropdown-menu">
                        @if ($user->trashed())
                        <button class="dropdown-item text-success" data-bs-toggle="modal"
                            data-bs-target="#activate-user-{{ $user->id }}">
                            <i class="fa-solid fa-user-check"></i> Activate {{ $user->name }}
                        </button>
                        @else
                        <button class="dropdown-item text-danger" data-bs-toggle="modal"
                            data-bs-target="#deactivate-user-{{ $user->id }}">
                            <i class="fa-solid fa-user-slash"></i> Deactivate {{ $user->name }}
                        </button>
                        @endif

                    </div>
                </div>
                {{-- Include Deactivate User Modal here --}}
                @include('admin.users.modals.status')
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- Pagination --}}
{{-- {{ $all_users->links() }} --}}

{{-- Pagination with after search --}}
{{ $all_users->appends(['search' => $search])->links() }}
@endsection
