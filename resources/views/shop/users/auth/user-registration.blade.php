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
                                إنشاء حساب
                            </h1>
                        </div>




                        <section id="content" class="page-content">



                            <section class="register-form">
                                <p>لديك حساب بالفعل؟ <a
                                        href="http://demo.bestprestashoptheme.com/savemart/ar/تسجيل الدخول">سجل الدخول بدلا
                                        من ذلك!</a></p>




                                <form
                                    action="http://demo.bestprestashoptheme.com/savemart/ar/%D8%AA%D8%B3%D8%AC%D9%8A%D9%84%20%D8%A7%D9%84%D8%AF%D8%AE%D9%88%D9%84?create_account=1"
                                    id="customer-form" class="js-customer-form" method="post">
                                    <section>



                                        <input type="hidden" name="id_customer" value="">




                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5">
                                                المسميات :
                                            </label>
                                            <div class="col-md-6 form-control-valign">

                                                <label class="radio-inline">
                                                    <span class="custom-radio">
                                                        <input name="id_gender" type="radio" value="1">
                                                        <span></span>
                                                    </span>
                                                    السيد.
                                                </label>
                                                <label class="radio-inline">
                                                    <span class="custom-radio">
                                                        <input name="id_gender" type="radio" value="2">
                                                        <span></span>
                                                    </span>
                                                    السيدة.
                                                </label>



                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>




                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 required">
                                                الاسم الأول :
                                            </label>
                                            <div class="col-md-6">

                                                <input class="form-control" name="firstname" type="text" value=""
                                                    required="">



                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>




                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 required">
                                                الاسم الأخير :
                                            </label>
                                            <div class="col-md-6">

                                                <input class="form-control" name="lastname" type="text" value=""
                                                    required="">



                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>




                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 required">
                                                البريد الإلكتروني :
                                            </label>
                                            <div class="col-md-6">

                                                <input class="form-control" name="email" type="email" value="" required="">



                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>




                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5 required">
                                                كلمة المرور :
                                            </label>
                                            <div class="col-md-6">

                                                <div class="input-group js-parent-focus">
                                                    <input class="form-control js-child-focus js-visible-password"
                                                        name="password" type="password" value="" pattern=".{5,}"
                                                        required="">
                                                    <span class="input-group-btn">
                                                        <button class="btn" type="button" data-action="show-password"
                                                            data-text-show="إظهار" data-text-hide="إخفاء">
                                                            إظهار
                                                        </button>
                                                    </span>
                                                </div>


                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>




                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5">
                                                تاريخ الميلاد :
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




                                        <div class="form-group row no-gutters">
                                            <label class="col-md-2 form-control-label mb-xs-5">
                                            </label>
                                            <div class="col-md-6">
                                                <span class="custom-checkbox ">
                                                    <input name="optin" type="checkbox" value="1">
                                                    <span><i class="material-icons checkbox-checked">check</i></span>
                                                    <label>الحصول على العروض من شركائنا</label>
                                                </span>



                                            </div>

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>




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

                                            <div class="col-md-4 form-control-comment right">
                                            </div>
                                        </div>





                                    </section>


                                    <footer class="form-footer clearfix">
                                        <div class="row no-gutters">
                                            <div class="col-md-10 offset-md-2">
                                                <input type="hidden" name="submitCreate" value="1">

                                                <button class="btn btn-primary form-control-submit mb-20"
                                                    data-link-action="save-customer" type="submit">
                                                    Register
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