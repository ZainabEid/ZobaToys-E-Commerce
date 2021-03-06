<div class="header-center hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div id="_desktop_logo"
                class="contentsticky_logo d-flex align-items-center justify-content-start col-lg-3 col-md-3">
                <a href="http://demo.bestprestashoptheme.com/savemart/">
                    <img class="logo img-fluid"
                        src="{{ asset('assets/site/shop/logo/shopforkids.png') }}"
                        alt="ShopForKids">
                </a>
            </div>
            <div class="col-lg-9 col-md-9 header-menu d-flex align-items-center justify-content-end">
                <div class="data-contact d-flex align-items-center">
                    <div class="title-icon">support<i class="icon-support icon-address"></i></div>
                    <div class="content-data-contact">
                        <div class="support">@lang('site.call-customer-service') :</div>
                        <div class="phone-support">
                            {{ App\Models\Vendor::where('name','zobatoys')->first()->phone }}
                        </div>
                    </div>
                </div>
                <div class="contentsticky_group d-flex justify-content-end">
                    <div class="header_link_myaccount">
                        <a class="login"
                            href="http://demo.bestprestashoptheme.com/savemart/ar/الحساب الشخصي"
                            rel="nofollow" title="تسجيل الدخول إلى حسابك"><i
                                class="header-icon-account"></i></a>
                    </div>
                    <div class="header_link_wishlist">
                        <a href="http://demo.bestprestashoptheme.com/savemart/ar/module/novblockwishlist/mywishlist"
                            title="My Wishlists">
                            <i class="header-icon-wishlist"></i>
                        </a>
                    </div>

                    <div id="_desktop_cart">
                        <div class="blockcart cart-preview active"
                            data-refresh-url="//demo.bestprestashoptheme.com/savemart/ar/module/ps_shoppingcart/ajax">
                            <div class="header-cart">
                                <div class="cart-left">
                                    <div class="shopping-cart"><i class="zmdi zmdi-shopping-cart"></i></div>
                                    <div class="cart-products-count">0</div>
                                </div>
                                <div class="cart-right d-flex flex-column align-self-end ml-13">
                                    <span class="title-cart">@lang('site.buying-basket')</span>
                                    <span class="cart-item"> @lang('site.items')</span>
                                </div>
                            </div>
                            <div class="cart_block ">
                                <div class="cart-block-content">
                                    <div class="no-items">
                                        @lang('site.no-products-in-the-cart')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>