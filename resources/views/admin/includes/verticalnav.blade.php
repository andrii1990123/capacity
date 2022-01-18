<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <!-- Logo -->
            <a class="link-fx font-w600 font-size-lg text-white" href="{{url('/admin/home')}}">
                <span class="smini-visible">
                    <span class="text-white-75">D</span><span class="text-white">x</span>
                </span>
                <span class="smini-hidden">
                    <span class="text-white">Capacity</span><span class="text-white-75"></span> <span class="text-white font-size-base font-w400">Admin</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" data-toggle="layout" data-action="sidebar_style_toggle" href="javascript:void(0)">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </a>
                <!-- END Toggle Sidebar Style -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
           
            
            <li class="nav-main-heading">Users</li>
            <li class="nav-main-item">
                <a class="nav-main-link {{Request::is('admin/SolicitorListView')?'active':'' }}" href="{{url('admin/SolicitorListView')}}">
                    <i class="nav-main-link-icon fa fa-user-graduate fa-2x" style="font-size: 16px;"></i>
                    <span class="nav-main-link-name">Solicitor</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{Request::is('admin/EstateAgentListView')?'active':'' }}" href="{{url('admin/EstateAgentListView')}}">
                    <i class="nav-main-link-icon fa fa-user fa-2x" style="font-size: 16px;"></i>
                    <span class="nav-main-link-name">Estate Agent</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{Request::is('admin/LenderListView')?'active':'' }}" href="{{url('admin/LenderListView')}}">
                    <i class="nav-main-link-icon fa fa-user-tie fa-2x" style="font-size: 16px;"></i>
                    <span class="nav-main-link-name">Lender</span>
                </a>
            </li>
            <li class="nav-main-heading">Link</li>
            <li class="nav-main-item">
                <a class="nav-main-link {{Request::is('admin/LinkESView')?'active':'' }}" href="{{url('admin/LinkESView')}}">
                    <i class="nav-main-link-icon fa fa-link fa-2x" style="font-size: 16px;"></i>
                    <span class="nav-main-link-name">Estate Agent with Solicitor Firm</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{Request::is('admin/LinkLSView')?'active':'' }}" href="{{url('admin/LinkLSView')}}">
                    <i class="nav-main-link-icon fa fa-link fa-2x" style="font-size: 16px;"></i>
                    <span class="nav-main-link-name">Lender with Solicitor</span>
                </a>
            </li>
            
            <li class="nav-main-heading">Firm Capcity</li>
            <li class="nav-main-item">
                <a class="nav-main-link {{Request::is('admin/FirmCapacityListView')?'active':'' }}" href="{{url('admin/FirmCapacityListView')}}">
                    <i class="nav-main-link-icon fa fa-align-left fa-2x" style="font-size: 16px;"></i>
                    <span class="nav-main-link-name">Firm Capacity</span>
                </a>
            </li>

            <li class="nav-main-heading">Setting</li>
            <li class="nav-main-item">
                <a class="nav-main-link {{Request::is('admin/SystemPasswordSetView')?'active':'' }}" href="{{url('admin/SystemPasswordSetView')}}">
                    <i class="nav-main-link-icon fa fa-key fa-2x" style="font-size: 16px;"></i>
                    <span class="nav-main-link-name">Set Password</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>