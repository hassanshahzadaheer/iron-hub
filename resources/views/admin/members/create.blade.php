@extends('admin_layouts.admin_layout')

@section('admin-content')
<div class="container">
    <h2>Create New Member</h2>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
              @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
              @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror
        </div>
        <!-- Add more fields as needed for member details -->

        <button type="submit" class="btn btn-primary">Create Member</button>
    </form>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection
