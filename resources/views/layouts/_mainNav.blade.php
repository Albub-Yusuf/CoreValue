<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{route('admin.dashboard')}}">

                <span class="brand-name"><h6>Core Value Enterprise</h6></span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="{{route('admin.dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span> <b class="caret"></b>
                    </a>
                </li>
                <!--Admin-->

                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Admin"
                       aria-expanded="false" aria-controls="Admin">
                        <i class="mdi mdi-chart-pie"></i>
                        <span class="nav-text">Admin</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="Admin"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            <li >
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Admin List</span>
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Add Admin</span>
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Create Exam</span>
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Create New Session</span>

                                </a>
                            </li>

                        </div>
                    </ul>
                </li>
                <!--Products's-->

                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#product"
                       aria-expanded="false" aria-controls="product">
                        <i class="mdi mdi-chart-pie"></i>
                        <span class="nav-text">Products</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="product"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            <li >
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Data</span>

                                </a>
                            </li>






                        </div>
                    </ul>
                </li>



            </ul>

        </div>




    </div>
</aside>
