@extends('layouts.admin')

@section('tilte', 'Show suppliers')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <div class="row">
                    <div class="col-12">
                      <div class="card">

                        <div class="card-header">
                          {{-- title: show suppliers data --}}
                          <div class="mb-2">
                            <h3 class="card-title"><strong>@lang('site.show-suppliers-data')</strong> <small>{{ $suppliers->count () }}</small></h3>
                          </div>

                            {{-- search & add button --}}
                            <form action="{{ route('adminDashboard.suppliers.index') }}" method="get">
                              <div class="d-flex" style="width: 300px;" >
                                
                                <input type="text" name="search" class="form-control float-right" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                
                                <div class="input-group-append ">
                                  <button type="submit" class="btn btn-default "><i class="fas fa-search"> @lang('site.search')</i></button>
                                </div>

                                {{-- add new supplier Button --}}
                                <div class="input-group-append mr-1 ml-1">
                                  @if (auth()->user()->hasPermission('create_suppliers'))
                                  <a href="{{ route('adminDashboard.suppliers.create') }}" class="btn btn-info "><i class="fas fa-plus"></i> @lang('site.create')</a>
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
                                <th>@lang('site.name')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.address')</th>
                                <th>@lang('site.supplies')</th>
                                <th>@lang('site.description')</th>
                                <th>@lang('site.action')</th>
                                <th>@lang('site.add-purchase')</th>
                              </tr>
                            </thead>

                            @if ($suppliers->count() > 0)
                           
                            
                            <tbody>
                              
                              @foreach ($suppliers as $index=>$supplier)
                              <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ is_array($supplier->phone) ? implode( $supplier->phone,'-') : $supplier->phone }}</td>
                                 
                                <td>{{ $supplier->address}}</td>
                                <td>
                                  {{ $supplier->supplies()->count()}}:
                                  @foreach ($supplier->supplies as $supply)
                                      {{ $supply->name }},
                                  @endforeach
                                </td>
                                <td>{{ $supplier->description}}</td>

                                {{-- add new purchase Button--}}

                                <td>
                                  @if (auth()->user()->hasPermission('create_purchases'))
                                  <a href="{{ route('adminDashboard.suppliers.purchases.create', $supplier->id) }}" class="btn btn-info btn-sm "> 
                                    <i class="fa fa-plus"> </i> @lang('site.add-purchase')
                                  </a>
                                  @else
                                  <a href="#" class="btn btn-info btn-sm disabled"> 
                                    <i class="fa fa-plus"> </i> @lang('site.add-purchase')
                                  </a>
                                  @endif
                                </td>

                                <td>

                                  {{-- edit button --}}
                                  @if (auth()->user()->hasPermission('update_suppliers'))
                                  <a href="{{ route('adminDashboard.suppliers.edit',$supplier->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @else
                                  <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @endif

                                  
                                  {{-- delete button --}}
                                  @if (auth()->user()->hasPermission('delete_suppliers'))

                                  <form class="delete" method="POST" action="{{ route('adminDashboard.suppliers.destroy', $supplier->id) }}" style="display: inline-block">
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
                          {{ $suppliers->appends(request()->query())->links() }}
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                  <!-- /.row -->

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
