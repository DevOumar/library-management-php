<?php
function stock() {
	session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
{   
  header('location:index');
}
else{ 
  if(isset($_POST['issue']))
  {
    $studentid=strtoupper($_POST['studentid']);
    $bookid=$_POST['bookdetails'];
    $delai_livre=$_POST['delai_livre'];
    $lib=$_POST['lib'];
    $annee_emprunt=$_POST['annee_emprunt'];
    $req = $dbh->query("SELECT * FROM  tblissuedbookdetails WHERE StudentID='$studentid' AND ReturnDate IS NULL ");
    $count= $req->rowCount();
   
    if ($count >=2) {
    	$_SESSION['error']="Désolé, vous avez déjà deux livres empruntés !";
      header('location:gestion-emprunt-livre');
    }
    else{
    $sql="INSERT INTO  tblissuedbookdetails(StudentID,BookId,Delai_livre,Mois,Annee) VALUES(:studentid,:bookid,:delai_livre,:lib,:annee_emprunt)";

    
    $query = $dbh->prepare($sql);
    $query->bindParam(':studentid',$studentid,PDO::PARAM_STR);
    $query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
    $query->bindParam(':delai_livre',$delai_livre,PDO::PARAM_STR);
    $query->bindParam(':lib',$lib,PDO::PARAM_STR);
    $query->bindParam(':annee_emprunt',$annee_emprunt,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {

      $_SESSION['msg']="Livre emprunté avec succès !";
      header('location:gestion-emprunt-livre');
    }
    else 
    {
      $_SESSION['error']="Un problème est survenu. Veuillez réessayer !";
      header('location:gestion-emprunt-livre');
    }
    }
     }
      }
      }
  
  ?>