<!DOCTYPE html>

<html lang="en">



<head>

    @include('layout.header')

</head>



<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">



        <!-- Preloader --> 

        <!-- <div class="preloader flex-column justify-content-center align-items-center">

            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">

        </div> -->



        <!-- Navbar -->

        @include('layout.navbar')

        <!-- /.navbar -->



        <!-- Main Sidebar Container -->

        @include('layout.leftbar')



        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            @yield('breadcrumb')

            <!-- /.content-header -->



            <!-- Main content -->

            <section class="content">

                <div class="container-fluid">

                    <!-- Small boxes (Stat box) -->

                    

                    @yield('content')

                    

                </div><!-- /.container-fluid -->

            </section>

            <!-- /.content -->

        </div>

        <!-- /.content-wrapper -->

        <!-- Footer Here -->



        <!-- Control Sidebar -->

        <aside class="control-sidebar control-sidebar-dark">

            <!-- Control sidebar content goes here -->

        </aside>

        <!-- /.control-sidebar -->

    </div>

    <!-- ./wrapper -->

    @include('layout.script')

    @yield('script')

</body>



</html>