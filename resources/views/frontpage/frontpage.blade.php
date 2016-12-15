<!DOCTYPE html>
<html>

<head>

    @include('includes.head')

    <title>iParked - find you car easily</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/iparked.css" rel="stylesheet">

</head>

<body>

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">iParked</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="#about">About</a></li>
                    <li><a class="page-scroll" href="#download">Download</a></li>
                    <li><a class="page-scroll" href="#team">Team</a></li>
                    <li><a class="page-scroll" href="#contact">Contact</a></li>
                    @if( Auth::check() )
                        <li><a href="/dashboard">Manage</a></li>
                        <li><a href="#" onclick="$.get('/logout', function(){location.reload();});">Logout</a></li>
                    @else
                        <li><a data-toggle="modal" data-target="#login-modal" href="#">Login</a></li>
                    @endif

                </ul>
            </div>
        <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <header id="page-top">
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Find your car easily</h1>
                <hr>
                <p>You forgot where you parked your car? Our application will help you find it. It works both indoor and outdoor by using modern Bluetooth Low Energy beacons and a little bit of our magic.</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Tell me more</a>
            </div>
        </div>
    </header>


    <section class="bg-primary" id="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">How it works</h2>
                    <hr class="light">
                    <p class="text-faded-1">iParked aims to solve the problem of finding car in huge parking lots by offering indoor and outdoor
                      tracking of the car. There are different types of parking lots, some of them are outdoor in which we are going to use GPS technology.
                      But in the case of indoor parkings which there is no availability for GPS we devised to use BLE Beacons.
                      This technology allow us to localize objects in a short range. A set of beacons will be placed in underground garages
                      and provide tracking process for both car, which has another beacon, and user position. Also we provide a profile
                      manager for parking administrator in order to controll and managing the Beacons.</p>
                    <a href="javascript:void(0)" class="page-scroll btn btn-default btn-xl sr-button">Channels</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-white sr-icons"></i>
                        <h3>Diamond</h3>
                        <p class="text-muted">diamond.iparked.dev</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-white sr-icons"></i>
                        <h3>Telegram</h3>
                        <p class="text-muted">iparked.dev</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-white sr-icons"></i>
                        <h3>newspaper</h3>
                        <p class="text-muted">iparked.dev</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-white sr-icons"></i>
                        <h3>Heart</h3>
                        <p class="text-muted">iparked.heart</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-dark" id="download">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Here is the application on Google Play</h2>
                    <hr class="light">
                    <p class="text-faded">Try using the iparked application by clicking on the link below</p>
                    <a href="https://play.google.com/store/apps/details?id=com.dsd2016.iparked_android" class="page-scroll btn btn-default btn-xl sr-button">Google Play link</a>
                </div>
            </div>
        </div>
    </section>

    <section class="" id="team">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Polimi Members</h2>
                    <hr class="light">
                    <p>The team consists of 6 students, three of them are from Polimi</p>
                </div>
            </div>

            <div class="row no-gutter">

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/image5.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Scrum Master
                            </div>
                            <div class="project-name">
                                Riccardo
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/image2.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Developer
                            </div>
                            <div class="project-name">
                                Saeed Ektesabi
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/image3.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Developer
                            </div>
                            <div class="project-name">
                                Mohsen Kashfi
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">FER Members</h2>
                    <hr class="light">
                    <p>Below they are FER Students</p>
                </div>
            </div>

            <div class="row no-gutter">

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/image4.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Developer
                            </div>
                            <div class="project-name">
                                Hrvoje
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/image1.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Product Owner
                            </div>
                            <div class="project-name">
                                Bruno Vunderl
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/image66.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Developer
                            </div>
                            <div class="project-name">
                                Mihovil
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Find us on the GitHub</h2>
                    <hr class="primary">
                    <p><a href="https://github.com/DSD2016">https://github.com/DSD2016</p>
                </div>

                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-678-9</p>
                </div>

                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:info@iparked.com">info@iparked.com</a></p>
                </div>
            </div>
        </div>
    </section>

    @include('modals.login')
    @include('modals.register')
    @include('modals.forgotPassword')

    <!-- Javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/creative.js"></script>

    <script>
        $(function(){

            $(document).on('submit', '#register-form', function(e) {
                e.preventDefault();

                $('input+small').text('');
                $('input').parent().removeClass('has-error');

                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json"
                })

                .done(function(data) {
                    window.open('/dashboard','_self')
                })

                .fail(function(data) {
                });
            });

            $(document).on('submit', '#login-form', function(e) {
                console.log('a');
                e.preventDefault();

                $('input+small').text('');
                $('input').parent().removeClass('has-error');

                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json"
                })

                .done(function(data) {
                    if (data['loggedin']=='true') {
                        window.open('/dashboard','_self')
                    } else {
                        // write login error
                    }
                })

                .fail(function(data) {
                    console.log('c');
                });
            });

        });

    </script>


</body>

</html>
