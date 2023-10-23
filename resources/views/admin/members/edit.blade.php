@extends('admin_layouts.admin_layout')

@section('admin-content')
<div class="container">
    <h2>Edit Member</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Use the HTTP PUT method to update the member --}}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $member->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $member->email }}">
        </div>

        <!-- Add more fields as needed for member details -->

        <button type="submit" class="btn btn-primary">Update Member</button>
    </form>
</div>
@endsection
