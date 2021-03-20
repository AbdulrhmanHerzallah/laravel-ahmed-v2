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
                <li class="menu-item  menu-item-submenu @if(in_array('slider', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.slider.show')}}" class="menu-link menu-toggle">
                        <span class="menu-text"><i class="nav-icon fas fa-columns mx-3"></i>{{__('keywords.slider')}}</span></a></li>


                <li class="menu-item  menu-item-submenu @if(in_array('about-ahmed', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.aboutAhmed.show')}}" class="menu-link menu-toggle"><span class="menu-text"><i class="nav-icon fas fa-male mx-4"></i>{{__('keywords.about.ahmad')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(in_array('about-foundation', request()->segments())) menu-item-open @endif " aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.aboutFoundation.show')}}" class="menu-link menu-toggle"><span class="menu-text"><i class="nav-icon far fa-building mx-3"></i>{{__('keywords.about.foundation')}}</span></a></li>
                <li class="menu-section ">
                    <h4 class="menu-text">{{__('keywords.old.man.museum')}}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item  menu-item-submenu @if(in_array('old-man-memory-videos', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.oldManMemoryVideos.show')}}" class="menu-link menu-toggle"><i class="fas fa-video mx-3"></i><span class="menu-text">{{__('keywords.old.man.memory.videos')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(in_array('old-man-stuff', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.oldManStuff.show')}}" class="menu-link menu-toggle"><i class="mx-3 fas fa-couch"></i><span class="menu-text">{{__('keywords.old.stuff')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(in_array('old-man-images', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a
                        href="{{route('super-dashboard.oldManImages.show')}}" class="menu-link menu-toggle"><i class="mx-3 fas fa-camera-retro"></i><span class="menu-text">{{__('keywords.old.man.images')}}</span></a></li>

                @canany(['award', 'writer', 'free', 'poet', 'personality'])
                    <li class="menu-section ">
                    <h4 class="menu-text">{{__('keywords.awards.department')}}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>


                <li class="menu-item @if(in_array('awards', request()->segments()) || in_array('winner', request()->segments())) menu-item-open @endif" aria-haspopup="true">
                    <a href="{{route('super-dashboard.awards.show')}}" class="menu-link">
                        <span class="menu-text"><i class="nav-icon fas fa-gift mx-3"></i> {{__('keywords.awards')}}</span></a></li>
              @endcanany



                <li class="menu-section ">
                    <h4 class="menu-text">{{__('keywords.news.center')}}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item  menu-item-submenu @if(in_array('last-news', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.lastNews.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 fas fa-newspaper"></i><span class="menu-text">{{__('keywords.last.news')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(in_array('last-ads', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.lastAds.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 fas fa-ad"></i><span class="menu-text">{{__('keywords.last.ads')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(in_array('contact-us', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.contactUs.show')}}" class="menu-link menu-toggle"><i class="mx-3 far fa-envelope"></i><span class="menu-text">{{__('keywords.contact.us')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(in_array('logo-foundation', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.logoFoundation.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 fab fa-galactic-republic"></i><span class="menu-text">{{__('keywords.logo.foundation')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(in_array('they-said-about-us', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.theySaidAboutUs.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 fas fa-microphone-alt"></i><span class="menu-text">{{__('keywords.they.said.about.us')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(in_array('images-show', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.imagesShow.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 far fa-images"></i><span class="menu-text">{{__('keywords.images.show')}}</span></a></li>
                <li class="menu-item  menu-item-submenu @if(in_array('videos-show', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.videosShow.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 fas fa-film"></i><span class="menu-text">{{__('keywords.videos.show')}}</span></a></li>


                <li class="menu-section ">
                    <h4 class="menu-text"></h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                @role('permissions')
                <li class="menu-item  menu-item-submenu @if(in_array('permissions', request()->segments())) menu-item-open @endif" aria-haspopup="true" data-menu-toggle="hover"><a href="{{route('super-dashboard.UsersPermission.show')}}" class="menu-link menu-toggle"><i class="mx-3 mt-1 fas fa-user-cog"></i><span class="menu-text">{{__('keywords.permissions')}}</span></a></li>
                @endrole
            </ul>
            <br/><br/><br/><br/>
            <br/><br/><br/><br/>
            <br/><br/><br/><br/>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
