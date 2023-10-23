<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
        aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
        aria-controls="offcanvasWithBothOptions">
        <img src="{{ asset('images/iron-hub.png') }}" alt="Gym Logo" class="mr-2" width="50" height="50">Iron Hub
    </button>
</nav>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            <img src="{{ asset('images/iron-hub.png') }}" alt="Gym Logo" class="mr-2" width="50" height="50">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">{{ config('app.name', 'Iron Hub') }}</h5>
        </a>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="position-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#membersSubmenu" data-bs-toggle="collapse">
                        <i class="bi bi-person"></i> Members
                    </a>
                    <ul class="collapse" id="membersSubmenu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('members.create') }}">
                                <i class="bi bi-person-plus"></i> Add New Member
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('members.index') }}">
                                <i class="bi bi-list"></i> List Members
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-pencil"></i> Edit Member
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#billingSubmenu" data-bs-toggle="collapse">
                        <i class="bi bi-currency-dollar"></i> Billing
                    </a>
                    <ul class="collapse" id="billingSubmenu">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-cash"></i> Invoices
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-credit-card"></i> Payments
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-file-earmark-text"></i> Reports
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
