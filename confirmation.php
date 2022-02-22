<?php
include('admin/includes/config.php');
error_reporting(0);
if(isset($_GET['FullName'], $_GET['key']) AND !empty($_GET['FullName']) AND !empty($_GET['key'])) {
	$fname = htmlspecialchars(urldecode($_GET['FullName']));
	$key = intval($_GET['key']);
	$requser = $dbh->prepare("SELECT * FROM tblstudents WHERE FullName = ? AND confirmkey = ? ");
	$requser->execute(array($fname, $key));
	$userexist = $requser->rowCount();

	if($userexist ==1) {
	 $user = $requser->fetch();
	 if($user['confirme'] == 0) {
	 	$updateuser = $dbh->prepare("UPDATE tblstudents SET confirme = 1 WHERE FullName = ? AND confirmkey = ?");
	 	$updateuser->execute(array($fname,$key));

	 	$_SESSION['msg']="Votre compte a été activé avec succès !";
}else {
	$_SESSION['msg']="Votre compte a déjà été activé avec succès !";
  }
  }else {
  	$_SESSION['error']="Cet utilisateur n'existe pas !";
   }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>BIBLIOTHEQUE | CONFIRMATION </title>
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
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
   <!-- Logo --> 
      <a href="confirmation" class="logo blue-bg"> 
        <!-- mini logo for sidebar mini 50x50 pixels --> 
        <span class="logo-mini"><img src="dist/img/logo-n.png" alt=""></span> 
        <!-- logo for regular state and mobile devices --> 
        <span class="logo-lg text-white">INTEC SUP</span> </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar blue-bg navbar-static-top">
      <div class="pull-left search-box">
        
        
  </header>
  <!-- Main Nav -->
  </div>
</div>
<div class="panel-body">
  
    <div class="content-header sty-one">
      <h1 class="text-black">Page d'activation de votre compte</h1>
      
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="m-b-3">
        <div  style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info"></i> Note:</h4>
          <?php if($_SESSION['error']!="")
    {?>
      <div class="col-md-6">
        <div class="alert alert-danger" >
         <strong>Message :</strong> 
         <?php echo htmlentities($_SESSION['error']);?>
         <?php echo htmlentities($_SESSION['error']="");?>
       </div>
     </div>
   <?php } ?>
   <?php if($_SESSION['msg']!="")
   {?>
    <div class="col-md-6">
      <div class="alert alert-success" >
       <strong>Message :</strong> 
       <?php echo htmlentities($_SESSION['msg']);?>
       <?php echo htmlentities($_SESSION['msg']="");?>
     </div>
   </div>
 <?php } ?>
 <?php if($_SESSION['updatemsg']!="")
 {?>
  <div class="col-md-6">
    <div class="alert alert-success" >
     <strong>Message :</strong> 
     <?php echo htmlentities($_SESSION['updatemsg']);?>
     <?php echo htmlentities($_SESSION['updatemsg']="");?>
   </div>
 </div>
<?php } ?>


<?php if($_SESSION['delmsg']!="")
{?>
  <div class="col-md-6">
    <div class="alert alert-success" >
     <strong>Message :</strong> 
     <?php echo htmlentities($_SESSION['delmsg']);?>
     <?php echo htmlentities($_SESSION['delmsg']="");?>
   </div>
 </div>
<?php } ?></div>

<div class="content">
      <div class="m-b-3">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info"></i> Note:</h4>
         <a href="connexion">Cliquez ici pour vous connecter !</div></a>
      </div>
      </div>
      </div>
      
       

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
