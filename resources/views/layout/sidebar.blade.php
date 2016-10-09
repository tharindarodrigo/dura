<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="@yield('agents')">
                <a href="{!! url('agents') !!}">
                    <i class="fa fa-user"></i> <span>Agents</span>
                </a>
            </li>
            <li class="@yield('cities')">
                <a href="{!! url('/cities') !!}">
                    <i class="fa fa-th"></i> <span>Cities</span>
                </a>
            </li>
            <li class="@yield('areas')">
                <a href="{!! url('/areas') !!}">
                    <i class="fa fa-th"></i> <span>Areas</span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>