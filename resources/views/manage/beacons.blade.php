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
            <div class="row col-md-12" style="overflow: auto; height: 50vh;" >
                <table id="beaconTable" style="width:100%" >
                    <tr>
                        <th>Name</th>
                        <th>Minor number</th>
                        <th>Bluetooth address</th>
                    </tr>
                    
                </table>
            </div>
        </div >

        <div id="map-canvas" class="col-md-8" style="height: 80vh;"></div>

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
    var i = 0;
    var lastindex;

    for(i = 0; i < beacons.length; i++){ 
        myLatLng = new google.maps.LatLng(beacons[i]['latitude'], beacons[i]['longitude']);
        addMarker(myLatLng, i, beacons[i].id);
        var row = '<tr id="'+beacons[i].id+'"><td>' +  beacons[i].name
                 + '</td><td>' +  beacons[i].minor_number 
                 + '</td><td>' +  beacons[i].bluetooth_address + '</td><td>'
                 +  '<button class="btn btn-default" onclick="removeBeacon('+beacons[i].id+')">Remove</button>' + '</td></tr>';
        $('#beaconTable').append(row);
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


    var zoom = floor[0]['zoom_level'];
    map.setCenter(new google.maps.LatLng(floor[0]['latitude'], floor[0]['longitude']));
    
    //Earth’s radius, sphere

    var imageBounds = {
        north: floor[0]['latitude4'],
        south: floor[0]['latitude2'],
        east:  floor[0]['longitude4'],
        west:  floor[0]['longitude2']
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
                beacons.push(data.beacon);
                var i = beacons.length-1;
                $('#beacons-add')[0].reset();
                $('#infoText').text("Beacon added successfuly!");
                setTimeout(function() {
                    $('#infoText').text("Ready!");
                    $('input:submit').attr("disabled", false);
                }, 1000);
                newBeaconMarker.setMap(null);
                myLatLng = new google.maps.LatLng(newBeaconMarker.getPosition().lat(), newBeaconMarker.getPosition().lng());
                addMarker(myLatLng, beaconMarkers.length, beacons[i].id);
                var row = '<tr id="'+beacons[i].id+'"><td>' +  beacons[i].name
                     + '</td><td>' +  beacons[i].minor_number 
                     + '</td><td>' +  beacons[i].bluetooth_address + '</td><td>'
                     +  '<button class="btn btn-default" onclick="removeBeacon('+beacons[i].id+')">Remove</button>' + '</td></tr>';
                $('#beaconTable').append(row);

            },
        });
    });

    function addMarker(latLng, index, beaconID){

        var i = index;
        var marker = new google.maps.Marker({position: myLatLng, map: map});
        marker.data = beaconID; 
        beaconMarkers.push(marker);
        beaconMarkers[i].addListener('click', function() { markerClicked(i); });

    }

    function markerClicked(index) {
        $('tr', '#beaconTable').eq(lastindex).css('background-color', 'rgba(0,0,0,0.0)');
        lastindex = index + 1;
        $('tr', '#beaconTable').eq(lastindex).css('background-color', 'rgba(0,0,0,0.3)');
    }
    function removeBeacon(id) {
       $.ajax({
            type: 'GET',
            url: '/beacon-remove/'+id,
            dataType : "json",
            cache: false,
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                
                $('#'+id).remove();
                removeB(id);
            },
        });
    }
    function removeB(id) {

        for(var i = 0; i < beacons.length; i++ ) {
            if(beacons[i].id == id){
                beacons.splice(i,1);
            }
            if(beaconMarkers[i].data == id){
                beaconMarkers[i].setMap(null);
                beaconMarkers.splice(i,1);
                break;
            }
        }

    }
</script>

@stop
