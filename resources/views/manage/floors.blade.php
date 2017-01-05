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
        <div class="col-md-12">
            <table style="width:100%">
                <tr>
                    <th>Name</th>
                    <th>Floor number</th>
                    <th>Latitude</th> 
                    <th>Longitude</th>
                    <th>Major number</th>
                    <th>Last edited on</th>
                </tr>

                @foreach ($floors as $floor)
                <tr>
                    <td>{{ $floor->name }}</td>
                    <td>{{ $floor->floor_number }}</td>
                    <td>{{ $floor->latitude }}</td> 
                    <td>{{ $floor->longitude}}</td>
                    <td>{{ $floor->major_number }}</td>
                    <td>{{ $floor->floor_timestamp }}</td>
                    <td><button class="btn btn-default" onclick="location.href='/beacons/{{ $floor->id}}';">Add beacons</button></td>
                    <td><button class="btn btn-default" onclick="location.href='/editFloor/{{ $floor->id}}';">Edit Floor</button></td>
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
  
</script>

@stop