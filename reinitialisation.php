<?php
session_start();
error_reporting(0);
include('admin/includes/config.php');
if(isset($_POST['change']))
{
  //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        $_SESSION['error']="Code de vérification incorrecte, veuillez réessayer !";
    } 
        else {
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT EmailId FROM tblstudents WHERE EmailId=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="UPDATE tblstudents set Password=:newpassword where EmailId=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$_SESSION['msg']="Votre mot de passe est changé avec succès !";
}
else {
  $_SESSION['error']="Adresse E-mail et/ou numéro de téléphone incorrecte !";
}
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>UTILISATEUR | INSCRIPTION</title>
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
 <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Le mot de passe et le champ de confirmation du mot de passe ne correspondent pas !");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Utilisateur | Réinitialisation</h3>
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
    <div class="col-mb-9">
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
    <form role="form" name="chngpwd" method="post" onSubmit="return valid();">
      <div class="form-group has-feedback">
        <input class="form-control" type="email" name="email" placeholder="Adresse E-mail" required autocomplete="off" />
   <span id="user-availability-status" style="font-size:12px;"></span> 
      </div>
      <div class="form-group has-feedback">
      <input class="form-control" type="text" name="mobile" placeholder="Numéro de téléphone" maxlength="8" required autocomplete="off" />
      </div>
      <div class="form-group has-feedback">
      <input class="form-control" type="password" minlength="5" maxlength="20" name="newpassword" placeholder="Mot de passe" required autocomplete="off"  />
      </div>
      <div class="form-group has-feedback">
       <input class="form-control" type="password" minlength="5" maxlength="20" name="confirmpassword" placeholder="Retapez mot de passe" required autocomplete="off"  />
      </div>
       <div class="form-group">
<label>Verification code : </label>
<input type="text" class="form-control1"  name="vercode" maxlength="5" autocomplete="off" required  style="height:25px;" />&nbsp;<img src="captcha.php">
</div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" name="change" class="btn btn-primary btn-block btn-flat">Réinitialiser</button>
        </div>
        <div class="m-t-2">
    <a href="connexion" class="text-center">Connectez-vous facilement !</a></div>
  </div>
        <!-- /.col --> 
      </div>
    </form>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script>

</body>
</html>