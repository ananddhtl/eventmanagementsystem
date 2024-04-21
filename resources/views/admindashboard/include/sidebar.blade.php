<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

    <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Report
</div>

<li class="nav-item">
    <a class="nav-link" href="{{ route('getallevents') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Pending Event List</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('getallacceptedevents') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Accepted Event List</span></a>
</li>



<li class="nav-item">
    <a class="nav-link" href="{{ route('getallorganizer') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Organizer List</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('venue') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Location</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('category') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Category</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ url('getall-normaluser') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Normal Users</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('event.users') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Total Event User Participants</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('faq.index') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>FAQ</span></a>
</li>
</ul>

       <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>





                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('admindashboardEMS/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="signout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
