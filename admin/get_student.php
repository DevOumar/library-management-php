<?php 
require_once("includes/config.php");
if(!empty($_POST["studentid"])) {
	$studentid= strtoupper($_POST["studentid"]);
	
	$sql ="SELECT FullName,confirme FROM tblstudents WHERE StudentId=:studentid";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':studentid', $studentid, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query -> rowCount() > 0)
	{
		foreach ($results as $result) {
			if($result->confirme==0)
			{
				echo "<span style='color:red'> Matricule étudiant bloqué. </span>"."<br />";
				echo "<b>Nom de l'étudiant-</b>" .$result->FullName;
				echo "<script>$('#submit').prop('disabled',true);</script>";
			} else {
				?>


				<?php  
				echo htmlentities($result->FullName);
				echo "<script>$('#submit').prop('disabled',false);</script>";
			}
		}
	}
	else{
		
		echo "<span style='color:red'> Matricule non valide. Veuillez entrer un matricule valide.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}
}



?>
