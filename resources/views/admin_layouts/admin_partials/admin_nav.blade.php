    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Members</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('members.create') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-user-add"></i>
                    </span>
                    <span class="hide-menu">Add New Member</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('members.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-view-list-alt"></i>
                    </span>
                    <span class="hide-menu">List Members</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-pencil"></i>
                    </span>
                    <span class="hide-menu">Edit Member</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Billing</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-receipt"></i>
                    </span>
                    <span class="hide-menu">Invoices</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-credit-card"></i>
                    </span>
                    <span class="hide-menu">Payments</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Reports</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                    <span>
                        <i class="ti ti-file"></i>
                    </span>
                    <span class="hide-menu">Reports</span>
                </a>
            </li>
        </ul>

    </nav>
    <!-- End Sidebar navigation -->
</div>
