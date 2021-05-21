 <!-- Begin Header -->
 <nav
     class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-pink bg-lighten-2 navbar-shadow">
     <div class="navbar-wrapper">
         <div class="navbar-header">
             <ul class="nav navbar-nav flex-row">
                 <li class="nav-item mobile-menu d-md-none mr-auto"><a
                         class="nav-link nav-menu-main menu-toggle hidden-xs" href="{{ route('adminDashboard.index') }}"><i
                             class="ft-menu font-large-1"></i></a></li>
                 <li class="nav-item">
                     <a class="navbar-brand" href="{{ route('adminDashboard.index') }}">
                         <img class="height-50" alt="Zoba Toys logo"
                             src="{{ asset('assets/admin/images/logo/Zoba-toys-logo.jpg') }}">
                         <h3 class="brand-text">@lang('site.ZobaToys')</h3>
                     </a>
                 </li>
                 <li class="nav-item d-md-none">
                     <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                             class="la la-ellipsis-v"></i></a>
                 </li>
             </ul>
         </div>
         <div class="navbar-container content">
             <div class="collapse navbar-collapse" id="navbar-mobile">

                {{-- right side items --}}
                 <ul class="nav navbar-nav mr-auto float-left">

                    {{-- menue collaps --}}
                     <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                             href="#"><i class="ft-menu"></i></a></li>
                   
                    {{-- screen expand --}}

                    {{-- <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link-expand" href="#">
                            <i class="ficon ft-maximize"></i>
                        </a>
                    </li> --}}

                 </ul>
                
                 {{-- left side drop down items --}}
                 <ul class="nav navbar-nav float-right">

                    {{-- profile --}}
                     <li class="dropdown dropdown-user nav-item">
                         
                         {{-- name $ avater --}}
                         <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                             <span class="mr-1">@lang('site.hello')
                                <span class="user-name text-bold-700"> {{ Auth::guard('admin')->user()->name }}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img style="height: 35px;" src="{{ Auth::guard('admin')->user()->image_path}}" class="" alt="avatar"><i></i></span>
                            </a>
                            
                        {{-- dropdown List --}}
                         <div class="dropdown-menu dropdown-menu-right">
                             {{-- profile --}}
                             <a class="dropdown-item" href="{{ route('adminDashboard.admin.show', Auth::guard('admin')->user()->id) }}"><i class="ft-user"></i> @lang('site.show-profile')</a>
                             
                             {{-- divider --}}
                             <div class="dropdown-divider"></div>

                             {{-- logout --}}
                             <a class=" -item" href="{{ route('adminDashboard.logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                 <i class="ft-power"></i> @lang('site.logout') </a>
                             </a>

                             <form id="logout-form" action="{{ route('adminDashboard.logout') }}" method="POST" style="display: none;">
                                 @csrf
                                 @method('POST')
                             </form>

                         </div>
                     </li>

                     {{-- Notification bell --}}
                     <li class="dropdown dropdown-notification nav-item">
                         <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i
                                 class="ficon ft-bell"></i>
                             <span
                                 class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
                         </a>
                         <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                             <li class="dropdown-menu-header">
                                 <h6 class="dropdown-header m-0">
                                     <span class="grey darken-2"></span>
                                 </h6>
                                <span class="notification-tag badge badge-default badge-danger float-right m-0">
                                   5 @lang('site.new')
                                </span>
                             </li>
                             <li class="scrollable-container media-list w-100">
                                 <a href="javascript:void(0)">
                                     <div class="media">
                                         <div class="media-left align-self-center"><i
                                                 class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                         <div class="media-body">
                                             <h6 class="media-heading">@lang('site.you-have-new-order')!</h6>
                                             <p class="notification-text font-small-3 text-muted">@lang('site.new-order-message').</p>
                                             <small>
                                                 <time class="media-meta text-muted"
                                                     datetime="2015-06-11T18:29:20+08:00">  @lang('site.ago') 30 @lang('site.minutes')
                                                 </time>
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="javascript:void(0)">
                                     <div class="media">
                                         <div class="media-left align-self-center"><i
                                                 class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i>
                                         </div>
                                         <div class="media-body">
                                             <h6 class="media-heading red darken-1">@lang('site.inventory-empty')</h6>
                                             <p class="notification-text font-small-3 text-muted">@lang('site.inventory-empty-message')</p>
                                             <small>
                                                 <time class="media-meta text-muted"
                                                     datetime="2015-06-11T18:29:20+08:00">@lang('site.ago') 5 @lang('site.hour') 
                                                 </time>
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="javascript:void(0)">
                                     <div class="media">
                                         <div class="media-left align-self-center"><i
                                                 class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i>
                                         </div>
                                         <div class="media-body">
                                             <h6 class="media-heading yellow darken-3">@lang('site.inventory-empty-worning')</h6>
                                             <p class="notification-text font-small-3 text-muted">@lang('site.inventory-empty-worning-message').</p>
                                             <small>
                                                 <time class="media-meta text-muted"
                                                     datetime="2015-06-11T18:29:20+08:00">@lang('site.today')
                                                 </time>
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="javascript:void(0)">
                                     <div class="media">
                                         <div class="media-left align-self-center"><i
                                                 class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                                         <div class="media-body">
                                             <h6 class="media-heading">@lang('site.complete-task')</h6>
                                             <small>
                                                 <time class="media-meta text-muted"
                                                     datetime="2015-06-11T18:29:20+08:00">@lang('site.week') @lang('site.last') 
                                                 </time>
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="javascript:void(0)">
                                     <div class="media">
                                         <div class="media-left align-self-center"><i
                                                 class="ft-file icon-bg-circle bg-teal"></i></div>
                                         <div class="media-body">
                                             <h6 class="media-heading">@lang('site.generate-monthly-report')</h6>
                                             <small>
                                                 <time class="media-meta text-muted"
                                                     datetime="2015-06-11T18:29:20+08:00">  @lang('site.month') @lang('site.last')
                                                 </time>
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                             </li>
                             <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                     href="javascript:void(0)">@lang('site.read-all-notifications')</a>
                             </li>
                         </ul>
                     </li>

                     {{-- Messages --}}
                     <li class="dropdown dropdown-notification nav-item">
                         <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">
                             </i></a>
                         <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                             <li class="dropdown-menu-header">
                                 <h6 class="dropdown-header m-0">
                                     <span class="grey darken-2">@lang('site.messages')</span>
                                 </h6>
                                 <span class="notification-tag badge badge-default badge-warning float-right m-0">4
                                     @lang('site.new')</span>
                             </li>
                             <li class="scrollable-container media-list w-100">
                                 <a href="javascript:void(0)">
                                     <div class="media">
                                         <div class="media-left">
                                             <span class="avatar avatar-sm avatar-online rounded-circle">
                                                 <img src="{{  App\Models\Admin::findOrFail(4)->image_path }}"
                                                     alt="avatar"><i></i></span>
                                         </div>
                                         <div class="media-body">
                                             <h6 class="media-heading">{{ App\Models\Admin::findOrFail(4)->name }}</h6>
                                             <p class="notification-text font-small-3 text-muted">@lang('site.message1').</p>
                                             <small>
                                                 <time class="media-meta text-muted"
                                                     datetime="2015-06-11T18:29:20+08:00">@lang('site.today')
                                                 </time>
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="javascript:void(0)">
                                     <div class="media">
                                         <div class="media-left">
                                             <span class="avatar avatar-sm avatar-busy rounded-circle">
                                                 <img src=" {{ App\Models\Admin::findOrFail(2)->image_path }}"
                                                     alt="avatar"><i></i></span>
                                         </div>
                                         <div class="media-body">
                                             <h6 class="media-heading">{{ App\Models\Admin::findOrFail(2)->name }}</h6>
                                             <p class="notification-text font-small-3 text-muted">@lang('site.message2')</p>
                                             <small>
                                                 <time class="media-meta text-muted"
                                                     datetime="2015-06-11T18:29:20+08:00">@lang('site.Tuesday')
                                                 </time>
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="javascript:void(0)">
                                     <div class="media">
                                         <div class="media-left">
                                             <span class="avatar avatar-sm avatar-online rounded-circle">
                                                 <img src="{{  App\Models\Admin::findOrFail(3)->image_path }}"
                                                     alt="avatar"><i></i></span>
                                         </div>
                                         <div class="media-body">
                                             <h6 class="media-heading">{{ App\Models\Admin::findOrFail(3)->name }}</h6>
                                             <p class="notification-text font-small-3 text-muted">@lang('site.message3')</p>
                                             <small>
                                                 <time class="media-meta text-muted"
                                                     datetime="2015-06-11T18:29:20+08:00">@lang('site.Friday')
                                                 </time>
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="javascript:void(0)">
                                     <div class="media">
                                         <div class="media-left">
                                             <span class="avatar avatar-sm avatar-away rounded-circle">
                                                 <img src="{{   App\Models\Admin::findOrFail(4)->image_path }}"
                                                     alt="avatar"><i></i></span>
                                         </div>
                                         <div class="media-body">
                                             <h6 class="media-heading">{{ App\Models\Admin::findOrFail(4)->name }}</h6>
                                             <p class="notification-text font-small-3 text-muted">@lang('site.message4').</p>
                                             <small>
                                                 <time class="media-meta text-muted"
                                                     datetime="2015-06-11T18:29:20+08:00">@lang('site.month') @lang('site.last') 
                                                 </time>
                                             </small>
                                         </div>
                                     </div>
                                 </a>
                             </li>
                             <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                     href="javascript:void(0)">@lang('site.read-all-messages')</a></li>
                         </ul>
                     </li>

                 </ul> {{--  end of left drop down items --}}
             </div>
         </div>
     </div>
 </nav>
 <!--End  Header -->
