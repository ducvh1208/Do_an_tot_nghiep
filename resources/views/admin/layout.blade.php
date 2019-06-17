<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Admin -@yield('title') </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="csrf-token" content="<?= csrf_token() ?>">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <!-- datatable -->
        
        <!-- interface admin -->
        <link rel="stylesheet" href="{{ asset('admin_asset/css/vendor.css') }}">
        <!-- Theme initialization -->
        <link rel="stylesheet" href="{{ asset('admin_asset/css/app-green.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">

                <!-- start header -->
                <aside>
                    <header class="header">
                        <div class="header-block header-block-collapse d-lg-none d-xl-none">
                            <button class="collapse-btn" id="sidebar-collapse-btn">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <div class="header-block header-block-search">
                            <form role="search">
                                <div class="input-container">
                                    <i class="fa fa-search"></i>
                                    <input type="search" placeholder="Search">
                                    <div class="underline"></div>
                                </div>
                            </form>
                        </div>
                    
                        <div class="header-block header-block-nav">
                            <ul class="nav-profile">
                                <li class="notifications new">
                                    <a href="" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                        <sup>
                                            <span class="counter">8</span>
                                        </sup>
                                    </a>
                                    <div class="dropdown-menu notifications-dropdown-menu">
                                        <ul class="notifications-container">
                                            <li>
                                                <a href="" class="notification-item">
                                                    <div class="img-col">
                                                        <div class="img" style="background-image: url('admin_asset/assets/faces/3.jpg')"></div>
                                                    </div>
                                                    <div class="body-col">
                                                        <p>
                                                            <span class="accent">Zack Alien</span> pushed new commit:
                                                            <span class="accent">Fix page load performance issue</span>. </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="notification-item">
                                                    <div class="img-col">
                                                        <div class="img" style="background-image: url('admin_asset/assets/faces/5.jpg')"></div>
                                                    </div>
                                                    <div class="body-col">
                                                        <p>
                                                            <span class="accent">Amaya Hatsumi</span> started new task:
                                                            <span class="accent">Dashboard UI design.</span>. </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="" class="notification-item">
                                                    <div class="img-col">
                                                        <div class="img" style="background-image: url('admin_asset/assets/faces/8.jpg')"></div>
                                                    </div>
                                                    <div class="body-col">
                                                        <p>
                                                            <span class="accent">Andy Nouman</span> deployed new version of
                                                            <span class="accent">NodeJS REST Api V3</span>
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="profile dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div>
                                        <span class="name"> John Doe </span>
                                    </a>
                                    <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-user icon"></i> Profile </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-bell icon"></i> Notifications </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-gear icon"></i> Settings </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="login.html">
                                            <i class="fa fa-power-off icon"></i> Logout </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </header>
                </aside>
                
                <!-- end header -->

                <!-- start menu -->
                <aside class="sidebar">
                    <div class="sidebar-container">

                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo">
                                    <span class="l l1"></span>
                                    <span class="l l2"></span>
                                    <span class="l l3"></span>
                                    <span class="l l4"></span>
                                    <span class="l l5"></span>
                                </div> Emhairsalon Admin </div>
                        </div>

                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li class="active">
                                    <a href="index.html">
                                        <i class="fa fa-home"></i> Dashboard </a>
                                </li>

                                <li>
                                    <a href="categories">
                                        <i class="fa fa-th-large"></i> Category
                                    </a>
                                </li>

                                <li>
                                    <a href="news">
                                        <i class="fa fa-th-large"></i> News
                                    </a>
                                </li>

                                <li>
                                    <a href="">
                                        <i class="fa fa-th-large"></i> Products
                                        <i class="fa arrow"></i>
                                    </a>
                                    <ul class="sidebar-nav">
                                        <li>
                                            <a href="product_type"> Product Type </a>
                                        </li>
                                        <li>
                                            <a href="product"> Product List </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>

                    </div>

                </aside>
                <!-- end menu -->

                <!--start content-->
                @yield('content')
                <!--end content-->
        <script>
            (function(i, s, o, g, r, a, m)
            {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function()
                {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-80463319-4', 'auto');
            ga('send', 'pageview');
        </script>
        <script>
            $(document).ready(function() {
                $('#user_table').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#table').DataTable();
            });
        </script>
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 5000);
        </script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="{{ asset('admin_asset/js/vendor.js') }}"></script>
        <script src="{{ asset('admin_asset/js/app.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" language="javascript" src="{{ asset('admin_asset/ckeditor/ckeditor.js') }}" ></script>
        @yield('script')
    </body>
</html>