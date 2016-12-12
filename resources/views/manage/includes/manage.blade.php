<!DOCTYPE html>
<html>

<head>

    @include('includes.head')

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

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Header -->
        @include('manage.includes.header')

        <!-- Sidebar -->
        @include('manage.includes.sidebar')

        <!-- Display errors -->
        @include('common.errors')

        <!-- Data -->
        @yield('content')

        <!-- Display errors -->
        @include('manage.includes.footer')

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
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgz9aJOkaTpIOhE-7WL8-_vQy1NxHbyOI&libraries=places"></script>

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

    <script>
        var current_location = window.location.pathname.substring(1);
        console.log(current_location);
        $('.sidebar-menu #' + current_location).addClass('active');
    </script>
    
    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
            lat: 27.72,
            lng: 85.36
            },
            zoom:15
        });
        
        google.maps.event.addListener(map, 'click', function(e) {
            placeMarkerAndPanTo(e.latLng, map);
        });

        google.maps.event.addListener(marker,'position_changed',function(){
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();
            $('#lat').val(lat);
            $('#lng').val(lng);
        });
        
        
        function placeMarkerAndPanTo(latLng, map) {
            var marker = new google.maps.Marker({
            position: latLng, 
            map: map
            });
            map.panTo(latLng);
        }
    </script>

</body>

</html>
