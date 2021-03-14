@extends('layouts.shop')

@section('content')

<div class="wrapper-site " >

    <nav aria-label="breadcrumb">
        <div class="container" >
                <ol   class="breadcrumb">
                <li itemprop="itemListElement"  >
                    <a  itemprop="item" href="{{ route("shop") }}">
                        <span itemprop="name"> @lang('site.homepage')</span>
                    </a>
                </li>
                </ol>
        </div>
    </nav> 

    <div class="container no-index">
        <div class="row">
            <div id="content-wrapper" class="full-width col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <div id="main"> 
                    {{-- page header --}}
                    <div class="page-header">
                        <h1 class="page-title hidden-xs-up" >
                            @lang('site.login-to-your-account')
                        </h1>
                    </div>
                    {{-- login form --}}
                    <section id="content" class="page-content">
                        <section class="login-form">
                            <form id="login-form" action="{{ route('login') }}" method="post">
                                @csrf
                                @method('POST')
                                <section> 
                                    {{-- email --}}
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                            @lang('site.email'):
                                        </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="email" type="email" value="" required="">
                                        </div>
                                        <div class="col-md-4 form-control-comment right">
                                        </div>
                                    </div>
                                    {{-- password --}}
                                    <div class="form-group row no-gutters">
                                        <label class="col-md-2 form-control-label mb-xs-5 required">
                                                @lang('site.password'):
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group js-parent-focus">
                                            <input class="form-control js-child-focus js-visible-password" name="password" type="password" value="" pattern=".{5,}" required="">
                                            <span class="input-group-btn">
                                                <button class="btn" type="button" data-action="show-password" data-text-show=" @lang('site.show') " data-text-hide="@lang('site.hide')">
                                                @lang('site.show-password')
                                                </button>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-control-comment right"></div>
                                    </div>
                                    {{-- forget password --}}
                                    <div class="row no-gutters">
                                        <div class="col-md-10 offset-md-2">
                                            <div class="forgot-password">
                                                <a href="#" rel="nofollow">
                                                    @lang('site.forget-password')?
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <footer class="form-footer clearfix">
                                    <div class="row no-gutters">
                                      <div class="col-md-10 offset-md-2">
                                        <input type="hidden" name="submitLogin" value="1">
                                        
                                          <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                            @lang('site.login')
                                          </button>
                                        
                                      </div>
                                    </div>
                                </footer>
                            </form>
                        </section>
                        <div class="row no-gutters">
                            <div class="col-md-10 offset-md-2">
                              <div class="no-account">
                                <a href="#" data-link-action="display-register-form">
                                 @lang('site.you-dont-have-account?-register-now')
                                </a>
                              </div>
                            </div>
                          </div>
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