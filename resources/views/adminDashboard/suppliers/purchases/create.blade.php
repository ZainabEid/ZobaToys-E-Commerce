@extends('layouts.admin')

@section('tilte', 'Add New purchases')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <h1 class="">@lang('site.add-new-purchase')</h1>

            {{-- row of two cards --}}
            <div class="row">

                
                  {{-- list of supplier's supplies --}}
                  <div class="col-md-6">
                    <div class="card ">

                        <div class="card-header with-border">
                            <h4 class="mt-4"> @lang('site.groups')
                                <small>( {{ $supplier->supplies->count() }}
                                    @lang('site.supplies'))
                                </small>
                            </h4>
                        </div>

                      

                        <div class="card-content">

                            @if ($supplier->supplies->count() > 0)
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
                                            @foreach ($supplier->supplies as $supply)
                                                <tr>
                                                    <td>{{ $supply->name }}</td>
                                                    <td>{{ $supply->stock }}</td>
                                                    <td>{{ number_format($supply->purchase_price,2) }}</td>
                                                    <td>
                                                        <a href="#"
                                                            {{ $supply->stock == 0 ? 'disabled' : '' }}
                                                            class="btn btn-success btn-sm add-supply-btn"
                                                            id="supply-{{ $supply->id }}"
                                                            data-name="{{ $supply->name }}"
                                                            data-stock="{{ $supply->stock }}"
                                                            data-id="{{ $supply->id }}"
                                                            data-price="{{ $supply->purchase_price }}"><i
                                                                class="fa fa-plus"></i>
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
                    </div>{{-- end of supplier's supplies card --}}
                </div>{{-- end of right col-md-6 --}}


                {{-- purchase data and purchase history --}}
                <div class="col-md-6">

                    {{-- purchase  data --}}
                    <div class="card card-solid">

                        <div class="card-header with-bpurchase">
                            <h3> @lang('site.purchase')</h3>
                        </div>

                        <form action="{{ route('adminDashboard.suppliers.purchases.store' , $supplier->id) }}" method="POST">
                            @csrf
                            @method('post')

                            @include('adminDashboard.includes.errors')


                            <div class="card-body table-responsive p-0">

                                <table class="table table-head-fixed text-nowrap">

                                    <thead>
                                        <tr>
                                            <th>@lang('site.supply')</th>
                                            <th>@lang('site.quantity')</th>
                                            <th>@lang('site.price')</th>
                                            <th>@lang('site.delete')</th>
                                        </tr>
                                    </thead>


                                    <tbody class="purchase-list">
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

                                    <h2> @lang('site.data-not-found')</h2>

                                </table>{{-- end of table --}}

                                {{-- card footer: add purchase button --}}
                                <div class="card-footer">
                                    <button type="submit"  class="btn btn-info w-100 disabled" id="add-purchase-form-button">
                                        <i class="fa fa-plus"></i> @lang('site.add-purchase')
                                    </button>
                                </div>{{-- end of card footer --}}

                            </div>{{-- end of card body --}}
                            
                        </form>


                    </div> {{-- end of purchase data card --}}

                    
                    {{-- if there is previous purchases show them --}}  
                    @if ($supplier->purchases()->count() > 0)
                    
                        {{-- purchase history --}}
                        <div class="card ">

                            <div class="card-header with-bpurchase">
                                <h4 class="mt-4"> @lang('site.previous-purchases')
                                    <small>( {{ $purchases->total() }}
                                        @lang('site.purchases'))
                                    </small>
                                </h4>
                            </div> {{--  end of card header --}}

                            
                            @foreach ($purchases as $index => $purchase)
                            
                            <div id="{{ $purchase->created_at->format('d-m-y-s') }}">

                                    <div class="card mb-0 accordion collapse-icon accordion-icon-rotate">

                                        {{-- card title--}}
                                        <h4 class="card-title">
                                            <a class="card-header primary collapsed" href="#purchase-history{{ $purchase->created_at->format('d-m-y-s') }}" 
                                                data-toggle="collapse" aria-expanded="false" id=" heading{{ $purchase->id }}" >
                                               
                                                <div class="card-title lead">
                                                    {{ $purchase->created_at->toFormattedDateString() }}
                                                    <small>({{  $purchase->total_price }} 
                                                        @lang('site.pound') 
                                                        )
                                                    </small>
                                                    
                                                </div>
                                            </a>
                                        </h4>
                                        
                                       
                                      
                                        {{-- card table --}}
                                        <div class="collapse" id="purchase-history{{ $purchase->created_at->format('d-m-y-s') }}" role="tabpanel"
                                            data-parent="#{{ $purchase->created_at->format('d-m-y-s') }}"  aria-labelledby=" heading{{ $purchase->created_at->format('d-m-y-s') }}">

                                            <div class="card-content">


                                                    <table class="table table-head-fixed text-nowrap">

                                                        <thead>
                                                            <tr>
                                                                <th>@lang('site.supply')</th>
                                                                <th>@lang('site.quantity')</th>
                                                                <th>@lang('site.price')</th>
                                                            </tr>
                                                        </thead>
                    
                    
                                                        <tbody class="purchase-list">
                                                            @foreach ( $purchase->supplies as $supply )
                                                            <tr>
                                                                <td>{{ $supply->name }}</td>
                                                                <td>{{ $supply->pivot->quantity }}</td>
                                                                <td>{{ $supply->purchase_price }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                    
                                                    </table>{{-- end of table --}}

                                            
                                            </div>{{-- end of card content
                                            --}}

                                        </div>{{-- end of collaps tab panel
                                        --}}
                                    </div> {{-- end of card --}}

                                </div>
                                @endforeach

                                {{-- end of collaps of purchase
                                --}}
                       
                    </div>{{-- end of purchase history card --}}

                    @else
                        <h2> @lang('site.data-not-found')</h2>
                    @endif
               
               
                </div> {{-- end of left col-md-6 --}}
                

            </div>{{-- end of row --}}


        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
