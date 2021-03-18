<div id="kt_header" class="header  header-fixed ">
    <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                <ul class="menu-nav ">
                    <li class="menu-item"><a href="/" class="menu-link"><span class="menu-text">{{__('keywords.home.page')}}</span><i class="menu-arrow"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="topbar">
            <div class="topbar-item">
                <div
                    class="btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                    id="kt_quick_user_toggle">
                                <span
                                    class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()['name']}}</span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        <img class="rounded img-fluid" src="{{auth()->user()['profile_photo_url']}}" height="50" width="50" alt="">
		           </span>
                </div>

                <div class="mx-5">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn"><i class="fas fa-door-open" title="{{__('keywords.logout')}}"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
