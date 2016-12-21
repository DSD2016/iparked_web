@extends('manage.includes.manage')

@section('content')

<!-- Page content -->
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <h1>
            Floor management
            <small>Add floor</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="map-canvas" class="col-md-8" style="height: 70vh;"></div>

        <div class="col-md-4">

            <div class="row col-md-12">
                <div class="small-box bg-light-blue-gradient">
                    <div class="inner">
                        <h3>Add Floor</h3>
                    </div>



                    <div class="small-box-footer" style="padding-top: 10px;">

                        <form id="floor" class="form-horizontal" role="form" action="/floor-store/{{ $garageId }}" method="post">

                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="floor_name" placeholder="Floor name">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="floor_major" placeholder="Major number">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="floor_cap" placeholder="Floor capacity">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="floor_lat" placeholder="Latitude" id="Lat">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="floor_lng" placeholder="Longitude" id="Lng">
                            </div>

                            <input type="hidden" name="angle" value="0.0">
                            <input type="hidden" name="floor_plan" value="0.0">
                            <input type="hidden" name="size_X" value="0.0">
                            <input type="hidden" name="size_Y" value="0.0">
                            <input type="hidden" name="zoom_level" value="20">
                            <input type="hidden" name="id" >


                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <label class="btn btn-default">
                                    <input type="file"  name="image" id="image" >
                                </label>    
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
        map.setOptions({draggableCursor:'crosshair'});

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.setCenter(initialLocation);
                map.setZoom(13);
            });
        }
        var i = 0;
        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
        
        var icons = [   iconBase + 'parking_lot_maps.png',
                        iconBase + 'library_maps.png',
                        iconBase + 'info-i_maps.png',
                        'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'];

        var markers = [ new google.maps.Marker({icon: icons[0], draggable:true}),
                        new google.maps.Marker({icon: icons[1], draggable:true}),
                        new google.maps.Marker({icon: icons[2], draggable:true}),
                        new google.maps.Marker({icon: icons[3], draggable:true})];
    
        google.maps.event.addListener(map, 'click', function(e) {
            placeMarkerAndPanTo(e.latLng, map);
        });

        function placeMarkerAndPanTo(latLng, map) {
            markers[i].setPosition(latLng);
            markers[i].setMap(map);
            console.log(icons[i]);
            var lat = markers[i].getPosition().lat();
            var lng = markers[i].getPosition().lng();
            i = (i + 1) % 4;

        }

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
<script>
    $('#floor').submit(function(e) {
       
        e.preventDefault();
        var formData =  new FormData($("#floor")[0]);
        formData.set('zoom_level', map.getZoom());
        console.log(map.getZoom());
        $.ajax({
            type: 'POST',
            url: '/floor-store/1',
            dataType : "json",
            data: $('#floor').serialize(),
            cache: false,
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                formData.set('id', Number(data.floorId) );
                $.ajax({
                    type: 'POST',
                    url: 'http://iparked_api.dev/api/floorplan',
                    dataType : "json",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        window.location.replace("/floors/1");
                    },
                });
            },
        });
    });
</script>

@stop