<?php ob_start(); ?>

<header>
	<!--  BANNER SLOGAN & CTA mobile changement de banniere et mise en page avec @média -->
	<div class="main-container-header">
		<div class="container-header">
			<div class="container-responsiv-header">
				<h1 id="title">CREER RIVALISER CONQUERIR</h1>
				<h2>
					Rejoignez une communauté de passionnés, relevez des défis, et
					atteignez les sommets ! Vos victoires commencent ici.
				</h2>
				<div class="container-cta-header">
					<?php if (empty($_SESSION['email'])) { ?>
						<button class="cta">
							<a href="./SignUp">Inscrivez-vous dès maintenant</a>
						</button>
					<?php
					} else { ?>
						<div class="welcome">
							<p>Bonjour, <?= $_SESSION['nickname'] ?> !</p>
						</div>

					<?php } ?>
				</div>

				<img
					class="img-banner"
					src="./assets/img/Mobile/Banniere Mobile.webp"
					alt="Manette de playstation" />
			</div>
		</div>
	</div>
</header>
<main>
	<!-- SELECT BOX -->
	<div class="container-selectbox">
		<form action="" method="">
			<label for="games-select" aria-label="Choisir un jeu">
				<select name="games" id="games-select">
					<option value="" selected>--Choisissez un jeu--</option>
					<option value="lol">League of legend</option>
					<option value="fifa">Fifa</option>
					<option value="fortinite">Fortnite</option>
					<option value="wow">World of Warcraft</option>
					<option value="hearthstone">Hearthstone</option>
				</select>
			</label>
			<label for="region-select" aria-label="choisir une région">
				<select name="region-select" id="region-select">
					<option value="" selected>--Choisissez une region--</option>
					<option value="europe">Europe</option>
					<option value="asie">Asie</option>
					<option value="amnorth">Amérique du nord</option>
					<option value="amsouth">Amérique du sud</option>
				</select>
			</label>
			<label for="plateform-select" aria-label="Choisir une plateform">
				<select name="palteform" id="plateform-select">
					<option value="" selected>--Choisissez une plateforme--</option>
					<option value="ps5">PS5</option>
					<option value="computer">PC</option>
					<option value="crossplay">Crossplay</option>
					<option value="switch">Nintendo Switch</option>
					<option value="xbox">Xbox série X/S</option>
				</select>
			</label>
		</form>
	</div>
	<!-- CONTAINER DES TOURNOIS LES + POPULAIRE qui pourront être filtré grace a la select box -->
	<div class="main-container-tournament">
		<div class="container-tournament-mostPopular">
			<h3>Trouver un tournoi :</h3>
			<?php
			template('cards/tournament');
			template('cards/tournament');
			template('cards/tournament');
			template('cards/tournament');
			template('cards/tournament');
			template('cards/tournament');
			template('cards/tournament');
			template('cards/tournament');
			?>
		</div>
	</div>
</main>

<?php
template('default', [
	'title'   => 'Acceuil',
	'css'     => 'index',
	'content' => ob_get_clean(),
]);
?>