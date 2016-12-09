<!-- Modal for login -->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="favoritesModalLabel">Garage Manager Login</h4>
                </div>

                <div class="modal-body">

                    <h1>Register</h1><br>

                    <div class="row" style="padding-bottom: 10px;">
                        <div class="col-xs-6">
                            <label for="first-name">First Name</label>
                            <input class="form-control" type="text" name="first-name" placeholder="*Frist Name">
                        </div>

                        <div class="col-xs-6">
                            <label for="last-name">Last Name</label>
                            <input class="form-control" type="text" name="last-name" placeholder="*Last Name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6" style="padding-bottom: 10px;">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="email" name="email" placeholder="*E-mail">
                        </div>
                    </div>

                    <div class="row" style="padding-bottom: 10px;">
                        <div class="col-xs-6">
                            <label for="pass">Password</label>
                            <input class="form-control" type="password" name="pass" placeholder="*Password">
                        </div>

                        <div class="col-xs-6">
                            <label for="pass-confirm">Confirm Password</label>
                            <input class="form-control" type="password" name="pass-confirm" placeholder="*Confirm Password">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <span class="pull-right">
                    <button type="submit" class="btn btn-primary">Register</button>
                    </span>
                </div>

            </div>
        </form>
    </div>
</div>
