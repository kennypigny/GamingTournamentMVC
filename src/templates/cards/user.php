<li class="list-item">
	<a class="user-lign" href="/" target="_blank">
		<p class="name">
			<img
				src="./assets/img/General/PhotoProfil.jpg"
				alt="Photo de profil" /><?= $user['firstname'] ?> <?= $user['lastname'] ?>
		</p>
		<p class="user-email"><?= $user['email'] ?></p>
		<p class="user-nickname">
			<?= $user['pseudo'] ?> <span class="green">"Online"</span>
			<img
				src="./assets/img/General/crayon.png"
				alt="Modifier l\'utilisateur" />
		</p>
	</a>
	<form method="POST">
		<button class="delete" type="submit" name="delete" value="<?= $user['id_users'] ?>"><img src="../assets/img/General/poubelle.png" alt="Icone Supprimer"></button>
	</form>
</li>