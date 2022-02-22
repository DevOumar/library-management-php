<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
  header('location:index');
}
else{ 

  if(isset($_POST['return']))
  {
    $rid=intval($_GET['rid']);
    $fine=$_POST['fine'];
    $rstatus=1;
    $sql="UPDATE tblissuedbookdetails set fine=:fine,RetrunStatus=:rstatus where id=:rid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rid',$rid,PDO::PARAM_STR);
    $query->bindParam(':fine',$fine,PDO::PARAM_STR);
    $query->bindParam(':rstatus',$rstatus,PDO::PARAM_STR);
    $query->execute();

    $_SESSION['msg']="Livre retourné avec succès !";
    header('location:gestion-emprunt-livre');



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
<script>
// function for get student name
function getstudent() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "get_student.php",
    data:'studentid='+$("#studentid").val(),
    type: "POST",
    success:function(data){
      $("#get_student_name").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
  });
}

//function for book details
function getbook() {
  $("#loaderIcon").show();
  jQuery.ajax({
    url: "get_book.php",
    data:'bookid='+$("#bookid").val(),
    type: "POST",
    success:function(data){
      $("#get_book_name").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
  });
}

</script> 
<style type="text/css">
  .others{
    color:red;
  }

</style>


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
          <h5 class="text-white m-b-0">Emprunt livre</h5>
        </div>
        <div class="card-body">
          <form role="form" method="post">
           <?php 
$rid=intval($_GET['rid']);
$sql = "SELECT tblstudents.FullName,tblissuedbookdetails.Delai_livre,tblbooks.BookName,tblbooks.Nbre_page,ranger.ranger,casier.casier,ranger.id_ranger as rngid,casier.id_casier as csid,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid,tblissuedbookdetails.fine,tblissuedbookdetails.RetrunStatus from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId JOIN ranger ON ranger.id_ranger=tblbooks.Ranger JOIN casier ON casier.id_casier=tblbooks.Casier where tblissuedbookdetails.id=:rid";
$query = $dbh -> prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                  



                  <div class="form-group">
                    <label>Nom de l'étudiant :</label>
                    <?php echo htmlentities($result->FullName);?>
                  </div>

                  <div class="form-group">
                    <label>Nom du livre:</label>
                    <?php echo htmlentities($result->BookName);?>
                  </div>


                  <div class="form-group">
                    <label>ISBN :</label>
                    <?php echo htmlentities($result->ISBNNumber);?>
                  </div>

                  <div class="form-group">
                    <label>Date d'emprunt :</label>
                    <?php echo htmlentities($result->IssuesDate);?>
                  </div>
                  <div class="form-group">
                    <label>Délai de retour :</label>
                    <?php echo htmlentities($result->Delai_livre);?>
                  </div>
                  <div class="form-group">
                    <label>Date de retour :</label>
                    <?php if($result->ReturnDate=="")
                    {
                      echo htmlentities("Pas encore retourné.");
                    } else {


                      echo htmlentities($result->ReturnDate);
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <label>Rangée :</label>
                    <td class="center"><?php echo htmlentities($result->ranger);?></td>
                  </div>
                  <div class="form-group">
                    <label>Casier :</label>
                    <td class="center"><?php echo htmlentities($result->casier);?></td>
                  </div>
                  <div class="form-group">
                    <label>Nombre de pages :</label>
                    <td class="center"><?php echo htmlentities($result->Nbre_page);?></td>
                  </div>
                  <div class="form-group">
                    <label>Amende ( Prix en F CFA ) :</label>
                    <?php 
                    if($result->fine=="")
                      {?>
                        <input class="form-control" type="text" name="fine" id="fine" />

                      <?php }else {
                        echo htmlentities($result->fine);
                      }
                      ?>
                    </div>
                    <?php if($result->RetrunStatus==0){?>

                      <button type="submit" name="return" id="submit" class="btn btn-primary">Retourner le livre </button>

                    </div>

                  <?php }}} ?>
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
