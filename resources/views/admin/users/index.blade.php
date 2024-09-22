@extends('layouts.app')

@section('title', 'Admin: Users')

@section('content')
    {{-- Show all users here --}}
    <table class = "table table-hover align-middle bt-white border text-secondary">
        <thead class = "small table-success text-secondary">
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
                        <a href = "{{ route('profile.show', $user->id) }}" class = "text-decoration-none text-dark fw-bold">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('M d, Y', strtotime($user->created_at)) }}</td>
                    <td>
                        <i class="fa-solid fa-circle text-success"></i>&nbsp;Active
                    </td>
                    <td>
                        @if (Auth::user()->id != $user->id)
                            <div    class = "dropdown">
                            <button class = "btn btn-sm" data-bs-toggle = "dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div    class = "dropdown-menu">
                                    <button class = "dropdown-item text-danger" data-bs-toggle = "modal" data-bs-target="#deactivate-user-{{ $user->id }}">
                                        <i class="fa-solid fa-user-slash"></i> Deactivate {{ $user->name }}
                                    </button>
                                </div>
                            </div>
                            {{-- Include Deactivate User Modal here --}}

                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
