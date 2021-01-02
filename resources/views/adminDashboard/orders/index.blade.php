@extends('layouts.admin')

@section('tilte', 'Orders')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <div class="row">

                    <div class="col-8">
                      <div class="card">

                        <div class="card-header">
                          {{-- title: show orders data --}}
                          <div class="mb-2">
                            <h3 class="card-title"><strong>@lang('site.show-orders')</strong> <small>{{-- $orders->total() --}}</small></h3>
                          </div>

                            {{-- search & add button --}}
                            
                            <form action="{{ route('adminDashboard.orders.index') }}" method="get">
                              <div class="d-flex" style="width: 300px;" >
                                
                                <input type="text" name="search" class="form-control float-right" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                
                                <div class="input-group-append ">
                                  <button type="submit" class="btn btn-default "><i class="fas fa-search"> @lang('site.search')</i></button>
                                </div>

                                {{-- add new order Button --}}
                                <div class="input-group-append mr-1 ml-1">
                                  @if (auth()->user()->hasPermission('create_orders'))
                                  <a href="{{ route('adminDashboard.orders.create') }}" class="btn btn-info "><i class="fas fa-plus"></i> @lang('site.create')</a>
                                  @else
                                  <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-plus"></i> @lang('site.create')</a>
                                  @endif
                                </div>

                              </div>
                                  
                            </form>
                            

                        </div>
                        <!-- end of card-header -->
                        
                        <!-- start card-body -->
                        <div class="card-body table-responsive p-0" >

                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>@lang('site.index')</th>
                                <th>@lang('site.client-name')</th>
                                <th>@lang('site.total-price')</th>
                                <th>@lang('site.check-if-paid')</th>
                                <th>@lang('site.status')</th>
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.edit-order')</th>
                              </tr>
                            </thead>

                            @if ($orders->count() > 0)
                           
                            
                            <tbody >
                              
                              @foreach ($orders as $index=>$order)
                              
                                <tr  class="{{ ($order->paid_trigger() == 'cash') ?  ''  : 'bg-danger'}} bg-lighten-5">
                                  <td>{{ $index + 1 }}</td>
                                  <td>{{ $order->client->name }}</td>
                                  <td>{{ number_format($order->total_price , 2) }}</td>
                                  <td>
                                      @if ($order->paid_trigger()=='cash')
                                          @lang('site.paid')
                                      @else
                                          @lang('site.not-paid')
                                          <a href="{{ route('adminDashboard.orders.paid',[ $order->id]) }}" class="btn btn-sm round btn-outline-success "> @lang('site.paid')</a >
  
                                      @endif
                                  </td>
                                  <td class="{{ (($order->status =='created') ?  'danger' : 'success') }}">
                                    {{ $order->status}}
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
                                  <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                    
                                  
                                  <td>
                                    
                                   {{-- show products button --}}
                                     <button class="btn btn-primary btn-sm order-products"
                                     data-url="{{ route('adminDashboard.orders.products', $order->id) }}"
                                     data-method="get"
                                     data-total="{{ $order->products->count() }}"
                                    >
                                      <i class="fa fa-list"></i>
                                      @lang('site.show-products')
                                    </button>
                                    
                                    {{-- edit button --}}
                                    @if (auth()->user()->hasPermission('update_orders'))
                                    <a href="{{ route('adminDashboard.clients.orders.edit', ['client' => $order->client->id ,'order' => $order->id ] ) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                    @else
                                    <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                    @endif
  
                                    
                                    {{-- delete button --}}
                                    @if (auth()->user()->hasPermission('delete_orders'))
  
                                    <form class="delete" method="POST" action="{{ route('adminDashboard.orders.destroy', $order->id) }}" style="display: inline-block">
                                      @csrf
                                      @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                          <i class="fas fa-trash"></i> @lang('site.delete')
                                        </button>
                                    </form>
  
                                    @else
  
                                        <button class="btn btn-danger disabled btn-sm"><i class="fas fa-trash"></i> @lang('site.delete')</button>
  
                                    @endif
                                    
                                    
                                  </td>
                                </tr>

                              
                              @endforeach
                             

                            </tbody> 

                            @else
                                <h2> @lang('site.data-not-found')</h2>
                            @endif

                          </table>

                          {{ $orders->appends(request()->query())->links() }}
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col-8 -->
                    
                    {{-- Show Products --}}
                    <div class="col-4">
                      
                      <div class="card">
                        <div class="card-header">
                          {{-- title: show products --}}
                          <div class="mb-2">
                            <h3 class="card-title"><strong>@lang('site.show-products')</strong> <small class="products-total"> {{-- managed in orders.js --}}</small></h3>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        
                        <div class="card-body">
                          
                          {{-- LOADING --}}
                          <div style="display: none; flex-direction: column; align-items: center;" id="loading">
  
                            <div class="loader"></div>
                            
                            <p style="margin-top: 10px">@lang('site.loading')</p>
                            
  
                          </div>
  
                          <div id="order-product-list">
                            {{-- managed in js --}}
                          </div>
                          <!-- /#order-product-list -->
  
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                      
                    </div>
                    <!-- /.col-4 -->

                </div>
                <!-- /.row -->

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
