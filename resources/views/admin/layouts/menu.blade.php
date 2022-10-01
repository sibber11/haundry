@auth('admin')
    @if(auth()->user()->mission)
        <li class="nav-item">
            <a href="{{ route('admin.missions.show', auth()->user()->mission) }}"
               class="nav-link {{ Request::is('admin/missions*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Current Mission</p>
            </a>
        </li>
    @endif
@endauth

<li class="nav-item">
    <a href="{{ route('admin.home') }}" class="nav-link {{ Request::is('admin/home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.laundryTypes.index') }}"
       class="nav-link {{ Request::is('admin/laundry*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Laundry Types</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.customers.index') }}"
       class="nav-link {{ Request::is('admin/customers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Customers</p>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/orders*') ? 'menu-open ' : '' }}">
    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders*') ? 'active ' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Orders
            <i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview ml-2">
        <li class="nav-item">
            <a href="{{ route('admin.orders.create') }}"
               class="nav-link {{ Request::is('admin/orders/create') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Create Order</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}"
               class="nav-link {{ Request::is('admin/orders') && !Request::has('filter') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>All</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index', ['filter' => 'pickable']) }}"
               class="nav-link {{ Request::is('admin/orders') && Request::input('filter') == 'pickable' ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Pickable</p>
                <span class="badge badge-info right">{{\App\Models\Order::pickable()->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index', ['filter' => 'operable']) }}"
               class="nav-link {{ Request::is('admin/orders') && Request::input('filter') == 'operable' ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Operable</p>
                <span class="badge badge-info right">{{\App\Models\Order::operable()->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index', ['filter' => 'deliverable']) }}"
               class="nav-link {{ Request::is('admin/orders') && Request::input('filter') == 'deliverable' ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Deliverable</p>
                <span class="badge badge-info right">{{\App\Models\Order::deliverable()->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index', ['filter' => 'running']) }}"
               class="nav-link {{ Request::is('admin/orders') && Request::input('filter') == 'running' ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Running</p>
                <span class="badge badge-info right">{{\App\Models\Order::running()->count()}}</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('admin.categories.index') }}"
       class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Categories</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.services.index') }}" class="nav-link {{ Request::is('admin/service*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Services</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.missions.index') }}" class="nav-link {{ Request::is('admin/missions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Missions</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.packages.index') }}" class="nav-link {{ Request::is('admin/packages*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Packages</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.income', ['year' => now()->year, 'month' => now()->month]) }}"
       class="nav-link {{ Request::is('admin/income*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Income</p>
    </a>
</li>
