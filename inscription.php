<?php 
session_start();
include('admin/includes/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//code for captach verification
  if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
    $_SESSION['error']="Code de vérification incorrecte, veuillez réessayer !";
  } 
  else {    
 
    $StudentId= $_POST['StudentId'];  
    $fname=$_POST['fullname'];
    $mobileno=$_POST['mobileno'];
    $niveau=$_POST['niveau'];
    $email=$_POST['email']; 
    $password=md5($_POST['password']);
    $longueurKey = 15;
    $key = "";
    for($i=1;$i<$longueurKey;$i++)
      $key .= mt_rand(0,9);
    $Confirme=0;
    $sql="INSERT INTO  tblstudents(StudentId,FullName,MobileNumber,Cycle,EmailId,Password,confirmkey,confirme) VALUES(:StudentId,:fname,:mobileno,:niveau,:email,:password,:key,:Confirme)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':StudentId',$StudentId,PDO::PARAM_STR);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
    $query->bindParam(':niveau',$niveau,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':key',$key,PDO::PARAM_STR);
     $query->bindParam(':Confirme',$Confirme,PDO::PARAM_STR);
     $query->execute();
    
    $lastInsertId = $dbh->lastInsertId();

      $emailTo = $email;
      $headers="MIME-Version: 1.0\r\n";
    $headers.='From:"Bibliothèque-Inscription"<$email>'."\n";
    $headers.="Content-Type:text/html; charset=iso-8859-1\r\n";
    $headers.="Content-Transfer-Encoding: 8bit\r\n";

    $message='
    Pour activer votre compte, veuillez cliquez sur le lien ci-dessous.<br><br>
    <a href="http://localhost/Bibliotheque/confirmation?FullName='.urlencode($fname).'&key='.$key.'">Activer votre compte.</a><br><br>

    -------------------------------------------<br><br>
    Ceci est un mail automatique, Merci de ne pas y répondre.
    </div>
    </body>
    </html>
    ';

    mail($emailTo, "Activation de compte", $message, $headers);

    if($lastInsertId)
    {
      $_SESSION['msg']="Inscription réussie. Nous avons envoyé par votre email votre lien d'activation. Connectez-vous pour activer votre compte.";
    }
    else {
      $_SESSION['error']="Un problème est survenu, veuillez réessayer !";
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
  <meta charset="utf-8">
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
    if(document.signup.password.value!= document.signup.confirmpassword.value)
    {
      alert("Le mot de passe et le champ de confirmation du mot de passe ne correspondent pas !");
      document.signup.confirmpassword.focus();
      return false;
    }
    return true;
  }
</script>
<script>
  function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data:'emailid='+$("#emailid").val(),
      type: "POST",
      success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
  }
</script>  
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-box-body">
      <h3 class="login-box-msg">Utilisateur | inscription</h3>
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
<form name="signup" method="post" onSubmit="return valid();">
 <div class="form-group has-feedback">
   <input class="form-control" type="text" name="StudentId" placeholder="Numéro matricule" maxlength="20" autocomplete="off" required />
 </div>
 <div class="form-group has-feedback">
   <input class="form-control" type="text" name="fullname" placeholder="Nom complet" autocomplete="off" required />
 </div>
 <div class="form-group has-feedback">
  <input class="form-control" type="text" name="mobileno" placeholder="Numéro de téléphone" maxlength="8" autocomplete="off" required />
</div>
<div class="form-group">
  <select class="custom-select form-control" name="niveau" required="required">
    <option value=""> Séléctionner votre cycle d'études</option>
    <?php 

    $sql = "SELECT * from  cycle ";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $result)
        {               ?>  
          <option value="<?php echo htmlentities($result->Nom_cycle);?>"><?php echo htmlentities($result->Nom_cycle);?></option>
        <?php }} ?> 
      </select>
    </div>
    <div class="form-group has-feedback">
      <input class="form-control" type="email" name="email" placeholder="Adresse E-mail" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required  />
      <span id="user-availability-status" style="font-size:12px;"></span> 
    </div>
    <div class="form-group has-feedback">
     <input class="form-control" type="password" minlength="5" maxlength="20" name="password" placeholder="Mot de passe" autocomplete="off" required  />
   </div>
   <div class="form-group has-feedback">
     <input class="form-control"  type="password" minlength="5" maxlength="20" name="confirmpassword" placeholder="Retapez mot de passe" autocomplete="off" required  />
   </div>
   <div>
    <div>

      <label>Verification code : </label>
      <div>
        <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
      </div>
      <!-- /.col -->
      <div class="col-xs-4 m-t-1">
        <button type="submit"  name="signup" id="submit" class="btn btn-primary btn-block btn-flat">S'inscrire</button>
      </div>
      <!-- /.col --> 
    </div>
  </form>
  <div class="m-t-2">
    <a href="connexion" class="text-center">Connectez-vous facilement !</a></div>
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

































