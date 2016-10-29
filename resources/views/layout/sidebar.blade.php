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
                <ul class="treeview-menu">
                    <li class="@yield('agents-index')"><a href="{!! route('agents.index') !!}" ><i class="fa fa-circle-o"></i> Agent List</a></li>
                    <li class="@yield('agents-create')"><a href="{!! route('agents.create') !!}" ><i class="fa fa-circle-o"></i> Create Agent</a></li>
                    {{--<li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                </ul>
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