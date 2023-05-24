<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Manage Users </title>



    <!-- General CSS Files -->
    <link rel="stylesheet" href="{!! asset('admin/css/app.min.css') !!}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{!! asset('admin/css/custom.css') !!}">
    <link rel='shortcut icon' type='image/x-icon' href="{!! asset('assets/img/favicon.png') !!}" />
    <link rel="stylesheet" href="{!! asset('admin/bundles/select2/dist/css/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/bundles/bootstrap-daterangepicker/daterangepicker.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/bundles/chocolat/dist/css/chocolat.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/css/components.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="{!! asset('admin/bundles/summernote/summernote-bs4.css') !!}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    {{-- @notifyCss --}}
    {{-- @yield('extracss') --}}
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                       
                            <span class="d-sm-none d-lg-inline-block"></span>
                            <img alt="Profile Photo" src="/admin/img/admin2.png" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{ Session::get('login_user')}} </div>
                            {{-- <a href="" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a> --}}
                            <div class="dropdown-divider"></div>
                            <a href="{{route('user.logout')}}"
                                class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="">
                            <img alt="image" src="{!! asset('logo.png') !!}" class="header-logo" />
                            {{-- <span class="logo-name">Vardhra Shoes</span> --}}
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Manage Menu</li>

                         <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown">
                                <i data-feather="layers"></i><span>Main catalogue</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('categories.all') }}">Manufacturer</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="{{route('carmodels.index')}}" class="nav-link"><i
                                    data-feather="monitor"></i><span>Model</span></a>
                        </li>

                
                        

                       

                    </ul>

                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')

                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Select Layout</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Light</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Dark</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                                <div class="selectgroup selectgroup-pills sidebar-color">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="1"
                                            class="selectgroup-input select-sidebar">
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-src-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="icon-input" value="2"
                                            class="selectgroup-input select-sidebar" checked>
                                        <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                            data-src-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Color Theme</h6>
                                <div class="theme-setting-options">
                                    <ul class="choose-theme list-unstyled mb-0">
                                        <li title="white" class="active">
                                            <div class="white"></div>
                                        </li>
                                        <li title="cyan">
                                            <div class="cyan"></div>
                                        </li>
                                        <li title="black">
                                            <div class="black"></div>
                                        </li>
                                        <li title="purple">
                                            <div class="purple"></div>
                                        </li>
                                        <li title="orange">
                                            <div class="orange"></div>
                                        </li>
                                        <li title="green">
                                            <div class="green"></div>
                                        </li>
                                        <li title="red">
                                            <div class="red"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                                    <i class="fas fa-undo"></i> Restore Default
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer bg-dark">
                <div class="footer-left">
                    Copyright &copy; {{ date('Y') == '2022' ? '2022' : '2022 - ' . date('Y') }}
                    <div class="bullet"></div> 99Yrs Network LLP
                    {{-- - Designed & Developed By <a href="https://www.sanjaresolutions.com" target="_blank">Sanjar E
                        Solutions</a> --}}
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{!! asset('admin/js/app.min.js') !!}"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js">
    </script>
    <!-- JS Libraies -->
    <!-- Template JS File -->
    <!-- Custom JS File -->
    <script src="{!! asset('admin/js/custom.js') !!}"></script>
    {{-- <script src="{!! asset('admin/js/jquery.validate.min.js') !!}"></script> --}}
    <script src="{!! asset('admin/bundles/select2/dist/js/select2.full.min.js') !!}"></script>
    <script src="{!! asset('admin/js/scripts.js') !!}"></script>
    <script src="{!! asset('admin/bundles/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
    {{-- <script src="{!! asset('assets/js/jquery.lazyload.js') !!}"></script> --}}
    <script src="{!! asset('admin/bundles/summernote/summernote-bs4.js') !!}"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {

            $(".lazy").Lazy({
                effect: 'fadeIn',
                visibleOnly: true,
            });

            $('.datatable').dataTable();
        });

    </script>
    @yield('extrajs')
    {{-- @include('notify::messages')
    @notifyJs --}}
</body>

</html>