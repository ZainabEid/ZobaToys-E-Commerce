@extends('layouts.shop')
@section('content')
    <div id="wrapper-site">

        <nav data-depth="1" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="http://demo.bestprestashoptheme.com/savemart/ar/">
                                <span itemprop="name">الصفحة الرئيسية</span>
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
                        <h1 class="page-title">سلة الشراء</h1>
                        <div class="cart-grid row">

                            <!-- Left Block: cart product informations & shpping -->
                            <div class="cart-grid-body col-xs-12 col-lg-9">

                                <!-- cart products detailed -->
                                <div class="cart-container">



                                    <div class="cart-overview js-cart"
                                        data-refresh-url="//demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?ajax=1&amp;action=refresh">
                                        <ul class="cart-items">
                                            <li class="cart-item">

                                                <div class="product-line-grid row spacing-10">
                                                    <!--  product left content: image-->
                                                    <div class="product-line-grid-left col-sm-2 col-xs-4">
                                                        <span class="product-image media-middle">
                                                            <img class="img-fluid"
                                                                src="http://demo.bestprestashoptheme.com/savemart/29-cart_default/brown-bear-printed-sweater.jpg"
                                                                alt="Lorem ipsum dolor sit amet ege">
                                                        </span>
                                                    </div>

                                                    <!--  product left body: description -->
                                                    <div class="product-line-grid-body col-sm-10 col-xs-8">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="product-line-info">
                                                                    <a class="label"
                                                                        href="http://demo.bestprestashoptheme.com/savemart/ar/smartphone-tablet/2-60-brown-bear-printed-sweater.html#/1-الحجم-ص/11-اللون_-اسود"
                                                                        data-id_customization="0">Lorem ipsum dolor sit amet
                                                                        ege</a>
                                                                </div>

                                                                <div class="product-line-info product-price">
                                                                    <span class="value">36.00&nbsp;UK£</span>
                                                                </div>

                                                                <div class="product-line-info">
                                                                    <span class="label-atrr">الحجم:</span>
                                                                    <span class="value">ص</span>
                                                                </div>
                                                                <div class="product-line-info">
                                                                    <span class="label-atrr">:</span>
                                                                    <span class="value">اسود</span>
                                                                </div>

                                                            </div>
                                                            <div
                                                                class="text-center product-line-actions col-sm-6 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-sm-9 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-xs-6 qty">
                                                                                <div class="label">Qty:</div>
                                                                                <div
                                                                                    class="input-group bootstrap-touchspin">
                                                                                    <span
                                                                                        class="input-group-addon bootstrap-touchspin-prefix"
                                                                                        style="display: none;"></span><input
                                                                                        id="quantity_wanted"
                                                                                        class="js-cart-line-product-quantity form-control"
                                                                                        data-down-url="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?update=1&amp;id_product=2&amp;id_product_attribute=60&amp;token=a981f6d3e0b1d4f8cd851477442d5189&amp;op=down"
                                                                                        data-up-url="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?update=1&amp;id_product=2&amp;id_product_attribute=60&amp;token=a981f6d3e0b1d4f8cd851477442d5189&amp;op=up"
                                                                                        data-update-url="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?update=1&amp;id_product=2&amp;id_product_attribute=60&amp;token=a981f6d3e0b1d4f8cd851477442d5189"
                                                                                        data-product-id="2" type="text"
                                                                                        value="1"
                                                                                        name="product-quantity-spin" min="1"
                                                                                        style="display: block;"><span
                                                                                        class="input-group-addon bootstrap-touchspin-postfix"
                                                                                        style="display: none;"></span><span
                                                                                        class="input-group-btn-vertical"><button
                                                                                            class="btn btn-touchspin js-touchspin bootstrap-touchspin-up"
                                                                                            type="button"><i
                                                                                                class="material-icons touchspin-up"></i></button><button
                                                                                            class="btn btn-touchspin js-touchspin bootstrap-touchspin-down"
                                                                                            type="button"><i
                                                                                                class="material-icons touchspin-down"></i></button></span>
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
                                                                            <a class="remove-from-cart" rel="nofollow"
                                                                                href="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?delete=1&amp;id_product=2&amp;id_product_attribute=60&amp;token=a981f6d3e0b1d4f8cd851477442d5189"
                                                                                data-link-action="delete-from-cart"
                                                                                data-id-product="2"
                                                                                data-id-product-attribute="60"
                                                                                data-id-customization="">
                                                                                <i class="fa fa-trash-o"
                                                                                    aria-hidden="true"></i>
                                                                            </a>



                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </li>
                                            <li class="cart-item">

                                                <div class="product-line-grid row spacing-10">
                                                    <!--  product left content: image-->
                                                    <div class="product-line-grid-left col-sm-2 col-xs-4">
                                                        <span class="product-image media-middle">
                                                            <img class="img-fluid"
                                                                src="http://demo.bestprestashoptheme.com/savemart/44-cart_default/today-is-a-good-day-framed-poster.jpg"
                                                                alt="Vehicula vel tempus sit amet ulte">
                                                        </span>
                                                    </div>

                                                    <!--  product left body: description -->
                                                    <div class="product-line-grid-body col-sm-10 col-xs-8">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-xs-12">
                                                                <div class="product-line-info">
                                                                    <a class="label"
                                                                        href="http://demo.bestprestashoptheme.com/savemart/ar/audio/5-134-today-is-a-good-day-framed-poster.html#/1-الحجم-ص/13-اللون_-برتقالي"
                                                                        data-id_customization="0">Vehicula vel tempus sit
                                                                        amet ulte</a>
                                                                </div>

                                                                <div class="product-line-info product-price">
                                                                    <span class="value">34.80&nbsp;UK£</span>
                                                                </div>

                                                                <div class="product-line-info">
                                                                    <span class="label-atrr">الحجم:</span>
                                                                    <span class="value">ص</span>
                                                                </div>
                                                                <div class="product-line-info">
                                                                    <span class="label-atrr">:</span>
                                                                    <span class="value">برتقالي</span>
                                                                </div>

                                                            </div>
                                                            <div
                                                                class="text-center product-line-actions col-sm-6 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-sm-9 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-xs-6 qty">
                                                                                <div class="label">Qty:</div>
                                                                                <div
                                                                                    class="input-group bootstrap-touchspin">
                                                                                    <span
                                                                                        class="input-group-addon bootstrap-touchspin-prefix"
                                                                                        style="display: none;"></span><input
                                                                                        id="quantity_wanted"
                                                                                        class="js-cart-line-product-quantity form-control"
                                                                                        data-down-url="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?update=1&amp;id_product=5&amp;id_product_attribute=134&amp;token=a981f6d3e0b1d4f8cd851477442d5189&amp;op=down"
                                                                                        data-up-url="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?update=1&amp;id_product=5&amp;id_product_attribute=134&amp;token=a981f6d3e0b1d4f8cd851477442d5189&amp;op=up"
                                                                                        data-update-url="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?update=1&amp;id_product=5&amp;id_product_attribute=134&amp;token=a981f6d3e0b1d4f8cd851477442d5189"
                                                                                        data-product-id="5" type="text"
                                                                                        value="1"
                                                                                        name="product-quantity-spin" min="1"
                                                                                        style="display: block;"><span
                                                                                        class="input-group-addon bootstrap-touchspin-postfix"
                                                                                        style="display: none;"></span><span
                                                                                        class="input-group-btn-vertical"><button
                                                                                            class="btn btn-touchspin js-touchspin js-increase-product-quantity bootstrap-touchspin-up"
                                                                                            type="button"><i
                                                                                                class="material-icons touchspin-up"></i></button><button
                                                                                            class="btn btn-touchspin js-touchspin js-decrease-product-quantity bootstrap-touchspin-down"
                                                                                            type="button"><i
                                                                                                class="material-icons touchspin-down"></i></button></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-6 price">
                                                                                <div class="label">Total:</div>
                                                                                <div class="product-price total">
                                                                                    34.80&nbsp;UK£
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-3 col-xs-12 text-xs-right align-self-end">
                                                                        <div class="cart-line-product-actions ">
                                                                            <a class="remove-from-cart" rel="nofollow"
                                                                                href="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق?delete=1&amp;id_product=5&amp;id_product_attribute=134&amp;token=a981f6d3e0b1d4f8cd851477442d5189"
                                                                                data-link-action="delete-from-cart"
                                                                                data-id-product="5"
                                                                                data-id-product-attribute="134"
                                                                                data-id-customization="">
                                                                                <i class="fa fa-trash-o"
                                                                                    aria-hidden="true"></i>
                                                                            </a>



                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>
                                    </div>


                                </div>


                                <a class="label btn btn-primary" href="http://demo.bestprestashoptheme.com/savemart/ar/">
                                    الاستمرار في التسوق
                                </a>




                                <!-- shipping informations -->



                            </div>

                            <!-- Right Block: cart subtotal & cart total -->
                            <div class="cart-grid-right col-xs-12 col-lg-3">


                                <div class="cart-summary">







                                    <div class="cart-detailed-totals">
                                        <div class="cart-summary-products">
                                            <div class="summary-label">There are 2 منتجات in your cart</div>
                                        </div>

                                        <div class="">
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    إجمالي المنتجات:
                                                </span>
                                                <span class="value">70.80&nbsp;UK£</span>
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
                                                <span class="value">70.80&nbsp;UK£ (شامل للضريبة)</span>
                                            </div>

                                        </div>

                                    </div>





                                    <div class="checkout cart-detailed-actions">
                                        <div class="text-xs-center">
                                            <a href="http://demo.bestprestashoptheme.com/savemart/ar/طلب شراء"
                                                class="btn btn-primary">اتمام الطلب</a>

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
