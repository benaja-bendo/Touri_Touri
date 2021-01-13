<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title') | Touri Touri</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('dist/assets/js/config.navbar-vertical.js') }}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('dist/vendors/glightbox/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('dist/vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl"/>
    <link href="{{ asset('dist/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default"/>
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            linkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            linkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<body>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
                var container = document.querySelector('[data-layout]');
                container.classList.remove('container');
                container.classList.add('container-fluid');
            }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
            <script>
                var navbarStyle = localStorage.getItem("navbarStyle");
                if (navbarStyle && navbarStyle !== 'transparent') {
                    document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                }
            </script>
            {{--            burger --}}
            <div class="d-flex align-items-center">
                <div class="toggle-icon-wrapper">
                    <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip"
                            data-placement="left" title="Menu">
                        <span class="navbar-toggle-icon">
                            <span class="toggle-line"></span>
                        </span>
                    </button>
                </div>
                <a class="navbar-brand" href="/">
                    <div class="d-flex align-items-center py-3">
                        {{--                        <img class="mr-2"--}}
                        {{--                             src="assets/img/illustrations/falcon.png" alt=""--}}
                        {{--                             width="40"/>--}}
                        <span class="font-sans-serif">Touti Touri</span></div>
                </a>
            </div>

            {{--            navbar onglet--}}
            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                <div class="navbar-vertical-content scrollbar">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteNamed('dashboard.index')?'active':''}}" href="{{ route('dashboard.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-chart-pie"></span>
                                    </span>
                                    <span class="nav-link-text">Dashboard</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteNamed('user.index')?'active':''}}"
                               href="{{ route('user.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-user"></span>
                                    </span>
                                    <span class="nav-link-text">Utilisateurs</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#astuces" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="astuces">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fab fa-periscope"></span>
                                    </span>
                                    <span class="nav-link-text">Sites</span>
                                </div>
                            </a>
                            <ul class="nav collapse" id="astuces" data-parent="#navbarVerticalCollapse">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('departement.index') }}">les departements</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('site.index') }}">Tous les sites</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">gallerie</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="far fa-calendar"></span>
                                    </span>
                                    <span class="nav-link-text">Reservation</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-xl"
             style="padding-left: 250px">
            <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button"
                    data-toggle="collapse" data-target="#navbarStandard" aria-controls="navbarStandard"
                    aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
            <a class="navbar-brand mr-1 mr-sm-3" href="index.html">
                <div class="d-flex align-items-center">
                    <img class="mr-2" src="{{ asset('dist/assets/img/illustrations/falcon.png') }}"
                         alt="" width="40"/>
                    <span class="font-sans-serif">Touri Touri</span></div>
            </a>
            <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdownHome" href="#"
                                                     role="button" data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">Home</a>
                        <div class="dropdown-menu dropdown-menu-card" aria-labelledby="navbarDropdownHome">
                            <div class="bg-white rounded-lg py-2"><a class="dropdown-item"
                                                                     href="index.html">Dashboard</a><a
                                    class="dropdown-item" href="home/dashboard-alt.html">Dashboard alt</a><a
                                    class="dropdown-item" href="home/feed.html">Feed</a><a class="dropdown-item"
                                                                                           href="home/landing.html">Landing </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdownPages" href="#"
                                                     role="button" data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">Pages</a>
                        <div class="dropdown-menu dropdown-menu-card" aria-labelledby="navbarDropdownPages">
                            <div class="card navbar-card-pages shadow-none">
                                <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown"
                                                                                     src="assets/img/illustrations/authentication-corner.png"
                                                                                     width="130" alt=""/>
                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/activity.html">Activity</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/associations.html">Associations</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/billing.html">Billing</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/errors.html">Errors</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/event-create.html">Event create</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/event-detail.html">Event detail</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/events.html">Events</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/faq.html">Faq</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/invite-people.html">Invite people</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/invoice.html">Invoice</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/notifications.html">Notifications</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/people.html">People</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/pricing.html">Pricing</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/pricing-alt.html">Pricing alt</a></div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/privacy-policy.html">Privacy policy</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/profile.html">Profile</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/settings.html">Settings</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/starter.html">Starter</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="calendar.html">Calendar<span
                                                        class="badge rounded-pill ml-2 fs--2 badge-soft-success">New</span></a><a
                                                    class="nav-link py-1 link-700 font-weight-medium" href="chat.html">Chat</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="kanban.html">Kanban</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="widgets.html">Widgets</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/errors/404.html">404</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="pages/errors/500.html">500</a>
                                                <div class="nav-link py-1 text-900 font-weight-bold mt-3">Emails</div>
                                                <a class="nav-link py-1 link-700 font-weight-medium"
                                                   href="email/inbox.html">Inbox</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="email/email-detail.html">Email detail</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="email/compose.html">Compose</a>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="nav flex-column">
                                                <div class="nav-link py-1 text-900 font-weight-bold">E-commerce</div>
                                                <a class="nav-link py-1 link-700 font-weight-medium"
                                                   href="e-commerce/checkout.html">Checkout</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="e-commerce/customer-details.html">Customer details</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="e-commerce/customers.html">Customers</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="e-commerce/order-details.html">Order details</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="e-commerce/orders.html">Orders</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="e-commerce/product-details.html">Product details</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="e-commerce/product-grid.html">Product grid</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="e-commerce/product-list.html">Product list</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="e-commerce/shopping-cart.html">Shopping cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdownDocumentation"
                                                     href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">Documentation</a>
                        <div class="dropdown-menu dropdown-menu-card" aria-labelledby="navbarDropdownDocumentation">
                            <div class="bg-white rounded-lg py-2"><a class="dropdown-item"
                                                                     href="documentation/getting-started.html">Getting
                                    started</a><a class="dropdown-item" href="documentation/file-structure.html">File
                                    structure</a><a class="dropdown-item" href="documentation/customization.html">Customization</a><a
                                    class="dropdown-item" href="documentation/dark-mode.html">Dark mode</a><a
                                    class="dropdown-item" href="documentation/fluid-layout.html">Fluid layout</a><a
                                    class="dropdown-item" href="documentation/gulp.html">Gulp</a><a
                                    class="dropdown-item" href="documentation/RTL.html">RTL</a><a class="dropdown-item"
                                                                                                  href="documentation/plugins.html">Plugins</a><a
                                    class="dropdown-item" href="documentation/design-file.html">Design file</a></div>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdownComponents"
                                                     href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">Components</a>
                        <div class="dropdown-menu dropdown-menu-card" aria-labelledby="navbarDropdownComponents">
                            <div class="card shadow-none navbar-card-components">
                                <div class="card-body scrollbar max-h-dropdown">
                                    <div class="row">
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/accordion.html">Accordion</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/alerts.html">Alerts</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/avatar.html">Avatar</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/background.html">Background</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/badges.html">Badges</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/breadcrumb.html">Breadcrumb</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/bulk-select.html">Bulk select</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/buttons.html">Buttons</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/cards.html">Cards</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/carousel.html">Carousel</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/close-button.html">Close button</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/collapse.html">Collapse</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/cookie-notice.html">Cookie notice</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/dropdowns.html">Dropdowns</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/fancyscroll.html">Fancyscroll</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/fancytab.html">Fancytab</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/figures.html">Figures</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/hoverbox.html">Hoverbox</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/images.html">Images</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/list-group.html">List group</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/modals.html">Modals</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/navbar/default.html">Navbar default</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/navbar/vertical.html">Navbar vertical</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/navbar/darken-on-scroll.html">Navbar darken on
                                                    scroll</a><a class="nav-link py-1 link-700 font-weight-medium"
                                                                 href="components/navbar/top.html">Navbar top</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/navbar/combo.html">Navbar combo</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/navs.html">Navs</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/page-headers.html">Page headers</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/pagination.html">Pagination</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/popovers.html">Popovers</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/progress.html">Progress</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/scrollspy.html">Scrollspy</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/search.html">Search</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/sidepanel.html">Sidepanel</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/spinners.html">Spinners</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/tables.html">Tables</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/tabs.html">Tabs</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/toasts.html">Toasts</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/tooltips.html">Tooltips</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="components/typography.html">Typography</a></div>
                                        </div>
                                    </div>
                                    <div class="nav-link py-1 text-900 font-weight-bold mt-3">Plugins</div>
                                    <div class="row">
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/anchor.html">Anchor</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/countup.html">Countup</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/choices.html">Choices</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/date-picker.html">Date picker</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/draggable.html">Draggable</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/dropzone.html">Dropzone</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/echarts.html">Echarts</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/emoji-button.html">Emoji button</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/fontawesome.html">Fontawesome</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/fullcalendar.html">Fullcalendar</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/glightbox.html">Glightbox</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/progressbar.html">Progressbar</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/inline-player.html">Inline player</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/list.html">List</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/lottie.html">Lottie</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/typed-text.html">Typed text</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/tinymce.html">Tinymce</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/swiper.html">Swiper</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/rater.html">Rater</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/map/leaflet-map.html">Leaflet map</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="plugins/map/google-map.html">Google map</a></div>
                                        </div>
                                    </div>
                                    <div class="nav-link py-1 text-900 font-weight-bold mt-3">Utilities</div>
                                    <div class="row">
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/borders.html">Borders</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/clearfix.html">Clearfix</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/colored-links.html">Colored links</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/colors.html">Colors</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/display.html">Display</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/embed.html">Embed</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/flex.html">Flex</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/float.html">Float</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/grid.html">Grid</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/position.html">Position</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/sizing.html">Sizing</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/spacing.html">Spacing</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/stretched-link.html">Stretched link</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/text-truncation.html">Text truncation</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/vertical-align.html">Vertical align</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="utilities/visibility.html">Visibility</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdownAuthentication"
                                                     href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">Authentication</a>
                        <div class="dropdown-menu dropdown-menu-card" aria-labelledby="navbarDropdownAuthentication">
                            <div class="card shadow-none navbar-card-auth">
                                <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown"
                                                                                     src="assets/img/illustrations/authentication-corner.png"
                                                                                     width="130" alt=""/>
                                    <div class="row">
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav-link py-1 text-900 font-weight-bold">Basic</div>
                                            <div class="nav flex-column"><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/basic/login.html">Login</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/basic/logout.html">Logout</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/basic/register.html">Register</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/basic/forgot-password.html">Forgot password</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/basic/reset-password.html">Reset password</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/basic/confirm-mail.html">Confirm mail</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/basic/lock-screen.html">Lock screen</a></div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column">
                                                <div class="nav-link py-1 text-900 font-weight-bold">Split</div>
                                                <a class="nav-link py-1 link-700 font-weight-medium"
                                                   href="authentication/split/login.html">Login</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/split/logout.html">Logout</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/split/register.html">Register</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/split/forgot-password.html">Forgot password</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/split/reset-password.html">Reset password</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/split/confirm-mail.html">Confirm mail</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/split/lock-screen.html">Lock screen</a>
                                            </div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column">
                                                <div class="nav-link py-1 text-900 font-weight-bold mt-3 mt-xxl-0">
                                                    Card
                                                </div>
                                                <a class="nav-link py-1 link-700 font-weight-medium"
                                                   href="authentication/card/login.html">Login</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/card/logout.html">Logout</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/card/register.html">Register</a><a
                                                    class="nav-link py-1 link-700 font-weight-medium"
                                                    href="authentication/card/forgot-password.html">Forgot
                                                    password</a><a class="nav-link py-1 link-700 font-weight-medium"
                                                                   href="authentication/card/reset-password.html">Reset
                                                    password</a><a class="nav-link py-1 link-700 font-weight-medium"
                                                                   href="authentication/card/confirm-mail.html">Confirm
                                                    mail</a><a class="nav-link py-1 link-700 font-weight-medium"
                                                               href="authentication/card/lock-screen.html">Lock
                                                    screen</a>
                                            </div>
                                        </div>
                                        <div class="col-6 col-xxl-3">
                                            <div class="nav flex-column">
                                                <div class="nav-link py-1 text-900 font-weight-bold mt-3 mt-xxl-0">
                                                    Special
                                                </div>
                                                <a class="nav-link py-1 link-700 font-weight-medium"
                                                   href="authentication/wizard.html">Wizard</a><a class="nav-link py-1"
                                                                                                  href="#!"
                                                                                                  data-toggle="modal"
                                                                                                  data-target="#authentication-modal">In
                                                    Modal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">
                <li class="nav-item dropdown">
                </li>
                <li class="nav-item dropdown"><a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button"
                                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="assets/img/team/3-thumb.png" alt=""/>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                        <div class="bg-white rounded-lg py-2">
{{--                            <div class="dropdown-divider"></div>--}}
                            <a class="dropdown-item" href="#">Profil</a>
                            <form method="POST" action="{{ url('/logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        {{--        content--}}
        <div class="content">
            {{--autres formes de navbar--}}
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand"
                 style="padding-left: 250px;">
                <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button"
                        data-toggle="collapse" data-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                <a class="navbar-brand mr-1 mr-sm-3" href="#">
                    <div class="d-flex align-items-center">
                        {{--                        <img class="mr-2" src="{{ asset('dist/assets/img/illustrations/falcon.png') }}"--}}
                        {{--                             alt="" width="40"/>--}}
                        <span class="font-sans-serif">Touri Touri</span></div>
                </a>
                <ul class="navbar-nav align-items-center d-none d-lg-block">
                    <li class="nav-item">

                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">

                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" id="navbarDropdownUser" href="#"
                                                     role="button" data-toggle="dropdown" aria-haspopup="true"
                                                     aria-expanded="false">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="{{ asset('dist/assets/img/200x200.jpg') }}" alt=""/>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                            <div class="bg-white rounded-lg py-2">
                                <a class="dropdown-item" href="#">profil</a>
                                <form method="POST" action="{{ url('/logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <script>
                var navbarPosition = localStorage.getItem('navbarPosition');
                var navbarVertical = document.querySelector('.navbar-vertical');
                var navbarTopVertical = document.querySelector('.content .navbar-top');
                var navbarTop = document.querySelector('[data-layout] .navbar-top');
                var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');

                if (navbarPosition === 'top') {
                    navbarTop.removeAttribute('style');
                    navbarTopVertical.remove(navbarTopVertical);
                    navbarVertical.remove(navbarVertical);
                    navbarTopCombo.remove(navbarTopCombo);
                } else if (navbarPosition === 'combo') {
                    navbarVertical.removeAttribute('style');
                    navbarTopCombo.removeAttribute('style');
                    navbarTop.remove(navbarTop);
                    navbarTopVertical.remove(navbarTopVertical);
                } else {
                    navbarVertical.removeAttribute('style');
                    navbarTopVertical.removeAttribute('style');
                    navbarTop.remove(navbarTop);
                    navbarTopCombo.remove(navbarTopCombo);
                }
            </script>

            {{--contenue de la page--}}
            @yield('contenue')

        </div>
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{ asset('dist/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('dist/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('dist/vendors/is/is.min.js') }}"></script>
<script src="{{ asset('dist/assets/js/flatpickr.js') }}"></script>
<script src="{{ asset('dist/vendors/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('dist/vendors/lottie/lottie.min.js') }}"></script>
<script src="{{ asset('dist/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('dist/vendors/lodash/lodash.min.js') }}"></script>
<script src="../../../../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
<script src="{{ asset('dist/vendors/list.js/list.min.js') }}"></script>
<script src="{{ asset('dist/assets/js/theme.js') }}"></script>
<script src="{{ asset('dist/vendors/glightbox/glightbox.min.js') }}"></script>
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
    rel="stylesheet">

@yield('script')
</body>


<!-- Mirrored from prium.github.io/falcon/v3.0.0-alpha10/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Dec 2020 14:27:33 GMT -->
</html>
