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
                                <a class="sidenav-item-link" href="{{route('user.index')}}">
                                    <span class="nav-text">Admin List</span>
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="{{route('user.create')}}">
                                    <span class="nav-text">Add Admin</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <!--Product Listings-->
                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Product"
                       aria-expanded="false" aria-controls="Product">
                        <i class="mdi mdi-chart-pie"></i>
                        <span class="nav-text">Product</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="Product"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            <li >
                                <a class="sidenav-item-link" href="{{route('product.index')}}">
                                    <span class="nav-text">Product List</span>
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="{{route('product.create')}}">
                                    <span class="nav-text">Add Product</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <!--Settings's-->

                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#settings"
                       aria-expanded="false" aria-controls="settings">
                        <i class="mdi mdi-chart-pie"></i>
                        <span class="nav-text">Settings</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="settings"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            <li >
                                <a class="sidenav-item-link" href="{{route('category.index')}}">
                                    <span class="nav-text">Category</span>

                                </a>
                            </li>

                            <li >
                                <a class="sidenav-item-link" href="{{route('brand.index')}}">
                                    <span class="nav-text">Brand</span>

                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="nav-text">#</span>
                                </a>
                            </li>






                        </div>
                    </ul>
                </li>



            </ul>

        </div>




    </div>
</aside>
