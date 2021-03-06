<?php 
session_start();
include('admin/includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
{   
  header('location:index');
}
if(isset($_SESSION['timestamp']))
  { // si $_SESSION['timestamp'] existe
  if($_SESSION['timestamp'] + 600 > time())
  {
    $_SESSION['timestamp'] = time();
  }
  else{ 
    header('location: deconnexion'); 
  }
}
else
{ 
  $_SESSION['timestamp'] = time(); 
}
if(isset($_GET['accepte-cookie'])){
  setcookie('accepte-cookie', 'true', time() + 365*24*3600);
  header('Location: mentions-legales');
}


  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>BIBLIOTHEQUE | MENTION LEGALES</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="dist/plugins/hmenu/ace-responsive-menu.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">

   <!------MENU SECTION START-->
  <?php include('includes/header.php');?>
  <!-- MENU SECTION END-->

  <div class="row">
   

  </div>

</div>
</div>
    <div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-outline">
        <div class="card-header bg-primary">
          <h5 class="text-white m-b-0">Mentions l??gales</h5>
        </div>
        <div class="card-body">
   <h2>?? propos du site</h2>
<p>Vous ??tes actuellement connect?? au site gestion de Biblioth??que.<br />
L???ensemble des donn??es et les informations pr??sentes sur le site Internet <strong>www.bibliotheque-intecsup.com</strong> sont mises ?? la disposition du public(BIBLIOTHEQUE).<br />
En consultant notre site internet <strong>www.bibliotheque-intecsup.com</strong>, vous vous engagez ?? accepter les termes et les conditions contenus dans cette notice.</p>
<h2>Protection des donn??es personnelles</h2>
<p>Ce site accorde une importance toute particuli??re au droit ?? la vie priv??e des internautes et s&rsquo;engage ?? prot??ger leurs donn??es personnelles. Certaines donn??es personnelles n&rsquo;sont demand??es aux utilisateurs pour leur permettre de consulter le site Internet <strong>www.bibliotheque-intecsup.com</strong>.</p>
<p>Chaque formulaire pr??sent sur le site restreint au strict n??cessaire la collecte des donn??es personnelles </p>
<p>Sur chaque formulaire pr??sent sur le site <strong>www.bibliotheque-intecsup.com</strong>, une ou plusieurs case(s) ?? cocher vous permet(tent) de donner explicitement votre accord pour la collecte et le traitement des donn??es personnelles demand??es. Cela permet ?? ce site de s&rsquo;assurer que les donn??es personnelles qui lui sont transmises peuvent effectivement ??tre utilis??es pour la ou les finalit??(s) explicitement annonc??e(s) sur le formulaire et accept??e(s) par l&rsquo;internaute. Chaque case coch??e correspond ?? une finalit?? particuli??re de traitement des donn??es personnelles et fera office de preuve l??gale du consentement de l&rsquo;internaute.</p>
<p>En aucun cas ce site ne pourra utiliser ces donn??es personnelles pour une finalit?? autre que celle(s) explicitement annonc??e(s) et accept??e(s) par l&rsquo;internaute. De m??me, ces donn??es personnelles ne pourront ??tre transmises ou c??d??es ?? des tiers sans une mention explicite de cette possibilit?? sur le formulaire.</p>
<p>Les donn??es personnelles recueillies sur le site <strong>www.bibliotheque-intecsup.com</strong> sont trait??es selon des protocoles s??curis??s qui limitent consid??rablement les risques d&rsquo;interception ou de r??cup??ration par des tiers. Soyez cependant vigilant, ne divulguez pas d???informations personnelles inutiles ou sensibles lorsque vous utilisez nos formulaires. Si vous souhaitez nous communiquer de telles informations, veuillez privil??gier la t??l??phonique.</p>
            <div class="clear"></div>
          </div><!-- .skp-post-content -->
        </div><!-- .skp-wrap -->
      </div><!-- skp-article -->
    </article><!-- .skp-post -->
  </section><!-- #skp-content -->
    </div><!-- #skp-main -->
    <div class="clear"></div>
         
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs"></div>
   <?php include('includes/footer.php');?>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script>
<script src="dist/plugins/hmenu/ace-responsive-menu.js" type="text/javascript"></script> 
<!--Plugin Initialization--> 
<script type="text/javascript">
         $(document).ready(function () {
             $("#respMenu").aceResponsiveMenu({
                 resizeWidth: '768', // Set the same in Media query       
                 animationSpeed: 'fast', //slow, medium, fast
                 accoridonExpAll: false //Expands all the accordion menu on click
             });
         });
</script>
</body>
</html>