<!-- Begin SideBar-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active" ><a href=""><i class="la la-mouse-pointer"></i><span class="menu-title"
                        data-i18n="nav.add_on_drag_drop.main">@lang('site.dashboard') </span></a>
            </li>

            {{-- sidebar languages --}}
            <li class="nav-item  ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" >@lang('site.languages') </span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">{{ count( config('translatable.locales') ) }}</span>
                </a>
                <ul class="menu-content @if(Request::is('adminDashboard/languages*')) open @endif">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="">
                            <a class="menu-item" data-i18n="nav.dash.ecommerce" rel="alternate"
                                hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <img class="img-fluid" src="{{ asset('assets/site/images/flags/svg/ae.svg') }}"
                                    alt="English" width="16" height="11" />

                                <span>{{ $properties['native'] }}</span>

                            </a>
                        </li>
                    @endforeach
                </ul>

            </li>

            
            {{-- sidbar Admins --}}
            <li class="nav-item @if(Request::is('adminDashboard/admin') || Request::is('adminDashboard/admin/*') ) open @endif">
                <a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('site.admins') </span>
                    <span class="badge badge badge-danger badge-pill float-right mr-2">{{ count(App\Models\Admin::all()) >1  ? count(App\Models\Admin::all()) : 0 }} </span>
                </a>
                <ul class="menu-content ">

                    @if (auth()->user()->hasPermission('read_admins'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/admin')) active @endif ">
                            <a class="menu-item" href=" {{ route('admin.index') }}" data-i18n="nav.dash.ecommerce">
                                @lang('site.show-all-admins')
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->hasPermission('create_admins'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/admin/create')) active @endif ">
                            <a class="menu-item" href="{{ route('admin.create') }}" data-i18n="nav.dash.crypto">
                                @lang('site.add-new-admin')
                            </a>
                        </li>
                    @endif

                </ul>
            </li>


            {{-- sidbar Categories --}}
            <li class="nav-item  @if(Request::is('adminDashboard/categories*')) open @endif">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('site.categories') </span>
                    <span class="badge badge badge-success badge-pill float-right mr-2"> {{ count(App\Models\Category::all()) > 0  ? count(App\Models\Category::all()) : 0 }} </span>
                </a>
                <ul class="menu-content">

                    @if (auth()->user()->hasPermission('read_categories'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/categories')) active @endif ">
                            <a class="menu-item" href=" {{ route('adminDashboard.categories.index') }}" data-i18n="nav.dash.ecommerce">
                                @lang('site.show-all-categories')
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->hasPermission('create_categories'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/categories/create')) active @endif ">
                            <a class="menu-item" href="{{ route('adminDashboard.categories.create') }}" data-i18n="nav.dash.crypto">
                                @lang('site.add-new-category')
                            </a>
                        </li>
                    @endif

                </ul>
            </li>

             {{-- sidbar products --}}
             <li class="nav-item  @if(Request::is('adminDashboard/products*')) open @endif">
                <a href=""><i class="la la-television"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('site.products') </span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2"> {{ count(App\Models\Product::all()) > 0  ? count(App\Models\Product::all()) : 0 }}</span>
                </a>
                <ul class="menu-content">

                    @if (auth()->user()->hasPermission('read_products'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/products')) active @endif ">
                            <a class="menu-item" href=" {{ route('adminDashboard.products.index') }}" data-i18n="nav.dash.ecommerce">
                                @lang('site.show-all-products')
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->hasPermission('create_products'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/products/create')) active @endif ">
                            <a class="menu-item" href="{{ route('adminDashboard.products.create') }}" data-i18n="nav.dash.crypto">
                                @lang('site.add-new-product')
                            </a>
                        </li>
                    @endif

                </ul>
            </li>

             {{-- sidbar clients --}}
             <li class="nav-item  @if(Request::is('adminDashboard/clients*')) open @endif">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('site.clients') </span>
                    <span class="badge badge badge-danger badge-pill float-right mr-2"> {{ count(App\Models\Client::all()) > 0  ? count(App\Models\Client::all()) : 0 }}</span>
                </a>
                <ul class="menu-content">

                    @if (auth()->user()->hasPermission('read_clients'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/clients')) active @endif ">
                            <a class="menu-item" href=" {{ route('adminDashboard.clients.index') }}" data-i18n="nav.dash.ecommerce">
                                @lang('site.show-all-clients')
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->hasPermission('create_clients'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/clients/create')) active @endif ">
                            <a class="menu-item" href="{{ route('adminDashboard.clients.create') }}" data-i18n="nav.dash.crypto">
                                @lang('site.add-new-client')
                            </a>
                        </li>
                    @endif

                </ul>
            </li> {{-- end of clients --}}

             {{-- sidbar Orders --}}
             <li class="nav-item  @if(Request::is('adminDashboard/orders*')) open @endif">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">@lang('site.orders') </span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2"> {{ count(App\Models\Client::all()) > 0  ? count(App\Models\Client::all()) : 0 }}</span>
                </a>
                <ul class="menu-content">

                    @if (auth()->user()->hasPermission('read_orders'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/orders')) active @endif ">
                            <a class="menu-item" href=" {{ route('adminDashboard.orders.index') }}" data-i18n="nav.dash.ecommerce">
                                @lang('site.show-all-orders')
                            </a>
                        </li>
                    @endif

                    @if (auth()->user()->hasPermission('create_orders'))
                        <li class="@if(Request::is(app()->getLocale().'/adminDashboard/orders/create')) active @endif ">
                            <a class="menu-item" href="{{ route('adminDashboard.orders.create') }}" data-i18n="nav.dash.crypto">
                                @lang('site.add-new-order')
                            </a>
                        </li>
                    @endif

                </ul>
            </li> {{-- end of orders --}}


           
        </ul>
    </div>
</div>
<!--End Sidebare-->
