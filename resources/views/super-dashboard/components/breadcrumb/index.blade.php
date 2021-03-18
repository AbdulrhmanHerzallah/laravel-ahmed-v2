<nav class="d-flex justify-content-between" aria-label="breadcrumb">
    <div>
{{--        <ol class="breadcrumb">--}}
{{--            @foreach($segments = Request()->segments() as $index => $segment)--}}
{{--                <li class="breadcrumb-item"><a--}}
{{--                        class="@if(url(implode(array_slice($segments,0,$index+1), '/')) == url()->current()) text-dark @endif"--}}
{{--                        href="{{url(implode(array_slice($segments,0,$index+1), '/'))}}">{{\Illuminate\Support\Str::title(str_replace('-', ' ', $segment))}}</a></li>--}}
{{--            @endforeach--}}

{{--        </ol>--}}

        <ol class="breadcrumb">
        @if(Breadcrumbs::has())
            @foreach (Breadcrumbs::current() as $crumbs)
                @if ($crumbs->url() && !$loop->last)
                    <li class="breadcrumb-item">
                        <a href="{{ $crumbs->url() }}">
                            {{ $crumbs->title() }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item active">
                        {{ $crumbs->title() }}
                    </li>
                @endif
            @endforeach
        @endif

            @yield('breadcrumb')
        </ol>
    </div>
    <div class="font-weight-bold" style="font-size: 16px">
        {{$title ?? __('breadcrumbs.dashboard')}}
    </div>
</nav>
