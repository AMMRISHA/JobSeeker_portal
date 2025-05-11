<!-- Sidebar (partials/sidebar.blade.php) -->
<div class="col-md-2 p-0 bg-dark" id="sidebar">
    <nav class="sidebar d-flex flex-column p-3 text-white h-100">
        <h5 class="text-center py-4 border-bottom border-secondary text-white">Panel</h5>
        <ul class="nav flex-column" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('dashboard')}}"><i class="fa-solid fa-table-columns mr-2"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fas fa-users mr-2"></i>Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('application') }}"><i class="fa-solid fa-file mr-2"></i>Applications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-address-card mr-2"></i>About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-user mr-2"></i>Added Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fas fa-cog mr-2"></i>Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-file-import mr-2"></i>Import</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-gear mr-2"></i>Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-clipboard-list mr-2"></i>Interview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-user mr-2"></i>Not Selected</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-handshake mr-2"></i>Selected</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-bullhorn mr-2"></i>Announcements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa-solid fa-address-book mr-2"></i>Contact</a>
            </li>
        </ul>
    </nav>
</div>


@push('after-scripts')

@endpush