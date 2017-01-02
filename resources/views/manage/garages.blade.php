@extends('manage.includes.manage')

@section('content')
<!-- Page content -->
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <h1>
            Garage management
            <small>Your garages</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <table style="width:100%">
                    <tr>
                        <th>Name</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Number of floors</th>
                        <th>Capacity</th>
                        <th>UUID</th>
                        <th>City</th>
                        <th>Last edited on</th>
                    </tr>

                    @foreach ($garages as $garage)
                    <tr>
                        <td>{{ $garage->name }}</td>
                        <td>{{ $garage->latitude }}</td>
                        <td>{{ $garage->longitude}}</td>
                        <td>{{ $garage->num_floors }}</td>
                        <td>{{ $garage->garage_capacity }}</td>
                        <td>{{ $garage->UUID }}</td>
                        <td>{{ $garage->city }}</td>
                        <td>{{ $garage->garage_timestamp }}</td>
                        <td><button class="btn btn-default" onclick="location.href='/floors/{{ $garage->id }}';">Show floors</button></td>
                    </tr>
                    @endforeach
                </table>
            </div>

            <div class="col-md-12">
                <button class="btn btn-success" onclick="location.href='/addGarage';">Add new</button>
            </div>

        </div>

        <div class="row col-md-12" style="margin-top: 50px;">
            <div id="map-canvas" style="height: 50vh;"></div>
        </div>

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

    function showOnMap(lat, lng, id, height, width, zoom){

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
        floorOverlay = new google.maps.GroundOverlay('http://iparked_api.dev/api/floorplan/1', imageBounds);
        floorOverlay.setMap(map);
        map.setZoom(zoom);
    }
</script>

@stop
