@extends('layouts.shop')
@section('content')
    <div id="wrapper-site">

        <nav data-depth="1" class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">

                    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="http://demo.bestprestashoptheme.com/savemart/ar/">
                                <span itemprop="name">الصفحة الرئيسية</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                    </ol>

                </div>
            </div>
        </nav>



        <div class="container no-index">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                    <div id="main">


                        <div class="page-header">
                            <h1 class="page-title hidden-xs-up">
                                حسابك
                            </h1>
                        </div>




                        <section id="content" class="page-content">



                            <aside id="notifications">
                                <div class="container">



                                </div>
                            </aside>



                            <div class="links">

                                <a id="identity-link" href="http://demo.bestprestashoptheme.com/savemart/ar/الهوية">
                                    <span class="link-item">
                                        <i class="material-icons"></i>
                                        <span>روابط ذات صلة</span>
                                    </span>
                                </a>

                                <a id="address-link" href="http://demo.bestprestashoptheme.com/savemart/ar/العنوان">
                                    <span class="link-item">
                                        <i class="material-icons"></i>
                                        <span>أضف عنوانك البريدي</span>
                                    </span>
                                </a>

                                <a id="history-link"
                                    href="http://demo.bestprestashoptheme.com/savemart/ar/سجل طلبات الشراء">
                                    <span class="link-item">
                                        <i class="material-icons"></i>
                                        <span>تاريخ الطلبية و التفاصيل</span>
                                    </span>
                                </a>

                                <a id="order-slips-link" href="http://demo.bestprestashoptheme.com/savemart/ar/ايصال الدفع">
                                    <span class="link-item">
                                        <i class="material-icons"></i>
                                        <span>إيصال الإتمانية</span>
                                    </span>
                                </a>




                                <a class="link_open_seller_account" title="Create seller account"
                                    href="http://demo.bestprestashoptheme.com/savemart/ar/module/jmarketplace/addseller">
                                    <span class="link-item">
                                        <i class="material-icons"></i>
                                        Create seller account
                                    </span>
                                </a>
                                <a class="" title="Seller messages"
                                    href="http://demo.bestprestashoptheme.com/savemart/ar/module/jmarketplace/contactseller">
                                    <span class="link-item">
                                        <i class="material-icons"></i>
                                        Seller messages
                                    </span>
                                </a>
                                <a class="" title="Favorite sellers"
                                    href="http://demo.bestprestashoptheme.com/savemart/ar/module/jmarketplace/favoriteseller">
                                    <span class="link-item">
                                        <i class="material-icons"></i>
                                        Favorite sellers
                                    </span>
                                </a>
                                <!-- MODULE WishList -->
                                <div class="link_wishlist">
                                    <a href="http://demo.bestprestashoptheme.com/savemart/ar/module/novblockwishlist/mywishlist"
                                        title="My Wishlists">
                                        <i class="fa fa-heart"></i>My Wishlists
                                    </a>
                                </div>
                                <!-- END : MODULE WishList -->

                                <a href="http://demo.bestprestashoptheme.com/savemart/ar/?mylogout=" rel="nofollow"
                                    class="a-account">
                                    <span class="link-item">
                                        <i class="zmdi zmdi-close-circle"></i>
                                        <span>تسجيل خروج</span>
                                    </span>
                                </a>
                            </div>

                        </section>



                        <footer class="page-footer">





                        </footer>


                    </div>


                </div>
            </div>
        </div>



    </div>
@endsection
