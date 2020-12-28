@extends('layouts.admin')

@section('tilte', 'Add New orders')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <h1 class="">@lang('site.add-new-order')</h1>

            {{-- row of two cards --}}
            <div class="row">

                {{-- list of categories and products --}}
                <div class="col-md-6">
                    <div class="card ">

                        <div class="card-header with-border">
                            <h4 class="mt-4"> @lang('site.categories')
                                <small>( {{ $categories->first()->products_total }}
                                    @lang('site.products'))
                                </small>
                            </h4>
                        </div>

                        {{-- if there is caregories show them --}}
                        @if ($categories->count() > 0)

                            <div id="accordionWrap1">

                                @foreach ($categories as $index => $category)

                                    <div class="card mb-0 accordion collapse-icon accordion-icon-rotate">

                                        {{-- category title --}}
                                        <a class="card-header info collapsed" href="#accordion{{ $category->id }}"
                                            id=" heading{{ $category->id }}" data-toggle="collapse" aria-expanded="false"
                                            aria-controls="accordion{{ $category->id }}">

                                            <div class="card-title lead">
                                                {{ $category->name }}
                                            </div>
                                        </a>

                                        {{-- products table --}}
                                        <div class="collapse" id="accordion{{ $category->id }}" role="tabpanel"
                                            data-parent="#accordionWrap1" aria-labelledby=" heading{{ $category->name }} ">

                                            <div class="card-content">

                                                @if ($category->products->count() > 0)
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>@lang('site.name')</th>
                                                                    <th>@lang('site.stock')</th>
                                                                    <th>@lang('site.price')</th>
                                                                    <th>@lang('site.add')</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($category->products as $product)
                                                                    <tr>
                                                                        <td>{{ $product->name }}</td>
                                                                        <td>{{ $product->stock }}</td>
                                                                        <td>{{ number_format($product->sale_price,2) }}</td>
                                                                        <td><a href="#"
                                                                                {{ $product->stock == 0 ? 'disabled' : '' }}
                                                                                class="btn btn-success btn-sm add-product-btn"
                                                                                id="product-{{ $product->id }}"
                                                                                data-name="{{ $product->name }}"
                                                                                data-stock="{{ $product->stock }}"
                                                                                data-id="{{ $product->id }}"
                                                                                data-price="{{ $product->sale_price }}">
                                                                                <i class="fa fa-plus"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                @else
                                                <h2> @lang('site.data-not-found')</h2>

                                                @endif

                                            </div>{{-- end of card content
                                            --}}

                                        </div>{{-- end of collaps tab panel
                                        --}}
                                    </div> {{-- end of card --}}

                                @endforeach

                               
                            </div> {{-- end of category collaps  --}}

                        @else
                            <h2> @lang('site.data-not-found')</h2>
                        @endif

                    </div>{{-- end of Categories card --}}
                </div>{{-- end of right col-md-6 --}}
                
                
                {{-- order data and order history --}}
                <div class="col-md-6">

                    {{-- order  data --}}
                    <div class="card card-solid">

                        <div class="card-header with-border">
                            <h3> @lang('site.order')</h3>
                        </div>

                        <form action="{{ route('adminDashboard.clients.orders.store' , $client->id) }}" method="POST">
                            @csrf
                            @method('post')

                            @include('adminDashboard.includes.errors')


                            <div class="card-body table-responsive p-0">

                                <table class="table table-head-fixed text-nowrap">

                                    <thead>
                                        <tr>
                                            <th>@lang('site.product')</th>
                                            <th>@lang('site.quantity')</th>
                                            <th>@lang('site.price')</th>
                                            <th>@lang('site.delete')</th>
                                        </tr>
                                    </thead>


                                    <tbody class="order-list">
                                        {{-- managed in js --}}
                                    </tbody>

                                    {{-- table footer : total price --}}
                                    <tfoot>
                                        <div class="table-foot ">
                                            <div class="">
                                                <td colspan="3">
                                                    <h3> @lang('site.total')</h3>
                                                </td>
                                                <td colspan="1" class="total-price"></td>
                                            </div>

                                        </div>
                                    </tfoot>


                                </table>{{-- end of table --}}

                                {{-- card footer: add order button --}}
                                <div class="card-footer">
                                    <button type="submit"  class="btn btn-info w-100 disabled" id="add-order-form-button">
                                        <i class="fa fa-plus"></i> @lang('site.add-order')
                                    </button>
                                </div>{{-- end of card footer --}}

                            </div>{{-- end of card body --}}
                            
                        </form>


                    </div> {{-- end of order data card --}}

                    
                    {{-- if there is previous orders show them --}}
                    
                    {{-- order history --}}
                    <div class="card ">
                        
                        <div class="card-header with-border">
                            <h4 class="mt-4"> @lang('site.previous-orders')
                                <small>( {{ $orders->total() }}
                                    @lang('site.orders'))
                                </small>
                            </h4>
                        </div> {{--  end of card header --}}
                        
                        @if ($client->order()->count() > 0)
                            
                            @foreach ($orders as $index => $order)
                            
                            <div id="{{ $order->created_at->format('d-m-y-s') }}">

                                    <div class="card mb-0 accordion collapse-icon accordion-icon-rotate">

                                        {{-- card title--}}
                                        <h4 class="card-title">
                                            <a class="card-header primary collapsed" href="#order-history{{ $order->created_at->format('d-m-y-s') }}" 
                                                data-toggle="collapse" aria-expanded="false" id=" heading{{ $order->id }}" >
                                               
                                                <div class="card-title lead">
                                                    {{ $order->created_at->toFormattedDateString() }}
                                                </div>
                                            </a>
                                        </h4>
                                        
                                       
                                      
                                        {{-- card table --}}
                                        <div class="collapse" id="order-history{{ $order->created_at->format('d-m-y-s') }}" role="tabpanel"
                                            data-parent="#{{ $order->created_at->format('d-m-y-s') }}"  aria-labelledby=" heading{{ $order->created_at->format('d-m-y-s') }}">

                                            <div class="card-content">

                                                <ul class="list-group">

                                                    @foreach ( $order->product as $product )
                                                        <li class="list-group-item">{{ $product->name }}</li>
                                                    @endforeach

                                                </ul>
                                            
                                            </div>{{-- end of card content
                                            --}}

                                        </div>{{-- end of collaps tab panel
                                        --}}
                                    </div> {{-- end of card --}}

                                </div>
                                @endforeach

                                {{-- end of collaps of order
                                --}}
                       
                                @else
                                    <h2> @lang('site.data-not-found')</h2>
                                @endif
                    </div>{{-- end of order history card --}}

               
               
                </div> {{-- end of left col-md-6 --}}
                

            </div>{{-- end of row --}}

            {{ $client->name }}

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
