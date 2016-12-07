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
                    <li><a class="" data-toggle="modal" data-target="#login-modal" href="#">Login</a></li>
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
                <p>You forgor where you parked your car? Our application will help you find it. It works both indoor and outdoor by using modern Bluetooth Low Energy beacons and a little bit of our magic.</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Tell me more</a>
            </div>
        </div>
    </header>


    <section class="bg-primary" id="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">About text</h2>
                    <hr class="light">
                    <p class="text-faded">Hodor hodor HODOR! Hodor HODOR hodor, hodor hodor hodor... Hodor hodor hodor. Hodor. Hodor, hodor. Hodor. Hodor, hodor - hodor... Hodor hodor hodor, hodor, hodor hodor. Hodor. Hodor hodor hodor, hodor, hodor hodor. Hodor, hodor hodor hodor hodor! Hodor. Hodor HODOR hodor, hodor hodor... Hodor hodor hodor, hodor. Hodor hodor, hodor. Hodor hodor? Hodor, hodor. Hodor. Hodor, hodor hodor - hodor.</p>
                    <a href="javascript:void(0)" class="page-scroll btn btn-default btn-xl sr-button">hodor</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-white sr-icons"></i>
                        <h3>hodor</h3>
                        <p class="text-muted">Hodor hodor HODOR! Hodor HODOR hodor</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-white sr-icons"></i>
                        <h3>hodor</h3>
                        <p class="text-muted">Hodor hodor HODOR! Hodor HODOR hodor</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-white sr-icons"></i>
                        <h3>hodor</h3>
                        <p class="text-muted">Hodor hodor HODOR! Hodor HODOR hodor</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-white sr-icons"></i>
                        <h3>hodor</h3>
                        <p class="text-muted">Hodor hodor HODOR! Hodor HODOR hodor</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-dark" id="download">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Download text</h2>
                    <hr class="light">
                    <p class="text-faded">Hodor hodor - hodor - hodor; hodor hodor... Hodor hodor hodor hodor! Hodor hodor...</p>
                    <a href="javascript:void(0)" class="page-scroll btn btn-default btn-xl sr-button">Google Play link</a>
                </div>
            </div>
        </div>
    </section>

    <section class="" id="team">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Team text</h2>
                    <hr class="light">
                    <p>Hodor hodor - hodor - hodor; hodor hodor... Hodor hodor hodor hodor! Hodor hodor...</p>
                </div>
            </div>

            <div class="row no-gutter">

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/generic.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Team role
                            </div>
                            <div class="project-name">
                                Member name
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/generic.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Team role
                            </div>
                            <div class="project-name">
                                Member name
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/generic.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Team role
                            </div>
                            <div class="project-name">
                                Member name
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Team text</h2>
                    <hr class="light">
                    <p>Hodor hodor - hodor - hodor; hodor hodor... Hodor hodor hodor hodor! Hodor hodor...</p>
                </div>
            </div>

            <div class="row no-gutter">

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/generic.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Team role
                            </div>
                            <div class="project-name">
                                Member name
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/generic.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Team role
                            </div>
                            <div class="project-name">
                                Member name
                            </div>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box">
                    <img src="img/team/thumbnails/generic.jpg" class="img-responsive center-block" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                Team role
                            </div>
                            <div class="project-name">
                                Member name
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
                    <p>Hodor hodor hodor hodor</p>
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


</body>

</html>
