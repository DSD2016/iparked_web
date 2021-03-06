<!-- Modal for login -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form id="login-form" class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="favoritesModalLabel">Garage Manager Login</h4>
                </div>

                <div class="modal-body">
                    <h1>Login to Your Account</h1><br>

                    <div style="padding-bottom: 10px;">
                        <label for="email">E-mail</label>
                        <input class="form-control" type="email" name="email" placeholder="E-mail">
                    </div>

                    <div style="padding-bottom: 10px;">
                        <label for="pass">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row" style="padding-top: 10px;">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <a href="#" class="btn btn-block btn-social btn-google">
                                <span class="fa fa-google"></span>
                                Google
                            </a>
                        </div>
                    </div>

                    <div class="login-help" style="padding-top: 10px;">
    				    <a data-dismiss="modal" data-toggle="modal" data-target="#register-modal" href="#">Register</a> -
                        <a data-dismiss="modal" data-toggle="modal" data-target="forgot-password-modal" href="#">Forgot Password</a>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <span class="pull-right">
                    <button type="submit" class="btn btn-primary">Login</button>
                    </span>
                </div>

            </form>

        </div>
    </div>
</div>
