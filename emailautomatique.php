<?php
session_start();
include('admin/includes/config.php');
$dates=date('d/m/Y');
 $emprunt=$dbh->query("SELECT * FROM tblissuedbookdetails where ReturnDate IS NULL AND Delai_livre='$dates' ");
 While ($data=$emprunt->fetch()) {
 $id=$data['StudentID'];
  $nom_livre=$data['BookId'];
  $reqe=$dbh->query("SELECT * FROM tblbooks where id='$nom_livre' ");
  $table_etudiant=$dbh->query("SELECT * FROM tblstudents where StudentID='$id'  ");
  if ($datas_livre=$reqe->fetch()) {
  if ($datas=$table_etudiant->fetch()) {
     $email=$datas['EmailId'];

    $emailTo = $email;
      $headers="MIME-Version: 1.0\r\n";
    $headers.='From:"Bibliothèque-INTECSUP"<$email>'."\n";
    $headers.="Content-Type:text/html; charset=iso-8859-1\r\n";
    $headers.="Content-Transfer-Encoding: 8bit\r\n";

    $message='
    Salut '.$datas['FullName'].', suite à votre emprunt du livre : '.$datas_livre['BookName'].' vous êtes en retard de retour donc veuillez retourner avec le livre au plutôt possible .<br><br>

    -------------------------------------------<br><br>
    Ceci est un mail automatique, Merci de ne pas y répondre.
    </div>
    </body>
    </html>
    ';

    mail($emailTo, "Retour de livre emprunté", $message, $headers);
}
 }
 }
?>