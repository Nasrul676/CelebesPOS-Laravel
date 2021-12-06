<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src">Celebes POS</div>
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
        </div>    <div class="app-header__content">
        <div class="app-header-left">
            <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        
                    </a>
                </li>
                <!-- <li class="nav-item text-center mt-1">
                    <font size="5">
                    <script type="text/javascript">
                    
                    function ngomong() {
                    kien = new Date()
                    jam = kien.getHours();
                    if (jam < 5)
                    omongan ="Selamat Pagi {{ Auth::user()->name }}! Siap Bekerja...!"
                    else if(jam <12)
                    omongan ="Selamat Pagi {{ Auth::user()->name }}! Siap Bekerja...!"
                    else if(jam < 18)
                    omongan ="Selamat Siang {{ Auth::user()->name }}! Tetap Semangat...!"
                    else if (jam < 24)
                    omongan ="Selamat Sore {{ Auth::user()->name }}! Jangan Lupa Makan Malam...!"
                    return( omongan )
                    }
                    document.write(ngomong())
                    </script>
                    </font>
                </li> -->
            </ul>
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    @if(Auth::user()->foto == "")
                                    <img src="{{asset('images/default/default_avatar.png')}}" width="50px">
                                    @else
                                    <img width="42" height="42" class="rounded-circle" src="{{asset('/images/akun/' .Auth::user()->foto)}}" alt="">
                                    @endif
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                            </a>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                {{-- <button type="button" tabindex="0" class="dropdown-item">Settings</button> --}}
                                {{-- <h6 tabindex="-1" class="dropdown-header">Header</h6> --}}
                                {{-- <button type="button" tabindex="0" class="dropdown-item">Actions</button> --}}
                                <div tabindex="-1" class="dropdown-divider"></div>
                                <a href="{{ route('logoutApp') }}" type="button" tabindex="0" class="dropdown-item">Log Out
                                    <form action="{{ route('logoutApp') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-left  ml-3 header-user-info">
                        <div class="widget-heading">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="widget-subheading">
                            {{ Auth::user()->is_admin }}
                        </div>
                    </div>
                    <div class="widget-content-right header-user-info ml-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>