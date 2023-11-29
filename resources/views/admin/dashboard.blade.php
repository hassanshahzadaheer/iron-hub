@extends('admin_layouts.admin_layout')

@section('content')
`<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
`        <!-- Left Navigation Bar -->
        <aside class="left-sidebar">
            @include('admin_layouts.admin_partials.admin_nav')
        </aside>


          <!--  Main wrapper -->
    <div class="body-wrapper">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
            <p class="mb-0">@yield('admin-content') </p>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection
