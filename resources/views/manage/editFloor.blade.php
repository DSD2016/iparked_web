@extends('manage.includes.manage')

@section('content')

<!-- Page content -->
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <h1>
            Floor management
            <small>Edit floor</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="col-md-4">

            <div class="row col-md-12">
                <div class="small-box bg-light-blue-gradient">
                    <div class="inner">
                        <h3>Edit Floor</h3>
                    </div>



                    <div class="small-box-footer" style="padding-top: 10px;">

                        <form id="floor-edit" class="form-horizontal" role="form" action="/floor-edit/{{ $floor->id }}" method="post">

                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">

                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="floor_name" value="{{ $floor->name }}" placeholder="Floor name" required>
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="floor_number" value="{{ $floor->floor_number }}" placeholder="Floor number" required>
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="floor_major" value="{{ $floor->major_number }}" placeholder="Major number" required>
                            </div>

                            <div class="col-md-4" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="floor_cap" value="{{ $floor->floor_capacity }}" placeholder="Floor capacity" required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="floor_lat" value="{{ $floor->latitude }}" placeholder="Latitude" id="lat" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="floor_lng" value="{{ $floor->longitude }}" placeholder="Longitude" id="lng" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="angle" value="{{ $floor->angle }}" placeholder="Angle" id="angle" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="size_X" value="{{ $floor->size_X }}" placeholder="Size X" id="sizex" readonly required>
                            </div>
                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="size_Y" value="{{ $floor->size_Y }}" placeholder="Size Y" id="sizey" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="zoom_level" value="{{ $floor->zoom_level }}" placeholder="Zoom Level" id="zoom" readonly required>
                            </div>

                            <input type="hidden" name="floor_plan" value="0.0">

                            <input type="hidden" name="latitude1" value="{{ $floor->latitude1 }}" required>
                            <input type="hidden" name="longitude1" value="{{ $floor->longitude1 }}" required>
                            <input type="hidden" name="latitude2" value="{{ $floor->latitude2 }}" required>
                            <input type="hidden" name="longitude2" value="{{ $floor->longitude2 }}" required>
                            <input type="hidden" name="latitude3" value="{{ $floor->latitude3 }}" required>
                            <input type="hidden" name="longitude3" value="{{ $floor->longitude3 }}" required>
                            <input type="hidden" name="latitude4" value="{{ $floor->latitude4 }}" required>
                            <input type="hidden" name="longitude4" value="{{ $floor->longitude4 }}" required>

                            <input type="hidden" name="id" >


                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <label class="btn btn-default">
                                    <input type="file"  name="image" id="image" >
                                </label>    
                            </div>

                            <div>
                                <button type="submit" class="btn btn-default" style="width: 40%;">Update</button>
                            </div>


                        </form>
                    </div>


                    <div class="small-box-footer" style="padding-top: 10px;">

                        <form id="floor-remove" class="form-horizontal" role="form" action="/floor-remove/{{ $floor->id }}" method="post">

                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <input type="hidden" name="api_token" value="{{ Auth::user()->api_token }}">

                            <input type="hidden" name="id" value="{{ $floor->id }}" >

                            <div>
                                <button type="submit" class="btn btn-default" style="width: 40%;">Remove</button>
                            </div>


                        </form>
                    </div>


                </div>
            </div>

        </div >

        <div id="map-canvas" class="col-md-8" style="height: 70vh;"></div>

    </section>
    <!-- /.content -->

</div>
@stop

