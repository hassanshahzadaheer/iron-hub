@extends('admin_layouts.admin_layout')

@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="row">
        <!-- Left Navigation Bar -->
        <aside class="left-sidebar">
            @include('admin_layouts.admin_partials.admin_nav')
        </aside>


        <!-- Main Content -->



        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Dashboard</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <h1>Welcome, {{ $adminName }}!</h1>
                </div>
            </div>
            @yield('admin-content')
        </main>
    </div>
</div>
@endsection
