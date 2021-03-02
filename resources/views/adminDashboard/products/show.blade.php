@extends('layouts.admin')

@section('tilte', 'Show product')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- show product content
                row:
                    -  images [screen wide] 
                row:
                    - name
                    - description
                row:
                    - category
                    - perchase price 
                    - sale price
                    - stock
            -->

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">@lang('site.show-product-data')</h3>
                </div>
                <!-- end of .card-header -->

                <div class="card-body">
                    <div id="product_photo" class="carousel slide" data-ride="carousel">

                        {{-- slides indecators --}}
                        <ol class="carousel-indicators">
                            @foreach ($product->productimages as $index => $image)

                                <li data-target="#product_photo" data-slide-to="{{ $index }}"
                                    class="{{ $index == 0 ? 'active' : '' }}"></li>

                            @endforeach

                        </ol>
                        
                        {{-- slider images --}}
                        <div class="carousel-inner">

                            @foreach ($product->productimages as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img class="d-block w-100" src="{{ $image->image_path }}">
                                </div>
                            @endforeach

                            {{-- prev & next --}}
                            <a class="carousel-control-prev" href="#product_photo" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">@lang('site.previous')</span>
                            </a>
                            <a class="carousel-control-next" href="#product_photo" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">@lang('site.next')</span>
                            </a>

                        </div>{{-- end of image slider --}}

                    </div><!-- end of carousel slide -->
                    @php
                    $locale = app()->getLocale();
                    @endphp
                    <div class="card-footer">

                        {{-- name --}}
                        <div class="row">
                            <div class="col-md-2">
                            @lang('site.product-name'):  

                            </div>
                            <div class="col-md-10">
                                <p class="card-text">
                                    {{ $product->translate($locale)->name ?? $product->name }}
    
                                </p>
                            </div>
                            
                            
                        </div>

                        {{-- description --}}
                        <div class="row d-flex">
                            <div class="col-md-2">
                                @lang('site.product-description'):  

                            </div>
                            <div class="col-md-10">
                                <p class="card-text">
                                    {!! $product->translate($locale)->description ?? $product->description !!}
    
                                </p>
                            </div>
                            
                        </div>

                        {{-- other data --}}
                        <div class="row">
                            {{-- category --}}
                            <div class="col-md-3">
                                @lang('site.category'):
                                {{ $product->category->translate($locale)->name ?? $product->category }}
                            </div>

                            {{-- perchase price --}}
                            <div class="col-md-3">
                                @lang('site.perchase-price'): {{ $product->perchase_price }}
                            </div>

                            {{-- sale price --}}
                            <div class="col-md-3">
                                @lang('site.sale-price'): {{ $product->sale_price }}
                            </div>

                            {{-- stock --}}
                            <div class="col-md-3">
                                @lang('site.stock'): {{ $product->stock }}
                            </div>
                        </div>

                    </div><!-- end of card-footer -->

                </div><!-- end of card-body -->




            </div>
            <!--end of show product card -->

        </div>
        <!--end of content wrapper -->

    </div>
    <!--end of content -->

    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
