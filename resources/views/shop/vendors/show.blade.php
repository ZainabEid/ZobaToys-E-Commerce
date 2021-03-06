@extends('layouts.shop')

@section('content')

    <div id="wrapper-site">

        {{-- navigation links --}}
        <nav data-depth="1" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        {{-- homepage --}}
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="http://demo.bestprestashoptheme.com/savemart/">
                                <span itemprop="name">@lang('site.homepage')</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                        {{-- vendors --}}
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item"
                                href="http://demo.bestprestashoptheme.com/savemart/ar/module/jmarketplace/sellers">
                                <span itemprop="name">@lang('site.vendors')</span>
                            </a>
                            <meta itemprop="position" content="2">
                        </li>
                        {{-- vendor name --}}
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <span itemprop="name">{{ $vendor->name }}</span>
                            <meta itemprop="position" content="3">
                        </li>
                    </ol>

                </div>
            </div>
        </nav>



        <div class="container no-index">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                    <div id="main">





                        <section id="content" class="page-content">

                            {{-- vendor-profile --}}
                            <div class="box box-sellerprofile">
                                <div class="row d-flex align-items-center mb-28">
                                    {{-- vendor page header left --}}
                                    <div class="col-md-12 col-xl-6 seller-header-left">
                                        <div class="d-flex">
                                            <div class="image-seller-home">
                                                <i class="icon-seller-home"> </i>
                                            </div>
                                            <div class="seller-title-home">
                                                {{-- seller name --}}
                                                <h1 class="page-subheading">@lang('site.seller-shop'):{{ $vendor->name }}</h1>
                                                {{-- followers --}}
                                                <div class="d-inline-block ml-5 mt-13">
                                                    <label><strong>@lang('site.followers'): </strong><span>1</span></label>
                                                </div>
                                                {{-- average rating --}}
                                                <div class="d-inline-block ml-4 mt-13">
                                                    <label><strong>@lang('site.average-rating'): </strong>
                                                        {{-- stars reviews --}}
                                                        <div
                                                            class="average_rating buttons_bottom_block d-inline-block ml-2">
                                                            <a href="#ratethevendor"
                                                                title="View comments about Harry Makle">
                                                                @switch($vendor->avg_star)
                                                                    @case(1)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    @break
                                                                    @case(2)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    @break
                                                                    @case(3)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    @break
                                                                    @case(4)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star"></div>
                                                                    @break
                                                                    @case(5)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    @break
                                                                    @default
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                @endswitch
                                                            </a>
                                                        </div>
                                                    </label>
                                                    <span id="average_total">(0)</span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- vendor page header right --}}
                                    <div
                                        class="col-md-12 col-xl-6 seller-header-right d-flex align-items-center justify-content-end flex-wrap">
                                        <a href="#">
                                            <i class="icon-cart"></i> @lang('site.show-products-of'){{ $vendor->name }}
                                        </a>
                                        <a title="Add to favorite seller"
                                            href="http://demo.bestprestashoptheme.com/savemart/ar/module/jmarketplace/favoriteseller?id_seller=3"
                                            class="seller-favorite">
                                            <i class="zmdi zmdi-plus"></i> @lang('site.add-to-favourite-seller')
                                        </a>

                                        <a title="Contact with Harry Makle"
                                            href="http://demo.bestprestashoptheme.com/savemart/ar/module/jmarketplace/contactseller?id_seller=3">
                                            <i class="fa fa-comment"></i>
                                            @lang('site.contact')
                                        </a>
                                    </div>
                                </div>

                                {{-- vendor detailed data --}}
                                <div class="row vendor-content-detail">
                                    {{-- vendor's admin photo --}}
                                    <div class="vendor-img">
                                        <img class="img-responsive"
                                            src="{{ $vendor->admin->image_path }}"
                                            width="100%">
                                    </div>

                                    {{-- vendor's admin contact data --}}
                                    <div class="content-seller-vendor">

                                        <div class="ps-vendor-fullname">
                                            <p>{{ $vendor->admin->name }}</p>
                                        </div>
                                        <div class="ps-vendor-detail">
                                            <p><i class="fa fa-fw fa-map-marker"></i><label><b>@lang('site.vendor-address') : </b>
                                                    {{ $vendor->address }}</label></p>
                                        </div>
                                        <div class="ps-vendor-detail">
                                            <p><i class="fa fa-fw fa-phone"></i><label><b>@lang('site.vendor-phone') :
                                                    </b>{{ $vendor->phone }}</label></p>
                                            <p><i class="fa fa-fax"></i><label><b>@lang('site.vendor-fax') :</b>01656299992</label></p>
                                        </div>
                                        <div class="ps-vendor-detail">
                                            <a href="mailto:demo@demo.com"><i class="fa fa-fw fa-envelope"></i><b>@lang('site.email') :
                                                </b>{{ $vendor->admin->email }}</a>
                                        </div>

                                    </div>
                                </div>
                                {{-- about vendor --}}
                                <div class="row ps-description-vendor">
                                    <p>{{ $vendor->about }}
                                    </p>
                                </div>
                            </div>

                            <div id="jmarketplace-sellernews">
                                <div class="product_list grid row jmarketplace-products">

                                    @foreach ($vendor->products as $product)
                                        {{-- product --}}
                                        <div class="item col-12 col-sm-6 col-md-4 col-lg-3">

                                            <div class="product-miniature js-product-miniature  first_item"
                                                data-id-product="9" data-id-product-attribute="179" itemscope=""
                                                itemtype="http://schema.org/Product">

                                                {{-- product image --}}
                                                <div class="thumbnail-container">

                                                    <a class="product_img_link"
                                                        href="http://demo.bestprestashoptheme.com/savemart/ar/smartphone-tablet/9-mauris-feugiat-et-dui-sit-amet.html"
                                                        title="Mauris feugiat et dui sit amet" itemprop="url">
                                                        <img class="img-fluid image-cover"
                                                            src="{{$product->productimages->first()->image_path}}"
                                                            alt="{{ $product->translate(app()->getLocale())->name ?? $product->name }}"
                                                            title="{{ $product->translate(app()->getLocale())->name ?? $product->name }}"
                                                            data-full-size-image-url="http://demo.bestprestashoptheme.com/savemart/64-large_default/mauris-feugiat-et-dui-sit-amet.jpg">
                                                    </a>

                                                </div>

                                                {{-- product descreption --}}
                                                <div class="product-description">
                                                    <div class="product-groups">
                                                        {{-- product title --}}
                                                        <div class="product-title" itemprop="name">
                                                            <a href="">
                                                                {{ $product->translate(app()->getLocale())->name ?? $product->name }}
                                                            </a>
                                                        </div>

                                                        {{-- stars reviews --}}
                                                        <div class="product-comments">
                                                            <div class="star_content">
                                                                @switch($product->avg_star)
                                                                    @case(1)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    @break
                                                                    @case(2)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    @break
                                                                    @case(3)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    @break
                                                                    @case(4)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star"></div>
                                                                    @break
                                                                    @case(5)
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    @break
                                                                    @default
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                    <div class="star"></div>
                                                                @endswitch

                                                            </div>
                                                            <span>0 review</span>
                                                        </div>

                                                        {{-- vendor name --}}
                                                        <p class="seller_name">
                                                            <a title="@lang('site.view-seller-profile')"
                                                                href="{{ route('shop.vendors.show', $product->vendor->id) }}">
                                                                <i class="fa fa-user"></i>
                                                                {{ $product->vendor->name }}
                                                            </a>
                                                        </p>

                                                        {{-- product price --}}
                                                        <div class="product-group-price">
                                                            <span class="price product-price">
                                                                {{ $product->insale ? $product->price : $product->sale_price }}&nbsp;UK£
                                                            </span>
                                                        </div>
                                                        {{-- not appeared!! --}}
                                                        <div class="info-stock">
                                                            <span class=" label-success">
                                                                {{ $product->stock > 0 ? __('site.in-stock') : __('site.out-of-stock') }}
                                                            </span>
                                                        </div>
                                                        <div class="product-desc" itemprop="desciption">{{ $product->translate(app()->getLocale())->description ?? $product->description }}</div>
                                                    </div>
                                                    {{-- product buttons --}}
                                                    <div class="product-buttons d-flex justify-content-center"
                                                        itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                                        {{-- add to basket form --}}
                                                        <form
                                                            action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق"
                                                            method="post" class="formAddToCart">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="id_product" value="9">
                                                            <a class="add-to-cart" href="#"
                                                                data-button-action="add-to-cart"><i
                                                                    class="novicon-cart"></i><span>أضف للسلة</span></a>
                                                        </form>

                                                        {{-- add to wishlist link --}}
                                                        <a class="addToWishlist wishlistProd_9" href="#" data-rel="9"
                                                            onclick="WishlistCart('wishlist_block_list', 'add', '9', false, 1); return false;">
                                                            <i class="fa fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>

                                                        {{-- show product --}}
                                                        <a href="#" class="quick-view hidden-sm-down"
                                                            data-link-action="quickview">
                                                            <i class="fa fa-search"></i><span> نظرة سريعة</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    @endforeach

                                </div>
                            </div>



                            <ul class="footer_links_ja list-inline">
                                <li class="list-inline-item">
                                    <a class="btn btn-secondary" href="javascript: history.go(-1)">
                                        <span>
                                            <i class="fa fa-chevron-left"></i>
                                            @lang('site.go-back')
                                        </span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-secondary"
                                        href="http://demo.bestprestashoptheme.com/savemart/modules/">
                                        <span>
                                            <i class="fa fa-chevron-left"></i>
                                            @lang('site.home')
                                        </span>
                                    </a>
                                </li>
                            </ul>


                        </section>




                    </div>


                </div>
            </div>
        </div>



    </div>
    
@endsection
