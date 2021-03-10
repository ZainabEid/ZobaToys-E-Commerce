<div class="product-card">

    {{-- product photos --}}
    <div class="thumbnail-container">

        <a href="" class="thumbnail product-thumbnail two-image">

            {{-- cover image --}}
            <img class="img-fluid image-cover" src="{{ $product->productimages->first()->image_path }}" alt=""
                data-full-size-image-url="" width="600" height="600">

            {{-- second image --}}
            <img class="img-fluid image-secondary" src="{{ $product->productimages->last()->image_path }}" alt=""
                data-full-size-image-url="" width="600" height="600">
        </a>

        {{-- sale-padge --}}
        @if ($product->in_sale)
            <div class="product-flags discount">@lang('site.sale')</div>
        @endif

        {{-- new-bedge --}}
        @if ($product->created_at->format('M') < now()->month)
            <div class="product-flags new">@lang('site.new')</div>
        @endif

    </div>

    <div class="product-description">
        <div class="product-groups">

            <div class="product-title" itemprop="name">
                <a href="">
                    {{ $product->translate(app()->getLocale())->name ?? $product->name }}
                </a>
            </div>

            {{-- stars reviews --}}
            <div class="group-reviews">
                <div class="product-comments">
                    <div class="star_content">

                        @for ($i = 1; $i <= 5; $i++)
                            <div class="star {{ $i <= $product->avg_star ? 'star_on' : '' }}"></div>
                        @endfor


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

                {{-- in-stock --}}
                <div class="info-stock ml-auto">
                    <label class="control-label">@lang('site.Availability'):</label>
                    @if ($product->stock > 0)
                        <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        @lang('site.in-stock')
                    @else
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                        @lang('site.not-in-stock')
                    @endif

                </div>

            </div>

            <div class="product-group-price">

                <div class="product-price-and-shipping">

                    @if ($product->in_sale)
                        <span itemprop="price" class="price">{{ $product->sale_price }}&nbsp; EGP</span>
                        <span class="regular-price">{{ $product->price }}&nbsp; EGP</span>

                    @else
                        <span itemprop="price" class="price">{{ $product->price }} &nbsp;EGP</span>

                    @endif

                </div>

            </div>

            <div class="product-desc" itemprop="desciption">{{ $product->description ?? '' }}</div>
        </div>


        <div class="product-buttons d-flex justify-content-center" itemprop="offers" itemscope
            itemtype="http://schema.org/Offer">

            {{-- add to cart form --}}
            <form action="http://demo.bestprestashoptheme.com/savemart/ar/عربة التسوق" method="post"
                class="formAddToCart">
                <input type="hidden" name="token" value="28add935523ef131c8432825597b9928">
                <input type="hidden" name="id_product" value="12">
                <a class="add-to-cart" href="#" data-button-action="add-to-cart"><i class="novicon-cart"></i><span>أضف
                        للسلة</span></a>
            </form>

            {{-- wish-list --}}
            <a class="addToWishlist wishlistProd_12" href="#" data-rel="12"
                onclick="WishlistCart('wishlist_block_list', 'add', '12', false, 1); return false;">
                <i class="fa fa-heart"></i>
                <span>Add to Wishlist</span>
            </a>

            {{-- quick-view --}}
            <a href="#" class="quick-view hidden-sm-down" data-link-action="quickview">
                <i class="fa fa-search"></i><span> نظرة
                    سريعة</span>
            </a>
        </div>

    </div>




</div>
