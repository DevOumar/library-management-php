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
  header('Location: profil');
}
else{ 
  if(isset($_POST['update']))
  {    
    $sid=$_SESSION['stdid'];  
    $fname=$_POST['fullanme'];
    $mobileno=$_POST['mobileno'];
    $image=$_POST['image'];

  $img=$_FILES['image']['name'];
  $temp= explode(".", $img);
  $newfile= round(microtime(true)) . '.' . end($temp);
  $imgpath="upload/".$newfile;
  move_uploaded_file($_FILES['image']['tmp_name'],$imgpath);
  $sql1=$dbh->query("UPDATE tblstudents SET Photo='$imgpath',FullName='$fname',Photo='$imgpath',MobileNumber='$mobileno' WHERE StudentId='$sid'");

   /* $sql="UPDATE tblstudents SET FullName=:fname,Photo=:image,MobileNumber=:mobileno where StudentId=:sid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sid',$sid,PDO::PARAM_STR);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
    $query->bindParam(':image',$image,PDO::PARAM_STR);
    $query->execute();*/



    $_SESSION['msg']="Votre profil est mis à jour avec succès !";

  }
  ?>

  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BIBLIOTHEQUE | PROFIL </title>
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
</head>
<body>
  <!------MENU SECTION START-->
  <?php include('includes/header.php');?>
  <!-- MENU SECTION END-->
</div>
</div>

<!-- Main content -->
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-outline">
        <div class="card-header bg-primary">
          <h5 class="text-white m-b-0">Modifier Profil</h5>
        </div>
        <div class="card-body">
          <form role="form" method="POST" enctype="multipart/form-data">
           <?php 
           $sid=$_SESSION['stdid'];
           $sql="SELECT StudentId,FullName,EmailId,MobileNumber,RegDate,UpdationDate,confirme from  tblstudents  where StudentId=:sid ";
           $query = $dbh -> prepare($sql);
           $query-> bindParam(':sid', $sid, PDO::PARAM_STR);
           $query->execute();
           $results=$query->fetchAll(PDO::FETCH_OBJ);
           $cnt=1;
           if($query->rowCount() > 0)
           {
            foreach($results as $result)
              {
          $recup_date=$result->RegDate;
        $format=strtotime($recup_date); 
        $date=date('d-m-Y',$format); 
          $recup_update_date=$result->UpdationDate;
        $format_update_date=strtotime($recup_update_date); 
        $update_date=date('d-m-Y',$format_update_date);
                ?>   

                <div class="form-group">
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
         <label>Matricule : </label>
         <?php echo htmlentities($result->StudentId);?>
       </div>

       <div class="form-group">
        <label>Date Inscription : </label>
        <?php echo htmlentities($date);?>
      </div>
      <?php if($result->UpdationDate!=""){?>
        <div class="form-group">
          <label>Dernière mise à jour : </label>
          <?php echo htmlentities($update_date);?>
        </div>
      <?php } ?>


      <div class="form-group">
        <label>Statut profil : </label>
        <?php if($result->confirme==1){?>
          <span style="color: green">Activé</span>
        <?php } else { ?>
          <span style="color: red">Désactivé</span>
        <?php }?>
      </div>


      <div class="form-group">
        <label>Nom complet</label>
        <input class="form-control" type="text" name="fullanme" value="<?php echo htmlentities($result->FullName);?>" autocomplete="off" required />
      </div>


      <div class="form-group">
        <label>Numéro de téléphone :</label>
        <input class="form-control" type="text" name="mobileno" maxlength="8" value="<?php echo htmlentities($result->MobileNumber);?>" autocomplete="off" required />
      </div>

      <div class="form-group">
        <label>Adresse e-mail</label>
        <input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->EmailId);?>"  autocomplete="off" required readonly />
      </div>
      <div class="uploadPhoto">
        <input type="file" name="image" id="image" class="modal-mt">
      </div>
    </div>
  </div>
<?php }} ?>
<button type="submit" name="update" class="btn btn-primary">Mettre à jour </button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="assets/js/custom.js"></script>
<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 
<script src="dist/js/jquery.min.js"></script> 
<script src="dist/js/jquery.js"></script> 

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
<?php }   ?>