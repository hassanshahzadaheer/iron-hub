@extends('layouts.app')

@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Left Navigation Bar -->
    <aside class="left-sidebar">
        @include('admin_layouts.admin_partials.admin_nav')
    </aside>
    <!-- Main Content -->
    <div class="body-wrapper">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Admin Dashboard</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
                @yield('admin-content')
            </div>
        </div>
    </div>
</div>
@endsection
