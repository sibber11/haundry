<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.laundryTypes.index') }}" class="nav-link {{ Request::is('admin.laundryTypes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Laundry Types</p>
    </a>
</li>
