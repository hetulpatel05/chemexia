<aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Brand Logo -->

            <a href="#" class="brand-link">

                <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Chemexia</span>
            </a>
            <!-- Sidebar -->

            <div class="sidebar">

                <!-- Sidebar user panel (optional) -->

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="image">

                        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">

                    </div>

                    <div class="info">

                        <a href="#" class="d-block">User Name</a>

                    </div>

                </div>

                <!-- SidebarSearch Form -->             


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->                                             
                        <li class="nav-item">
                            <a href="{{ url('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{url('users')}}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Manage Users
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">

                            <a href="{{url('managecategory')}}" class="nav-link">

                                <i class="nav-icon fas fa-piggy-bank"></i>

                                <p>
                                    Manage Category
                                </p>

                            </a>

                        </li>



                        <li class="nav-item">

                            <a href="{{url('managesubcategory')}}" class="nav-link">

                                <i class="nav-icon fas fa-chart-bar"></i>

                                <p>

                                    Manage Subcategories

                                </p>

                            </a>

                        </li>



                        <li class="nav-item">

                            <a href="{{url('inquiries')}}" class="nav-link">

                                <i class="nav-icon fas fa-file-invoice"></i>

                                <p>

                                    Manage Quatation

                                </p>

                            </a>

                        </li>


                        <li class="nav-item">

                            <a href="{{url('viewsales')}}" class="nav-link">

                                <i class="nav-icon fas fa-file-invoice"></i>

                                <p>

                                    View Sales

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="{{url('viewpdflist')}}" class="nav-link">

                                <i class="nav-icon fas fa-file-invoice"></i>

                                <p>

                                    Manage Pdf's

                                </p>

                            </a>

                        </li>



                        <li class="nav-item">

                            <a href="{{ url('logout') }}" class="nav-link">

                                <i class="nav-icon fas fa-sign-out-alt"></i>

                                <p>

                                    Logout

                                    <!--    <span class="right badge badge-danger">New</span> -->

                                </p>

                            </a>

                        </li>

                    </ul>

                </nav>

                <!-- /.sidebar-menu -->

            </div>

            <!-- /.sidebar -->

        </aside>