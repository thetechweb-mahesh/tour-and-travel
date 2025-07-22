	<!-- Left Sidebar Start -->
    <div class="leftside-menu">

        <!-- Logo Light -->
        <a href="{{('/admin/dashboard')}}" class="logo logo-light">
            <span class="logo-lg">
                <img src="images/logo.png" alt="logo">
            </span>
            <span class="logo-sm">
                <img src="images/logo-sm.png" alt="small logo">
            </span>
        </a>

        <!-- Logo Dark -->
        <a href="{{('/admin/dashboard')}}" class="logo logo-dark">
            <span class="logo-lg">
                <img src="images/logo-dark.png" alt="dark logo">
            </span>
            <span class="logo-sm">
                <img src="images/logo-sm.png" alt="small logo">
            </span>
        </a>

        <!-- Sidebar -->
        <div data-simplebar="">
            <ul class="side-nav">
                <li class="side-nav-title">Main</li>

                <li class="side-nav-item">
                    <a href="{{('/admin/dashboard')}}" class="side-nav-link">
                        <i class="ri-dashboard-2-line"></i>
                        <span> Dashboard </span>
                        <span class="badge bg-success float-end">9+</span>
                    </a>
                </li>

               
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPagesinvoice2" aria-expanded="false" aria-controls="sidebarPagesinvoice2" class="side-nav-link">
                        <i class="ri-article-line"></i>
                        <span>Category</span>
                        <span class="menu-arrow"></span>

                    </a>
                    <div class="collapse" id="sidebarPagesinvoice2">
                        <ul class="side-nav-second-level">
                            <li class="side-nav-item">
                                <a class="side-nav-link" href="{{url('admin/add-category')}}">add category</a>
                            </li>
                            <li class="side-nav-item">
                                <a class="side-nav-link" href="category">view category</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPagesinvoice" aria-expanded="false" aria-controls="sidebarPagesinvoice" class="side-nav-link">
                        <i class="ri-article-line"></i>
                        <span>Page</span>
                        <span class="menu-arrow"></span>

                    </a>
                    <div class="collapse" id="sidebarPagesinvoice">
                        <ul class="side-nav-second-level">
                            <li class="side-nav-item">
                                <a class="side-nav-link" href="{{url('admin/add-pages')}}">add page</a>
                            </li>
                            <li class="side-nav-item">
                                <a class="side-nav-link" href="/admin/pages">view Page</a>
                            </li>
                        </ul>
                    </div>
                </li>




                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPagesinvoice1" aria-expanded="false" aria-controls="sidebarPagesinvoice1" class="side-nav-link">
                        <i class="ri-article-line"></i>
                        <span>Destination</span>
                        <span class="menu-arrow"></span>

                    </a>
                    <div class="collapse" id="sidebarPagesinvoice1">
                        <ul class="side-nav-second-level">
                            <li class="side-nav-item">
                                <a class="side-nav-link" href="{{url('/admin/add-destination')}}">add Destination</a>
                            </li>
                            <li class="side-nav-item">
                                <a class="side-nav-link" href="/admin/destination">view Destination</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarPagesinvoice1" aria-expanded="false" aria-controls="sidebarPagesinvoice1" class="side-nav-link">
                        <i class="ri-article-line"></i>
                        <span>settings</span>
                        <span class="menu-arrow"></span>

                    </a>
                    <div class="collapse" id="sidebarPagesinvoice1">
                        <ul class="side-nav-second-level">
                          
                            <li class="side-nav-item">
                                <a class="side-nav-link" href="{{url('admin/settings')}}">view settings</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="side-nav-item">
                    <a target="_blank" class="side-nav-link" href="{{url('/')}}">View</a>
                </li>
             
            </ul>
        </div>
    </div>
    <!-- Left Sidebar End -->
    