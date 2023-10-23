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
                <th>Action</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
