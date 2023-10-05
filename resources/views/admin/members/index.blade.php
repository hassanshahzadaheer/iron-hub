@extends('admin_layouts.admin_layout')

@section('admin-content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Members List</h2>
        <a href="{{ route('members.create') }}" class="btn btn-primary">Create Member</a>
    </div>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <!-- Add more columns for member details -->
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <!-- Display other member details as needed -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
