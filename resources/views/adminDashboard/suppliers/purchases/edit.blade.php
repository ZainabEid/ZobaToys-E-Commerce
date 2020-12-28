@extends('layouts.admin')

@section('tilte', 'Add New purchses')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <h1 class="">@lang('site.add-new-purchase')</h1>

            {{-- row of two cards --}}
            <div class="row">

                {{-- groups and supplies --}}
                <div class="col-md-6">
                    <div class="card ">

                        <div class="card-header with-border">
                            <h4 class="mt-4"> @lang('site.groups')
                                <small>( {{ $groups->first()->supplies_total }}
                                    @lang('site.supplies'))
                                </small>
                            </h4>
                        </div>

                        {{-- if there is caregories show them --}}
                        @if ($groups->count() > 0)

                            <div id="accordionWrap1">

                                @foreach ($groups as $index => $group)

                                    <div class="card mb-0 accordion collapse-icon accordion-icon-rotate">

                                        {{-- group title --}}
                                        <a class="card-header info collapsed" href="#accordion{{ $group->id }}"
                                            id=" heading{{ $group->id }}" data-toggle="collapse" aria-expanded="false"
                                            aria-controls="accordion{{ $group->id }}">

                                            <div class="card-title lead">
                                                {{ $group->name }}
                                            </div>
                                        </a>

                                        {{-- supplies table --}}
                                        <div class="collapse" id="accordion{{ $group->id }}" role="tabpanel"
                                            data-parent="#accordionWrap1" aria-labelledby=" heading{{ $group->name }} ">

                                            <div class="card-content">

                                                @if ($group->supplies->count() > 0)
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
                                                                @foreach ($group->supplies as $supply)
                                                                    <tr>
                                                                        <td>{{ $supply->name }}</td>
                                                                        <td>{{ $supply->stock }}</td>
                                                                        <td>{{ number_format($supply->sale_price,2) }}</td>
                                                                        <td><a href="#"
                                                                                {{ $supply->stock == 0 ? 'disabled' : '' }}
                                                                                class="btn btn-sm  {{ in_array($supply->id, $purchase->supply()->pluck('supply_id')->toArray()) ? 'btn-default disabled' : 'btn-success add-supply-btn'  }} "
                                                                                id="supply-{{ $supply->id }}"
                                                                                data-id="{{ $supply->id }}"
                                                                                data-name="{{ $supply->name }}"
                                                                                data-price="{{ $supply->sale_price }}"
                                                                                data-stock="{{ $supply->stock }}">
                                                                                <i class="fa fa-plus"></i></a></td>
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

                                {{-- end of collaps {{ $group->name }}
                                --}}
                            </div>

                        @else
                            <h2> @lang('site.data-not-found')</h2>
                        @endif

                    </div>{{-- end of card --}}
                </div>{{-- end oc col-md-6 --}}


                {{-- purchase data --}}
                <div class="col-md-6">
                    <div class="card card-solid">

                         {{-- card header  --}}
                         <div class="card-header with-bpurchase">
                             <h3> @lang('site.purchase')</h3>
                            </div>
                            
                        {{-- card body  --}}
                        <form action="{{ route('adminDashboard.clients.purchses.update' , ['client'=> $client->id, 'purchase' => $purchase->id]) }}" method="POST">
                            @csrf
                            @method('put')

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

                                        
                                        @foreach ($purchase->supply as $supply)
                                            
                                        <tr>
                                            <td>{{ $supply->name }}</td>
                                            <td><input type="number"  name="supplies[{{ $supply->id }}][quantity]" data-price="{{ number_format($supply->sale_price,2) }}" class="form-control supply-quentity" value="{{ $supply->pivot->quantity }}" min="1" max="{{ $supply->stock }}"></td>
                                            <td class="supply-price">{{ number_format( $supply->sale_price * $supply->pivot->quantity, 2 ) }}</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm remove-supply-btn"  data-id="{{ $supply->id }}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        @endforeach

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
                                    <button type="submit"  class="btn btn-info w-100 " id="add-purchase-form-button">
                                        <i class="fa fa-plus"></i> @lang('site.edit-purchase')
                                    </button>
                                </div>{{-- end of card footer --}}

                            </div>{{-- end of card body --}}
                            
                        </form>


                    </div>
                </div>
            </div>

           

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection