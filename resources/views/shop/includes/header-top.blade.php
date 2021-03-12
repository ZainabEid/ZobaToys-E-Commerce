<div class="header-top hidden-sm-down">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="header-top-left col-lg-6 col-md-6 d-flex justify-content-start align-items-center">
                    <div class="detail-email d-flex align-items-center justify-content-center">
                        <i class="icon-email"></i>
                        <p>@lang('site.email') : </p>
                        <span>
                            {{ App\Models\Vendor::where('name', 'zobatoys')->first()->admin->email }}
                        </span>
                    </div>
                    <div class="detail-call d-flex align-items-center justify-content-center">
                        <i class="icon-deal"></i>
                        <p>@lang('site.today-deals') </p>
                    </div>
                </div>



                <div class="col-lg-6 col-md-6 d-flex justify-content-end align-items-center header-top-right">

                    <!-- Authentication Links -->
                    <div class="register-out">
                           
                        @guest
                                
                            @if (Route::has('shop.register'))
                                <a class="register" href="{{ route('shop.register') }}"
                                    data-link-action="display-register-form" title="create new account">
                                    {{ __('Register') }}
                                </a>
                                <span class="or-text">@lang('site.or')</span>
                            @endif

                                
                            <a class="login" href="{{ route('shop.login') }}" rel="nofollow"
                                title="تسجيل الدخول إلى حسابك">
                                {{ __('Login') }}
                            </a>


                        @else
                                
                            {{-- user profile --}}
                            <a class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                <i class="zmdi zmdi-account"> {{ Auth::user()->name }}</i>
                                 <span class="caret"> </span>
                            </a>
                                
                            {{-- logout --}}
                            <a class="logout" href="{{ route('shop.logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('shop.logout') }}" method="POST"
                                style="display: none;">w
                                @csrf
                            </form>

                            


                        @endguest
                    </div>

                    {{-- currency selector --}}
                    <div id="_desktop_currency_selector"
                        class="currency-selector groups-selector hidden-sm-down currentcy-selector-dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            role="main">
                            <span class="expand-more">@lang('site.EGP')</span>
                        </div>
                        <div class="currency-list dropdown-menu">
                            <div class="currency-list-content text-left">
                                <div class="currency-item current flex-first">
                                    <a title="@lang('site.EGP')" rel="nofollow" href="#">UK£
                                        @lang('site.EGP')</a>
                                </div>
                                <div class="currency-item">
                                    <a title="@lang('site.USD')" rel="nofollow"
                                        href="http://demo.bestprestashoptheme.com/savemart/ar/?home=home_3&amp;SubmitCurrency=1&amp;id_currency=2">US$
                                        @lang('site.USD')</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  start Language selector  -->
                    <div id="_desktop_language_selector"
                        class="language-selector groups-selector hidden-sm-down language-selector-dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            role="main">
                            <span class="expand-more"><img class="img-fluid"
                                    src="{{ asset('assets/site/images/flags/svg/' . get_flag(app()->getLocale()) . '.svg') }}"
                                    alt="اللغة العربية" width="16" height="11" /></span>
                        </div>
                        <div class="language-list dropdown-menu">
                            <div class="language-list-content text-left">
                                <ul>
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="language-item">
                                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                <img class="img-fluid"
                                                    src="{{ asset('assets/site/images/flags/svg/' . get_flag($localeCode) . '.svg') }}"
                                                    alt="English" width="16" height="11" />

                                                <span>{{ $properties['native'] }}</span>

                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--  End Language selector  -->

                </div>
            </div>
        </div>
    </div>
</div>
