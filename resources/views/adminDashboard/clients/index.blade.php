@extends('layouts.admin')

@section('tilte', 'Show clients')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <div class="row">
                    <div class="col-12">
                      <div class="card">

                        <div class="card-header">
                          {{-- title: show clients data --}}
                          <div class="mb-2">
                            <h3 class="card-title"><strong>@lang('site.show-clients-data')</strong> <small>{{ $clients->total() }}</small></h3>
                          </div>

                            {{-- search & add button --}}
                            <form action="{{ route('adminDashboard.clients.index') }}" method="get">
                              <div class="d-flex" style="width: 300px;" >
                                
                                <input type="text" name="search" class="form-control float-right" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                
                                <div class="input-group-append ">
                                  <button type="submit" class="btn btn-default "><i class="fas fa-search"> @lang('site.search')</i></button>
                                </div>

                                {{-- add new client Button --}}
                                <div class="input-group-append mr-1 ml-1">
                                  @if (auth()->user()->hasPermission('create_clients'))
                                  <a href="{{ route('adminDashboard.clients.create') }}" class="btn btn-info "><i class="fas fa-plus"></i> @lang('site.create')</a>
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
                                <th>@lang('site.orders')</th>
                                <th>@lang('site.edit-client')</th>
                              </tr>
                            </thead>

                            @if ($clients->count() > 0)
                           
                            
                            <tbody>
                              
                              @foreach ($clients as $index=>$client)
                              <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ implode( $client->phone,'-') }}</td>
                                 
                                <td>{{ $client->address}}</td>
                                <td>
                                  @if (auth()->user()->hasPermission('create_orders'))
                                  <a href="{{ route('adminDashboard.clients.orders.create', $client->id) }}" class="btn btn-info btn-sm "> 
                                    <i class="fa fa-plus"> </i> @lang('site.add-order')
                                  </a>
                                  @else
                                  <a href="#" class="btn btn-info btn-sm disabled"> 
                                    <i class="fa fa-plus"> </i> @lang('site.add-order')
                                  </a>
                                  @endif
                                </td>
                                <td>

                                  {{-- edit button --}}
                                  @if (auth()->user()->hasPermission('update_clients'))
                                  <a href="{{ route('adminDashboard.clients.edit',$client->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @else
                                  <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @endif

                                  
                                  {{-- delete button --}}
                                  @if (auth()->user()->hasPermission('delete_clients'))

                                  <form class="delete" method="POST" action="{{ route('adminDashboard.clients.destroy', $client->id) }}" style="display: inline-block">
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
                          {{ $clients->appends(request()->query())->links() }}
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
