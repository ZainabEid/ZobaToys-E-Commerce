@extends('layouts.admin')

@section('tilte', 'Show supplies')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">

                                {{-- title: show supplies data --}}
                                <div class="mb-2">
                                    <h3 class="card-title"><strong>@lang('site.show-supplies-data')</strong>
                                        <small>{{ $supplies->total() }}</small></h3>
                                </div>

                                {{-- search field & select supplier & add button--}}
                                <div class="d-flex">
                                    <div class="d-flex" style="width:80%">

                                        <form action="{{ route('adminDashboard.supplies.index') }}" method="get" class="form-inline">
                                            {{-- Search input field--}}
                                            <input type="text" name="search" class="form-control float-right"
                                                placeholder="@lang('site.search')" value="{{ request()->search }}">

                                            {{-- Select By supplier --}}
                                            <select name="supplier_id" id="" class="form-control">
                                                <option value="" > @lang('site.all-suppliers')</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}" {{ request()->supplier_id == $supplier->id ? 'selected' : '' }}> {{ $supplier->name }}</option>
                                                @endforeach
                                            </select>

                                             {{-- Select By group --}}
                                             <select name="group_id" id="" class="form-control">
                                                <option value="" > @lang('site.all-groups')</option>
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}" {{ request()->group_id == $group->id ? 'selected' : '' }}> {{ $group->name }}</option>
                                                @endforeach
                                            </select>

                                            {{-- Search button--}}
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search">
                                                        @lang('site.search')</i></button>
                                            </div>

                                        </form>
                                    </div>

                                    {{-- add new supply Button--}}
                                    <div class="input-group-append">

                                        @if (auth()->user()->hasPermission('create_supplies'))
                                            <a href="{{ route('adminDashboard.supplies.create') }}" class="btn btn-info "><i
                                                    class="fas fa-plus"></i> @lang('site.create')
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-plus"></i>
                                                @lang('site.create')
                                            </a>
                                        @endif

                                    </div>

                                </div>

                            </div>
                            <!-- end of card-header -->

                            <!-- start card-body -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>@lang('site.index')</th>
                                            <th>@lang('site.supplier')</th>
                                            <th>@lang('site.group')</th>
                                            <th>@lang('site.name')</th>
                                            <th>@lang('site.color')</th>
                                            <th>@lang('site.purchase_price')</th>
                                            <th>@lang('site.description')</th>
                                            <th>@lang('site.image')</th>
                                            <th>@lang('site.stock')</th>
                                            <th>@lang('site.stock_unit')</th>
                                            <th>@lang('site.edit-supply')</th>
                                        </tr>
                                    </thead>

                                    @if ($supplies->count() > 0)
                                        @php
                                        $locale = app()->getLocale();
                                        @endphp

                                        <tbody>
                                            @foreach ($supplies as $index => $supply)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $supply->supplier->name }}</td>
                                                    <td>{{ $supply->group->name }}</td>
                                                    <td>{{ $supply->name }}</td>
                                                    <td>{{ $supply->color }}</td>
                                                    <td>{{ $supply->purchase_price }}</td>
                                                    <td>{!! $supply->description !!}</td>
                                                    <td>
                                                        <div class="d-flex flex-column">
                                                            <img class="rounded img-thumbnail" style="width: 100px" 
                                                            src="{{ $supply->image_path ?? '' }}" alt="{{ $supply->name }}">
                                                            
                                                        </div>
                                                    </td>
                                                    <td>{{ $supply->stock }}</td>
                                                    <td>{{ $supply->stock_unit }}</td>
                                                    <td>

                                                        {{-- edit button --}}
                                                        @if (auth()
                                                            ->user()
                                                            ->hasPermission('update_supplies'))
                                                            <a href="{{ route('adminDashboard.supplies.edit', $supply->id) }}"
                                                                class="btn btn-info btn-sm"><i class="fas fa-edit"></i>
                                                                @lang('site.edit')</a>
                                                        @else
                                                            <a href="#" class="btn btn-info disabled btn-sm"><i
                                                                    class="fas fa-edit"></i> @lang('site.edit')</a>
                                                        @endif


                                                        {{-- delete button --}}
                                                        @if (auth()
                                                            ->user()
                                                            ->hasPermission('delete_supplies'))

                                                            <form class="delete" method="POST"
                                                                action="{{ route('adminDashboard.supplies.destroy', $supply->id) }}"
                                                                style="display: inline-block">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-trash"></i> @lang('site.delete')
                                                                </button>
                                                            </form>

                                                        @else

                                                            <button class="btn btn-danger disabled btn-sm"><i
                                                                    class="fas fa-trash"></i> @lang('site.delete')</button>

                                                        @endif


                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    @else
                                        <h2> @lang('site.data-not-found')</h2>
                                    @endif

                                </table>
                                {{ $supplies->appends(request()->query())->links() }}
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
