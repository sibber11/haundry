<aside class="hidden md:block md:w-60 md:m-4 bg-white md:bg-gray-100 md:rounded -mt-3 pt-3 px-4 pb-4"
       id="main-nav">
    <ul class="border-t border-gray-200 md:border-0">
        <li class="nav-item highlight mt-3 mx-2">
            <a @class(['block' => $flex]) href="{{route('orders.create')}}">Order Now</a>
        </li>
        <li @class(['nav-item my-1', 'active' => Request::routeIs('profile')])>
            <a @class(['block' => $flex, 'nav-link']) href="{{route('profile')}}">Profile</a>
        </li>
        <li @class(['nav-item my-1', 'active' => Request::routeIs('address.edit')])>
            <a @class(['block' => $flex, 'nav-link']) href="{{route('address.edit')}}">Address</a>
        </li>
        <li @class(['nav-item my-1', 'active' => Request::routeIs('orders.index')])>
            <a @class(['block' => $flex, 'nav-link']) href="{{route('orders.index')}}">Orders</a>
        </li>
        {{--    <li @class(['nav-item my-1', 'active' => Request::routeIs('voucher')])>--}}
        {{--        <a @class(['block' => $flex, 'nav-link']) href="{{route('voucher')}}">Vouchers & Points</a>--}}
        {{--    </li>--}}
        <li @class(['nav-item my-1', 'active' => Request::routeIs('referview')])>
            <a @class(['block' => $flex, 'nav-link']) href="{{route('referview')}}">Refer</a>
        </li>
        <li class="nav-item my-1 md:hidden">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit"
                        class="block w-full text-left text-red-500 hover:text-red-600 font-bold">
                    Sign out
                </button>
            </form>
        </li>
        {{--    <li @class(['nav-item my-1', 'active' => Request::routeIs('pacakges')])>--}}
        {{--        <a @class(['block' => $flex, 'nav-link']) href="{{route('packages')}}">Packages</a>--}}
        {{--    </li>--}}
    </ul>
</aside>
