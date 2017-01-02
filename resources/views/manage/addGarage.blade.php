@extends('manage.includes.manage')

@section('content')

<!-- Page content -->
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <h1>
            Garage management
            <small>Add garage</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="col-md-4">

            <div class="row col-md-12">
                <div class="small-box bg-light-blue-gradient">
                    <div class="inner">
                        <h3>Add Garage</h3>
                    </div>

                    <div class="small-box-footer" style="padding-top: 10px;">

                        <form id="beacons-add" class="form-horizontal" role="form" action="{{ route('garage-store') }}" method="post">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="garage_name" placeholder="Garage name" required>
                            </div>

                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="garage_UUID" placeholder="UUID" required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="garage_floors" placeholder="Number of floors" required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="garage_cap" placeholder="Garage capacity" required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="garage_type" placeholder="Garage type" required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="garage_city" placeholder="Garage city" required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="garage_lat" placeholder="Latitude" id="lat" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="garage_lng" placeholder="Longitude" id="lng" readonly required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-default" style="width: 40%;">Add</button>
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
        
        var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';        
        var icon = iconBase + 'parking_lot_maps.png';
        var garageMarker = new google.maps.Marker({icon: icon, draggable:true});

        google.maps.event.addListener(map, 'click', function(e) {
            garageMarker.setPosition(e.latLng);
            garageMarker.setMap(map);
            $('#lat').val(garageMarker.getPosition().lat());
            $('#lng').val(garageMarker.getPosition().lng());
        });

</script>
@stop