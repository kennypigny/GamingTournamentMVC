<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/css/style.css">
	<?php if (! empty($css)) {?>
		<link rel="stylesheet" href="/assets/css/<?php echo $css ?>.css">
	<?php }?>
	<title>GamingTournament <?php echo isset($title) ? ' - ' . $title : '' ?></title>
</head>

<body>
	<?php template('ui/navbar')?>

	<?php echo $content ?>

	<?php template('ui/footer')?>

	<script src="/assets/js/script.js"></script>
	<?php if (! empty($js)) {?>
		<script src="/assets/js/<?php echo $js ?>.js"></script>
	<?php }?>
</body>

</html>