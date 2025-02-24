<?php ob_start() ?>

<main>
	<h1>Création d'un tournoi :</h1>
	<!-- enctype="multipart/form-data" pour l'envoie d'image de la banniere(backend) -->
	<div class="container-form">
		<form action="" enctype="multipart/form-data">
			<!-- CONTAINER DE INFORMATION GENERAL ET INFORMATION DU JEU  -->
			<div class="responsiv-param">
				<!-- CONTAINER INFORMATION GENERAL -->
				<div class="container-parameter-form">
					<div class="title-container dropdown-info">
						<h2>Information général</h2>
						<img
							src="/assets/img/General/arrow-down-sign-to-navigate.png"
							alt="fleche pour ouvrir et fermer la fenetre des parametre"
							class="dropdown" />
					</div>
					<div class="general" id="info-general">
						<label for="name-tournament"> Nom du tournoi : </label>
						<input
							name="name-tournament"
							id="name-tournament"
							type="text"
							required />

						<label for="banner">Bannière : <span>(.jpeg .jpg .webp)</span></label>
						<input
							type="file"
							id="banner"
							name="banner"
							accept="images/*" />

						<label for="discord">Discord :</label>
						<input name="discord" id="discord" type="text" />

						<label for="description">Description :</label>
						<textarea
							name="description"
							id="description"
							required>
						</textarea>
					</div>
				</div>
				<!-- FIN CONTAINER INFORMATION GENERAL -->

				<!-- CONTAINER INFORMATION DU JEU   -->
				<div class="container-parameter-form">
					<div class="title-container dropdown-game">
						<h3>Information du jeu</h3>
						<img
							src="/assets/img/General/arrow-down-sign-to-navigate.png"
							alt="fleche pour ouvrir et fermer la fenetre des parametre"
							class="dropdown" />
					</div>
					<div class="general" id="info-game">
						<label for="games-select">Choix du jeu : </label>
						<select name="games-select" id="games-select" required>
							<option value="" selected>--Choisissez un jeu--</option>
							<option value="lol">League of legend</option>
							<option value="fifa">Fifa</option>
							<option value="fortnite">Fortnite</option>
							<option value="wow">World of Warcraft</option>
							<option value="hearthstone">Hearthstone</option>
						</select>
						<label for="region-select">Choix de la région :</label>
						<select name="region-select" id="region-select" required>
							<option value="" selected>--Choisissez une region--</option>
							<option value="europe">Europe</option>
							<option value="asie">Asie</option>
							<option value="amnorth">Amérique du nord</option>
							<option value="amsouth">Amérique du sud</option>
						</select>
						<label for="plateform-select">Choix de la plateforme :</label>
						<select
							name="palteform-select"
							id="plateform-select"
							required>
							<option value="" selected>
								--Choisissez une plateforme--
							</option>
							<option value="ps5">PS5</option>
							<option value="computer">PC</option>
							<option value="crossplay">Crossplay</option>
							<option value="switch">Nintendo Switch</option>
							<option value="xbox">Xbox série X/S</option>
						</select>
						<div class="size-player">
							<label for="size">Taille :</label>
							<input name="size" id="size" type="text" required />
							<label for="players"> Joueurs </label>
							<input
								type="radio"
								name="participant"
								id="players"
								value="players" />
							<label for="teams">Equipes</label>
							<input
								type="radio"
								name="participant"
								id="teams"
								value="teams" />
						</div>
					</div>
				</div>
			</div>
			<!-- FIN CONTAINER INFORMATION DU JEU -->

			<!-- CONTAINER STRUCTURE DU TOURNOI  -->
			<div
				class="container-parameter-form container-parameter-form-structure">
				<div class="title-container dropdown-structure">
					<h3>Structure du tournoi</h3>
					<img
						src="/assets/img/General/arrow-down-sign-to-navigate.png"
						alt="fleche pour ouvrir et fermer la fenetre des parametre"
						class="dropdown" />
				</div>
				<div class="general" id="structure-tournament">
					<div class="responsiv-structure-info">
						<label for="date-tournament">Date :</label>
						<input
							type="date"
							id="date-tournament"
							name="date-tournament"
							required />
						<label for="format-select">Choix de la plateforme :</label>
						<select name="format-select" id="format-select">
							<option value="" selected>--Choisissez un format--</option>
							<option value="elim-direct">Elimination direct</option>
							<option value="round-robin">Round-robin</option>
						</select>
						<p>Type de tournois</p>
						<div class="container-radio">
							<input
								type="radio"
								name="type-tournament"
								id="public"
								value="public" />
							<label for="public"> Public </label>
							<input
								type="radio"
								name="type-tournament"
								id="private"
								value="private" />
							<label for="private"> Privée </label>
						</div>
						<p>Accepter toutes les inscriptions :</p>
						<div class="container-radio">
							<input
								type="radio"
								name="accept-sub"
								id="auto-sub-on"
								value="auto-sub-on" />
							<label for="auto-sub-on"> Oui </label>
							<input
								type="radio"
								name="accept-sub"
								id="auto-sub-off"
								value="auto-sub-off" /><label for="auto-sub-off"> Non </label>
						</div>
					</div>
					<div class="responsiv-structure-info">
						<label for="rules">Règles :</label>
						<textarea name="rules" id="rules"></textarea>
						<label for="rewards">
							Prix :
						</label>
						<textarea name="rewards" id="rewards" required></textarea>
					</div>
				</div>
			</div>
			<!-- FIN CONTAINER STRUCTURE DU TOURNOI -->

			<div class="container-button-create">
				<button class="button-create">Creer le tournoi</button>
			</div>
		</form>
	</div>
</main>

<?php
template('default', [
	'title'   => 'Création de tournoi',
	'css'     => 'tournament/create',
	'js'      => 'tournament/create',
	'content' => ob_get_clean(),
]);
?>