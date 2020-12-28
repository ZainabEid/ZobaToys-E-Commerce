@extends('layouts.admin')

@section('tilte', 'Show groups')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <div class="row">
                    <div class="col-12">
                      <div class="card">

                        <div class="card-header">
                          {{-- title: show groups data --}}
                          <div class="mb-2">
                            <h3 class="card-title"><strong>@lang('site.show-groups-data')</strong> <small>{{ $groups->total() }}</small></h3>
                          </div>

                            {{-- search & add button --}}
                            <form action="{{ route('adminDashboard.groups.index') }}" method="get">
                              <div class="d-flex" style="width: 300px;" >
                                
                                <input type="text" name="search" class="form-control float-right" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-default"><i class="fas fa-search"> @lang('site.search')</i></button>
                                </div>

                                {{-- add new group Button --}}
                                <div class="input-group-append">
                                  @if (auth()->user()->hasPermission('create_groups'))
                                  <a href="{{ route('adminDashboard.groups.create') }}" class="btn btn-info "><i class="fas fa-plus"></i> @lang('site.create')</a>
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
                                <th>@lang('site.description')</th>
                                <th>@lang('site.supplies-count')</th>
                                <th>@lang('site.related-supplies')</th>
                                <th>@lang('site.edit-group')</th>
                              </tr>
                            </thead>

                            @if ($groups->count() > 0)
                            @php
                                $locale = app()->getLocale();
                            @endphp
                            
                            <tbody>
                              
                              @foreach ($groups as $index=>$group)
                              <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->description }}</td>
                                <td>{{ $group->supplies->count() }}</td>
                                <td> <a href="{{ route('adminDashboard.supplies.index', ['group_id' => $group->id]) }}" class="btn btn-info btn-sm"> @lang('site.show-supplies')</a> </td>
                                <td>

                                  {{-- edit button --}}
                                  @if (auth()->user()->hasPermission('update_groups'))
                                  <a href="{{ route('adminDashboard.groups.edit',$group->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @else
                                  <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @endif

                                  
                                  {{-- delete button --}}
                                  @if (auth()->user()->hasPermission('delete_groups'))

                                  <form class="delete" method="POST" action="{{ route('adminDashboard.groups.destroy', $group->id) }}" style="display: inline-block">
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
                          {{ $groups->appends(request()->query())->links() }}
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
