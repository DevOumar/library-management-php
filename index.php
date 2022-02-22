<?php
require 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="fr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BIBLIOTHEQUE | ACCUEIL</title>

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


  <div id="wrapper" >

    <nav class="navbar navbar-custom navbar-fixed-top  " role="navigation">
      <div class="top-area  ">
        <div class="container ">
          <div class="row ">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left"> <?php
     setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
      echo strftime('%A %d %B %Y  %H:%M:%S') ; ?> </p>
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
          <a class="navbar-brand" href="index">
                    <span class="logo-lg text-white">INTEC SUP</span>
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right"></span>Espace administrateur <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="connexion-administrateur">Se connecter</a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right">Nouv</span>Espace étudiant <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="inscription">S'inscrire</a></li>
                <li><a href="connexion">Se connecter</a></li>
              </ul>
            </li>
            <li><a href="contact">Contactez-nous</a></li>
          
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
              <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                <h2 class="h-ultra">Bibliothèque INTEC SUP</h2>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                <h4 class="h-light">Les meilleurs sont ici !</h4>
              </div>
              <div class="well well-trans">
                <div class="wow fadeInRight" data-wow-delay="0.1s">

                  <ul class="lead-list">
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Surfez en toute simplicité !</strong></span></li>
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Des meilleurs livres disponibles !</strong></span></li>
                    <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Choisissez votre livre préféré !</strong></span></li>
                  </ul>
                  <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                    
                  </p>
                </div>
              </div>


            </div>
            <div class="col-lg-6">
              <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                <img src="user/img/dummy/img-1.jpg" class="img-responsive" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: works -->
    <section id="facilities" class="home-section paddingbot-60">
      <div class="container marginbot-50">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="section-heading text-center">
                <h2 class="h-bold">Un espace de lecture !</h2>
                <p>Accédez à votre compte bibliothèque partout.</p>
              </div>
            </div>
            <div class="divider-short"></div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="wow bounceInUp" data-wow-delay="0.2s">
              <div id="owl-works" class="owl-carousel">
                <div class="item"><a href="user/img/photo/7.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="user/img/works/1@2x.jpg"><img src="user/img/photo/7.jpg" class="img-responsive" alt="img"></a></div>
                <div class="item"><a href="user/img/photo/4.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="user/img/photo/4.jpg" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="user/img/photo/3.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="user/img/photo/3.jpg" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="user/img/photo/4.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="user/img/photo/4.jpg" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="user/img/photo/4.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="user/img/photo/4.jpg" class="img-responsive " alt="img"></a></div>
                <div class="item"><a href="user/img/photo/6.jpg"  data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img src="user/img/photo/6.jpg" class="img-responsive " alt="img"></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: works -->


    <!-- Section: testimonial -->
    <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

      <div class="carousel-reviews broun-block">
        <div class="container">
          <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner">
      
                <div class="item active">
                              <?php
        $req=$dbh->query("SELECT message,FullName,Cycle,Photo FROM tblstudents WHERE message IS NOT NULL  order by id desc limit 0,3");
while ($data=$req->fetch()) {
  # code...

    ?>
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Bibliothèque INTEC SUP</a>
                      <div class="mark">Mon témoignage: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>   
                        <?php
echo $data['message'] ;
                        ?> 
                      </p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="<?php
echo $data['Photo'] ;
                        ?>" alt="" class="person img-circle" />
                      <a title="" href="#"><?php
echo $data['FullName'] ;
                        ?></a>
                      <span><?php
echo $data['Cycle'] ;
                        ?></span>
                    </div>
                  </div>
                  
                   <?php

                }
                ?>
                </div>
               
                <div class="item">
                     <?php
        $req=$dbh->query("SELECT message,FullName,Cycle,Photo FROM tblstudents WHERE message IS NOT NULL order by id desc limit 3,3");
while ($data=$req->fetch()) {
  # code...

    ?>
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Bibliothèque INTEC SUP</a>
                      <div class="mark">Mon témoignage <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p>
                        
                         <?php
echo $data['message'] ;
                        ?> 
                      </p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src=" <?php
echo $data['Photo'] ;
                        ?> " alt="" class="person img-circle" />
                      <a title="" href="#"> <?php
echo $data['FullName'] ;
                        ?> </a>
                      <span> <?php
echo $data['Cycle'] ;
                        ?> </span>
                    </div>
                  </div>
                 <?php
}
                 ?>
                </div>
           <!--vvv -->
            <div class="item">
               <?php
        $req=$dbh->query("SELECT message,FullName,Cycle,Photo FROM tblstudents WHERE message IS NOT NULL order by id desc limit 6,3");
while ($data=$req->fetch()) {
  # code...

    ?>
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Bibliothèque INTEC SUP</a>
                      <div class="mark">Mon témoignage: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p><?php
echo $data['message'] ;
                        ?></p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="<?php
echo $data['Photo'] ;
                        ?>" alt="" class="person img-circle" />
                      <a title="" href="#"><?php
echo $data['FullName'] ;
                        ?></a>
                      <span><?php
echo $data['Cycle'] ;
                        ?></span>
                    </div>
                  </div>
                  <?php

                }
                ?>
                </div>
                <div class="item">
               <?php
        $req=$dbh->query("SELECT message,FullName,Cycle,Photo FROM tblstudents WHERE message IS NOT NULL order by id desc limit 9,3");
while ($data=$req->fetch()) {
  # code...

    ?>
                  <div class="col-md-4 col-sm-6">
                    <div class="block-text rel zmin">
                      <a title="" href="#">Bibliothèque INTEC SUP</a>
                      <div class="mark">Mon témoignage: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3"
                          class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                      </div>
                      <p><?php
echo $data['message'] ;
                        ?></p>
                      <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                    </div>
                    <div class="person-text rel text-light">
                      <img src="<?php
echo $data['Photo'] ;
                        ?>" alt="" class="person img-circle" />
                      <a title="" href="#"><?php
echo $data['FullName'] ;
                        ?></a>
                      <span><?php
echo $data['Cycle'] ;
                        ?></span>
                    </div>
                  </div>
                  <?php

                }
                ?>
                </div>
          <!-- -->
              </div>

              <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
              <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: testimonial -->

<?php
include('user/footer.php');
?>

  </div>
  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

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

  <script>if( window.self == window.top ) { (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-55234356-4', 'auto'); ga('send', 'pageview'); } </script>
</body>


</html>
