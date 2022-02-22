<footer>

      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Informations</h5>
                <ul>
                  <li><a href="index">Accueil</a></li>
                  <li>Bibliothèque</li>
                  <li>Adapté sur tous les types d'écrans</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
               
                <ul>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span>  <?php
     setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
      echo strftime('%A %d %B %Y à %H:%M:%S') ; ?>
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> (+223) 78 88 02 02 / 68 88 02 02
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span> bibliotheque-intecsup@gmail.com
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Lieu</h5>
                <p>Hamdallaye ACI-2000</p>

              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Suivez-nous</h5>
                <ul class="company-social">
                  <li class="social-facebook"><a href="https://www.facebook.com/intecsup"><i class="fa fa-facebook"></i></a></li>
                  <li class="social-twitter"><a href="https://twitter.com/intec_sup"><i class="fa fa-twitter"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInLeft" data-wow-delay="0.1s">
                <div class="text-left">
                  <p>&copy; <?php echo date('Y'); ?> INTEC SUP |</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="text-right">
                  <div class="credits">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>