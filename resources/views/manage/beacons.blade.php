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

        <div class="col-md-4">

            <div class="row col-md-12">
                <div class="small-box bg-light-blue-gradient">
                    <div class="inner">
                        <h3>Add beacon</h3>
                    </div>

                    <div class="small-box-footer" style="padding-top: 10px;">

                        <form id="beacons-add" class="form-horizontal" role="form" action='beacons-store/{{ $floorId }}' method="post">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_name" placeholder="Beacon name" required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="beacon_minor" placeholder="Minor" required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="bluetooth_address" placeholder="Bluetooth address" required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_lat" placeholder="Latitude" id="lat" readonly required>
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_lng" placeholder="Longitude" id="lng" readonly required>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-default" style="width: 40%;">Add</button>
                                <p id="infoText">Ready!</p>
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

    var beacons = {!! json_encode($beacons) !!};
    var floor = {!! json_encode($floor) !!};
  
    var beaconMarkers = [];
    for(var i = 0; i < beacons.length; i++){ 
        myLatLng = new google.maps.LatLng(beacons[i]['latitude'], beacons[i]['longitude']);
        beaconMarkers.push( new google.maps.Marker({position: myLatLng, map: map, title: beacons[i]['name']}) );
    }

    var newBeaconMarker = new google.maps.Marker({icon: "{{ URL::asset('img/beaconMarkerIcon.png') }}", draggable:true});

    
    google.maps.event.addListener(map, 'click', function(e) {        
        newBeaconMarker.setPosition(e.latLng);
        newBeaconMarker.setMap(map);
        google.maps.event.addListener(newBeaconMarker, 'dragend', function(e){
            $('#lat').val(e.latLng.lat());
            $('#lng').val(e.latLng.lng());
        });
        $('#lat').val(e.latLng.lat());
        $('#lng').val(e.latLng.lng());
    });


    map.data.addListener('click',function(e){
     google.maps.event.trigger(this.getMap(),'click',e);
   });


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
    floorOverlay = new google.maps.GroundOverlay('http://iparked-api.sytes.net/api/floorplan/'+floor[0]['id'], imageBounds, {clickable: false});//  iparked_api.dev iparked-api.sytes.net
    floorOverlay.setMap(map);
    map.setZoom(zoom);


    $('#beacons-add').submit(function(e) {
        e.preventDefault();
        $('#infoText').text("Adding beacon.....");
        $('input:submit').attr("disabled", true);
        $.ajax({
            type: 'POST',
            url: '/beacons-store/'+floor[0]['id'],
            dataType : "json",
            data: $('#beacons-add').serialize(),
            cache: false,
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
                $('#beacons-add')[0].reset();
                $('#infoText').text("Beacon added successfuly!");
                setTimeout(function() {
                    $('#infoText').text("Ready!");
                    $('input:submit').attr("disabled", false);
                }, 1000);
                newBeaconMarker.setIcon(null);
                newBeaconMarker.setDraggable(false);
                beaconMarkers.push(newBeaconMarker);
                newBeaconMarker = new google.maps.Marker({icon: "{{ URL::asset('img/beaconMarkerIcon.png') }}", draggable:true});
            },
        });
    });
   
</script>

@stop
