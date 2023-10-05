@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Member</h2>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <!-- Add more fields as needed for member details -->

        <button type="submit" class="btn btn-primary">Create Member</button>
    </form>
</div>
@endsection
