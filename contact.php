<!DOCTYPE html>
<html lang="fr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BIBLIOTHEQUE | CONTACT</title>

  <!-- css -->
  <link rel="icon" href="dist/img/logo1.png" type="image/png" />
  <link href="user/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="user/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="user/plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="user/css/nivo-lightbox.css" rel="stylesheet" />
  <link href="user/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="user/css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="user/css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="user/css/animate.css" rel="stylesheet" />
  <link href="user/css/style.css" rel="stylesheet">
  <!-- boxed bg -->
  <link id="bodybg" href="user/bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="user/color/default.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


  <div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left"> <?php
     setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
      echo strftime('%A %d %B %Y à %H:%M:%S') ; ?> </p>
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">Téléphone (+223) 78 88 02 02</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          <a class="navbar-brand" href="contact">
                   <span class="logo-lg text-white">INTEC SUP</span>
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index">Accueil</a></li>
            <li class="dropdown">
              <a href="user/#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right"></span>Espace administrateur <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="user/../connexion-administrateur">Se connecter</a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a href="user/#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right">Nouv</span>Espace étudiant <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="user/../inscription">S'inscrire</a></li>
                <li><a href="user/../connexion">Se connecter</a></li>
              </ul>
            </li>
          
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>


    <!-- Section: intro -->
    <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              


            </div>
            <div class="col-lg-6">
              <div class="form-wrapper">
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                  <div class="panel panel-skin">
                    <div class="panel-heading">
                      <h3 class="panel-title "><span class="fa fa-envelope-o"></span>Contactez-nous <small>(C'est gratuit !)</small></h3>
                    </div>
                    <div class="panel-body">
                      <!-- <div id="sendmessage">Your message has been sent. Thank you!</div> 
                      <div id="errormessage"></div> -->

                      <form id="contact-form" method="post" action="" role="form">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="firstname">Votre prénom</label>
                              <input type="text" name="firstname" placeholder="Votre prénom" id="firstname" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                             <p class="comments"></p>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Votre nom</label>
                              <input type="text" name="name" placeholder="Votre nom"  id="name" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                             <p class="comments"></p>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">Votre adresse e-mail</label>
                              <input type="email" placeholder="Votre adresse e-mail" name="email" id="email" class="form-control input-md" data-rule="email" data-msg="Please enter a valid email">
                             <p class="comments"></p>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="phone">Votre numéro</label>
                              <input type="text" placeholder="Votre téléphone" name="phone" id="phone" maxlength="8" class="form-control input-md" data-rule="required" data-msg="The phone number is required">
                             <p class="comments"></p>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                          <label for="message">Message</label>
                                <textarea id="message" name="message" class="form-control" placeholder="Votre Message" rows="4"></textarea>
                               <p class="comments"></p>
                                
          <input type="submit" value="Envoyer" class="btn btn-skin btn-block btn-lg">

                      </form>
                   

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- /Section: intro -->

    <!-- Section: boxes -->
    
    <!-- /Section: boxes -->
    <!-- Section: works -->
    

      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div id="owl-works" class="owl-carousel">
                <div class="item"><a href="user/img/photo/img-1.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="user/img/photo/img-1.jpg" class="img-responsive" alt="img"></a></div>
                <div class="item"><a href="user/img/photo/4.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="user/img/photo/4.jpg" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="user/img/photo/3.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="user/img/photo/3.jpg" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="user/img/photo/4.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="user/img/photo/4.jpg" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="user/img/photo/img-1.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="user/img/photo/img-1.jpg" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="user/img/photo/6.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img src="user/img/photo/6.jpg" class="img-responsive " alt="img"></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: works -->


    <!-- Section: testimonial -->
    
    <!-- /Section: testimonial -->

    <?php
include('user/footer.php');
?>
  </div>
  <a href="user/#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

  <!-- Core JavaScript Files -->
  <script src="user/js/jquery.min.js"></script>
  <script src="user/js/bootstrap.min.js"></script>
  <script src="user/js/jquery.easing.min.js"></script>
  <script src="user/js/wow.min.js"></script>
  <script src="user/js/jquery.scrollTo.js"></script>
  <script src="user/js/jquery.appear.js"></script>
  <script src="user/js/stellar.js"></script>
  <script src="user/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
  <script src="user/js/owl.carousel.min.js"></script>
  <script src="user/js/nivo-lightbox.min.js"></script>
  <script src="user/js/custom.js"></script>
  <script src="user/contactform/contactform.js"></script>
  <script src="js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.3/jquery.min.js"></script>

  <script>if( window.self == window.top ) { (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-55234356-4', 'auto'); ga('send', 'pageview'); } </script>
</body>


</html>
