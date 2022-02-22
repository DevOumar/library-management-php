<?php
session_start();
error_reporting(0);
include('admin/includes/config.php');
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
  header('Location: dashboard');
}
else{?>
  <!DOCTYPE html>
  <html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BIBLIOTHEQUE | TABLEAU DE BORD </title>
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

    <!-- Chartist CSS -->
    <link rel="stylesheet" href="dist/plugins/chartist-js/chartist.min.css">
    <link rel="stylesheet" href="dist/plugins/chartist-js/chartist-plugin-tooltip.css">

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
  <div class="row">
  </div>
</div>
</div>
<div class="panel-body">
  <div class="info-box">
     <h4><marquee>Bienvenue <?php echo $_SESSION['fullname']; ?> dans la Bibliothèque de INTEC SUP. Cette Bibliothèque est ouverte de 8h00 à 19h00. Nous sommes le : <?php
     setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
      echo strftime('%A %d %B %Y à %H:%M:%S') ; ?> .</marquee></h4>
    <hr />
    <h4 class="text-black">Tableau de Bord</h4>
    <hr />
    <div class="row">
      <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="livres-disponibles">
          <div class="info-box bg-darkblue"> <span class="info-box-icon bg-transparent"><i class="fa fa-book text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Livres</h6>
              <h1 class="text-white">
                <?php 
        $sql ="SELECT id from tblbooks ";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $listdbooks=$query->rowCount();
        ?>
          <?php echo htmlentities($listdbooks);?>
        </h1>
                <a href="livres-disponibles"><span class="progress-description  text-white">Total Livres</span></a></div>
                </a>
            <!-- /.info-box-content --> 
          </div>
          </div>

      
     <div class="col-lg-3 col-sm-6 col-xs-12">
      <a href="emprunt-livre">
          <div class="info-box bg-green"> <span class="info-box-icon bg-transparent"><i class="fa fa-book text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Mes livres empruntés</h6>
              <h1 class="text-white">
          <?php 
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>
        </h1>
         <a href="emprunt-livre"><span class="progress-description  text-white">Mes livres empruntés</span></a></div>
         </a>
            <!-- /.info-box-content --> 
          </div>
          </div>
      
      <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="livre-non-retourne">
          <div class="info-box bg-aqua"> <span class="info-box-icon bg-transparent"><i class="fa fa-book text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Mes livres non retournés</h6>
              <h1 class="text-white">
          <?php 
          $rsts=0;
          $sql2 ="SELECT id from tblissuedbookdetails where StudentID=:sid and RetrunStatus=:rsts";
          $query2 = $dbh -> prepare($sql2);
          $query2->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
          $query2->execute();
          $results2=$query2->fetchAll(PDO::FETCH_OBJ);
          $returnedbooks=$query2->rowCount();
          ?>
        <?php echo htmlentities($returnedbooks);?>
        </h1>
         <a href="livre-non-retourne"><span class="progress-description  text-white">Mes livres non retournés</span></a></div>
         </a>
            <!-- /.info-box-content --> 
          </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="livres-disponibles">
          <div class="info-box bg-darkblue"> <span class="info-box-icon bg-transparent"><i class="fa fa-book text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Mémoires</h6>
              <h1 class="text-white">
                <?php 
        $sql ="SELECT * from memoire ";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $listdbooks=$query->rowCount();
        ?>
          <?php echo htmlentities($listdbooks);?>
        </h1>
                <a href="gestion-memoire"><span class="progress-description  text-white">Total Mémoires</span></a></div>
                </a>
            <!-- /.info-box-content --> 
          </div>
          </div>
    <div class="col-lg-7 col-xlg-9">
          <div class="info-box">
            <div class="d-flex flex-wrap">
              <div>
                <h4 class="text-black">Statistique de mes activités du mois</h4>
                <center>
                <form method="post">

                  <select name="annee">
  <option class="form-control" value="0">Séléctionner l'année</option>
  <?php 

                    $sql = "SELECT * from  annee ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $result)
                        {               ?>  
                          <option value="<?php echo htmlentities($result->libelle);?>"><?php echo htmlentities($result->libelle);?></option>
                        <?php }} ?>
                  </select>
                  <input type="submit" value="Rechercher" name="rechercher" >
                </form>
              </center>
              </div>
              <div class="ml-auto">
                <ul class="list-inline">
                </ul>
              </div>
            </div>
            <div>
              <canvas id="line-chart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xlg-3">
          <div class="info-box">
            <div class="d-flex flex-wrap">
              <div>
                <h4 class="text-black">Statistique des livres </h4>
              </div>
            </div>
            <div class="m-t-2">
              <canvas id="pie-chart" height="210"></canvas>
            </div>
          </div>
        </div>
      </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
