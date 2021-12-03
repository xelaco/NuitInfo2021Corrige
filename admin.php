<?php
session_start();
if(!isset($_SESSION["pseudo"])){
	header("Location: connexion.php");
	exit(); 
}
?>
<!DOCTYPE html>
<html>
	<body>
		<h1>Bienvenue <?php echo $_SESSION['pseudo']; ?>!</h1>
		<p>C'est votre tableau de bord.</p>
	</body>
</html>
