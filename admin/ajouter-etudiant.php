<?php 
session_start();
include('includes/config.php');
error_reporting(0);


if(isset($_POST['signup']))
{
  $student=$_POST['student'];  
  $fname=$_POST['fname'];
  $mobileno=$_POST['mobileno'];
  $niveau=$_POST['niveau'];
  $email=$_POST['email']; 
  $password=md5(12345);
  $longueurKey= 15;
  $Confirme=1;
  $cle="";
  for($i=1;$i<$longueurKey;$i++)
    $cle.= mt_rand(0,9);
  $query=$dbh->query("SELECT * FROM tblstudents WHERE EmailId='$email'");
  $requ=$query->rowcount();

  if ($requ==1) {
    $_SESSION['error']="Etudiant déjà ajouté !";
    header('location:liste-etudiant');
  }
  else{

    $sql="INSERT INTO tblstudents (StudentId,FullName,EmailId,Cycle,MobileNumber,Password,confirmkey,confirme) VALUES(:student,:fname,:email,:niveau,:mobileno,:password,:cle,:Confirme)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':student',$student,PDO::PARAM_STR);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':niveau',$niveau,PDO::PARAM_STR);
    $query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':cle',$cle,PDO::PARAM_STR);
    $query->bindParam(':Confirme',$Confirme,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId) {
      $_SESSION['msg']="Etudiant ajouté avec succès et son numéro matricule est: " . $student;
      header('location:liste-etudiant');
    }
    else 
    {
      $_SESSION['error']="Un problème est survenu, veuillez réessayez !"; 
      header('location:liste-etudiant');
      
    }
  }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BIBLIOTHEQUE | LISTE ETUDIANT </title>
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

  <!-- DataTables -->
  <link rel="stylesheet" href="dist/plugins/datatables/css/dataTables.bootstrap.min.css">

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
        url: "../check_availability.php",
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
<body>
  <!------MENU SECTION START-->
  <?php include('includes/header.php');?>
  <!-- MENU SECTION END-->
  <!-- Main Nav --> 
  <!-- Content Wrapper. Contains page content -->
</div>
</div>

<!-- Main content -->
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-outline">
        <div class="card-header bg-primary">
          <h5 class="text-white m-b-0">Ajouter Etudiant</h5>
        </div>
        <div class="card-body">
          <form method="POST" onSubmit="return valid();">
            <div class="form-group">
              <label>Numéro matricule<span style="color:red;">*</span></label>
              <input class="form-control" type="text" name="student" placeholder="Numéro matricule" maxlength="20" autocomplete="off" required />
            </div>
            <div class="form-group">
              <label>Nom complet<span style="color:red;">*</span></label>
              <input class="form-control" type="text" name="fname" placeholder="Nom complet" autocomplete="off" required />
            </div>
            <div class="form-group">
              <label>Numéro de téléphone<span style="color:red;">*</span></label>
              <input class="form-control" type="text" name="mobileno" placeholder="Numéro de téléphone" maxlength="8" autocomplete="off" required />
            </div>

            <div class="form-group">
              <label> Cycle<span style="color:red;">*</span></label>
              <select class="custom-select form-control" id="niveau" name="niveau" required="required">
                <option value="">Sélectionner votre cycle d'études</option>
                <?php 

                $sql = "SELECT * FROM  cycle ";
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
                <div class="form-group">
                  <label>Adresse E-mail<span style="color:red;">*</span></label>
                  <input class="form-control" type="email" name="email" placeholder="Adresse E-mail" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required  />
                  <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div>
                  <button type="submit"  name="signup" id="submit" class="btn btn-primary">Ajouter</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    <!-- jQuery 3 --> 
    <script src="dist/js/jquery.min.js"></script> 

    <!-- v4.0.0-alpha.6 --> 
    <script src="dist/bootstrap/js/bootstrap.min.js"></script> 

    <!-- template --> 
    <script src="dist/js/niche.js"></script>
    <!-- DataTable --> 
    <script src="dist/plugins/datatables/jquery.dataTables.min.js"></script> 
    <script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>

    <script src="dist/plugins/table-expo/filesaver.min.js"></script>
    <script src="dist/plugins/table-expo/xls.core.min.js"></script>
    <script src="dist/plugins/table-expo/tableexport.js"></script>
    <script>
      $("table").tableExport({formats: ["xlsx","xls", "csv", "txt"],    });
    </script>

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
   <script>
    $(function () {
      $('#dataList').DataTable({
        "language": {
          "sEmptyTable":     "Aucune donnée disponible dans le tableau",
          "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
          "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
          "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
          "sInfoThousands":  ",",
          "sLengthMenu":     "Afficher _MENU_ éléments",
          "sLoadingRecords": "Chargement...",
          "sProcessing":     "Traitement...",
          "sSearch":         "Rechercher :",
          "sZeroRecords":    "Aucun élément correspondant trouvé",
          "oPaginate": {
            "sFirst":    "Premier",
            "sLast":     "Dernier",
            "sNext":     "Suivant",
            "sPrevious": "Précédent"
          },
          "oAria": {
            "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
            "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
          },
          "select": {
            "rows": {
              "_": "%d lignes sélectionnées",
              "0": "Aucune ligne sélectionnée",
              "1": "1 ligne sélectionnée"
            }  
          }
        }
      });
    });
  </script>
</body>
</html>