@section('scripts')
<script>
        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
            lat: {{ $floor->latitude }},
            lng: {{ $floor->longitude }}
            },
            zoom:{{ $floor->zoom_level }}
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
        var LatLng1 = {lat: {{ $floor->latitude1 }}, lng: {{ $floor->longitude1 }}};
        var LatLng2 = {lat: {{ $floor->latitude2 }}, lng: {{ $floor->longitude2 }}};
        var LatLng3 = {lat: {{ $floor->latitude3 }}, lng: {{ $floor->longitude3 }}};
        var LatLng4 = {lat: {{ $floor->latitude4 }}, lng: {{ $floor->longitude4 }}};

        var floorRectangle = new google.maps.Polygon({
                strokeColor: '#00BFFF',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#00BFFF',
                fillOpacity: 0.35
            });
        floorRectangle.setPath([LatLng1, LatLng2, LatLng3, LatLng4, LatLng1]);
        floorRectangle.setMap(map);
        
        var icons = [   new google.maps.MarkerImage("{{ URL::asset('img/NWmarker.png') }}",new google.maps.Size(30, 30),new google.maps.Point(2, 0),new google.maps.Point(2, 2)),
                        new google.maps.MarkerImage("{{ URL::asset('img/SWmarker.png') }}",new google.maps.Size(30, 30),new google.maps.Point(2, 0),new google.maps.Point(0, 23)),
                        new google.maps.MarkerImage("{{ URL::asset('img/SEmarker.png') }}",new google.maps.Size(30, 30),new google.maps.Point(2, 0),new google.maps.Point(23, 25)),
                        new google.maps.MarkerImage("{{ URL::asset('img/NEmarker.png') }}",new google.maps.Size(30, 30),new google.maps.Point(2, 0),new google.maps.Point(25, 2))
                    ];

        var markers = [ new google.maps.Marker({icon: icons[0], draggable:true, position:LatLng1, map:map }),
                        new google.maps.Marker({icon: icons[1], draggable:true, position:LatLng2, map:map }),
                        new google.maps.Marker({icon: icons[2], draggable:true, position:LatLng3, map:map}),
                        new google.maps.Marker({icon: icons[3], draggable:true, position:LatLng4, map:map})];
        
        for(var j=0; j<4; j++){
            google.maps.event.addListener(markers[j], 'dragend', function(e){
                calculateFloorPlanParameters();
            });
        }
    
        google.maps.event.addListener(map, 'click', function(e) {
            markers[i].setPosition(e.latLng);
            markers[i].setMap(map);
            calculateFloorPlanParameters();

            i = (i + 1) % 4;
        });

        function calculateFloorPlanParameters() {

            drawRectangle();

            var distanceX = calculateDistance(markers[0].getPosition().lat(), markers[0].getPosition().lng(),
                                              markers[3].getPosition().lat(), markers[3].getPosition().lng());

            var distanceY = calculateDistance(markers[0].getPosition().lat(), markers[0].getPosition().lng(),
                                              markers[1].getPosition().lat(), markers[1].getPosition().lng());

            var middlePoint = midPoint (markers[0].getPosition().lat(), markers[0].getPosition().lng(),
                                        markers[2].getPosition().lat(), markers[2].getPosition().lng());

            var adjacent = calculateDistance(markers[1].getPosition().lat(), markers[1].getPosition().lng(),
                                              markers[1].getPosition().lat(), markers[2].getPosition().lng());

            var opposite = calculateDistance(markers[1].getPosition().lat(), markers[1].getPosition().lng(),
                                              markers[2].getPosition().lat(), markers[1].getPosition().lng());

            var angle = Math.atan2(opposite,adjacent) * 180 / Math.PI;

            if(markers[1].getPosition().lat() < markers[2].getPosition().lat()){
                angle = 360 - angle;
            }

            $('#lat').val(middlePoint[0]);
            $('#lng').val(middlePoint[1]);
            $('#angle').val(angle);
            $('#sizex').val(distanceX);
            $('#sizey').val(distanceY);
            $('#zoom').val(map.getZoom());
           
        }

        function drawRectangle() {

            var floorCoords = [
                  {lat: markers[0].getPosition().lat(), lng: markers[0].getPosition().lng()},
                  {lat: markers[1].getPosition().lat(), lng: markers[1].getPosition().lng()},
                  {lat: markers[2].getPosition().lat(), lng: markers[2].getPosition().lng()},
                  {lat: markers[3].getPosition().lat(), lng: markers[3].getPosition().lng()},
                  {lat: markers[0].getPosition().lat(), lng: markers[0].getPosition().lng()}
                ];
            $( "input[name='latitude1']" ).val( markers[0].getPosition().lat() );
            $( "input[name='longitude1']" ).val( markers[0].getPosition().lng() );

            $( "input[name='latitude2']" ).val( markers[1].getPosition().lat() );
            $( "input[name='longitude2']" ).val( markers[1].getPosition().lng() );

            $( "input[name='latitude3']" ).val( markers[2].getPosition().lat() );
            $( "input[name='longitude3']" ).val( markers[2].getPosition().lng() );

            $( "input[name='latitude4']" ).val( markers[3].getPosition().lat() );
            $( "input[name='longitude4']" ).val( markers[3].getPosition().lng() );
            floorRectangle.setPath(floorCoords);
            floorRectangle.setMap(map);

        }

        function calculateDistance(lat1, lon1, lat2, lon2){

            var R = 6378137; // Radius of earth in KM

            var dLat = lat2 * Math.PI / 180 - lat1 * Math.PI / 180;
            var dLon = lon2 * Math.PI / 180 - lon1 * Math.PI / 180;

            var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * Math.sin(dLon/2) * Math.sin(dLon/2);

            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
            var d = R * c;

            return d;
        }

        function midPoint(lat1,lon1,lat2,lon2){

            var dLon = (lon2 - lon1) * Math.PI / 180;

            //convert to radians
            var rlat1 = lat1 * Math.PI / 180;
            var rlat2 = lat2 * Math.PI / 180;
            var rlon1 = lon1 * Math.PI / 180;

            var Bx = Math.cos(rlat2) * Math.cos(dLon);
            var By = Math.cos(rlat2) * Math.sin(dLon);
            var rlat3 = Math.atan2(Math.sin(rlat1) + Math.sin(rlat2), Math.sqrt((Math.cos(rlat1) + Bx) * (Math.cos(rlat1) + Bx) + By * By));
            var rlon3 = rlon1 + Math.atan2(By, Math.cos(rlat1) + Bx);

            var lat3 = rlat3 * 180 / Math.PI;
            var lon3 = rlon3 * 180 / Math.PI;

            return [lat3, lon3];
        }

    </script>
