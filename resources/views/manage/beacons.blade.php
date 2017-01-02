@extends('manage.includes.manage')

@section('content')

<!-- Page content -->
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <h1>
            Beacon management
            <small>Control panel</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="map-canvas" class="col-md-8" style="height: 70vh;"></div>

        <div class="col-md-4">

            <div class="row col-md-12">
                <div class="small-box bg-light-blue-gradient">
                    <div class="inner">
                        <h3>Add beacon</h3>
                    </div>

                    <div class="small-box-footer" style="padding-top: 10px;">

                        <form id="beacons-add" class="form-horizontal" role="form" action="{{ route('beacons-store') }}" method="post">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_name" placeholder="Beacon name">
                            </div>

                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_uuid" placeholder="UUID">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="beacon_major" placeholder="Major">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="beacon_minor" placeholder="Minor">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_lat" placeholder="Latitude" id="Lat">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_lng" placeholder="Longitude" id="Lng">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-default" style="width: 40%;">Add</button>
                            </div>


                        </form>
                    </div>

                </div>
            </div>

        </div >

    </section>
    <!-- /.content -->

</div>
@stop

@section('scripts')
<script>
    var map = new google.maps.Map(document.getElementById('map-canvas'),{
        center:{
        lat: 0.0,
        lng: 0.0
        },
        zoom:2
    });

    var beacons = {!! json_encode($beacons) !!};
    var floor = {!! json_encode($floor) !!};
    console.log(floor[0]);
    console.log(beacons.length);

    var beaconMarkers = [];
    for(var i = 0; i < beacons.length; i++) {
        myLatLng = new google.maps.LatLng(beacons[i]['latitude'], beacons[i]['longitude']);
        beaconMarkers.push( new google.maps.Marker({position: myLatLng, map: map, title: beacons[i]['name']}) );
    }

    var lat = floor[0]['latitude'];
    var lng = floor[0]['longitude'];
    var height = floor[0]['size_X'];
    var width = floor[0]['size_Y'];
    var zoom = floor[0]['zoom_level'];
    map.setCenter(new google.maps.LatLng(lat, lng));
    
    //Earth’s radius, sphere
    var R = 6378137;
    var Pi = 3.14159265359;

     //offsets in meters
    var dn = height/2.0;
    var de = width/2.0;

     //Coordinate offsets in radians
    var dLat = ((dn*180)/R)/Pi;
    var dLon = ((de*180)/(R*Math.cos((Pi*lat)/180.0))) / Pi;

     //OffsetPosition, decimal degrees
    var lat0 = lat + dLat;
    var lon0 = lng + dLon;

    var lat1 = lat - dLat;
    var lon1 = lng - dLon;

    var imageBounds = {
        north: lat0,
        south: lat1,
        east:  lon0,
        west:  lon1
    };
    floorOverlay = new google.maps.GroundOverlay('http://iparked-api.sytes.net/api/floorplan/'+floor[0]['id'], imageBounds);
    floorOverlay.setMap(map);
    map.setZoom(zoom);
   
</script>

@stop
