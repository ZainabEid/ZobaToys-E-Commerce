@extends('layouts.shop')
@section('content')
    <div id="wrapper-site">

        {{-- nav bar --}}
        <nav data-depth="1" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="http://demo.bestprestashoptheme.com/savemart/ar/">
                                <span itemprop="name">@lang('site.homepage')</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                    </ol>

                </div>
            </div>
        </nav>



        <div class="container no-index">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <section id="main">
                        {{-- page title --}}
                        <h1 class="page-title">@lang('site.cart')</h1>

                        <div class="cart-grid row">

                            <!-- Left Block: cart product informations & shpping -->
                            <div class="cart-grid-left col-xs-12 col-lg-9">

                                <!-- cart products detailed -->
                                <div class="cart-container">



                                    <div class="cart-overview js-cart"
                                        data-refresh-url="{{ route('shop.user.cart.show') }}">
                                        <ul class="cart-items">

                                            @if ($cart->products()->count() > 0)
                                                @foreach ($cart->products as $product)

                                                    <li class="cart-item">

                                                        <div class="product-line-grid row spacing-10">
                                                            <!--  product left content: image-->
                                                            <div class="product-line-grid-left col-sm-2 col-xs-4">
                                                                <span class="product-image media-middle">
                                                                    <img class="img-fluid"
                                                                        src="{{ $product->productimages->first()->image_path }}"
                                                                        alt=" {{ $product->translate(app()->getLocale())->name ?? $product->name }}">
                                                                </span>
                                                            </div>

                                                            <!--  product left body: description -->
                                                            <div class="product-line-grid-body col-sm-10 col-xs-8">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-xs-12">
                                                                        <div class="product-line-info">
                                                                            <a class="label" href="#"
                                                                                data-id_customization="0">
                                                                                Lorem ipsum dolor sit ege
                                                                            </a>
                                                                        </div>

                                                                        <div class="product-line-info product-price">
                                                                            <span
                                                                                class="value">{{ $product->sale_price }}&nbsp; EGP£</span>
                                                                        </div>

                                                                        <div class="product-line-info">
                                                                            <span class="label-atrr">الحجم:</span>
                                                                            <span class="value">لا يوجد اختيارات</span>
                                                                        </div>
                                                                        <div class="product-line-info">
                                                                            <span class="label-atrr">اللون:</span>
                                                                            <span class="value">لا يوجد اختيارات</span>
                                                                        </div>

                                                                    </div>
                                                                    <div
                                                                        class="text-center product-line-actions col-sm-6 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-sm-9 col-xs-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 col-xs-6 qty">
                                                                                        <div class="label">Qty: </div>
                                                                                        <div
                                                                                            class="input-group bootstrap-touchspin">
                                                                                            <span
                                                                                                class="input-group-addon bootstrap-touchspin-prefix"
                                                                                                style="display: none;">
                                                                                            </span>
                                                                                            <input id="quantity_wanted"
                                                                                                class="js-cart-line-product-quantity form-control"
                                                                                                data-down-url="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?update=1&amp;id_product=2&amp;id_product_attribute=60&amp;token=a981f6d3e0b1d4f8cd851477442d5189&amp;op=down"
                                                                                                data-up-url="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?update=1&amp;id_product=2&amp;id_product_attribute=60&amp;token=a981f6d3e0b1d4f8cd851477442d5189&amp;op=up"
                                                                                                data-update-url="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?update=1&amp;id_product=2&amp;id_product_attribute=60&amp;token=a981f6d3e0b1d4f8cd851477442d5189"
                                                                                                data-product-id="2"
                                                                                                type="text" value="1"
                                                                                                name="product-quantity-spin"
                                                                                                min="1"
                                                                                                style="display: block;">
                                                                                            <span
                                                                                                class="input-group-addon bootstrap-touchspin-postfix"
                                                                                                style="display: none;">
                                                                                            </span>
                                                                                            <span
                                                                                                class="input-group-btn-vertical">
                                                                                                <button
                                                                                                    class="btn btn-touchspin js-touchspin bootstrap-touchspin-up"
                                                                                                    type="button">
                                                                                                    <i
                                                                                                        class="material-icons touchspin-up">
                                                                                                    </i>
                                                                                                </button>
                                                                                                <button
                                                                                                    class="btn btn-touchspin js-touchspin bootstrap-touchspin-down"
                                                                                                    type="button">
                                                                                                    <i
                                                                                                        class="material-icons touchspin-down">
                                                                                                    </i>
                                                                                                </button>
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-xs-6 price">
                                                                                        <div class="label">Total:</div>
                                                                                        <div class="product-price total">
                                                                                            36.00&nbsp;UK£
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="col-sm-3 col-xs-12 text-xs-right align-self-end">
                                                                                <div class="cart-line-product-actions ">
                                                                                    <a class="remove-from-cart"
                                                                                        rel="nofollow"
                                                                                        href="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?delete=1&amp;id_product=2&amp;id_product_attribute=60&amp;token=a981f6d3e0b1d4f8cd851477442d5189"
                                                                                        data-link-action="delete-from-cart"
                                                                                        data-id-product="2"
                                                                                        data-id-product-attribute="60"
                                                                                        data-id-customization="">
                                                                                        <i class="fa fa-trash-o"
                                                                                            aria-hidden="true">
                                                                                        </i>
                                                                                    </a>



                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </li>
                                                @endforeach
                                            @endif


                                        </ul>
                                    </div>


                                </div>


                                <a class="label btn btn-primary" href="{{ route('shop') }}">
                                    @lang('site.continue-shopping')
                                </a>

                                <!-- shipping informations -->

                            </div>

                            <!-- Right Block: cart subtotal & cart total -->
                            <div class="cart-grid-right col-xs-12 col-lg-3">


                                <div class="cart-summary">


                                    <div class="cart-detailed-totals">
                                        <div class="cart-summary-products">
                                            <div class="summary-label">@lang('site.there-are') &nbsp;
                                                {{ $cart->products->count() ?? '0' }} &nbsp; @lang('site.products')
                                                @lang('site.in-your-cart')</div>
                                        </div>

                                        <div class="">
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    إجمالي المنتجات:
                                                </span>
                                                <span class="value"> &nbsp; {{ $cart->total_price ?? '0' }} &nbsp;
                                                    EGP£</span>
                                            </div>
                                            <div class="cart-summary-line" id="cart-subtotal-shipping">
                                                <span class="label">
                                                    Total الشحن:
                                                </span>
                                                <span class="value">مجاناً</span>
                                                <div><small class="value"></small></div>
                                            </div>
                                        </div>




                                        <div class="">
                                            <div class="cart-summary-line cart-total">
                                                <span class="label">الإجمالي:</span>
                                                <span class="value">&nbsp; {{ $cart->total_price ?? '0' }} &nbsp; EGP£
                                                    (شامل للضريبة)</span>
                                            </div>

                                        </div>

                                    </div>





                                    <div class="checkout cart-detailed-actions">
                                        <div class="text-xs-center">
                                            <a href="{{ route('shop.user.order.store') }}" class="btn btn-primary">اتمام
                                                الطلب</a>

                                        </div>
                                    </div>



                                </div>



                                <div class="blockreassurance_product">
                                    <div>
                                        <span class="item-product">
                                            <img class="svg"
                                                src="/savemart/modules/blockreassurance/img/ic_verified_user_black_36dp_1x.png">
                                            &nbsp;
                                        </span>
                                        <p class="block-title" style="color:#000000;">Security policy (edit with Customer
                                            reassurance module)</p>
                                    </div>
                                    <div>
                                        <span class="item-product">
                                            <img class="svg"
                                                src="/savemart/modules/blockreassurance/img/ic_local_shipping_black_36dp_1x.png">
                                            &nbsp;
                                        </span>
                                        <p class="block-title" style="color:#000000;">Delivery policy (edit with Customer
                                            reassurance module)</p>
                                    </div>
                                    <div>
                                        <span class="item-product">
                                            <img class="svg"
                                                src="/savemart/modules/blockreassurance/img/ic_swap_horiz_black_36dp_1x.png">
                                            &nbsp;
                                        </span>
                                        <p class="block-title" style="color:#000000;">Return policy (edit with Customer
                                            reassurance module)</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>



                            </div>

                        </div>
                    </section>

                </div>
            </div>
        </div>



    </div>
@endsection
