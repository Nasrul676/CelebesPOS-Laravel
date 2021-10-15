<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
                </button>
            </span>
        </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="{{route('dashboard')}}" class="@yield('sidebar')">
                        <i class="metismenu-icon fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                @if(Auth::user()->is_admin == "admin")
                <li class="app-sidebar__heading">Admin</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-box-open"></i>
                        Produk
                        <i class="metismenu-state-icon fas fa-angle-double-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('product')}}" class="@yield('sidebarproduk')">
                                <i class="metismenu-icon"></i>
                                Data Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{route('kategori')}}" class="@yield('sidebarkategori')">
                                <i class="metismenu-icon"></i>
                                Kategori Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{route('satuan')}}" class="@yield('sidebarsatuan')">
                                <i class="metismenu-icon"></i>
                                Satuan Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{route('suppliner')}}" class="@yield('sidebarsupplier')">
                                <i class="metismenu-icon"></i>
                                Supplier
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fas fa-dolly"></i>
                        Stok Produk
                        <i class="metismenu-state-icon fas fa-angle-double-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('stok_in')}}" class="@yield('sidebarstokin')">
                                <i class="metismenu-icon"></i>
                                Stok Masuk
                            </a>
                        </li>
                        <li>
                            <a href="{{route('stok_out')}}" class="@yield('sidebarstokout')">
                                <i class="metismenu-icon"></i>
                                Stok Keluar
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('customer')}}" class="@yield('sidebarcustomer')">
                        <i class="metismenu-icon fas fa-address-card"></i>
                        Customer
                    </a>
                </li>
                @endif
                <li class="app-sidebar__heading">Transaksi</li>
                <li>
                    <a href="{{route('sales')}}" class="closed-sidebar @yield('sales')">
                        <i class="metismenu-icon fas fa-cart-arrow-down"></i>
                        Kasir
                    </a>
                </li>
                <li>
                    <a href="{{route('history')}}" class="closed-sidebar @yield('history')">
                        <i class="metismenu-icon fas fa-history"></i>
                        Riwayat Transaksi
                    </a>
                </li>
                <!-- <li>
                    <a href="{{route('hutang')}}" class="closed-sidebar @yield('hutang')">
                        <i class="metismenu-icon fas fa-book"></i>
                        Hutang
                    </a>
                </li>
                <li>
                    <a href="" class="closed-sidebar">
                        <i class="metismenu-icon fas fa-database"></i>
                        Piutang
                    </a>
                </li> -->
                <!-- @if(Auth::user()->is_admin == "admin")
                <li class="app-sidebar__heading">Laba</li>
                <li>
                    <a href=""><i class="metismenu-icon fas fa-plus-circle"></i>Untung</a>
                </li>
                <li>
                    <a href=""><i class="metismenu-icon fas fa-minus-circle"></i>Rugi</a>
                </li>
                @endif -->
                @if(Auth::user()->is_admin == "admin")

                <li class="app-sidebar__heading">Laporan</li>
                <li>
                    <a href="{{route('laporan')}}" class="@yield('laporan')">
                        <i class="metismenu-icon fas fa-bullhorn"></i>
                        Stok Barang
                    </a>
                </li>
                <li>
                    <a href="{{route('laporan_laris')}}" class="@yield('laporan_laris')">
                        <i class="metismenu-icon fas fa-tags"></i>
                        Produk Paling Laris
                    </a>
                </li>
                @endif
                <li class="app-sidebar__heading">Pengaturan</li>
                @if(Auth::user()->is_admin == "admin")
                <li>
                    <a href="{{route('akun')}}" class="@yield('sidebarakun')">
                        <i class="metismenu-icon fas fa-address-book"></i>
                        Akun
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <i class="metismenu-icon fas fa-power-off"></i>
                        Keluar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>