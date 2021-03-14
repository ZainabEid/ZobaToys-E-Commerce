<div class="header-center hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div id="_desktop_logo"
                class="contentsticky_logo d-flex align-items-center justify-content-start col-lg-3 col-md-3">
                <a href="http://demo.bestprestashoptheme.com/savemart/">
                    <img class="logo img-fluid" src="{{ asset('assets/site/shop/logo/shopforkids.png') }}"
                        alt="ShopForKids">
                </a>
            </div>
            <div class="col-lg-9 col-md-9 header-menu d-flex align-items-center justify-content-end">
                <div class="data-contact d-flex align-items-center">
                    <div class="title-icon">support<i class="icon-support icon-address"></i></div>
                    <div class="content-data-contact">
                        <div class="support">@lang('site.call-customer-service') :</div>
                        <div class="phone-support">
                            {{ App\Models\Vendor::where('name', 'zobatoys')->first()->phone }}
                        </div>
                    </div>
                </div>
                <div class="contentsticky_group d-flex justify-content-end">
                    <div class="header_link_myaccount">
                        <a class="login" href="http://demo.bestprestashoptheme.com/savemart/ar/الحساب الشخصي"
                            rel="nofollow" title="تسجيل الدخول إلى حسابك"><i class="header-icon-account"></i></a>
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
                            <div class="cart_block">
                                <div class="cart-block-content">
                                    <ul>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex product-image"
                                                    src="http://demo.bestprestashoptheme.com/savemart/29-cart_default/brown-bear-printed-sweater.jpg"
                                                    alt="" title="">
                                                <div class="media-body">
                                                    <div class="product-name">Lorem ipsum dolor sit amet ege</div>
                                                    <div class="group-price">
                                                        <span class="product-price">36.00&nbsp;UK£</span>
                                                        <span class="quantity"> x 1</span>
                                                    </div>
                                                    <a class="remove-from-cart" rel="nofollow"
                                                        href="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?delete=1&amp;id_product=2&amp;id_product_attribute=60&amp;token=a981f6d3e0b1d4f8cd851477442d5189"
                                                        data-link-action="remove-from-cart"
                                                        title="إزالة من سلة المشتريات">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="cart-subtotals">
                                        <div class="products">
                                            <span class="label">إجمالي الطلب:</span>
                                            <span class="value">36.00&nbsp;UK£</span>
                                        </div>
                                        <div class="shipping">
                                            <span class="label">الشحن:</span>
                                            <span class="value">مجاناً</span>
                                        </div>
                                    </div>
                                    <div class="cart-total">
                                        <span class="label">الإجمالي:</span>
                                        <span class="value">36.00&nbsp;UK£</span>
                                    </div>
                                    <div class="cart-buttons d-flex">
                                        <a href="//demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?action=show"
                                            class="btn btn-primary">View cart</a>
                                        <a href="http://demo.bestprestashoptheme.com/savemart/ar/طلب شراء"
                                            class="btn btn-primary">اتمام الطلب</a>
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
