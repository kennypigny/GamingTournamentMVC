<?php ob_start() ?>

<main>
  <h1>Modification du tournoi :</h1>
  <!-- enctype="multipart/form-data" pour l'envoie d'image de la banniere(backend) -->
  <div class="container-form">
    <form action="" enctype="multipart/form-data">
      <!-- DEBUT D UN CONTAINER DES PARAMETRES  -->
      <div class="responsiv-param">
        <div class="container-parameter-form">
          <div class="title-container dropdown-info">
            <h2>Information général</h2>
            <img
              src="/assets/img/General/arrow-down-sign-to-navigate.png"
              alt="fleche pour ouvrir et fermer la fenetre des parametre"
              class="dropdown" />
          </div>
          <div class="general" id="info-general">
            <label for="name-tournament">Nom du tournoi :
              <input
                name="name-tournament"
                id="name-tournament"
                type="text"
                required />
            </label>

            <label for="banner">Bannière : <span>(.jpeg .jpg .webp)</span>
              <input
                type="file"
                id="banner"
                name="banner"
                accept="images/*" />
            </label>

            <label for="discord">Discord :
              <input name="discord" id="discord" type="text" />
            </label>
            <label for="description">
              Description :
              <textarea
                name="description"
                id="description"
                required></textarea>
            </label>
          </div>
        </div>
        <!-- FIN CONTAINER PARAMETRES -->
        <!-- DEBUT D UN CONTAINER DES PARAMETRES  -->
        <div class="container-parameter-form">
          <div class="title-container dropdown-game">
            <h3>Information du jeu</h3>
            <img
              src="/assets/img/General/arrow-down-sign-to-navigate.png"
              alt="fleche pour ouvrir et fermer la fenetre des parametre"
              class="dropdown" />
          </div>
          <div class="general" id="info-game">
            <label for="games-select">Choix du jeu :
              <select name="games-select" id="games-select">
                <option value="" selected>--Choisissez un jeu--</option>
                <option value="lol">League of legend</option>
                <option value="fifa">Fifa</option>
                <option value="fortnite">Fortnite</option>
                <option value="wow">World of Warcraft</option>
                <option value="hearthstone">Hearthstone</option>
              </select>
            </label>
            <label for="region-select">Choix de la région :
              <select name="region-select" id="region-select">
                <option value="" selected>--Choisissez une region--</option>
                <option value="europe">Europe</option>
                <option value="asie">Asie</option>
                <option value="amnorth">Amérique du nord</option>
                <option value="amsouth">Amérique du sud</option>
              </select>
            </label>
            <label for="plateform-select">Choix de la plateforme :
              <select name="palteform-select" id="plateform-select">
                <option value="" selected>
                  --Choisissez une plateforme--
                </option>
                <option value="ps5">PS5</option>
                <option value="computer">PC</option>
                <option value="crossplay">Crossplay</option>
                <option value="switch">Nintendo Switch</option>
                <option value="xbox">Xbox série X/S</option>
              </select>
            </label>
            <div class="size-player">
              <label for="size">Taille :
                <input name="size" id="size" type="text" />
              </label>
              <label for="players">
                Joueurs
                <input
                  type="radio"
                  name="participant"
                  id="players"
                  value="players" />
              </label>
              <label for="teams">
                Equipes
                <input
                  type="radio"
                  name="participant"
                  id="teams"
                  value="teams" />
              </label>
            </div>
          </div>
        </div>
      </div>
      <!-- FIN CONTAINER PARAMETRES -->
      <!-- DEBUT D UN CONTAINER DES PARAMETRES  -->
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
            <label for="date-tournament">Date :
              <input
                type="date"
                id="date-tournament"
                name="date-tournament"
                required />
            </label>
            <label for="format-select">Choix de la plateforme :
              <select name="format-select" id="format-select">
                <option value="" selected>--Choisissez un format--</option>
                <option value="elim-direct">Elimination direct</option>
                <option value="round-robin">Round-robin</option>
              </select>
            </label>
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
            <label for="rules">
              Règles :
              <textarea name="rules" id="rules"></textarea>
            </label>
            <label for="rewards">
              Prix :
              <textarea name="rewards" id="rewards" required></textarea>
            </label>
          </div>
        </div>
      </div>
      <!-- FIN CONTAINER PARAMETRES -->
      <div class="container-button-info-general">
      <div class="container-button-create">
				<button class="button-create">Modifier le tournoi</button>
			</div>
      </div>
    </form>
  </div>
</main>

<?php template('default', [
  'title' => 'Modification du tournoi',
  'css' => 'tournament/create',
  'js' => 'tournament/modification',
  'content' => ob_get_clean()
]); ?>