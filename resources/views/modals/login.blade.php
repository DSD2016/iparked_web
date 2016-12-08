<!-- Modal for login -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="favoritesModalLabel">Garage Manager Login</h4>
            </div>

            <div class="modal-body">
                <h1>Login to Your Account</h1><br>

                <form>
                    <input class="form-control" type="text" name="user" placeholder="Username">
                    <input class="form-control" style="margin-top: 5px;" type="password" name="pass" placeholder="Password">
                </form>

                <div class="row" style="padding-top: 10px;">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="btn btn-block btn-social btn-google">
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
                <button type="button" class="btn btn-primary">Login</button>
                </span>
            </div>

        </div>
    </div>
</div>
