@extends('layouts.admin')

@section('tilte', 'purchases')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <div class="row">

                    <div class="col-8">
                      <div class="card">

                        <div class="card-header">
                          {{-- title: show purchases data --}}
                          <div class="mb-2">
                            <h3 class="card-title"><strong>@lang('site.show-purchases')</strong> <small>{{  $purchases->total() }}</small></h3>
                          </div>

                            {{-- search & add button --}}
                            
                            <form action="{{ route('adminDashboard.purchases.index') }}" method="get">
                              <div class="d-flex" style="width: 300px;" >
                                
                                <input type="text" name="search" class="form-control float-right" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                
                                <div class="input-group-append ">
                                  <button type="submit" class="btn btn-default "><i class="fas fa-search"> @lang('site.search')</i></button>
                                </div>

                                {{-- add new purchase Button --}}
                                <div class="input-group-append mr-1 ml-1">
                                  @if (auth()->user()->hasPermission('create_purchases'))
                                  <a href="{{ route('adminDashboard.purchases.create') }}" class="btn btn-info "><i class="fas fa-plus"></i> @lang('site.create')</a>
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
                                <th>@lang('site.supplier-name')</th>
                                <th>@lang('site.total-price')</th>
                                <th>@lang('site.status')</th>
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.edit-purchase')</th>
                              </tr>
                            </thead>

                            @if ($purchases->count() > 0)
                           
                            
                            <tbody>
                              
                              @foreach ($purchases as $index=>$purchase)
                              <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $purchase->supplier->name }}</td>
                                <td>{{ number_format($purchase->total_price , 2) }}</td>
                                 
                                <td>{{ $purchase->status}}</td>
                                <td>{{ $purchase->created_at->toFormattedDateString() }}</td>
                                <td>
                                  {{-- show supplies button --}}
                                  <button class="btn btn-primary btn-sm purchase-supplies"
                                          data-url="{{ route('adminDashboard.purchases.supplies', $purchase->id) }}"
                                          data-method="get"
                                  >
                                    <i class="fa fa-list"></i>
                                    @lang('site.show-supplies')
                                  </button>


                                  {{-- edit button --}}
                                  @if (auth()->user()->hasPermission('update_purchases'))
                                  <a href="{{ route('adminDashboard.suppliers.purchases.edit', ['supplier' => $purchase->supplier->id ,'purchase' => $purchase->id ] ) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @else
                                  <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @endif

                                  
                                  {{-- delete button --}}
                                  @if (auth()->user()->hasPermission('delete_purchases'))

                                  <form class="delete" method="POST" action="{{ route('adminDashboard.purchases.destroy', $purchase->id) }}" style="display: inline-block">
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

                          {{ $purchases->appends(request()->query())->links() }}
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
                          {{-- title: show supplies --}}
                          <div class="mb-2">
                            <h3 class="card-title"><strong>@lang('site.show-supplies')</strong> </h3>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        
                        <div class="card-body">
                          
                          {{-- LOADING --}}
                          <div style="display: none; flex-direction: column; align-items: center;" id="loading">
                            <div class="loader"></div>
                            <p style="margin-top: 10px">@lang('site.loading')</p>
                          </div>
  
                          <div id="purchase-supply-list">
                            {{-- managed in js --}}
                          </div>
                          <!-- /#purchase-supply-list -->
  
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
