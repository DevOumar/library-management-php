<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
  header('location:index');
}
else{ 

  if(isset($_POST['update']))
  {
   
    $studentid=$_POST['studentid'];
    $fullname=$_POST['fullname'];
    $emailid=$_POST['emailid'];
    $mobilenumber=$_POST['mobilenumber'];
    $Confirme=$_POST['Confirme'];
    $regdate=$_POST['regdate'];
    $niveau=$_POST['niveau'];
    $etudid=intval($_GET['etudid']);
    $sql=$dbh->query("
      UPDATE tblstudents SET StudentId='$studentid',
      FullName='$fullname',
      EmailId='$emailid',
      Cycle='$niveau',
      MobileNumber='$mobilenumber',
      confirme='$Confirme',
      Regdate='$regdate' 
      WHERE id='$etudid'
      "
    );

    $_SESSION['updatemsg']="Compte utilisateur mis à jour avec succès !";
    header('location:liste-etudiant');



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
          <h5 class="text-white m-b-0">Modifier Utilisateur</h5>
        </div>
        <div class="card-body">
          <form role="form" method="post">
            <div class="form-group">
              <label>Matricule</label>
              <?php 
              $etudid=intval($_GET['etudid']);
              $sql = "SELECT * from  tblstudents where id=:etudid";
              $query = $dbh -> prepare($sql);
              $query->bindParam(':etudid',$etudid,PDO::PARAM_STR);
              $query->execute();
              $results=$query->fetchAll(PDO::FETCH_OBJ);
              $cnt=1;
              if($query->rowCount() > 0)
              {
                foreach($results as $result)
                  {               ?>   
                    <input class="form-control" type="text" name="studentid" value="<?php echo htmlentities($result->StudentId);?>" required />
                  <?php }} ?>
                </div>
                <div class="form-group">
                  <label>Nom</label>
                  <?php 
                  $etudid=intval($_GET['etudid']);
                  $sql = "SELECT * from  tblstudents where id=:etudid";
                  $query = $dbh -> prepare($sql);
                  $query->bindParam(':etudid',$etudid,PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                    foreach($results as $result)
                      {               ?> 
                        <input class="form-control" type="text" name="fullname" value="<?php echo htmlentities($result->FullName);?>" required />
                      <?php }} ?>
                    </div>
                    <div class="form-group">
                      <label>Adresse E-mail</label>
                      <?php 
                      $etudid=intval($_GET['etudid']);
                      $sql = "SELECT * from  tblstudents where id=:etudid";
                      $query = $dbh -> prepare($sql);
                      $query->bindParam(':etudid',$etudid,PDO::PARAM_STR);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                        foreach($results as $result)
                          {               ?>
                            <input class="form-control" type="text"  name="emailid"value="<?php echo htmlentities($result->EmailId);?>" required />
                          <?php }} ?>
                        </div>
                        <div class="form-group">
<label> Cycles d'études<span style="color:red;">*</span></label>
<select class="custom-select form-control" name="niveau" required="required">
<option value="<?php echo htmlentities($result->cylid);?>"> <?php echo htmlentities($athrname=$result->Nom_cycle);?></option>
<?php 
$sid=$_SESSION['stdid'];
$sql2 = "SELECT * from  cycle ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0)
{
foreach($result2 as $ret)
{           
if($athrname==$ret->Nom_cycle)
{
continue;
} else{

    ?>  
<option value="<?php echo htmlentities($ret->Nom_cycle);?>"><?php echo htmlentities($ret->Nom_cycle);?></option>
 <?php }}} ?> 
</select>
</div>
                        
                        <div class="form-group">
                          <label>Numéro de téléphone</label>
                          <?php 
                          $etudid=intval($_GET['etudid']);
                          $sql = "SELECT * from  tblstudents where id=:etudid";
                          $query = $dbh -> prepare($sql);
                          $query->bindParam(':etudid',$etudid,PDO::PARAM_STR);
                          $query->execute();
                          $results=$query->fetchAll(PDO::FETCH_OBJ);
                          $cnt=1;
                          if($query->rowCount() > 0)
                          {
                            foreach($results as $result)
                              {               ?>
                                <input class="form-control" type="text" name="mobilenumber" maxlength="8" value="<?php echo htmlentities($result->MobileNumber);?>" required />
                              <?php }} ?>
                            </div>
                            <div class="form-group">
                              <label>Status</label>
                              <?php if($result->confirme==1) {?>
                               <div class="radio">
                                <label>
                                  <input type="radio" name="Confirme" id="Confirme" value="1" checked="checked">Activé
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="Confirme" id="Confirme" value="0">Désactivé
                                </label>
                              </div>
                            <?php } else { ?>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="Confirme" id="Confirme" value="0" checked="checked">Désactivé
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input type="radio" name="Confirme" id="Confirme" value="1">Activé
                                </label>
                              </div>
                            <?php } ?>
                          </div>
                          <div class="form-group">
                            <label>Date Inscription</label>
                            <?php 
                            $etudid=intval($_GET['etudid']);
                            $sql = "SELECT * from  tblstudents where id=:etudid";
                            $query = $dbh -> prepare($sql);
                            $query->bindParam(':etudid',$etudid,PDO::PARAM_STR);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0)
                            {
                              foreach($results as $result)
                                {               ?>
                                  <input disabled="disabled" class="form-control" type="text" name="regdate" value="<?php echo htmlentities($result->RegDate);?>" required />
                                <?php }} ?>
                              </div>

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
            <?php } ?>