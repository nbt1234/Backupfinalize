<?php
$segments = request()->segments();
$last = end($segments);
$second = count($segments) > 2 ? $segments[count($segments) - 2] : '';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('public/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"
        template />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/template/dist/css/adminlte.min.css') }} ">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('public/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- DATATABLE -->
    <link rel="stylesheet"
        href="{{ asset('public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <!-- SELECT 2 -->

    <link rel="stylesheet" href="{{ asset('public/template/plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet"
        href="{{ asset('public/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }} ">

    <!-- TOASTR -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/toastr/toastr.min.css') }} ">

    <!-- EDITOR -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/summernote/summernote-bs4.css') }} ">
    <link rel="stylesheet" href="{{ asset('public/template/plugins/summernote/summernote-bs4.css') }}">

    <link rel="stylesheet" href="{{ asset('public/admin-assets/css/style.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{url('finalize-site-admin/dashboard')}}" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                @csrf
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('public/template/dist/img/user2-160x160.jpg') }}"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">Admin</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ asset('public/template/dist/img/user2-160x160.jpg') }}"
                                class="img-circle elevation-2" alt="User Image">

                            <p>
                                Admin
                                <small>Member since
                                    date</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="{{ url('finalize-site-admin/logout') }}"
                                class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('public/template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('public/template/dist/img/user2-160x160.jpg') }}"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>

                @if (session('flash-error'))
                    <p class="admin-toastr" onclick="toastr_danger('{{ session()->get('flash-error') }}')"></p>
                @endif
                @if (session('flash-success'))
                    <p class="admin-toastr" onclick="toastr_success('{{ session()->get('flash-success') }}')"></p>
                @endif

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ url('finalize-site-admin/dashboard') }}" class="nav-link @if ($last=='dashboard' ||$last=='finalize-site-admin' ) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <!-- <li class="nav-item has-treeview
                            @if($last=='categories'|| $last=='category-page' || $second=='category-edit'
                                ||$last=='brands' || $last=='brands-page' || $second=='brands-edit'
                                ||$last=='attributes' || $second=='attribute-edit'
                                ||$last=='tags' || $second=='tag-edit'
                                ||$last=='attributes-values' || $second=='attribute-value-edit'
                                ||$last=='sub-categories' || $last=='sub-category-page' || $second=='sub-category-edit') menu-open @endif">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Products
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('finalize-site-admin/categories') }}" class="nav-link
                                        @if ($last=='categories' || $last=='category-page' || $second=='category-edit') active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Category
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('finalize-site-admin/sub-categories') }}" class="nav-link @if ($last=='sub-categories' || $last=='sub-category-page' ||
                                        $second=='sub-category-edit' ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Sub Category
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('finalize-site-admin/brands') }}" class="nav-link @if ($last=='brands' || $last=='brands-page' ||
                                        $second=='brands-edit' ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Brands
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('finalize-site-admin/attributes') }}" class="nav-link @if ($last=='attributes' || $second=='attribute-edit' ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Attributes
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('finalize-site-admin/attributes-values') }}" class="nav-link @if ($last=='attributes-values' || $second=='attribute-value-edit' ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Attributes Values
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ url('finalize-site-admin/tags') }}" class="nav-link @if ($last=='tags' || $second=='tag-edit' ) active @endif">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Tags
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="nav-item ">
                            <a href="{{ url('finalize-site-admin/vendors') }}" class="nav-link @if ($last=='vendors' || $second=='vendor' || $second=='blog-edit' ) active @endif"">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Vendors
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('finalize-site-admin/subadmin') }}" class="nav-link @if ($last=='subadmin' || $second=='subadmin-access' || $last=='subadmin-page' ) active @endif"">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Subadmin
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item ">
                            <a href="{{ url('finalize-site-admin/blogs') }}" class="nav-link @if ($last=='blogs' || $last=='blog-page' || $second=='blog-edit' ) active @endif"">
                                <i class=" nav-icon fas fa-blog"></i>
                                <p>
                                    Blog & News
                                </p>
                            </a>
                        </li>
                         <!-- <li class="nav-item ">
                            <a href="{{ url('finalize-site-admin/coupon') }}" class="nav-link @if ($last=='coupon' || $last=='coupon-page' || $second=='coupon-edit' ) active @endif"">
                               <i class="fas fa-anchor"></i>
                                <p>
                                Coupon
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item ">
                            <a href="{{ url('finalize-site-admin/tournament') }}" class="nav-link @if ($last=='tournament' || $last=='tournament-page' || $second=='tournament-edit' ) active @endif"">
                               <i class="fas fa-chart-pie"></i>
                                <p>
                                Tournament
                                </p>
                            </a>
                        </li>
                       
                       
                         <li class="nav-item ">
                            <a href="{{ url('finalize-site-admin/creators') }}" class="nav-link @if ($last=='creators' || $last=='creators-page' || $second=='creators-edit' ) active @endif"">
                               <i class="fas fa-anchor"></i>
                                <p>
                                Content Creators
                                </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ url('finalize-site-admin/payment-history') }}" class="nav-link @if ($last=='payment-history') active @endif"">
                            <i class="fas fa-money-check-alt"></i>
                                <p>
                                Payment History
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ url('finalize-site-admin/setting') }}" class="nav-link @if ($last=='setting' ) active @endif">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Settings
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('finalize-site-admin/faqs') }}" class="nav-link @if ($last=='faq-page' || $last=='faqs' || $second=='faq-edit' ) active @endif">
                                <i class="nav-icon fas fa-question-circle"></i>
                                <p>
                                    FAQs
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ url('finalize-site-admin/pages') }}" class="nav-link @if ($last=='pages' || $last=='privacy-policy' || $last=='terms-condition' ||
                                $last=='template' || $second=='template-edit' ) active @endif""><i class=" nav-icon fas fa-info"></i>
                                <p>
                                    Pages
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="<?=url('/admin')?>">finalize</a>.</strong>
            All rights reserved.
        </footer>

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</body>

</html>
<!-- jQuery -->
<script type="text/javascript">
    var base_url = "<?php echo url('') . '/'; ?>"
    var csrf_token="{{csrf_token()}}"
</script>
<script src="{{ asset('public/template/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('public/template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/moment/moment.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<script src="{{ asset('public/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('public/template/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('public/template/dist/js/demo.js') }}"></script>

<script src="{{ asset('public/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<script src="{{ asset('public/admin-assets/js/adminjs.js') }}"></script>
