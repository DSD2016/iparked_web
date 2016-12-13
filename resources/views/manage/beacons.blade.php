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
        <div id="map-canvas" class="col-md-8" style="height: 70vh;"></div>

        <div class="col-md-4">

            <div class="row col-md-12">
                <div class="small-box bg-light-blue-gradient">
                    <div class="inner">
                        <h3>Add beacon</h3>
                    </div>

                    <div class="small-box-footer" style="padding-top: 10px;">

                        <form id="beacons-add" class="form-horizontal" role="form" action="{{ route('beacons-store') }}" method="post">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_name" placeholder="Beacon name">
                            </div>

                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_uuid" placeholder="UUID">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="beacon_major" placeholder="Major">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="number" name="beacon_minor" placeholder="Minor">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_lat" placeholder="Latitude" id="Lat">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 10px;">
                                <input class="form-control" type="text" name="beacon_lng" placeholder="Longitude" id="Lng">
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
