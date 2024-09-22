@extends('layouts.app')

@section('title', 'Suggested Users')

@section('content')
    @foreach($suggested_users as $user)
        <div>{{ $user->name }}</div>
    @endforeach
@endsection
