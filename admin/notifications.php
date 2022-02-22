<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
  header('location:index');
}
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
  header('Location: gestion-cycle');
}
else{
  if(isset($_GET['del']))
  {
    $id=$_GET['del'];
    $sql = "DELETE from cycle  WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':id',$id, PDO::PARAM_STR);
   $query -> execute();
    $_SESSION['delmsg']="Cycle supprimé avec succès !";
    header('location:gestion-cycle');

  }


  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>BIBLIOTHEQUE | NOTIFICATIONS </title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
<meta charset="utf-8">

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">
<link rel="icon" href="dist/img/logo1.png" type="image/png" />
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/style.css">
<link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="dist/plugins/hmenu/ace-responsive-menu.css">

<!-- DataTables -->
<link rel="stylesheet" href="dist/plugins/datatables/css/dataTables.bootstrap.min.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
 <?php include('includes/header.php');?>
  <!-- MENU SECTION END-->
</div>
</div>  
<div class="row">
  

</div>
  <!-- Main Nav -->
  </div>
</div>
<div class="panel-body">
  
    <div class="content-header sty-one">
      <h1 class="text-black">Envoi d'email automatique</h1>
      
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="m-b-3">
        <div  style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info"></i> Note:</h4>
          </div>
          <form method="POST">
            <center>
          <button class="btn btn-primary" name="clic">Notifier</button>
          </center>
          </form>
          <?php
          if (isset($_POST['clic'])) {
          $dates=date('d/m/Y');
 $emprunt=$dbh->query("SELECT * FROM tblissuedbookdetails where ReturnDate IS NULL AND Delai_livre='$dates' ");
 While ($data=$emprunt->fetch()) {
 $id=$data['StudentID'];
  $nom_livre=$data['BookId'];
  $reqe=$dbh->query("SELECT * FROM tblbooks where id='$nom_livre' ");
  $table_etudiant=$dbh->query("SELECT * FROM tblstudents where StudentID='$id'  ");
  if ($datas_livre=$reqe->fetch()) {
  if ($datas=$table_etudiant->fetch()) {
     $email=$datas['EmailId'];

    $emailTo = $email;
      $headers="MIME-Version: 1.0\r\n";
    $headers.='From:"Bibliothèque-INTECSUP"<$email>'."\n";
    $headers.="Content-Type:text/html; charset=iso-8859-1\r\n";
    $headers.="Content-Transfer-Encoding: 8bit\r\n";

    $message='
    Salut '.$datas['FullName'].', suite à votre emprunt du livre : '.$datas_livre['BookName'].' vous êtes en retard de retour donc veuillez retourner avec le livre au plutôt possible .<br><br>

    -------------------------------------------<br><br>
    Ceci est un mail automatique, Merci de ne pas y répondre.
    </div>
    </body>
    </html>
    ';

    mail($emailTo, "Retour de livre emprunté", $message, $headers);
}
 }
 }
          
          ?>
<div class="content">
      <div class="m-b-3">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info text-center"></i> Tous les utilisateurs avec des livres empruntés dont le délai de retour est arrivé à écheance ont été notifiés avec succès !</h4>
      </div>
      </div>
      </div>
      <?php
       }
       ?>
  <!-- /.content-wrapper -->
  <?php include('includes/footer.php');?>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script> 

<!-- jQuery UI 1.11.4 --> 
<script src="dist/plugins/jquery-ui/jquery-ui.min.js"></script>
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