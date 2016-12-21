@extends('manage.includes.manage')

@section('content')
<!-- Page content -->
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <h1>
            Floors management
            <small>Your floors</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-6">
            <table style="width:100%">
                <tr>
                    <th>Name</th>
                    <th>Latitude</th> 
                    <th>Longitude</th>
                    <th>Major number</th>
                    <th>Last edited on</th>
                </tr>

                @foreach ($floors as $floor)
                <tr>
                    <td>{{ $floor->name }}</td>
                    <td>{{ $floor->latitude }}</td> 
                    <td>{{ $floor->longitude}}</td>
                    <td>{{ $floor->major_number }}</td>
                    <td>{{ $floor->floor_timestamp }}</td>
                    <td><button class="btn btn-default" onclick="showOnMap({{ $floor->latitude }}, {{ $floor->longitude}}, {{ $floor->id}}, {{ $floor->size_X}}, {{ $floor->size_Y}}, {{ $floor->zoom_level}} )">Show on map</button></td>
                </tr>
                @endforeach
            </table>
            <button class="btn btn-default" onclick="location.href='/addFloor/{{ $garageId }}';">Add Floor</button>
        </div>

        <div id="map-canvas" class="col-md-6" style="height: 50vh;"></div>



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

        floorOverlay = new google.maps.GroundOverlay(
            'http://iparked_api.dev/api/floorplan/' + id,
        imageBounds);
        floorOverlay.setMap(map);
        map.setZoom(zoom);
    }     
</script>

@stop