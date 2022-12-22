@auth('admin')
    @if(auth()->user()->mission)
        <li class="nav-item">
            <a href="{{ route('admin.missions.show', auth()->user()->mission) }}"
               class="nav-link {{ Request::is('admin/missions*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-truck-moving"></i>
                <p>Current Mission</p>
            </a>
        </li>
    @endif
@endauth

<li class="nav-item">
    <a href="{{ route('admin.home') }}" class="nav-link {{ Request::is('admin/home') ? 'active' : '' }}">
        <i class="nav-icon fa fa-home"></i>
        <p>Home</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.customers.index') }}"
       class="nav-link {{ Request::is('admin/customers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Customers</p>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/orders*') ? 'menu-open ' : '' }}">
    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders*') ? 'active ' : '' }}">
        <i class="nav-icon fas fa-pallet"></i>
        <p>Orders
            <i class="right fa fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview ml-2">
        <li class="nav-item">
            <a href="{{ route('admin.orders.create') }}"
               class="nav-link {{ Request::is('admin/orders/create') ? 'active' : '' }}">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>Create Order</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}"
               class="nav-link {{ Request::is('admin/orders') && !Request::has('filter') ? 'active' : '' }}">
                <i class="nav-icon fa fa-hockey-puck"></i>
                <p>All</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index', ['filter' => 'new']) }}"
               class="nav-link {{ Request::is('admin/orders') && Request::input('filter') == 'new' ? 'active' : '' }}">
                <i class="nav-icon fa fa-hockey-puck"></i>
                <p>New Orders</p>
                <span class="badge badge-info right">{{\App\Models\Order::new()->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index', ['filter' => 'pickable']) }}"
               class="nav-link {{ Request::is('admin/orders') && Request::input('filter') == 'pickable' ? 'active' : '' }}">
                <i class="nav-icon fa fa-hockey-puck"></i>
                <p>Pickable</p>
                <span class="badge badge-info right">{{\App\Models\Order::pickable()->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index', ['filter' => 'operable']) }}"
               class="nav-link {{ Request::is('admin/orders') && Request::input('filter') == 'operable' ? 'active' : '' }}">
                <i class="nav-icon fa fa-hockey-puck"></i>
                <p>Operable</p>
                <span class="badge badge-info right">{{\App\Models\Order::operable()->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index', ['filter' => 'deliverable']) }}"
               class="nav-link {{ Request::is('admin/orders') && Request::input('filter') == 'deliverable' ? 'active' : '' }}">
                <i class="nav-icon fa fa-hockey-puck"></i>
                <p>Deliverable</p>
                <span class="badge badge-info right">{{\App\Models\Order::deliverable()->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index', ['filter' => 'running']) }}"
               class="nav-link {{ Request::is('admin/orders') && Request::input('filter') == 'running' ? 'active' : '' }}">
                <i class="nav-icon fa fa-hockey-puck"></i>
                <p>Running</p>
                <span class="badge badge-info right">{{\App\Models\Order::running()->count()}}</span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('admin.missions.index') }}" class="nav-link {{ Request::is('admin/missions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-truck"></i>
        <p>Missions</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin.income', ['year' => now()->year, 'month' => now()->month]) }}"
       class="nav-link {{ Request::is('admin/income*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>Income</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('admin.vouchers.index') }}" class="nav-link {{ Request::is('admin/vouchers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-money-check-alt"></i>
        <p>Vouchers</p>
    </a>
</li>
<li class="nav-item {{ Request::is('admin/settings*') ? 'menu-open ' : '' }}">
    <a href="{{ route('admin.orders.index') }}" class="nav-link {{ Request::is('admin/orders*') ? 'active ' : '' }}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Settings
            <i class="right fa fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview ml-2">
        <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}"
               class="nav-link {{ Request::is('*settings/categories*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-grip-horizontal"></i>
                <p>Categories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.services.index') }}"
               class="nav-link {{ Request::is('*settings/services*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-boxes"></i>
                <p>Services</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.laundryTypes.index') }}"
               class="nav-link {{ Request::is('*settings/laundry*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tshirt"></i>
                <p>Laundry Types</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.packages.index') }}"
               class="nav-link {{ Request::is('*settings/packages*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-server"></i>
                <p>Packages</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.banners.index') }}"
               class="nav-link {{ Request::is('*settings/banners*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tablet-alt"></i>
                <p>Banners</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.feedbacks.index') }}"
               class="nav-link {{ Request::is('*settings/feedbacks*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comments"></i>
                <p>Feedbacks</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.settings.edit') }}"
               class="nav-link {{ Request::is('*settings/about') ? 'active' : '' }}">
                <i class="nav-icon fas fa-info-circle"></i>
                <p>Information</p>
            </a>
        </li>
    </ul>
</li>
