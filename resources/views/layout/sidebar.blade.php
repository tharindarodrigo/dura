<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="@yield('agents')">
                <a href="{!! url('admin/agents') !!}">
                    <i class="fa fa-user"></i> <span>Agents</span>
                </a>
            </li>
            <li class="@yield('subscribers')">
                <a href="{!! url('admin/subscribers') !!}">
                    <i class="fa fa-users"></i> <span>Subscribers</span>
                </a>
            </li>
            <li class="@yield('cities')">
                <a href="{!! url('admin/cities') !!}">
                    <i class="fa fa-th"></i> <span>Cities</span>
                </a>
            </li>
            <li class="@yield('areas')">
                <a href="{!! url('admin/areas') !!}">
                    <i class="fa fa-th"></i> <span>Areas</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>