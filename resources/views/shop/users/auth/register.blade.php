@extends('layouts.shop')

@section('content')
    <div id="wrapper-site">

        {{-- nav links --}}
        <nav data-depth="1" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="{{ route('shop') }}">
                                <span itemprop="name">@lang('site.homepage')</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                    </ol>

                </div>
            </div>
        </nav>


        {{-- register page content --}}
        <div class="container no-index">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="main">

                        {{-- page header --}}
                        <div class="page-header">
                            <h1 class="page-title hidden-xs-up">
                                @lang('site.create-account')
                            </h1>
                        </div>

                        {{-- redister form --}}
                        <section id="content" class="page-content">
                            <section class="register-form">
                                {{-- have account already? --}}
                                <p>@lang('site.have-an-account-alredy?')
                                    <a href="{{ route('shop.login') }}">
                                        @lang('site.login-instead!')
                                    </a>
                                </p>

                                {{-- registration form --}}
                                <form action="{{ route('shop.register.submit') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <section>
                                        <input type="hidden" name="id_customer" value="">

                                        {{-- surname --}}
                                        <div class="form-group row no-gutters">

                                            {{-- surname label --}}
                                            <label class="col-md-2 form-control-label mb-xs-5">
                                                @lang('site.surname') :
                                            </label>

                                            <div class="col-md-6 form-control-valign">

                                                {{-- MR. --}}

                                                <label class="radio-inline">
                                                    <span class="custom-radio">
                                                        <input name="surname" type="radio" value="0">
                                                        <span></span>
                                                    </span>
                                                    @lang('site.MR').
                                                </label>

                                                {{-- MS. --}}
                                                <label class="radio-inline">
                                                    <span class="custom-radio">
                                                        <input name="surname" type="radio" value="1">
                                                        <span></span>
                                                    </span>
                                                    @lang('site.MS').
                                                </label>
                                                @error('surname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>

                                        {{-- first name --}}
                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 required">
                                                @lang('site.first-name') :
                                            </label>
                                            <div class="col-md-6">

                                                <input class="form-control" name="first_name" type="text"
                                                    value="{{ old('first_name') ?? '' }}" required="">
                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        {{-- last name --}}
                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 required">
                                                @lang('site.last-name') :
                                            </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="last_name" type="text"
                                                    value="{{ old('last_name') ?? '' }}" required="">
                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        {{-- email --}}
                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 required">
                                                @lang('site.email') :
                                            </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="email" type="email"
                                                    value="{{ old('email') ?? '' }}" required="">
                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        {{-- phone --}}
                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 ">
                                                @lang('site.phone') :
                                            </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="phone" type="number"
                                                    value="{{ old('phone') ?? '' }}">
                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                         {{-- address --}}
                                         <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 ">
                                                @lang('site.address') :
                                            </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="address" type="text"
                                                    value="{{ old('address') ?? '' }}">
                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        {{-- password --}}
                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 required">
                                                @lang('site.password') :
                                            </label>
                                            <div class="col-md-6">

                                            <div class="input-group js-parent-focus">
                                                    <input class="form-control js-child-focus js-visible-password"
                                                        name="password" type="password" value="" pattern=".{5,}"
                                                        required="">
                                                    <span class="input-group-btn">
                                                        <button class="btn" type="button" data-action="show-password"
                                                            data-text-show="@lang('site.show-password')"
                                                            data-text-hide="@lang('site.hide-password')">
                                                            @lang('site.show-password')
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>

                                        {{-- confirm password --}}
                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 required">
                                                @lang('site.password-confirm') :
                                            </label>
                                            <div class="col-md-6">

                                                <div class="input-group js-parent-focus">
                                                    <input class="form-control js-child-focus js-visible-password"
                                                        id="password-confirm" name="password_confirmation" required
                                                        autocomplete="new-password" type="password" value="" pattern=".{5,}"
                                                        required="">

                                                </div>
                                            </div>

                                            @error('password-confirm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>

                                        {{-- date of bith not in database yet --}}
                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5">
                                                @lang('site.date-of-birth') :
                                            </label>

                                            <div class="col-md-6">
                                                <input class="form-control" name="birthday" type="text" value=""
                                                    placeholder="YYYY-MM-DD">
                                                <span class="form-control-comment mt-xs-5">
                                                    (مثال: 1970-05-31)
                                                </span>
                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                                (اختياري)
                                            </div>
                                        </div>
                                        @error('birthday')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        {{-- send me offers --}}
                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5">
                                            </label>
                                            <div class="col-md-6">
                                                <span class="custom-checkbox ">
                                                    <input name="send_me_offers" type="checkbox" value="1">
                                                    <span><i class="material-icons checkbox-checked">check</i></span>
                                                    <label>@lang('site.send-me-offers')</label>
                                                </span>

                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>
                                        @error('send_me_offers')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        {{-- newsletter --}}
                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5">
                                            </label>
                                            <div class="col-md-6">
                                                <span class="custom-checkbox ">
                                                    <input name="newsletter" type="checkbox" value="1">
                                                    <span><i class="material-icons checkbox-checked">check</i></span>
                                                    <label>إشترك في نشرتنا البريدية <br><em>يمكنك إلغاء الاشتراك في أي لحظة.
                                                            لهذا الغرض، يرجى الاطلاع على معلومات الاتصال لدينا في الإشعار
                                                            القانوني.</em></label>
                                                </span>
                                            </div>
                                            @error('newsletter')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>
                                    </section>

                                    {{-- Register Button --}}
                                    <footer class="form-footer clearfix">
                                        <div class="row no-gutters">
                                            <div class="col-md-10 offset-md-2">

                                                <button class="btn btn-primary form-control-submit mb-20" type="submit">
                                                    @lang('site.register')
                                                </button>

                                            </div>
                                        </div>
                                    </footer>


                                </form>


                            </section>


                        </section>



                        <footer class="page-footer">

                            <!-- Footer content -->

                        </footer>


                    </div>


                </div>
            </div>
        </div>



    </div>

@endsection
