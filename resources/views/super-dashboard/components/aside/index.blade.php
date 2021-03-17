<div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="text-center p-3" id="kt_brand">
        <!--begin::Logo-->
        <a href="{{route('super-dashboard.index')}}" class="brand-logo">
            <img alt="Logo" src="/logo/white-logo.svg" class="img-fluid" height="400"/>
        </a>
        <!--end::Logo-->

        <!--begin::Toggle-->

        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
				<span class="svg-icon svg-icon svg-icon-xl"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/Navigation/Angle-double-left.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
            fill="#000000" fill-rule="nonzero"
            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
        <path
            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"
            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
    </g>
</svg><!--end::Svg Icon--></span></button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->

    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        <!--begin::Menu Container-->
        <div
            id="kt_aside_menu"
            class="aside-menu my-4 "
            data-menu-vertical="1"
            data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav ">
                <li class="menu-section ">
                    <h4 class="menu-text">Custom</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.slider.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.slider.show')}}" class="menu-link menu-toggle">
                        <span class="menu-text"><i class="nav-icon fas fa-columns mx-3"></i>{{__('keywords.slider')}}</span></a></li>


                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.aboutAhmed.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.aboutAhmed.show')}}" class="menu-link menu-toggle"><span class="menu-text"><i class="nav-icon fas fa-male mx-4"></i>{{__('keywords.about.ahmad')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.aboutFoundation.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.aboutFoundation.show')}}" class="menu-link menu-toggle"><span class="menu-text"><i class="nav-icon far fa-building mx-3"></i>{{__('keywords.about.foundation')}}</span></a></li>
                <li class="menu-section ">
                    <h4 class="menu-text">{{__('keywords.old.man.museum')}}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.oldManMemoryVideos.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.oldManMemoryVideos.show')}}" class="menu-link menu-toggle"><i class="fas fa-video mx-3"></i><span class="menu-text">{{__('keywords.old.man.memory.videos')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.oldManStuff.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.oldManStuff.show')}}" class="menu-link menu-toggle"><i class="mx-3 fas fa-couch"></i><span class="menu-text">{{__('keywords.old.stuff')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.oldManImages.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.oldManImages.show')}}" class="menu-link menu-toggle"><i class="mx-3 fas fa-camera-retro"></i><span class="menu-text">{{__('keywords.old.man.images')}}</span></a></li>

                <li class="menu-section ">
                    <h4 class="menu-text">{{__('keywords.awards.department')}}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>

                <li class="menu-item @if(route('super-dashboard.awards.show') == url()->current()) menu-item-open @endif" aria-haspopup="true">
                    <a href="{{route('super-dashboard.awards.show')}}" class="menu-link">

                        <span class="menu-text"><i class="nav-icon fas fa-gift mx-3"></i> {{__('keywords.awards')}}</span></a></li>
                <li class="menu-section ">
                    <h4 class="menu-text">{{__('keywords.news.center')}}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.lastNews.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.lastNews.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 fas fa-newspaper"></i><span class="menu-text">{{__('keywords.last.news')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.lastAds.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.lastAds.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 fas fa-ad"></i><span class="menu-text">{{__('keywords.last.ads')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.contactUs.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.contactUs.show')}}" class="menu-link menu-toggle"><i class="mx-3 far fa-envelope"></i><span class="menu-text">{{__('keywords.contact.us')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(route('super-dashboard.logoFoundation.show') == url()->current()) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.logoFoundation.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 fab fa-galactic-republic"></i><span class="menu-text">{{__('keywords.logo.foundation')}}</span></a></li>

                <li class="menu-section ">
                    <h4 class="menu-text">Features</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/Shopping/Box2.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z"
            fill="#000000"/>
        <path
            d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Bootstrap</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Bootstrap</span></span></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/bootstrap/typography.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Typography</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/bootstrap/buttons.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Buttons</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/bootstrap/button-group.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Button Group</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/bootstrap/dropdown.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Dropdown</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/bootstrap/navs.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Navs</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/bootstrap/tables.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Tables</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/bootstrap/progress.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Progress</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/bootstrap/modal.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Modal</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/bootstrap/alerts.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Alerts</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/bootstrap/popover.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Popover</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/bootstrap/tooltip.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Tooltip</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/Files/Pictures1.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
            fill="#000000" opacity="0.3"/>
        <polygon fill="#000000" opacity="0.3" points="4 19 10 11 16 19"/>
        <polygon fill="#000000" points="11 19 15 14 19 19"/>
        <path
            d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Custom</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Custom</span></span></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/utilities.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Utilities</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/label.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Labels</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/pulse.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Pulse</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/line-tabs.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Line Tabs</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/custom/advance-navs.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Advance Navs</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/timeline.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Timeline</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/custom/pagination.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Pagination</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/symbol.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Symbol</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/overlay.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Overlay</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/spinners.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Spinners</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/iconbox.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Iconbox</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/callout.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Callout</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/custom/ribbons.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Ribbons</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/custom/accordions.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Accordions</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/Layout/Layout-arrange.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
            fill="#000000"/>
        <path
            d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Cards</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Cards</span></span></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/cards/general.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">General Cards</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/cards/stacked.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Stacked Cards</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/cards/tabbed.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Tabbed Cards</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/cards/draggable.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Draggable Cards</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/cards/tools.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Cards Tools</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/cards/sticky.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Sticky Cards</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/cards/stretched.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Stretched Cards</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/Devices/Diagnostics.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="18" rx="2"/>
        <path
            d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z"
            fill="#000000" fill-rule="nonzero"/>
        <circle fill="#000000" opacity="0.3" cx="19" cy="6" r="1"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Widgets</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Widgets</span></span></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/widgets/lists.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Lists</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/widgets/stats.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Stats</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/widgets/charts.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Charts</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/widgets/mixed.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Mixed</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/widgets/tiles.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Tiles</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/widgets/engage.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Engage</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/widgets/base-tables.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Base Tables</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/widgets/advance-tables.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Advance Tables</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/widgets/feeds.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Feeds</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/widgets/nav-panels.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Nav Panels</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/General/Attachment2.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"
            fill="#000000" opacity="0.3"
            transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641) "/>
        <path
            d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"
            fill="#000000"
            transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359) "/>
        <path
            d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"
            fill="#000000" opacity="0.3"
            transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146) "/>
        <path
            d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"
            fill="#000000" opacity="0.3"
            transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961) "/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Icons</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item " aria-haspopup="true"><a href="features/icons/svg.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">SVG Icons</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/icons/custom-icons.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Custom Icons</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/icons/flaticon.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Flaticon</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/icons/fontawesome5.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Fontawesome 5</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/icons/lineawesome.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Lineawesome</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/icons/socicons.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Socicons</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/Design/Select.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z"
            fill="#000000" opacity="0.3"/>
        <path
            d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Calendar</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Calendar</span></span></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/calendar/basic.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Basic Calendar</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/calendar/list-view.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">List Views</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/calendar/google.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Google Calendar</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/calendar/external-events.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">External Events</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/calendar/background-events.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Background Events</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/Media/Equalizer.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Charts</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Charts</span></span></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/charts/apexcharts.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Apexcharts</span></a></li>
                            <li class="menu-item  menu-item-submenu" aria-haspopup="true"
                                data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle"><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">amCharts</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu "><i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item " aria-haspopup="true"><a
                                                href="features/charts/amcharts/charts.html"
                                                class="menu-link "><i
                                                    class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                    class="menu-text">amCharts Charts</span></a></li>
                                        <li class="menu-item " aria-haspopup="true"><a
                                                href="features/charts/amcharts/stock-charts.html"
                                                class="menu-link "><i
                                                    class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                    class="menu-text">amCharts Stock Charts</span></a></li>
                                        <li class="menu-item " aria-haspopup="true"><a
                                                href="features/charts/amcharts/maps.html" class="menu-link "><i
                                                    class="menu-bullet menu-bullet-dot"><span></span></i><span
                                                    class="menu-text">amCharts Maps</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/charts/flotcharts.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Flot Charts</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/charts/google-charts.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Google Charts</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/Home/Book-open.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z"
            fill="#000000"/>
        <path
            d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Maps</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Maps</span></span></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/maps/google-maps.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Google Maps</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/maps/leaflet.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Leaflet</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a href="features/maps/jqvmap.html"
                                                                           class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">JQVMap</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="javascript:;" class="menu-link menu-toggle"><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/assets/super-dashboard/assets/media/svg/icons/Home/Mirror.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M13,17.0484323 L13,18 L14,18 C15.1045695,18 16,18.8954305 16,20 L8,20 C8,18.8954305 8.8954305,18 10,18 L11,18 L11,17.0482312 C6.89844817,16.5925472 3.58685702,13.3691811 3.07555009,9.22038742 C3.00799634,8.67224972 3.3975866,8.17313318 3.94572429,8.10557943 C4.49386199,8.03802567 4.99297853,8.42761593 5.06053229,8.97575363 C5.4896663,12.4577884 8.46049164,15.1035129 12.0008191,15.1035129 C15.577644,15.1035129 18.5681939,12.4043008 18.9524872,8.87772126 C19.0123158,8.32868667 19.505897,7.93210686 20.0549316,7.99193546 C20.6039661,8.05176407 21.000546,8.54534521 20.9407173,9.09437981 C20.4824216,13.3000638 17.1471597,16.5885839 13,17.0484323 Z"
            fill="#000000" fill-rule="nonzero"/>
        <path
            d="M12,14 C8.6862915,14 6,11.3137085 6,8 C6,4.6862915 8.6862915,2 12,2 C15.3137085,2 18,4.6862915 18,8 C18,11.3137085 15.3137085,14 12,14 Z M8.81595773,7.80077353 C8.79067542,7.43921955 8.47708263,7.16661749 8.11552864,7.19189981 C7.75397465,7.21718213 7.4813726,7.53077492 7.50665492,7.89232891 C7.62279197,9.55316612 8.39667037,10.8635466 9.79502238,11.7671393 C10.099435,11.9638458 10.5056723,11.8765328 10.7023788,11.5721203 C10.8990854,11.2677077 10.8117724,10.8614704 10.5073598,10.6647638 C9.4559885,9.98538454 8.90327706,9.04949813 8.81595773,7.80077353 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Miscellaneous</span><i class="menu-arrow"></i></a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  menu-item-parent" aria-haspopup="true"><span
                                    class="menu-link"><span class="menu-text">Miscellaneous</span></span></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/kanban-board.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Kanban Board</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/sticky-panels.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Sticky Panels</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/blockui.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Block UI</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/perfect-scrollbar.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Perfect Scrollbar</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/treeview.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Tree View</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/bootstrap-notify.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Bootstrap Notify</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/toastr.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Toastr</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/sweetalert2.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">SweetAlert2</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/dual-listbox.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Dual Listbox</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/session-timeout.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Session Timeout</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/idle-timer.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Idle Timer</span></a></li>
                            <li class="menu-item " aria-haspopup="true"><a
                                    href="features/miscellaneous/cropper.html" class="menu-link "><i
                                        class="menu-bullet menu-bullet-dot"><span></span></i><span
                                        class="menu-text">Cropper</span></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
