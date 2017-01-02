@extends('manage.includes.manage')

@section('content')
<!-- Page content -->
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header">
        <h1>
            User settings
            <small>Control panel</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row col-md-12">

            <form>

                    <div class="col-md-3">
                        <image src="/img/team/thumbnails/generic.jpg" class="img-rounded center-block" alt="Profile picture" width="80%">
                        <button class="btn btn-default center-block" style="margin-top: 5px;">Upload image</button>
                    </div>

                    <div class="col-md-9">

                        <div class="form-group col-md-12">
                            <div>
                                <label class="col-sm-2 col-form-label">First name</label>
                                <span class="col-sm-4">{{ Auth::user()->first_name }}</span>
                            </div>
                            <div>
                                <label class="col-sm-2 col-form-label">Last name</label>
                                <span class="col-sm-4">{{ Auth::user()->last_name }}</span>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-sm-2 col-form-label">Company</label>
                            <span class="col-sm-6">{{ Auth::user()->company }}</span>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="email" value={{ Auth::user()->email }}>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div>
                                <label for="new_password" class="col-sm-2 col-form-label">New password</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="new_password">
                                </div>
                            </div>
                            <div>
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm password</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="confirm_password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button style="margin-left: 20px;" class="btn btn-danger">Delete account</button>
                            </div>
                        </div>

                    </div>

            </form>

        </div>

    </section>


<!-- /.content -->
</div>
@stop
