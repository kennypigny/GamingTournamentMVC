<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/css/style.css">
	<?php if (! empty($data['css'])) {?>
		<link rel="stylesheet" href="/assets/css/<?php echo $data['css'] ?>.css">
	<?php }?>
	<title>GamingTournament <?php echo isset($data['title']) ? ' - ' . $data['title'] : '' ?></title>
</head>

<body>
	<?php render('ui/navbar', true)?>

	<?php echo $data['content'] ?>

	<?php render('ui/footer', true)?>

	<script src="/assets/js/script.js"></script>
	<?php if (! empty($data['js'])) {?>
		<script src="/assets/js/<?php echo $data['js'] ?>.js"></script>
	<?php }?>
</body>

</html>