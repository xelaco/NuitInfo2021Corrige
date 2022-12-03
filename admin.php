<?php
function supprimer(){
	$dossier = 'demandes';
	$fichiers = array_diff(scandir($dossier), array('.', '..', '.gitignore'));
	foreach($fichiers as $f)
	{
		unlink('demandes' . '/' .$f);
	}
	header("Refresh:0");
}

session_start();
if(!isset($_SESSION["pseudo"])){
	header("Location: connexion.php");
	exit(); 
}
$dossier = 'demandes';
$fichiers = array_diff(scandir($dossier), array('.', '..', '.gitignore'));
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/global_style.css">
    <link rel="stylesheet" type="text/css" href="css/form_style.css">
    <link rel="icon" type="image/png" href="img/thomaspesquet.png">
    <script src="https://kit.fontawesome.com/798abe29a3.js" crossorigin="anonymous"></script>
    <title>Admin</title>
</head>
	<body>
		<?php include('include/header.php')?>

		<main>
			<h1 class="font-default">Affichage des demandes d'ajout non traitées</h1>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="suppression">
				<?php foreach($fichiers as $f): ?>
					<pre class="font-default"><?= file_get_contents($dossier .'/' . $f); ?></pre>
				<?php endforeach; ?>
				<label for="submit-del" class="btn-del clickable font-default">Tout supprimer</label>
				<input type="submit" name="supprimer" value="Tout supprimer" id="submit-del" class="display-none">
			</form>
			<?php if($_POST['supprimer'] and $_SERVER['REQUEST_METHOD'] == "POST"){supprimer();}?>
		</main>
		
		<?php include('include/footer_admin.php')?>
	</body>
</html>

