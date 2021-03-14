<div id="blockcart-modal" class=" blockcart-modal modal fade in pop-up-box" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" style="display: block;" hidden>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center" id="myModalLabel">
                    <i class="fa fa-check"></i>
                    تم أضافة المنتج بنجاح إلى سلة التسوق الخاصة بك
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons close">close</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 divide-right">
                        <div class="row no-gutters">
                            <div class="col-md-5">

                                {{-- image --}}
                                <img class="product-image img-fluid"
                                    src="{{ $product->productimages->first()->image_path }}" alt="" title=""
                                    itemprop="image" width="100" height="100">
                            </div>
                            <div class="col-md-7">
                                <div class="h5 product-name">
                                    {{ $product->translate(app()->getLocale())->name ?? $product->name }}</div>
                                <div class="product-price">{{ $product->sale_price }}&nbsp; EGP</div>

                                <span>الحجم: ص</span><br>
                                <span>: اسود</span><br>
                                <p>الكميَّة:&nbsp;1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-content">
                            <p class="cart-products-count">هناك 1 منتج في سلة مشترياتك.</p>
                            <p>إجمالي المنتجات:&nbsp;36.00&nbsp;UK£</p>
                            <p>تكلفة الشحن&nbsp;مجاناً </p>
                            <p>الإجمالي:&nbsp;36.00&nbsp;UK£ (شامل للضريبة)</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">الاستمرار في التسوق</button>
                <a href="{{ route('shop.user.cart.show') }}" class="btn btn-primary">
                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    اتمام الطلب
                </a>
            </div>
        </div>
    </div>
</div>
