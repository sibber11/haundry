<ul @class(['hidden', 'sm:flex sm:flex-col sm:gap-2' => $flex])
    id="main-nav">
    <li class="nav-item highlight my-1">
        <a @class(['block' => $flex]) href="{{route('orders.create')}}">Order Now</a>
    </li>
    <li @class(['nav-item my-1 border-2', 'active' => Request::routeIs('profile')])>
        <a @class(['block' => $flex, 'nav-link']) href="{{route('profile')}}">Profile</a>
    </li>
    <li @class(['nav-item my-1', 'active' => Request::routeIs('address.edit')])>
        <a @class(['block' => $flex, 'nav-link']) href="{{route('address.edit')}}">Address</a>
    </li>
    <li @class(['nav-item my-1', 'active' => Request::routeIs('orders.index')])>
        <a @class(['block' => $flex, 'nav-link']) href="{{route('orders.index')}}">Orders</a>
    </li>
    <li @class(['nav-item my-1 border-2', 'active' => Request::routeIs('voucher')])>
        <a @class(['block' => $flex, 'nav-link']) href="{{route('voucher')}}">Vouchers & Points</a>
    </li>
    <li @class(['nav-item my-1 border-2', 'active' => Request::routeIs('referview')])>
        <a @class(['block' => $flex, 'nav-link']) href="{{route('referview')}}">Refer</a>
    </li>
    <li @class(['nav-item my-1 border-2', 'active' => Request::routeIs('pacakges')])>
        <a @class(['block' => $flex, 'nav-link']) href="{{route('packages')}}">Packages</a>
    </li>
</ul>
