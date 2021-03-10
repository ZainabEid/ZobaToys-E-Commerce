  {{-- FLASH DEALS --}}
  <div class="nov-productlist nov-countdown-productlist col-xl-4 col-lg-4 col-md-4  col-xs-12 col-md-12">
      <div class="block block-product clearfix">
          <h2 class="title_block">
              @lang('site.flash-deals')
          </h2>
          <div class="block_content">
              <div id="productlist706506225"
                  class="product_list countdown-productlist countdown-column-1 owl-carousel owl-theme"
                  data-autoplay="false" data-autoplayTimeout="6000" data-loop="false" data-margin="30" data-dots="false"
                  data-nav="true" data-items="1" data-items_large="1" data-items_tablet="2" data-items_mobile="1">

                  @foreach ($flash_deals_products as $product)

                      <div class="item item-list">
                          <div class="product-miniature js-product-miniature first_item" data-id-product="12"
                              data-id-product-attribute="232" itemscope itemtype="http://schema.org/Product">

                              @include('shop.includes.general-elements.product-card',$product)


                              {{-- counter --}}
                              <div class="countdownfree d-flex" data-date="2021/12/30"></div>


                          </div>
                      </div>

                  @endforeach


              </div>
          </div>
      </div>
  </div>
