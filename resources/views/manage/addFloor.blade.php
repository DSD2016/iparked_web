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

                            <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">

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
                                <input class="form-control" type="text" name="floor_lat" placeholder="Latitude" id="lat" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="floor_lng" placeholder="Longitude" id="lng" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="angle" placeholder="Angle" id="angle" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="size_X" placeholder="Size X" id="sizex" readonly required>
                            </div>
                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="size_Y" placeholder="Size Y" id="sizey" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="zoom_level" placeholder="Zoom Level" id="zoom" readonly required>
                            </div>

                            <input type="hidden" name="floor_plan" value="0.0">
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

        var markers = [ new google.maps.Marker({icon: icons[0], draggable:true, title: 'North West'}),
                        new google.maps.Marker({icon: icons[1], draggable:true, title: 'South West'}),
                        new google.maps.Marker({icon: icons[2], draggable:true, title: 'South East'}),
                        new google.maps.Marker({icon: icons[3], draggable:true, title: 'North East'})];
    
        google.maps.event.addListener(map, 'click', function(e) {
            markers[i].setPosition(e.latLng);
            markers[i].setMap(map);
            if(i == 3){
                calculateFloorPlanParameters();
            }
            i = (i + 1) % 4;
        });

        function calculateFloorPlanParameters() {

            var dis1 = calculateDistance(markers[3].getPosition().lat(), markers[3].getPosition().lng(),
                                markers[0].getPosition().lat(), markers[0].getPosition().lng());

            var dis2 = calculateDistance(markers[1].getPosition().lat(), markers[1].getPosition().lng(),
                                markers[0].getPosition().lat(), markers[0].getPosition().lng());

            $('#lat').val(dis2[3]);
            $('#lng').val(dis1[4]);
            $('#angle').val(dis1[2]);
            $('#sizex').val(dis2[0]);
            $('#sizey').val(dis1[1]);
            $('#zoom').val(map.getZoom());


           
        }

        function calculateDistance(lat1, lon1, lat2, lon2){

            var R = 6378137; // Radius of earth in KM

            var dLat = lat2 * Math.PI / 180 - lat1 * Math.PI / 180;
            var dLon = lon2 * Math.PI / 180 - lon1 * Math.PI / 180;

            var a1 = Math.sin(dLat/2) * Math.sin(dLat/2);

            var a2 = Math.cos(lat1 * Math.PI / 180) * Math.cos(lat1 * Math.PI / 180) * Math.sin(dLon/2) * Math.sin(dLon/2);

            var c1 = 2 * Math.atan2(Math.sqrt(a1), Math.sqrt(1-a1));
            var c2 = 2 * Math.atan2(Math.sqrt(a2), Math.sqrt(1-a2));
            var d1 = R * c1;
            var d2 = R * c2;
            var angle = Math.atan2(d1,d2)*180 / Math.PI;
            console.log("------------------");
            console.log(d1);
            console.log(d2);
            console.log(angle);
            var s1 = (lat2 + lat1)/2;
            var s2 = (lon2 + lon1)/2;
            return [d1,d2,angle,s1,s2];
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
            url: '/floor-store/{{ $garageId }}',
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
                    url: 'http://iparked-api.sytes.net/api/floorplan',
                    dataType : "json",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        window.location.replace("/floors/{{ $garageId }}");
                    },
                });
            },
        });
    });
</script>

@stop