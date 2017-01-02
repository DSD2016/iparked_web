<header class="main-header">

    <!-- Logo -->
    <a href="{{ URL::asset('/') }}" class="logo">
        <span class="logo-mini"><b>iP</b></span>
        <span class="logo-lg"><b>iParked</b></span>
    </a>


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">

        <!-- Sidebar toggle button -->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- User management submenu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--
                        <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        -->
                        <span class="hidden-xs">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    </a>

                    <ul class="dropdown-menu">

                        <!-- User image -->
                        <li class="user-header">
                            <p>
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                <small>{{ Auth::user()->email }}</small>
                                <small>{{ Auth::user()->company }}</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ URL::asset('user') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>

                            <div class="pull-right">
                                <a hhref="#" onclick="$.get('/logout', function(){location.reload();});" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
