@extends('layouts.admin')

@section('tilte', 'Show vendors')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <div class="row">
                    <div class="col-12">
                      <div class="card">

                        <div class="card-header">
                          {{-- title: show vendors data --}}
                          <div class="mb-2">
                            <h3 class="card-title"><strong>@lang('site.show-vendors-data')</strong> <small>{{ $vendors->total() }}</small></h3>
                          </div>

                            {{-- search & add button --}}
                            <form action="{{ route('adminDashboard.vendors.index') }}" method="get">
                              <div class="d-flex" style="width: 300px;" >
                                
                                <input type="text" name="search" class="form-control float-right" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-default"><i class="fas fa-search"> @lang('site.search')</i></button>
                                </div>

                                {{-- add new vendor Button --}}
                                <div class="input-group-append">
                                  @if (auth()->user()->hasPermission('create_vendors'))
                                  <a href="{{ route('adminDashboard.vendors.create') }}" class="btn btn-info "><i class="fas fa-plus"></i> @lang('site.create')</a>
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
                                <th>@lang('site.logo')</th>
                                <th>@lang('site.about')</th>
                                <th>@lang('site.address')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.contact-person')</th>
                                <th>@lang('site.edit-vendor')</th>
                              </tr>
                            </thead>

                            @if ($vendors->count() > 0)
                            <tbody>
                              @foreach ($vendors as $index=>$vendor)
                              <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $vendor->name }}</td>
                                <td><img src="{{ $vendor->image_path}}" style="height:50px; width: 50px" alt="image" class="rounded-circle img-thumbnail"></td>
                                <td>{{ $vendor->about }}</td>
                                <td>{{ $vendor->address }}</td>
                                <td>{{ $vendor->phone }}</td>
                                <td>
                                  <img src=" {{ $vendor->admin->image_path  }}" style="height: 30px; width:30px" alt="">
                                  {{  $vendor->admin->name }}</td>
                                <td>

                                  {{-- edit button --}}
                                  @if (auth()->user()->hasPermission('update_vendors'))
                                  <a href="{{ route('adminDashboard.vendors.edit',$vendor->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @else
                                  <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @endif

                                  
                                  {{-- delete button --}}
                                  @if (auth()->user()->hasPermission('delete_vendors'))

                                  <form class="delete" method="POST" action="{{ route('adminDashboard.vendors.destroy', $vendor->id) }}" style="display: inline-block">
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
                          {{ $vendors->appends(request()->query())->links() }}
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
