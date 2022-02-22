<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index');
}
else{ 

if(isset($_POST['ajouter']))
{
$fil=$_POST['fil'];
$cycle=$_POST['cycle'];
$query=$dbh->query("SELECT * from filiere where libelle='$fil'");
$requ=$query->rowcount();
if ($requ==1){
  $_SESSION['error']="Filière déjà ajoutée !";
header('location:gestion-filiere');
}else{
$sql="INSERT INTO  filiere(libelle,id_cycle) VALUES(:fil,:cycle)";
$query = $dbh->prepare($sql);
$query->bindParam(':fil',$fil,PDO::PARAM_STR);
$query->bindParam(':cycle',$cycle,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Filière ajoutée avec succès !";
header('location:gestion-filiere');
}
else 
{
$_SESSION['error']="Un problème est survenu. Veuillez réessayer !";
header('location:gestion-filiere');
}
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>BIBLIOTHEQUE | FILIERE</title>
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
              <h5 class="text-white m-b-0">Ajouter Filière</h5>
            </div>
             <div class="card-body">
              <form role="form" method="post">
              <div class="form-group">
                <label>Nom de la filière</label>
               <input class="form-control" type="text" name="fil" autocomplete="on"  required />
              </div>
 <div class="form-group">
              <select class="custom-select form-control" required="required" name="cycle">
                 <option class="form-control" required />Sélectionner le cycle</option>
                 <?php 
                  $req=$dbh->query("SELECT * FROM cycle");
                  while ($data=$req->fetch()) {
                   ?>
<option required="required" class="text-black" value="<?php echo $data['id'] ?>"> <?php echo $data['Nom_cycle'] ?> </option>
                <?php
              }
              ?>
             </select>
              </div>

<button type="submit" name="ajouter" class="btn btn-primary">Ajouter </button>

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
