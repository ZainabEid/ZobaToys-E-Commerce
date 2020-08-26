@extends('layouts.category')

@section('tilte', 'Show categories')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <div class="row">
                    <div class="col-12">
                      <div class="card">

                        <div class="card-header">
                          {{-- title: show categories data --}}
                          <div class="mb-2">
                            <h3 class="card-title"><strong>@lang('site.show-categories-data')</strong> <small>{{ $categories->total() }}</small></h3>
                          </div>

                            {{-- search & add button --}}
                            <form action="{{ route('category.index') }}" method="get">
                              <div class="d-flex" style="width: 300px;" >
                                
                                <input type="text" name="search" class="form-control float-right" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-default"><i class="fas fa-search"> @lang('site.search')</i></button>
                                </div>

                                {{-- add new category Button --}}
                                <div class="input-group-append">
                                  @if (auth()->user()->hasPermission('create_categories'))
                                  <a href="{{ route('category.create') }}" class="btn btn-info "><i class="fas fa-plus"></i> @lang('site.create')</a>
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
                                <th>@lang('site.email')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.photo')</th>
                                <th>@lang('site.edit-category')</th>
                              </tr>
                            </thead>

                            @if ($categories->count() > 0)
                            <tbody>
                              @foreach ($categories as $index=>$category)
                              <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->email }}</td>
                                <td>{{ $category->phone }}</td>
                                <td><img src="{{ $category->image_path}}" alt="image" class="rounded-circle img-thumbnail"></td>
                                <td>

                                  {{-- edit button --}}
                                  @if (auth()->user()->hasPermission('update_categories'))
                                  <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @else
                                  <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-edit"></i> @lang('site.edit')</a>
                                  @endif

                                  
                                  {{-- delete button --}}
                                  @if (auth()->user()->hasPermission('delete_categories'))

                                  <form class="delete" method="POST" action="{{ route('category.destroy', $category->id) }}" style="display: inline-block">
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
                          {{ $categories->appends(request()->query())->links() }}
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
