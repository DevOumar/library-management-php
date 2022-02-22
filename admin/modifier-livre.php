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
    $bookname=$_POST['bookname'];
    $category=$_POST['category'];
    $author=$_POST['author'];
    $rangee_livre=$_POST['rangee_livre'];
    $casier_livre=$_POST['casier_livre'];
    $isbn=$_POST['isbn'];
    $nbre_page=$_POST['nbre_page'];
    $bookid=intval($_GET['bookid']);
    $sql="UPDATE tblbooks set BookName=:bookname,Ranger=:rangee_livre,Casier=:casier_livre,CatId=:category,AuthorId=:author,ISBNNumber=:isbn,Nbre_page=:nbre_page where id=:bookid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookname',$bookname,PDO::PARAM_STR);
    $query->bindParam(':category',$category,PDO::PARAM_STR);
    $query->bindParam(':author',$author,PDO::PARAM_STR);
    $query->bindParam(':rangee_livre',$rangee_livre,PDO::PARAM_STR);
    $query->bindParam(':casier_livre',$casier_livre,PDO::PARAM_STR);
    $query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
    $query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
    $query->bindParam(':nbre_page',$nbre_page,PDO::PARAM_STR);
    $query->execute();
    $_SESSION['msg']="Livre mis à jour avec succès !";
    header('location:gestion-livre');


  }
  ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BIBLIOTHEQUE | LIVRE</title>
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
          <h5 class="text-white m-b-0">Modifier Livre</h5>
        </div>

        <div class="card-body">
          <form role="form" method="post">
            <?php 
            $bookid=intval($_GET['bookid']);
            $sql = "SELECT tblbooks.BookName,ranger.ranger,casier.casier,ranger.id_ranger as rngid,casier.id_casier as csid,tblbooks.Nbre_page,tblcategory.CategoryName,tblcategory.id as cid,tblauthors.AuthorName,tblauthors.id as athrid,tblbooks.ISBNNumber,tblbooks.id as bookid from tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId
            JOIN ranger ON ranger.id_ranger=tblbooks.Ranger 
            JOIN casier ON casier.id_casier=tblbooks.Casier
            where tblbooks.id=:bookid";

          $query = $dbh -> prepare($sql);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 

                  <div class="form-group">
                    <label>Nom du livre<span style="color:red;">*</span></label>
                    <input class="form-control" type="text" name="bookname" value="<?php echo htmlentities($result->BookName);?>" required />
                  </div>

                  <div class="form-group">
                    <label>Catégorie<span style="color:red;">*</span></label>
                    <select class="custom-select form-control" name="category" required="required">
                      <option value="<?php echo htmlentities($result->cid);?>"> <?php echo htmlentities($catname=$result->CategoryName);?></option>
                      <?php 
                      $status=1;
                      $sql1 = "SELECT * from  tblcategory where Status=:status";
                      $query1 = $dbh -> prepare($sql1);
                      $query1-> bindParam(':status',$status, PDO::PARAM_STR);
                      $query1->execute();
                      $resultss=$query1->fetchAll(PDO::FETCH_OBJ);
                      if($query1->rowCount() > 0)
                      {
                        foreach($resultss as $row)
                        {           
                          if($catname==$row->CategoryName)
                          {
                            continue;
                          }
                          else
                          {
                            ?>  
                            <option value="<?php echo htmlentities($row->id);?>"><?php echo htmlentities($row->CategoryName);?></option>
                          <?php }}} ?> 
                        </select>
                      </div>


                    <div class="form-group">
<label> Auteur du livre<span style="color:red;">*</span></label>
<select class="custom-select form-control" name="author" required="required">
<option value="<?php echo htmlentities($result->athrid);?>"> <?php echo htmlentities($athrname=$result->AuthorName);?></option>
<?php 

$sql2 = "SELECT * from  tblauthors ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0)
{
foreach($result2 as $ret)
{           
if($athrname==$ret->AuthorName)
{
continue;
} else{

    ?>  
<option value="<?php echo htmlentities($ret->id);?>"><?php echo htmlentities($ret->AuthorName);?></option>
 <?php }}} ?> 
</select>
</div>

                          <div class="form-group">
                            <label>Numéro ISBN<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="isbn" value="<?php echo htmlentities($result->ISBNNumber);?>"  required="required" />
                            <p class="help-block">ISBN est un numéro international standard du livre.ISBN devrait-être unique.</p>
                          </div>
            <div class="form-group">
                    <label>Rangée<span style="color:red;">*</span></label>
                    <select class="custom-select form-control" name="rangee_livre" required="required">
                      <option value="<?php echo htmlentities($result->rngid);?>"> <?php echo htmlentities($catname=$result->ranger);?></option>
                      <?php 
                      $status=1;
                      $sql1 = "SELECT * from  ranger ";
                      $query1 = $dbh -> prepare($sql1);
                      
                      $query1->execute();
                      $resultss=$query1->fetchAll(PDO::FETCH_OBJ);
                      if($query1->rowCount() > 0)
                      {
                        foreach($resultss as $row)
                        {           
                          if($catname==$row->ranger)
                          {
                            continue;
                          }
                          else
                          {
                            ?>  
                            <option value="<?php echo htmlentities($row->id_ranger);?>"><?php echo htmlentities($row->ranger);?></option>
                          <?php }}} ?> 
                        </select>
                      </div>              <div class="form-group">
                    <label>Casier<span style="color:red;">*</span></label>
                    <select class="custom-select form-control" name="casier_livre" required="required">
                      <option value="<?php echo htmlentities($result->csid);?>"> <?php echo htmlentities($catname=$result->casier);?></option>
                      <?php 
                      $status=1;
                      $sql1 = "SELECT * from  casier ";
                      $query1 = $dbh -> prepare($sql1);
                      
                      $query1->execute();
                      $resultss=$query1->fetchAll(PDO::FETCH_OBJ);
                      if($query1->rowCount() > 0)
                      {
                        foreach($resultss as $row)
                        {           
                          if($catname==$row->casier)
                          {
                            continue;
                          }
                          else
                          {
                            ?>  
                            <option value="<?php echo htmlentities($row->id_casier);?>"><?php echo htmlentities($row->casier);?></option>
                          <?php }}} ?> 
                        </select>
                      </div>
                           <div class="form-group">
                            <label>Nombre de pages<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="nbre_page" value="<?php echo htmlentities($result->Nbre_page);?>"  required="required" />
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
