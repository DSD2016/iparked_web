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

        <button class="btn btn-default" onclick="location.href='/addGarage';">Add new</button>


    </section>



<!-- /.content -->
</div>
@stop
