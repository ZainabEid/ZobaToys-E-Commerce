  {{-- FLASH DEALS --}}
                        <div
                            class="nov-productlist nov-countdown-productlist col-xl-4 col-lg-4 col-md-4  col-xs-12 col-md-12">
                            <div class="block block-product clearfix">
                                <h2 class="title_block">
                                    @lang('site.flash-deals')
                                </h2>
                                <div class="block_content">
                                    <div id="productlist706506225"
                                        class="product_list countdown-productlist countdown-column-1 owl-carousel owl-theme"
                                        data-autoplay="false" data-autoplayTimeout="6000"
                                        data-loop="false" data-margin="30" data-dots="false"
                                        data-nav="true" data-items="1" data-items_large="1"
                                        data-items_tablet="2" data-items_mobile="1">

                                        @foreach ($flash_deals_products as $product)
                                            
                                        <div class="item item-list">
                                            <div class="product-miniature js-product-miniature first_item"
                                                data-id-product="12" data-id-product-attribute="232"
                                                itemscope itemtype="http://schema.org/Product">


                                                {{-- product photos --}}
                                                <div class="thumbnail-container">

                                                    <a href="" class="thumbnail product-thumbnail two-image">
                                                        
                                                        {{-- cover image --}}
                                                        <img class="img-fluid image-cover"
                                                        src="{{ $product->productimages->first()->image_path }}"
                                                        alt=""
                                                        width="600" height="600">    

                                                        {{-- second image --}}
                                                        <img class="img-fluid image-secondary"
                                                        src="{{ $product->productimages->last()->image_path }}"
                                                        alt=""
                                                        width="600" height="600">    
                                                    </a>

                                                    <div class="product-flags discount">@lang('site.sale')</div>

                                                </div>

                                                <div class="product-description">
                                                    <div class="product-groups">

                                                        <div class="product-title" itemprop="name">
                                                            <a href="">
                                                                {{ $product->translate(app()->getLocale())->name ?? $product->name  }}
                                                            </a>
                                                        </div>


                                                        <!-- begin modules/novproductcomments/novproductcomments_reviews.tpl -->
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
                                                        <!-- end modules/novproductcomments/novproductcomments_reviews.tpl -->

                                                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->
                                                        <p class="seller_name">
                                                            <a title="@lang('site.view-seller-profile')"
                                                                href="http://demo.bestprestashoptheme.com/savemart/ar/jmarketplace/3_harry-makle/">
                                                                <i class="fa fa-user"></i>
                                                                {{ $product->vendor->name }}
                                                            </a>
                                                        </p>

                                                        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/jmarketplace/views/templates/hook/product-list.tpl -->

                                                        <div class="product-group-price">

                                                            <div class="product-price-and-shipping">

                                                                <span itemprop="price" class="price">{{ $product->sale_price  }} EGP</span>
                                                                <span class="regular-price">{{ $product->price }} EGP</span>

                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="product-buttons d-flex justify-content-center"
                                                        itemprop="offers" itemscope
                                                        itemtype="http://schema.org/Offer">
                                                        <form
                                                            action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق"
                                                            method="post" class="formAddToCart">
                                                            <input type="hidden" name="token"
                                                                value="28add935523ef131c8432825597b9928">
                                                            <input type="hidden" name="id_product"
                                                                value="12">
                                                            <a class="add-to-cart" href="#"
                                                                data-button-action="add-to-cart"><i
                                                                    class="novicon-cart"></i><span>أضف
                                                                    للسلة</span></a>
                                                        </form>

                                                        <!-- begin /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                                        <a class="addToWishlist wishlistProd_12"
                                                            href="#" data-rel="12"
                                                            onclick="WishlistCart('wishlist_block_list', 'add', '12', false, 1); return false;">
                                                            <i class="fa fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>
                                                        <!-- end /var/www/demo.bestprestashoptheme.com/public_html/savemart/themes/vinova_savemart/modules/novblockwishlist/novblockwishlist_button.tpl -->

                                                        <a href="#" class="quick-view hidden-sm-down"
                                                            data-link-action="quickview">
                                                            <i class="fa fa-search"></i><span> نظرة
                                                                سريعة</span>
                                                        </a>
                                                    </div>

                                                </div>

                                                <!-- begin modules/novthemeconfig/views/templates/hook/countdown.tpl -->
                                                <div class="countdownfree d-flex"
                                                    data-date="2021/12/30"></div>

                                                <!-- end modules/novthemeconfig/views/templates/hook/countdown.tpl -->

                                            </div>
                                        </div>

                                        @endforeach
                                        

                                    </div>
                                </div>
                            </div>
                        </div>