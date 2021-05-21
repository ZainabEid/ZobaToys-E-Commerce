@extends('layouts.shop')
@section('content')
    <div id="wrapper-site">

        {{-- nav --}}
        <nav data-depth="2" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="http://demo.bestprestashoptheme.com/savemart/ar/">
                                <span itemprop="name">@lang('site.homepage')</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <span>@lang('site.about-us')</span>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>

                </div>
            </div>
        </nav>



        <div class="container no-index">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                    <div id="main">





                        <section id="content" class="page-content page-cms page-cms-4">

                            <h1 class="page_title">About us</h1>

                            {{-- who we are --}}
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-6 col-sm-6"><a href="#"><img class="img-fluid"
                                            src="http://images.vinovathemes.com/prestashop_savemart/banner-about-1.jpg"
                                            alt="#"></a></div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="cms-block right first">
                                        <h3 class="page-subheading">WHO WE ARE</h3>
                                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis biben
                                            dum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed
                                            odio sit amet nibh vultate cursus a sit amet mauris. Proin gravida nibh vel
                                            velit auctor aliquet. Aenean sollicudin, lorem quis bibendum auctor, nisi elit
                                            conse quat ipsum, nec sagit tis sem nibh id elit. Duis sed odio sit amet nibh
                                            vultate cursus a sit amet mauris.</p>
                                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis
                                            bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis
                                            sed odio sit amet nibh vultate cursus a sit amet mauris.</p>
                                        <a><img class="img-fluid"
                                                src="https://content.screencast.com/users/HuuHoc/folders/NovaTheme/media/2bce085e-cd23-4b5c-8190-3709fbc18017/chu-ki.png"
                                                alt="#"></a>
                                    </div>
                                </div>
                            </div>

                            {{-- what we do --}}
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="cms-block left">
                                        <h3 class="page-subheading">WHAT WE DO</h3>
                                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis biben
                                            dum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed
                                            odio sit amet nibh vultate cursus a sit amet mauris. Proin gravida nibh vel
                                            velit auctor aliquet. Aenean sollicudin, lorem quis bibendum auctor, nisi elit
                                            conse quat ipsum, nec sagit tis sem nibh id elit. Duis sed odio sit amet nibh
                                            vultate cursus a sit amet mauris.</p>
                                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis
                                            bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis
                                            sed odio sit amet nibh vultate cursus a sit amet mauris.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6"><a href="#"><img class="img-fluid"
                                            src="http://images.vinovathemes.com/prestashop_savemart/banner-about-2.jpg"
                                            alt="#"></a></div>
                            </div>


                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="#">
                                    <img class="img-fluid"
                                            src="http://images.vinovathemes.com/prestashop_savemart/banner-about-3.jpg"
                                            alt="#">
                                        </a>
                                    </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="cms-box right">

                                        {{-- meet our team --}}
                                        <h3 class="page-subheading no-icon">MEET OUR TEAM</h3>
                                        <div class="owl-carousel owl-theme testimonials owl-rtl owl-loaded owl-drag">




                                            <div class="owl-stage-outer">
                                                <div class="owl-stage"
                                                    style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 606px;">
                                                  
                                                    {{-- sellers --}}
                                                    <div class="owl-item active lastActiveItem" style="width: 151.5px;">
                                                        <div class="item">
                                                            <div class="name">William James</div>
                                                            <div class="position">Designer - Stylish</div>
                                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean
                                                                sollicudin, lorem quis biben dum auctor, nisi elit consequat
                                                                ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet
                                                                nibh vultate cursus a sit amet mauris.<br> Proin gravida
                                                                nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis
                                                                bibendum auctor, nisi elit conse quat ipsum</p>
                                                        </div>
                                                    </div>

                                                    <div class="owl-item active firstActiveItem" style="width: 151.5px;">
                                                        <div class="item">
                                                            <div class="name">Seller Smith</div>
                                                            <div class="position">Web developer</div>
                                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean
                                                                sollicudin, lorem quis biben dum auctor, nisi elit consequat
                                                                ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet
                                                                nibh vultate cursus a sit amet mauris.<br> Proin gravida
                                                                nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis
                                                                bibendum auctor, nisi elit conse quat ipsum</p>
                                                        </div>
                                                    </div>

                                                    <div class="owl-item" style="width: 151.5px;">
                                                        <div class="item">
                                                            <div class="name">Vinova Smith</div>
                                                            <div class="position">Front-end Developer</div>
                                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean
                                                                sollicudin, lorem quis biben dum auctor, nisi elit consequat
                                                                ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet
                                                                nibh vultate cursus a sit amet mauris.<br> Proin gravida
                                                                nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis
                                                                bibendum auctor, nisi elit conse quat ipsum</p>
                                                        </div>
                                                    </div>

                                                    <div class="owl-item" style="width: 151.5px;">
                                                        <div class="item">
                                                            <div class="name">Vinova David</div>
                                                            <div class="position">Developer</div>
                                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean
                                                                sollicudin, lorem quis biben dum auctor, nisi elit consequat
                                                                ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet
                                                                nibh vultate cursus a sit amet mauris.<br> Proin gravida
                                                                nibh vel velit auctor aliquet. Aenean sollicudin, lorem quis
                                                                bibendum auctor, nisi elit conse quat ipsum</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="owl-nav disabled">
                                                <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                                                <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                                            </div>
                                            <div class="owl-dots">
                                                <div class="owl-dot active"><span></span></div>
                                                <div class="owl-dot"><span></span></div>
                                            </div>
                                        </div>

                                        {{-- social block --}}
                                        <div id="social_block">
                                            <div class="social">
                                                <ul>
                                                    <li class="facebook"><a href="https://www.facebook.com/vinovatheme/"
                                                            title="Facebook" target="_blank">Facebook</a></li>
                                                    <li class="twitter"><a href="https://twitter.com/vinovathemes"
                                                            title="Twitter" target="_blank">Twitter</a></li>
                                                    <li class="icon-google"><a href="https://www.prestashop.com/"
                                                            title="YouTube" target="_blank">Google</a></li>
                                                    <li class="instagram"><a href="https://instagram.com/vinovatheme"
                                                            title="instagram" target="_blank">instagram</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>









                        </section>





                    </div>


                </div>
            </div>
        </div>



    </div>
@endsection
