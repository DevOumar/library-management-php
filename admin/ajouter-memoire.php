<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
  header('location:index');
}
else{ 

  if(isset($_POST['add']))
  {
    $memoire_name=$_POST['memoire_name'];
    $category=$_POST['category'];
    $author=$_POST['author'];
    $ranger=$_POST['ranger'];
    $casier=$_POST['casier'];
    $filiere=$_POST['filiere'];
    $nbre_page=$_POST['nbre_page'];
    $date_soutenance=$_POST['date_soutenance'];
    $query=$dbh->query("SELECT * from memoire where nom_memoire='$memoire_name' AND Filiere='$filiere'");
    $requ=$query->rowcount();
    if ($requ==1){
      $_SESSION['error']="Mémoire déjà ajouté !";
      header('location:gestion-memoire');
    }else{

$sql="INSERT INTO  memoire(nom_memoire,CatId,nom_auteur,Filiere,Date_soutenance,Casier,Ranger,Nbre_page) VALUES(:memoire_name,:category,:author,:filiere,:date_soutenance,:casier,:ranger,:nbre_page)";
      $query = $dbh->prepare($sql);
      $query->bindParam(':memoire_name',$memoire_name,PDO::PARAM_STR);
      $query->bindParam(':category',$category,PDO::PARAM_STR);
      $query->bindParam(':author',$author,PDO::PARAM_STR);
      $query->bindParam(':casier',$casier,PDO::PARAM_STR);
      $query->bindParam(':ranger',$ranger,PDO::PARAM_STR);
      $query->bindParam(':filiere',$filiere,PDO::PARAM_STR);
      $query->bindParam(':nbre_page',$nbre_page,PDO::PARAM_STR);
      $query->bindParam(':date_soutenance',$date_soutenance,PDO::PARAM_STR);
      $query->execute();
      $lastInsertId = $dbh->lastInsertId();
      if($lastInsertId)
      {
        $_SESSION['msg']="Mémoire ajouté avec succès !";
        header('location:gestion-memoire');
      }

      else 
      {
        $_SESSION['error']="Un problème est survenu. Veuillez réessayer !";
        header('location:gestion-memoire');
      }
    }
  }
  ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BIBLIOTHEQUE | MEMOIRE </title>
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
          <h5 class="text-white m-b-0">Ajouter Mémoires</h5>
        </div>
        <div class="card-body">
          <form role="form" method="post">
            <div class="form-group">
              <label>Thème de mémoire<span style="color:red;">*</span></label>
              <input class="form-control" type="text" name="memoire_name" autocomplete="off"  required />
            </div>
           <div class="form-group">
                      <label> Auteur<span style="color:red;">*</span></label>
                      <select class="custom-select form-control" name="author" required="required">
                        <option value=""> Sélectionner auteur</option>
                        <?php 

                        $sql = "SELECT * from  tblauthors ";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                          foreach($results as $result)
                            {               ?>  
                              <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->AuthorName);?></option>
                            <?php }} ?> 
                          </select>
                        </div>
        
            <div class="form-group">
              <label>Catégorie de mémoire<span style="color:red;">*</span></label>
              <select class="custom-select form-control" name="category" required="required">
                <option value="">Sélectionner la catégorie</option>
                <?php 
                $status=1;
                $sql = "SELECT * from  tblcategory where Status=:status";
                $query = $dbh -> prepare($sql);
                $query -> bindParam(':status',$status, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                  foreach($results as $result)
                    {               ?>  
                      <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->CategoryName);?></option>
                    <?php }} ?> 
                  </select>
                </div>
              <div class="form-group">
                <label>Filière<span style="color:red;">*</span></label>
                <select class="custom-select form-control" name="filiere" required="required">
                  <option value="">Sélectionner la filière</option>
                  <?php 
                  $status=1;
                  $sql = "SELECT * from filiere";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                    foreach($results as $result)
                      {               ?>  
                        <option value="<?php echo htmlentities($result->id_filiere);?>"><?php echo htmlentities($result->libelle);?></option>
                      <?php }} ?> 
                    </select>
                  </div>
              <div class="form-group">
                <label>Rangée<span style="color:red;">*</span></label>
                <select class="custom-select form-control" name="ranger" required="required">
                  <option value="">Sélectionner la rangée</option>
                  <?php 
                  $status=1;
                  $sql = "SELECT * from ranger";
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                    foreach($results as $result)
                      {               ?>  
                        <option value="<?php echo htmlentities($result->id_ranger);?>"><?php echo htmlentities($result->ranger);?></option>
                      <?php }} ?> 
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Casier<span style="color:red;">*</span></label>
                    <select class="custom-select form-control" name="casier" required="required">
                      <option value=""> Sélectionner le casier</option>
                      <?php 

                      $sql = "SELECT * from  casier ";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=1;
                      if($query->rowCount() > 0)
                      {
                        foreach($results as $result)
                          {               ?>  
                            <option value="<?php echo htmlentities($result->id_casier);?>"><?php echo htmlentities($result->casier);?></option>
                          <?php }} ?> 
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Date de soutenance<span style="color:red;">*</span></label>
                        <input class="form-control" type="Date" name="date_soutenance" autocomplete="off"  required />
                      </div>
                      <div class="form-group">
                        <label>Nombre de pages<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" name="nbre_page" autocomplete="off"  required />
                      </div>

                      <button type="submit" name="add" class="btn btn-primary">Ajouter </button>

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
