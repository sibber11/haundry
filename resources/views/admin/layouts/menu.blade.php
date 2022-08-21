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

<li class="nav-item">
    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ Request::is('admin.customers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Customers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin.orders*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Orders</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ Request::is('admin.categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Categories</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.services.index') }}" class="nav-link {{ Request::is('admin.services*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Services</p>
    </a>
</li>