<!-- FOOTER SECTION END-->
<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="dist/bootstrap/js/bootstrap.min.js"></script> 

<!-- template --> 
<script src="dist/js/niche.js"></script> 
<!-- Chartjs JavaScript --> 
<!-- Chartjs JavaScript --> 
<script src="dist/plugins/chartjs/chart.min.js"></script>
<script src="dist/plugins/chartjs/chart-int.js"></script>

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
// ======
// Pie chart
// ======
new Chart(document.getElementById("pie-chart"),{
  type:'pie',
  data:{
    labels:
      ['Total livres','Livres empruntés', 'Livre non retournés','Total mémoires'],
    datasets:
      [{'label':'My First Dataset',
    data:
      [<?php 
      $sql5 ="SELECT * from tblbooks ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,
    <?php 
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,
        <?php 
          $rsts=0;
          $sql2 ="SELECT id from tblissuedbookdetails where StudentID=:sid and RetrunStatus=:rsts";
          $query2 = $dbh -> prepare($sql2);
          $query2->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
          $query2->execute();
          $results2=$query2->fetchAll(PDO::FETCH_OBJ);
          $returnedbooks=$query2->rowCount();
          ?>
        <?php echo htmlentities($returnedbooks);?>,
        <?php 
        $sql ="SELECT * from memoire ";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $listdbooks=$query->rowCount();
        ?>
          <?php echo htmlentities($listdbooks);?>],
    backgroundColor:
      ['rgb(230, 150, 245)',
      'rgb(54, 162, 235)',
      'rgb(255, 230, 86)',
      'rgb(255, 70, 80)'
        ],
    }]
},
  options: {
            responsive: true
        }
});
</script>
<script>
// line chart
// ======
<?php 
if (isset($_POST['rechercher'])) {
?>   
var ctx = document.getElementById('line-chart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet","Août","Septembre","Octobre","Novembre","Décembre"],
        datasets: [{
           label: "Livres empruntés",
            backgroundColor: 'rgb(88, 103, 221)',
            borderColor: 'rgb(88, 103, 221)',
            data: [<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Janvier' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Février' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Mars' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Avril' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Mai' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Juin' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Juillet' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Août' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Septembre' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Octobre' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Novembre' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where Annee='$anne' AND Mois= 'Décembre' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>],
                    fill: false,
                }, {
          label: "Livres retournés",
            backgroundColor: 'rgb(0, 140, 211)',
            borderColor: 'rgb(0, 140, 211)',
            data: [<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Janvier' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Février' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Mars' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Avril' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Mai' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Juin' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Juillet' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Août' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Septembre' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Octobre' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>,<?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Novembre' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>, <?php
          $anne=$_POST['annee'];     
          $sid=$_SESSION['stdid'];
          $sql1 ="SELECT id from tblissuedbookdetails where RetrunStatus='1' AND Annee='$anne' AND Mois= 'Décembre' AND StudentID=:sid";
          $query1 = $dbh -> prepare($sql1);
          $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
          $query1->execute();
          $results1=$query1->fetchAll(PDO::FETCH_OBJ);
          $issuedbooks=$query1->rowCount();
          ?>
      <?php echo htmlentities($issuedbooks);?>],
                }]
            },
  options: {
            responsive: true
        }
});
</script>
</div>
</body>
</html>
<?php } } ?>
