<!-- Left side navbar -->
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel" style="min-height: 42px">
            <!--
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            -->
            <div class="pull-left info">
                <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
            </div>
        </div>

        <!-- Sidebar menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li id="dashboard">
                <a href="{{ URL::asset('dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li id="beacons">
                <a href="{{ URL::asset('beacons') }}">
                    <i class="ion ion-social-rss"></i>
                    <span>Beacon management</span>
                </a>
            </li>

            <li id="garages">
                <a href="{{ URL::asset('garages') }}">
                    <i class="ion ion-social-buffer"></i>
                    <span>Garage management</span>
                </a>
            </li>

            <li id="user">
                <a href="{{ URL::asset('user') }}">
                    <i class="ion ion-model-s"></i>
                    <span>User management</span>
                </a>
            </li>

            <hr>

            <li>
                <a href="{{ URL::asset('documentation/') }}">
                    <i class="fa fa-book"></i>
                    <span>Documentation</span>
                </a>
            </li>

        </ul>
    </section>
</aside>
