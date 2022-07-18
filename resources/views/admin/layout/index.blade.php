<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Panle</title>

    <link rel="stylesheet" href={{asset('assets/css/bootstrap.css')}}>

    <link rel="stylesheet" href={{asset('assets/vendors/chartjs/Chart.min.css')}}>

    <link rel="stylesheet" href={{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}>
    <link rel="stylesheet" href={{ asset('assets/css/app.css') }}>
    <link rel="shortcut icon" href={{asset('assets/images/favicon.svg')}} type="image/x-icon">
    
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'><b>Main Menu</b></li>

                        <li class="sidebar-item active ">
                            <a href={{route('admin')}} class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>

                        <li class='sidebar-item'>
                            <a href={{url('/admin/sliders')}} class="sidebar-link ">
                                <i data-feather="sliders" width="20"></i>
                                <span><b>Sliders</b></span>
                            </a>
                        </li>


                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <b><i data-feather="users" width="20"></i>
                                    <span>Administration</span></b>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href={{route('admin.message')}}><b>Messages</b></a>
                                </li>

                                <li>
                                    <a href="{{route('admin.governing-body')}}"><b>Governing Body</b></a>
                                </li>

                                <li>
                                    <a href={{route('admin.faculty-member')}}><b>Faculty Member</b></a>
                                </li>

                                <li>
                                    <a href={{route('admin.office-stuff')}}><b>Office Stuff</b></a>
                                </li>

                            </ul>

                        </li>
                        <li class="sidebar-item">
                            @if (Route::has('admin.category'))
                            <a class="sidebar-link" href="{{route('admin.category')}}">
                                <b><i data-feather="file-text" width="20"></i> Category</b>
                            </a>
                            @endif
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('admin.content')}}">
                            <b><i data-feather="file-text" width="20"></i> Content</b>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('admin.news')}}">
                            <b><i data-feather="file-text" width="20"></i> News</b>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{route('admin.notice')}}">
                            <b><i data-feather="bell" width="20"></i> Notice</b>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <b><i data-feather="heart" style="color:red;" width="20"></i> 
                                    <span>100's Celebration</span></b>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href={{route('admin.100')}}><b>All List</b></a>
                                </li>
                                <li>
                                    <a href={{route('admin.100.assets')}}><b>Assets</b></a>
                                </li>
                                <li>
                                    <a href={{route('admin.100.expense')}}><b>Expenses</b></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()" >
                               <b> <i data-feather="log-out"></i> Logout</b>
                            </a>
                        </li>


                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            @include('admin.layout.navbar')
            <div class="main-content container-fluid">
                @yield('content')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2020 &copy; Voler</p>
                    </div>
                    <div class="float-end">
                       
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src={{asset('assets/js/feather-icons/feather.min.js')}}></script>
    <script src={{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}></script>
    <script src={{asset('assets/js/app.js')}}></script>

    <script src={{asset('assets/vendors/chartjs/Chart.min.js')}}></script>
    <script src={{asset('assets/vendors/apexcharts/apexcharts.min.js')}}></script>
    {{-- <script src={{asset('assets/js/pages/dashboard.js')}}></script> --}}

    <script src={{asset('assets/js/main.js')}}></script>

    {{-- app main js script --}}
    <script src="{{asset('js/app.js')}}"></script>
    
</body>

</html>