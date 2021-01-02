@extends('layouts.admin')

@section('tilte')
    Admin Dashboard

@endsection

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                {{-- summeries --}}
                <div id="crypto-stats-3" class="row">

                    {{-- admins count --}}
                    <div class="col-xl-3 col-8">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <a  href="{{ route('admin.index') }}">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-4">
                                            <h1><i class="danger font-large-2 la la-group"></i></h1>
                                        </div>
                                        <div class="col-8">
                                            <h4>@lang('site.admins')</h4>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4>{{ $admins_count }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center  ">
                                        <div class="bg-danger text-white w-100 float-end">
                                        <h4 class="text-white">@lang('site.show') <i class="la la-arrow-right"></i></h4>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                    
                    {{-- categories count --}}
                    <div class="col-xl-3 col-8">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <a  href="{{ route('adminDashboard.categories.index') }}">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-4">
                                            <h1><i class=" warning lighten-1 font-large-2 la la-map"></i></h1>
                                        </div>
                                        <div class="col-6">
                                            <h4>@lang('site.categories')</h4>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4>{{ $categories_count }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center  ">
                                        <div class="bg-warning text-white w-100 float-end">
                                        <h4 class="text-white">@lang('site.show') <i class="la la-arrow-right"></i></h4>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>

                    {{-- products count --}}
                    <div class="col-xl-3 col-8">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <a  href="{{ route('adminDashboard.products.index') }}">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-4">
                                            <h1><i class=" success lighten-1 font-large-2 la la-television"></i></h1>
                                        </div>
                                        <div class="col-6">
                                            <h4>@lang('site.products')</h4>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4>{{ $products_count }}</h4>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-12 text-center  ">
                                        <div class="bg-success text-white w-100 float-end">
                                        <h4 class="text-white">@lang('site.show') <i class="la la-arrow-right"></i></h4>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>

                     {{-- clients count --}}
                     <div class="col-xl-3 col-8">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <a  href="{{ route('adminDashboard.clients.index') }}">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-4">
                                            <h1><i class=" info lighten-1 font-large-2 la la-male"></i></h1>
                                        </div>
                                        <div class="col-6">
                                            <h4>@lang('site.clients')</h4>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4>{{ $clients_count }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center  ">
                                        <div class="bg-info text-white w-100 float-end">
                                        <h4 class="text-white">@lang('site.show') <i class="la la-arrow-right"></i></h4>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>

                     {{-- suppliers count --}}
                     <div class="col-xl-3 col-8">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <a  href="{{ route('adminDashboard.suppliers.index') }}">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-4">
                                            <h1><i class="primary font-large-2 la la-group"></i></h1>
                                        </div>
                                        <div class="col-8">
                                            <h4>@lang('site.suppliers')</h4>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4>{{ $suppliers_count }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center  ">
                                        <div class="bg-primary text-white w-100 float-end">
                                        <h4 class="text-white">@lang('site.show') <i class="la la-arrow-right"></i></h4>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                    
                    {{-- supplies count --}}
                    <div class="col-xl-3 col-8">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <a  href="{{ route('adminDashboard.supplies.index') }}">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-4">
                                            <h1><i class=" blue-grey lighten-1 font-large-2 la la-map"></i></h1>
                                        </div>
                                        <div class="col-6">
                                            <h4>@lang('site.supplies')</h4>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4>{{ $supplies_count }}</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center  ">
                                        <div class="bg-blue-grey text-white w-100 float-end">
                                        <h4 class="text-white">@lang('site.show') <i class="la la-arrow-right"></i></h4>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Candlestick Multi Level Control Chart -->

                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('site.clients-orders')  ({{ $paid_orders->count() }})</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted">@lang('site.total-income'): {{ $paid_orders->sum('total_price') }}</p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                            <tr>
                                                <th>@lang('site.client-name')</th>
                                                <th>@lang('site.products')</th>
                                                <th>@lang('site.total-price')</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($paid_orders as $index=>$order)
                                                <tr class="@if($index==0) bg-success @endif bg-lighten-5">
                                                    <td>{{ $order->client->name }}</td>
                                                    <td> ({{ $order->products->count()}})
                                                        @foreach ($order->products as $product)
                                                            {{ $product->name }},
                                                        @endforeach</td>
                                                    <td>{{ number_format($order->total_price , 2)}}</td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('site.purchases') : ({{ $purchases->count() }})</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted">@lang('site.total-expenses'): {{  $purchases->sum('total_price')  }}</p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                            <tr>
                                                <th>@lang('site.supplier-name')</th>
                                                <th>@lang('site.supplies')</th>
                                                <th>@lang('site.total-price')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($purchases as $index=>$purchase)
                                                <tr class="@if($index==0) bg-success @elseif($index==3) bg-danger @endif bg-lighten-5">
                                                    <td>{{ $purchase->supplier->name }}</td>
                                                    <td> ({{ $purchase->supplies()->count()}})
                                                        @foreach ($purchase->supplies as $supply)
                                                            {{ $supply->name }},
                                                        @endforeach</td>
                                                    <td>{{ number_format($purchase->total_price , 2)}}</td>
                                                </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">@lang('site.active-order') : ({{ $active_orders->count() }})</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <td>
                                        <a class="btn btn-sm round btn-info btn-glow" 
                                                href="{{ route('adminDashboard.orders.approve_all') }}" >
                                            <i class="la la-close font-medium-1"></i>
                                             @lang('site.approve-all')
                                        </a>
                                    </td>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                            <tr>
                                                <th>@lang('site.date')</th>
                                                <th>@lang('site.status')</th>
                                                <th>@lang('site.client')</th>
                                                <th>@lang('site.products')</th>
                                                <th>@lang('site.price')</th>
                                                <th>@lang('site.discount')</th>
                                                <th>@lang('site.check-if-paid')</th>
                                                <th>@lang('site.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody id="active-orders">
                                            @foreach ($active_orders as $order)
                                            <tr class="{{ ($order->paid_trigger) ?  ''  : 'bg-danger'}} bg-lighten-5">
                                                <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                                <td class="{{ (($order->status=='created') ?  'danger' : 'success') }}">{{ $order->status }}</td>
                                                <td> {{ ($order->client) ? $order->client->name : $order->supplier->name  }}</td>
                                                <td>
                                                    @foreach ($order->products as $product)
                                                    {{ $product->name }},
                                                    @endforeach
                                                </td>
                                                <td>{{  number_format($order->total_price , 2) }} </td>
                                                <td>% 0 </td>
                                                <td >
                                                    @if ($order->paid_trigger)
                                                            @lang('site.paid')
                                                    @else
                                                            @lang('site.not-paid')
                                                        <a href="{{ route('adminDashboard.orders.paid',[ $order->id]) }}" class="btn btn-sm round btn-outline-success "> @lang('site.paid')</a >

                                                    @endif
                                                    
                                                    
                                                </td>
                                                <td>
                                                   {{-- change status buttons --}}
                                                    @if (auth()->user()->hasPermission('update_orders'))
                                                    @switch($order->status)
                                                    @case('created')
                                                        <a href="{{ route('adminDashboard.orders.change_status',[ "canceled", $order->id]) }}" class="btn btn-sm round btn-outline-danger  {{ $order->paid_trigger ? 'disabled'  : ''}} "> @lang('site.cancel')</a >
                                                        <a href="{{ route('adminDashboard.orders.change_status',[ "approved", $order->id]) }}" class="btn btn-sm round btn-outline-info "> @lang('site.approve')</a >
                                                    @break  
                                                    @case('approved')
                                                        @if ($order->ship_trigger)
                                                            <a href="{{ route('adminDashboard.orders.change_status',[ "shipped", $order->id]) }}" class="btn btn-sm round btn-outline-warning "> @lang('site.ship')</a >
                                                        @else
                                                        <a href="{{ route('adminDashboard.orders.change_status',[ "delivered", $order->id]) }}" class="btn btn-sm round btn-outline-success {{ $order->paid_trigger ? '' : 'disabled' }} "> @lang('site.delivered')</a >
                                                        @endif
                                                    @break

                                                    @case('shipped')
                                                        <a href="{{ route('adminDashboard.orders.change_status',[ "delivered", $order->id]) }}" class="btn btn-sm round btn-outline-success {{ $order->paid_trigger ? '' : 'disabled' }} "> @lang('site.delivered')</a >
                                                    @break

                                                    @endswitch
                                                    
                                                @endif

                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->
            </div>
        </div>
    </div><!-- ////////////////////////////////////////////////////////////////////////////-->
   
@endsection