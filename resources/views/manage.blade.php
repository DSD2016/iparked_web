<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="iparked DSD team 2016">

    <title>iParked | Dashboard</title>

    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="admin/css/AdminLTE.min.css">
    <link rel="stylesheet" href="admin/css/_all-skins.min.css">
    <link rel="stylesheet" href="admin/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="admin/plugins/morris/morris.css">
    <link rel="stylesheet" href="admin/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="index2.html" class="logo">
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
                                <span class="hidden-xs">Hodor</span>
                            </a>

                            <ul class="dropdown-menu">

                                <!-- User image -->
                                <li class="user-header">
                                    <!--
                                    <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    -->
                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>

                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>



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
                        <p>Hodor</p>
                    </div>
                </div>

                <!-- Sidebar menu -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>

                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="ion ion-social-rss"></i>
                            <span>Beacon management</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="ion ion-social-buffer"></i>
                            <span>Garage management</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="ion ion-model-s"></i>
                            <span>User management</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                        </ul>
                    </li>

                    <hr>

                    <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>

                </ul>
            </section>
        </aside>



        <!-- Page content -->
        <div class="content-wrapper">

            <!-- Header -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-xs-4">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>223</h3>

                        <p>Active beacons</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-social-rss"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xs-4">
                        <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>22</h3>

                        <p>Levels</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-social-buffer"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xs-4">
                        <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>5</h3>

                        <p>Garages</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-model-s"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Main row -->
                <div class="row">

                    <!-- Left column -->
                    <section class="col-lg-7 connectedSortable">

                        <!-- Calendar -->
                        <div class="box box-solid bg-green-gradient">
                            <div class="box-header">
                                <i class="fa fa-calendar"></i>

                                <h3 class="box-title">Calendar</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#">Add new event</a></li>
                                            <li><a href="#">Clear events</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">View calendar</a></li>
                                        </ul>
                                    </div>

                                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body no-padding">
                                <div id="calendar" style="width: 100%"></div>
                            </div>

                            <div class="box-footer text-black">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="clearfix">
                                            <span class="pull-left">Task #1</span>
                                            <small class="pull-right">90%</small>
                                        </div>

                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                                        </div>

                                        <div class="clearfix">
                                            <span class="pull-left">Task #2</span>
                                            <small class="pull-right">70%</small>
                                        </div>

                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="clearfix">
                                            <span class="pull-left">Task #3</span>
                                            <small class="pull-right">60%</small>
                                        </div>

                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                                        </div>

                                        <div class="clearfix">
                                            <span class="pull-left">Task #4</span>
                                            <small class="pull-right">40%</small>
                                        </div>

                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                            </ul>

                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                            </div>
                        </div>

                    </section>


                    <!-- Right column -->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Map box -->
                        <div class="box box-solid bg-light-blue-gradient">
                            <div class="box-header">
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                                    <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                </div>

                                <i class="fa fa-map-marker"></i>

                                <h3 class="box-title">
                                Visitors
                                </h3>
                            </div>

                            <div class="box-body">
                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                            </div>

                            <div class="box-footer no-border">
                                <div class="row">
                                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                        <div id="sparkline-1"></div>
                                        <div class="knob-label">Visitors</div>
                                    </div>

                                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                        <div id="sparkline-2"></div>
                                        <div class="knob-label">Online</div>
                                    </div>

                                    <div class="col-xs-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="knob-label">Exists</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sales graph -->
                        <div class="box box-solid bg-teal-gradient">
                            <div class="box-header">
                                <i class="fa fa-th"></i>
                                <h3 class="box-title">Sales Graph</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body border-radius-none">
                                <div class="chart" id="line-chart" style="height: 250px;"></div>
                            </div>

                            <div class="box-footer no-border">
                                <div class="row">
                                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                        <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                        <div class="knob-label">Mail-Orders</div>
                                    </div>

                                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                        <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                        <div class="knob-label">Online</div>
                                    </div>

                                    <div class="col-xs-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                        <div class="knob-label">In-Store</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>

                </div>

            </section>


        <!-- /.content -->
        </div>


        <!-- Footer -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.1
            </div>
            <strong>Copyright &copy; 2016 <a href="http://iparked.sytes.net">iParked</a>.</strong>
            All rights reserved.
        </footer>

    </div>


    <!-- Javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="admin/plugins/morris/morris.min.js"></script>
    <script src="admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/plugins/knob/jquery.knob.js"></script>
    <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="admin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="admin/plugins/fastclick/fastclick.js"></script>
    <script src="admin/js/app.min.js"></script>
    <script src="admin/js/dashboard.js"></script>
    <script src="admin/js/demo.js"></script>

</body>
</html>
