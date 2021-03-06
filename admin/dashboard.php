<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{ 

header('location:../index');
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

</head>
<body>
  <!------MENU SECTION START-->
  <?php include('includes/header.php');?>
  <!-- MENU SECTION END-->
  <div class="row">
  </div>
</div>
</div>
<div class="panel-body">
  <div class="info-box">
    <h4><marquee>Bienvenue <?php echo $_SESSION['alogin']; ?> dans la Biblioth??que de INTEC SUP. Cette Biblioth??que est ouverte de 8h00 ?? 19h00. Nous sommes le :
      <?php
    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
  echo strftime('%A %d %B %Y ?? %H:%M:%S') ; ?> . </marquee></h4>
    <hr />
    <h4 class="text-black">Tableau de Bord</h4>
    <hr />
    <div class="row">

     <div class="col-lg-3 col-sm-6 col-xs-12">
      <a href="gestion-livre">
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
                <a href="gestion-livre"><span class="progress-description  text-white">Total Livres</span></a></div>
                </a>
            <!-- /.info-box-content --> 
          </div>
          </div>
       <div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="gestion-emprunt-livre">
          <div class="info-box bg-green"> <span class="info-box-icon bg-transparent"><i class="fa fa-book text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Livres emprunt??s</h6>
              <h1 class="text-white">
                <?php 
        $sql1 ="SELECT id from tblissuedbookdetails ";
        $query1 = $dbh -> prepare($sql1);
        $query1->execute();
        $results1=$query1->fetchAll(PDO::FETCH_OBJ);
        $issuedbooks=$query1->rowCount();
        ?>
          <?php echo htmlentities($issuedbooks);?>
        </h1>
        <a href="gestion-emprunt-livre"><span class="progress-description  text-white">Total Livres emprunt??s</span></a></div>
        </a>
            <!-- /.info-box-content --> 
          </div>
          </div>
    <div class="col-lg-3 col-sm-6 col-xs-12">
      <a href="total-livres-retournes">
          <div class="info-box bg-aqua"> <span class="info-box-icon bg-transparent"><i class="fa fa-recycle text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Livres retourn??s</h6>
              <h1 class="text-white">
        <?php 
        $status=1;
        $sql2 ="SELECT id from tblissuedbookdetails where RetrunStatus=:status";
        $query2 = $dbh -> prepare($sql2);
        $query2->bindParam(':status',$status,PDO::PARAM_STR);
        $query2->execute();
        $results2=$query2->fetchAll(PDO::FETCH_OBJ);
        $returnedbooks=$query2->rowCount();
        ?>
    <?php echo htmlentities($returnedbooks);?>
    </h1>
    <a href="total-livres-retournes"><span class="progress-description text-white">Total Livres retourn??s</span></a></div>
    </a>
            <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-12">
      <a href="liste-etudiant">
          <div class="info-box bg-orange"> <span class="info-box-icon bg-transparent"><i class="fa fa-user text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Nombre d'??tudiants</h6>
              <h1 class="text-white">
        <?php 
        $sql3 ="SELECT id from tblstudents ";
        $query3 = $dbh -> prepare($sql3);
        $query3->execute();
        $results3=$query3->fetchAll(PDO::FETCH_OBJ);
        $regstds=$query3->rowCount();
        ?>
        <?php echo htmlentities($regstds);?>
      </h1>
      <a href="liste-etudiant"><span class="progress-description text-white">Nombre d'??tudiants</span></a></div>
      </a>
            <!-- /.info-box-content -->
      </div>
    </div>

  </div>

<div class="row">
<div class="col-lg-3 col-sm-6 col-xs-12">
  <a href="gestion-auteur">
          <div class="info-box bg-blue"> <span class="info-box-icon bg-transparent"><i class="fa fa-user text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Auteurs</h6>
              <h1 class="text-white">
      <?php 
      $sql4 ="SELECT id from tblauthors ";
      $query4 = $dbh -> prepare($sql4);
      $query4->execute();
      $results4=$query4->fetchAll(PDO::FETCH_OBJ);
      $listdathrs=$query4->rowCount();
      ?>
    <?php echo htmlentities($listdathrs);?>
    </h1>
     <a href="gestion-auteur"><span class="progress-description text-white">Total Auteurs</span></a></div>
     </a>
            <!-- /.info-box-content -->
    </div>
  </div>
<div class="col-lg-3 col-sm-6 col-xs-12">
  <a href="gestion-cycle">
          <div class="info-box bg-orange"> <span class="info-box-icon bg-transparent"><i class="fa fa-spinner text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Cycles</h6>
              <h1 class="text-white">
        <?php 
        $sql3 ="SELECT id from cycle ";
        $query3 = $dbh -> prepare($sql3);
        $query3->execute();
        $results3=$query3->fetchAll(PDO::FETCH_OBJ);
        $regstds=$query3->rowCount();
        ?>
        <?php echo htmlentities($regstds);?>
      </h1>
      <a href="gestion-cycle"><span class="progress-description text-white">Total Cycles</span></a></div>
      </a>
            <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-12">
      <a href="gestion-ranger">
          <div class="info-box bg-aqua"> <span class="info-box-icon bg-transparent"><i class="fa fa-spinner text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Rang??es</h6>
              <h1 class="text-white">
        <?php 
        $sql3 ="SELECT id_ranger from ranger ";
        $query3 = $dbh -> prepare($sql3);
        $query3->execute();
        $results3=$query3->fetchAll(PDO::FETCH_OBJ);
        $regstds=$query3->rowCount();
        ?>
        <?php echo htmlentities($regstds);?>
      </h1>
      <a href="gestion-ranger"><span class="progress-description text-white">Total Rang??es</span></a></div>
      </a>
            <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-12">
      <a href="gestion-casier">
          <div class="info-box bg-darkblue"> <span class="info-box-icon bg-transparent"><i class="fa fa-spinner text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Casiers</h6>
              <h1 class="text-white">
        <?php 
        $sql3 ="SELECT id_casier from casier ";
        $query3 = $dbh -> prepare($sql3);
        $query3->execute();
        $results3=$query3->fetchAll(PDO::FETCH_OBJ);
        $regstds=$query3->rowCount();
        ?>
        <?php echo htmlentities($regstds);?>
      </h1>
      <a href="gestion-casier"><span class="progress-description text-white">Total Casiers</span></a></div>
      </a>
            <!-- /.info-box-content -->
      </div>
    </div>

  <div class="col-lg-3 col-sm-6 col-xs-12">
    <a href="gestion-categorie">
          <div class="info-box bg-red"> <span class="info-box-icon bg-transparent"><i class="fa fa-bullseye text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total Cat??gories</h6>
              <h1 class="text-white">
      <?php 
      $sql5 ="SELECT id from tblcategory ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>
    </h1>
     <a href="gestion-categorie"><span class="progress-description text-white">Total Cat??gories</span></a></div>
     </a>
            <!-- /.info-box-content -->
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 col-xs-12">
      <a href="gestion-memoire">
          <div class="info-box bg-orange"> <span class="info-box-icon bg-transparent"><i class="fa fa-book text-white"></i></span>
            <div class="info-box-content">
              <h6 class="info-box-text text-white">Total M??moires</h6>
              <h1 class="text-white">
                <?php 
        $sql ="SELECT id from memoire ";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $listdbooks=$query->rowCount();
        ?>
          <?php echo htmlentities($listdbooks);?>
        </h1>
                <a href="gestion-memoire"><span class="progress-description  text-white">Total M??moires</span></a></div>
                </a>
            <!-- /.info-box-content --> 
          </div>
          </div>

      <div class="col-lg-7 col-xlg-9">
          <div class="info-box">
            <div class="d-flex flex-wrap">
              <div>
                <h4 class="text-black">Nombre de livres emprunt??s et retourn??s par mois et l'ann??e</h4>
                <center>
                <form method="post">

                  <select name="annee">
  <option class="form-control" value="">S??l??ctionner l'ann??e</option>
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
                <h4 class="text-black">Nombre d'??tudiants inscrit par cycle</h4>
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

<!-- DataTable --> 
<script src="dist/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- jQuery 3 --> 
<script src="dist/js/jquery.min.js"></script> 

<!-- v4.0.0-alpha.6 --> 

<!-- template --> 
<script src="dist/js/niche.js"></script> 

<!-- Chartjs JavaScript --> 

<script src="dist/plugins/chartjs/chart.min.js"></script> 


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
      ['DUT 1','DUT 2','LICENCE','MASTER'],
    datasets:
      [{'label':'My First Dataset',
    data: 
     [<?php 
      $sql5 ="SELECT id from tblstudents where Cycle= 'DUT 1' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,
    <?php 
      $sql5 ="SELECT id from tblstudents where Cycle= 'DUT 2' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,
    <?php 
      $sql5 ="SELECT id from tblstudents where Cycle= 'LICENCE' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,
    <?php 
      $sql5 ="SELECT id from tblstudents where Cycle= 'MASTER' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>],
    backgroundColor:
      ['rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(170, 205, 86)'],
    }]
},
  options: {
            responsive: true
        }
});
</script>
<script>
// ======
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
        labels: ["Janvier", "F??vrier", "Mars", "Avril", "Mai", "Juin", "Juillet","Ao??t","Septembre","Octobre","Novembre","D??cembre"],
        datasets: [{
           label: "livres emprunt??s",
            backgroundColor: 'rgb(88, 103, 221)',
            borderColor: 'rgb(88, 103, 221)',
            data: [<?php 
               $annee=$_POST['annee'];
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Janvier' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'F??vrier' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,<?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Mars' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,<?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Avril' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,<?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Mai' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Juin' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,<?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Juillet' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Ao??t' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,<?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Septembre' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,<?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Octobre' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,<?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'Novembre' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,<?php 
      $sql5 ="SELECT * from tblissuedbookdetails where Mois= 'D??cembre' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>],
                    fill: false,
                }, {
          label: "livres retourn??s",
            backgroundColor: 'rgb(0, 140, 211)',
            borderColor: 'rgb(0, 140, 211)',
            data: [<?php
             $annee=$_POST['annee']; 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Janvier' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='F??vrier' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Mars' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Avril' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Mai' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Juin' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Juillet' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>,<?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Ao??t' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Septembre' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Octobre' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='Novembre' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>, <?php 
      $sql5 ="SELECT * from tblissuedbookdetails where RetrunStatus='1' AND Mois='D??cembre' AND Annee='$annee' ";
      $query5 = $dbh -> prepare($sql5);
      $query2->bindParam(':status',$status,PDO::PARAM_STR);
      $query5->execute();
      $results5=$query5->fetchAll(PDO::FETCH_OBJ);
      $listdcats=$query5->rowCount();
      ?>
    <?php echo htmlentities($listdcats);?>],
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
