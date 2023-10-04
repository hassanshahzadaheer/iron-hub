@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (auth()->user()->role === 'admin')
                        {{-- Display admin-specific content --}}
                        <h1>Welcome, Admin!</h1>
                        {{-- Add admin-specific content here --}}
                    @elseif (auth()->user()->role === 'staff')
                        {{-- Display staff-specific content --}}
                        <h1>Welcome, Staff!</h1>
                        {{-- Add staff-specific content here --}}
                    @else
                        {{-- Default content for members --}}
                        {{ __('You are logged in!') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
