 <?php
session_start();
error_reporting(0);
include('admin/includes/config.php');
if($_SESSION['login']!=''){
  $_SESSION['login']='';
}
if(isset($_POST['login']))
{
  //code for captach verification
  if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
   $_SESSION['error']="Code de vérification incorrecte, veuillez réessayer !";
 } 
 else {
  $email=$_POST['emailid'];
  $password=md5($_POST['password']);
  $sql ="SELECT EmailId,Password,StudentId,Cycle,Photo,confirme,FullName FROM tblstudents WHERE EmailId=:email and Password=:password";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> bindParam(':password', $password, PDO::PARAM_STR);
  $query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
   foreach ($results as $result) {
     $_SESSION['stdid']=$result->StudentId;
     if($result->confirme==1)
     {
      $_SESSION['login']=$_POST['emailid'];
      $_SESSION['fullname']=$result->FullName;
      $_SESSION['studentid']=$result->StudentId;
      $_SESSION['avatar']=$result->Photo;
      $_SESSION['cycle']=$result->Cycle;
      echo "<script type='text/javascript'> document.location ='dashboard'; </script>";
    } else {
      $_SESSION['error']="Adresse e-mail et/ou Mot de passe incorrecte !";

    }
  }

}

else{
  $_SESSION['error']="Votre compte n'est pas activé !";
}
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UTILISATEUR | CONNEXION</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

  <!-- v4.0.0-alpha.6 -->
  <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link rel="icon" href="dist/img/logo1.png" type="image/png" />
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
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-box-body">
      <h3 class="login-box-msg">Utilisateur | connexion</h3>
      <?php if($_SESSION['error']!="")
      {?>
        <div class="col-mb-9">
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
<?php } ?>
<form role="form" method="post">
  <div class="form-group has-feedback">
    <input class="form-control" type="text" name="emailid" placeholder="Adresse E-mail" required autocomplete="off" />
  </div>
  <div class="form-group has-feedback">
    <input class="form-control" type="password" name="password" placeholder="Mot de passe" minlength="5" required autocomplete="off"  />
  </div>
  <div>
    <div class="col-xs-8">
      <div class="checkbox icheck">
        <label>
          <a href="reinitialisation" class="pull-right"><i class="fa fa-lock"></i> Mot de passe oublié?</a> </div>
        </div>
        
        <label>Verification code : </label>
        <div>
          <input type="text" class="form-control1"  name="vercode" maxlength="5" autocomplete="off" required  style="height:25px;" />&nbsp;<img src="captcha.php">
        </div> 
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Se connecter</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    
    <div class="m-t-2">
      <a href="inscription" class="text-center">Inscrivez-vous facilement !</a></div>
      <a href="index" class="text-center">Retourner dans la page d'accueil !</a></div>
    </div>

    <!-- /.login-box-body --> 
  </div>
  <!-- /.login-box --> 

  <!-- jQuery 3 --> 
  <script src="dist/js/jquery.min.js"></script> 


  <!-- template --> 
  <script src="dist/js/niche.js"></script>
</body>
</html>
