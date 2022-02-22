<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{   
  header('location:index');
}
if(isset($_SESSION['timestamp']))
  { // si $_SESSION['timestamp'] existe
  if($_SESSION['timestamp'] + 900 > time())
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
  setcookie('accepte-cookie', 'true', time() + 365*24*3600, null, null, false, true);
  header('Location: total-livres-retournes');
}
else{ 


  ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BIBLIOTHEQUE | LISTE EMPRUNT </title>
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
<div class="row">
  

</div>


</div>
<div class="panel-body">
  <div class="info-box">
    <h4 class="text-black">Liste des livres retournés</h4>
    <hr />
    <?php if($_SESSION['error']!="")
    {?>
      <div class="col-md-6">
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
<div class="table-responsive">
  <table id="dataList" class="table table-bordered table-hover" data-name="cool-table">
    <thead>
      <tr>
        <th>ID #</th>
        <th>Nom de l'étudiant</th>
        <th>Nom du livre</th>
        <th>Cycle</th>
        <th>ISBN </th>
        <th>Rangée</th>
        <th>Casier</th>
        <th>Nbre pages</th>
        <th>Date d'emprunt</th>
        <th>Date de retour</th>
        <th>Délai de retour</th>
        <th>Amende ( Prix en F CFA )</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php $sql = "SELECT tblstudents.FullName,tblissuedbookdetails.fine,tblstudents.Cycle,tblissuedbookdetails.Delai_livre,tblbooks.BookName,ranger.ranger,casier.casier,tblbooks.Nbre_page,tblbooks.ISBNNumber,tblissuedbookdetails.IssuesDate,tblissuedbookdetails.ReturnDate,tblissuedbookdetails.id as rid from  tblissuedbookdetails join tblstudents on tblstudents.StudentId=tblissuedbookdetails.StudentId join tblbooks on tblbooks.id=tblissuedbookdetails.BookId JOIN ranger ON ranger.id_ranger=tblbooks.Ranger 
        JOIN casier ON casier.id_casier=tblbooks.Casier where RetrunStatus='1' order by tblissuedbookdetails.id desc";
      $query = $dbh -> prepare($sql);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      $cnt=1;
      if($query->rowCount() > 0)
      {

        foreach($results as $result)
        {      
$recup_date=$result->IssuesDate;
    $format=strtotime($recup_date); 
    $date=date('d-m-Y à H:i:s',$format); 
    $recup_update_date=$result->ReturnDate;
    $format_update_date=strtotime($recup_update_date); 
    $update_date=date('d-m-Y à H:i:s',$format_update_date);
    $recup_date=$result->Delai_livre;
    $format=strtotime($recup_date); 
    $datee=date('d-m-Y',$format); 
  ?>                                     
         <tr class="odd gradeX">
          <td class="center"><?php echo htmlentities($cnt);?></td>
          <td class="center"><?php echo htmlentities($result->FullName);?></td>
          <td class="center"><?php echo htmlentities($result->BookName);?></td>
          <td><span class="label label-success"><?php echo htmlentities($result->Cycle);?></span></td>
          <td><span class="label label-primary"><?php echo htmlentities($result->ISBNNumber);?></span></td>
          <td><span class="label label-warning"><?php echo htmlentities($result->ranger);?></span></td>
          <td><span class="label label-warning"><?php echo htmlentities($result->casier);?></span></td>
          <td><span class="label label-warning"><?php echo htmlentities($result->Nbre_page);?></span></td>
           <td><span class="label label-primary"><?php echo htmlentities($date);?></span></td>
          <td class="center"><?php if($result->ReturnDate=="")

          {?>
            <span class="label label-danger">
          <?php  echo htmlentities("Pas encore retourné"); ?>
          </span>
          <?php } else {


            echo htmlentities($update_date);
          }
          ?></td>
           <td class="center"><?php if($result->ReturnDate=="")
           {?>
            <span class="label label-danger">
          <?php  echo htmlentities($datee); ?>
          </span>
          <?php }
           else {
        echo htmlentities("Retourné");
          }
          ?>
        </td>
           <td><span class="label label-danger"><?php echo htmlentities($result->fine);?>
                </span></td>
          <td class="center">

            <a href="modifier-emprunt-livre?rid=<?php echo htmlentities($result->rid);?>"><i title="Modifier" class="fa fa-edit"></i></a>
             <a href="gestion-emprunt-livre?del=<?php echo htmlentities($result->rid);?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');"><i title="Supprimer" class="fa fa-trash"></i></a>
            </td>
          </tr>
          <?php $cnt=$cnt+1;}} ?>                                    
        </tbody>
      </table>
    </div>
    
  </div>
</div>
<!--End Advanced Tables -->
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
<!-- DATATABLE SCRIPTS  -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
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
