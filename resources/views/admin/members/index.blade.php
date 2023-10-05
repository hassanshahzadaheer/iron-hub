@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Members List</h2>

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
