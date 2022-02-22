<?php
if(isset($_SESSION['timestamp']))
  { // si $_SESSION['timestamp'] existe
  if($_SESSION['timestamp'] + 900 > time())
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
  setcookie('accepte-cookie', 'true', time() + 365*24*3600, null, null, false, true);
  header('Location: mentions-legales');
}
else{
  
  if(isset($_GET['del']))
  {
    $id=$_GET['del'];
    $sql = "DELETE from annee  WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':id',$id, PDO::PARAM_STR);
    $query -> execute();
    $_SESSION['delmsg']="Année supprimée avec succès !";
    header('location:gestion-annee');

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
          <h5 class="text-white m-b-0">Mentions légales</h5>
        </div>
        <div class="card-body">
   <h2>À propos du site</h2>
<p>Vous êtes actuellement connecté au site gestion de Bibliothèque.<br />
L’ensemble des données et les informations présentes sur le site Internet <strong>www.bibliotheque-intecsup.com</strong> sont mises à la disposition du public(BIBLIOTHEQUE).<br />
En consultant notre site internet <strong>www.bibliotheque-intecsup.com</strong>, vous vous engagez à accepter les termes et les conditions contenus dans cette notice.</p>
<h2>Protection des données personnelles</h2>
<p>Ce site accorde une importance toute particulière au droit à la vie privée des internautes et s&rsquo;engage à protéger leurs données personnelles. Certaines données personnelles n&rsquo;sont demandées aux utilisateurs pour leur permettre de consulter le site Internet <strong>www.bibliotheque-intecsup.com</strong>.</p>
<p>Chaque formulaire présent sur le site restreint au strict nécessaire la collecte des données personnelles </p>
<p>Sur chaque formulaire présent sur le site <strong>www.bibliotheque-intecsup.com</strong>, une ou plusieurs case(s) à cocher vous permet(tent) de donner explicitement votre accord pour la collecte et le traitement des données personnelles demandées. Cela permet à ce site de s&rsquo;assurer que les données personnelles qui lui sont transmises peuvent effectivement être utilisées pour la ou les finalité(s) explicitement annoncée(s) sur le formulaire et acceptée(s) par l&rsquo;internaute. Chaque case cochée correspond à une finalité particulière de traitement des données personnelles et fera office de preuve légale du consentement de l&rsquo;internaute.</p>
<p>En aucun cas ce site ne pourra utiliser ces données personnelles pour une finalité autre que celle(s) explicitement annoncée(s) et acceptée(s) par l&rsquo;internaute. De même, ces données personnelles ne pourront être transmises ou cédées à des tiers sans une mention explicite de cette possibilité sur le formulaire.</p>
<p>Les données personnelles recueillies sur le site <strong>www.bibliotheque-intecsup.com</strong> sont traitées selon des protocoles sécurisés qui limitent considérablement les risques d&rsquo;interception ou de récupération par des tiers. Soyez cependant vigilant, ne divulguez pas d’informations personnelles inutiles ou sensibles lorsque vous utilisez nos formulaires. Si vous souhaitez nous communiquer de telles informations, veuillez privilégier la téléphonique.</p>
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
<?php } ?>