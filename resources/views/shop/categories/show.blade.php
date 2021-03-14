@extends('layouts.shop')
@section('content')

<div id="wrapper-site">
    {{-- navigations --}}
        <nav data-depth="2" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="http://demo.bestprestashoptheme.com/savemart/ar/">
                                <span itemprop="name">@lang('site.homepage')</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="">
                                <span itemprop="name"></span>
                            </a>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>

                </div>
            </div>
        </nav>

        <div class="container no-index">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <section id="main">


                        <div class="block-category hidden-sm-down">
                            <h1 class="h1">{{ $category->translations(app_locale_language())->name ?? $category->name }}</h1>
                            
                            
                        </div>


                        <section id="products">

                            <div id="nav-top">

                                <div id="js-product-list-top" class="row products-selection">
                                    {{-- change grid type - count total products --}}
                                    <div class="col-md-6 col-xs-6">
                                        {{-- change-type --}}
                                        <div class="change-type">
                                            <span class="grid-type active" data-view-type="grid"><i
                                                    class="fa fa-th-large"></i></span>
                                            <span class="list-type" data-view-type="list"><i class="fa fa-bars"></i></span>
                                        </div>
                                        {{-- total-products --}}
                                        <div class="hidden-sm-down total-products">
                                            <p> <span> @lang('site.there-are') {{ $category->products->count() }} @lang('site.products')</span></p>
                                        </div>
                                    </div>

                                    {{-- products sort --}}
                                    <div class="col-md-6 col-xs-6">
                                        <div class="d-flex sort-by-row justify-content-end">

                                            <span class="hidden-sm-down sort-by">@lang('site.sort-by'):</span>
                                            <div class="products-sort-order dropdown">
                                                <a class="select-title" rel="nofollow" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <span>@lang('site.sort-by')</span>
                                                    <i class="material-icons pull-xs-right"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a rel="nofollow"
                                                        href="http://demo.bestprestashoptheme.com/savemart/ar/2-%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9-%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9?order=product.position.asc"
                                                        class="select-list current js-search-link">
                                                        @lang('site.best-reviews')
                                                    </a>
                                                    <a rel="nofollow"
                                                        href="http://demo.bestprestashoptheme.com/savemart/ar/2-%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9-%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9?order=product.name.asc"
                                                        class="select-list js-search-link">
                                                        @lang('site.name-alphabitically')
                                                    </a>
                                                    
                                                    <a rel="nofollow"
                                                        href="http://demo.bestprestashoptheme.com/savemart/ar/2-%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9-%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9?order=product.price.asc"
                                                        class="select-list js-search-link">
                                                        @lang('site.price-asscending')
                                                    </a>
                                                    <a rel="nofollow"
                                                        href="http://demo.bestprestashoptheme.com/savemart/ar/2-%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9-%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9?order=product.price.desc"
                                                        class="select-list js-search-link">
                                                        @lang('site.price-desscending')
                                                       
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            @if ($category->products->count() > 0)
                                
                            {{-- category products --}}
                            <div id="categories-product">

                                <div id="js-product-list">
                                    <div class="products product_list grid row" data-default-view="grid">

                                        @foreach ($category->products as $product)
                                      
                                        <div class="item  col-lg-4 col-md-6 col-xs-12 text-center no-padding">
                                            <div class="product-miniature js-product-miniature item-one" data-id-product="2"
                                                data-id-product-attribute="60" itemscope=""
                                                itemtype="http://schema.org/Product">
                                               
                                               @include('shop.includes.general-elements.product-card',$product)
                                               
                                            </div>
                                        </div>
                                        @endforeach
                                        @include('shop.includes.general-elements.added-to-wishlist',$product)
                                       

                                    </div>
                                </div>

                            </div>
                            @else
                                    <p> there is no products in {{ $category->name }}</p>                             
                            @endif

                            {{-- paginataion data --}}
                            <div id="js-product-list-bottom">

                                <nav class="pagination row justify-content-around">
                                    <div class="col col-xs-12 col-lg-6 col-md-12">

                                        <span class="showing">
                                            @lang('site.showing') 1-12 @lang('site.of') {{ $category->products->count() }} @lang('site.items')
                                        </span>

                                    </div>
                                    <div class="col col-xs-12 col-lg-6 col-md-12">

                                        <ul class="page-list">
                                            <li class="current">
                                                <a rel="nofollow"
                                                    href="http://demo.bestprestashoptheme.com/savemart/ar/2-%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9-%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9"
                                                    class="disabled js-search-link">
                                                    1
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="nofollow"
                                                    href="http://demo.bestprestashoptheme.com/savemart/ar/2-%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9-%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9?page=2"
                                                    class="js-search-link">
                                                    2
                                                </a>
                                            </li>
                                            <li>
                                                <a rel="next"
                                                    href="http://demo.bestprestashoptheme.com/savemart/ar/2-%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9-%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9?page=2"
                                                    class="next js-search-link">
                                                    التالي
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </nav>

                            </div>


                        </section>

                    </section>

                </div>
            </div>
        </div>



    </div>
@endsection
