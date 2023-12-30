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
        {{--        Header  --}}
        @include('admin_layouts.admin_partials.header')

        <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                @yield('admin-content')
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
