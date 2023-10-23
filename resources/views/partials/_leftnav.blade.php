<!-- resources/views/partials/_leftnav.blade.php -->
 <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('members.index') }}">
                            Members
                        </a>
                    </li>
                    <!-- Add more navigation links for other admin functionalities -->
                </ul>
            </div>
        </nav>
