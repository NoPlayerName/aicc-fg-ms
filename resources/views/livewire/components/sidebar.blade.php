<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    {{-- Menu tanpa children menu --}}
                    <a href="{{ route('dashboard') }}" class="waves-effect ">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>


                </li>
                <li>
                    {{-- Parent menu dengan dropdown --}}
                    <a class="has-arrow waves-effect">
                        <i class="ri-currency-line"></i>
                        <span>Transaction</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li class="{{ request()->routeIs('transaksi.stock.index') ? 'active' : '' }}">
                            <a href="{{ route('transaksi.stock.index') }}"><i class="ri-inbox-line"></i>Stock</a>
                        </li>
                        <li class="{{ request()->routeIs('transaksi.stock.masuk.index') ? 'active' : '' }}">
                            <a href="{{ route('transaksi.stock.masuk.index') }}"><i
                                    class="ri-inbox-archive-line"></i>Stock In</a>
                        </li>
                        <li class="{{ request()->routeIs('transaksi.stock.keluar.index') ? 'active' : '' }}">
                            <a href="{{ route('transaksi.stock.keluar.index') }}"><i
                                    class="ri-inbox-unarchive-line"></i>Stock Out</a>
                        </li>

                    </ul>
                </li>
                <li>
                    {{-- Menu tanpa children menu --}}
                    <a href="{{ route('stock.change.index') }}" class="waves-effect ">
                        <i class="ri-file-list-line"></i>
                        <span>Stock Change</span>
                    </a>
                </li>
                <li>
                    {{-- Menu tanpa children menu --}}
                    <a href="{{ route('pallet.data.index') }}" class="waves-effect ">
                        <i class="ri-database-2-line"></i>
                        <span>Pallet Data</span>
                    </a>
                </li>
                <li>
                    {{-- Parent menu dengan dropdown --}}
                    <a class="has-arrow waves-effect">
                        <i class="ri-database-2-line"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li class="{{ request()->routeIs('master.produk.index') ? 'active' : '' }}">
                            <a href="{{ route('master.produk.index') }}"><i class="ri-archive-line"></i>Master
                                Produk</a>
                        </li>
                        <li class="{{ request()->routeIs('master.customer.index') ? 'active' : '' }}">
                            <a href="{{ route('master.customer.index') }}"><i class="ri-group-line"></i>Master
                                Customer</a>
                        </li>
                        <li>
                            <a href="{{ route('master.rack.index') }}"><i class="ri-fridge-line"></i>Master Rak</a>
                        </li>


                    </ul>
                </li>
                <li>
                    {{-- Parent menu dengan dropdown --}}
                    <a class="has-arrow waves-effect">
                        <i class="ri-user-line"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="#" class="ri-user-line">Add
                                User</a>
                        </li>

                    </ul>
                </li>


                {{-- @foreach ($menus as $menu)
                @if ($menu->children->count())
                <li> --}}
                    {{-- Parent menu dengan dropdown --}}
                    {{-- <a class="has-arrow waves-effect">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->name }}</span> --}}
                        {{-- </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @foreach ($menu->children as $child)
                        <li>
                            <a href="{{ route($child->route_name) }}"
                                class="{{ request()->routeIs($child->route_name) ? 'active' : '' }}">{{ $child->name
                                }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @else
                <li> --}}
                    {{-- Menu tanpa children menu --}}
                    {{-- <a href="{{ route($menu->route_name) }}"
                        class="waves-effect {{ request()->routeIs($menu->route_name) ? 'active' : '' }}">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->name }}</span>
                    </a> --}}

                    {{-- <a href='{{ route($menu->route_name) }}' class="waves-effect">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->name }}</span>
                    </a>

                </li>
                @endif
                @endforeach --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>