<script>
    $('#floor-edit').submit(function(e) {
       
        e.preventDefault();
        var formData =  new FormData($("#floor-edit")[0]);
        formData.set('zoom_level', map.getZoom());
        $.ajax({
            type: 'POST',
            url: '/floor-update/{{ $floor->id }}',
            dataType : "json",
            data: $('#floor-edit').serialize(),
            cache: false,
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if($('#image').val() != "") {
                    formData.set('id', Number(data.floorId) );
                    $.ajax({
                        type: 'POST',
                        url: 'http://iparked-api.sytes.net/api/floorplan', //  iparked_api.dev iparked-api.sytes.net
                        dataType : "json",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            window.location.replace("/floors/{{ $floor->garage_id }}");
                        },
                    });
                }else{
                    console.log("nema Slike");
                    window.location.replace("/floors/{{ $floor->garage_id }}");
                }
            },
        });
    });
    $('#floor-remove').submit(function(e) {
       
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'http://iparked-api.sytes.net/api/removefloorplan', //  iparked_api.dev iparked-api.sytes.net
            dataType : "json",
            data: $('#floor-remove').serialize(),
            cache: false,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                 $.ajax({
                        type: 'POST',
                        url: '/floor-remove/{{ $floor->id }}',
                        dataType : "json",
                        data: $('#floor-remove').serialize(),
                        cache: false,
                        headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            window.location.replace("/floors/{{ $floor->garage_id }}");
                        },
                    });    
            },
        });
    });
</script>

@stop