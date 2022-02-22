<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>BIBLIOTHEQUE | GESTION</title>
 <!-- Tell the browser to be responsive to screen width -->
 <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

 <!-- v4.0.0-alpha.6 -->
 <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">
 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
 <link rel="icon" href="img/logo1.png" type="image/png" />
 <!-- Theme style -->
 <link rel="stylesheet" href="dist/css/style.css">
 <link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
 <link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
 <link rel="stylesheet" href="dist/plugins/hmenu/ace-responsive-menu.css">

 <!-- Chartist CSS -->
 <link rel="stylesheet" href="dist/plugins/chartist-js/chartist.min.css">
 <link rel="stylesheet" href="dist/plugins/chartist-js/chartist-plugin-tooltip.css">
 <link rel="stylesheet" href="dist/vendor/sweetalert/dist/sweetalert.css" />

 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper boxed-wrapper">
    <header class="main-header"> 
      <!-- Logo --> 
      <a href="dashboard" class="logo blue-bg"> 
        <!-- mini logo for sidebar mini 50x50 pixels --> 
        <span class="logo-mini"><img src="dist/img/logo-n.png" alt=""></span> 
        <!-- logo for regular state and mobile devices --> 
        <span class="logo-lg text-white">INTEC SUP</span> </a> 
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar blue-bg navbar-static-top"> 

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li>
                <a href="notifications?id" name="clic"> <i class="fa fa-bell-o" ></i>
                <div class="notify"><span class="heartbit"></span> <span class="point"></span> </div>

              </a> </li>


            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">
             <?php 
                  echo mb_strtolower($_SESSION['alogin']);
                  ?> | Administrateur</span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
               
                <p class="text-left">
                  <?php 
                  echo mb_strtolower($_SESSION['alogin']);
                  ?> <a><i class="fa fa-circle text-success"></i> En ligne</a>
                  
                  <br>
                  Administrateur |
                  
                    <div class="view-link text-center"><a href="profil">Voir profil</a> </div>
                  </li>
                  <li><a href="#"><i class="icon-envelope"></i> Notification</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="modifier-mot-de-passe"><i class="icon-gears"></i> Mot de passe</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="deconnexion"><i class="fa fa-power-off"></i> Deconnexion</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Main Nav -->
      <div class="main-nav">
        <nav> 
          <!-- Menu Toggle btn-->
          <div class="menu-toggle">
            <h3>Menu</h3>
            <button type="button" id="menu-btn"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <!-- Responsive Menu Structure--> 
          <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
          <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> <span>Tableau de Bord</span></a>

            </li>
            <li><a href="gestion-categorie"><i class="fa fa-bullseye"></i> <span>Catégories</span></a>
            </li>
            <li><a href="#"><i class="fa fa-pie-chart"></i> <span>Classements</span></a>
              <ul>
              <li><a href="gestion-cycle"><i class="fa fa-table"></i><span>Cycle</a></li></span>
            <li><a href="gestion-ranger"><i class="fa fa-table"></i><span>Rangée</a></li></span>
            <li><a href="gestion-casier"><i class="fa fa-navicon"></i>Casier</a></li></span>
             <li><a href="gestion-filiere"><i class="fa fa-navicon"></i>Filière</a></li></span>
          </ul>
            </li>
             <li><a href="#"><i class="fa fa-pie-chart"></i> <span>Périodes</span></a>
              <ul>
            <li><a href="gestion-mois"><i class="fa fa-table"></i><span>Mois</a></li></span>
              <li><a href="gestion-annee"><i class="fa fa-spinner"></i><span>Année</a></li></span>
          </ul>
            </li>
            <li><a href="gestion-auteur"><i class="fa fa-user"></i> <span>Auteurs</span></a>
            </li>
            <li><a href="#"><i class="fa fa-pie-chart"></i> <span>Livres/Stocks</span></a>
              <ul>
            <li><a href="gestion-livre"><i class="fa fa-table"></i><span>Livres</a></li></span>
              <li><a href="stocks-livres"><i class="fa fa-spinner"></i><span>Stocks livres</a></li></span>
          </ul>
            </li>
            <li><a href="gestion-memoire"><i class="fa fa-book"></i> <span>Mémoires</span></a>
            </li>
            <li><a href="liste-etudiant"><i class="fa fa-table"></i> <span>Liste étudiants</span></a>
             <li><a href="gestion-emprunt-livre"><i class="fa fa-book"></i> <span>Livres empruntés</span></a>
             </li>