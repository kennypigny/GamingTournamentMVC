<?php ob_start() ?>
<main>
  <div class="main-container-tournament-management">
    <h1>Gestion du tournoi : <br /><em>*Nom du tournoi*</em></h1>
    <div class="info-general-tournament-management">
      <div class="title-sheet-tournament dropdown-info-sheet-tournament">
        <h2>Information générale</h2>
        <img
          src="/assets/img/General/arrow-down-sign-to-navigate.png"
          alt="fleche pour ouvrir et fermer la fenetre des parametre"
          class="dropdown" />
      </div>
      <div class="container-info-description">
        <div class="card-tournament-management">
          <img
            src="/assets/img/General/MiniBannière-lol323x100.webp"
            alt="Banniere du tournoi" />
          <div class="info-card">
            <h3>Titre :</h3>
            <h4 class="titre">
              T1 tournament | 16team | Elimination direct | Cashprize 2500RP
            </h4>
            <div class="container-divider-card">
              <div class="container-left">
                <h3>Jeux :</h3>
                <p>League of legend</p>
                <h3>Région :</h3>
                <p>Eu West</p>
                <h3>Date :</h3>
                <p>20 / 12 / 2024</p>
                <h3>Discord :</h3>
                <p class="discord">https://discord.gg/QJmFR7Fg</p>
              </div>
              <div class="container-right">
                <h3>Plateforme :</h3>
                <p>PC</p>
                <h3>Type :</h3>
                <p>Privée</p>
                <h3>Heure</h3>
                <p>09:00 PM CET</p>
                <h3>Nb de joueurs</h3>
                <p>
                  <span id="sub-players">1</span> /
                  <span id="total-players">16</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="divider-sheet-tournament-first"></div>
        <div class="description-tournament">
          <h3>Description</h3>
          <p>
            Tournoi inter-écoles organisé par La Manu : affrontez les
            meilleures Joueurs des écoles de votre région dans une
            compétition intense ! =^_^=
          </p>
          <div class="divider-sheet-tournament"></div>
          <h3>Règles</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
            vel lectus ante. Suspendisse ac neque molestie, interdum velit
            eget, suscipit metus. Donec dignissim nulla mi, lacinia commodo
            quam vel. Lorem ipsum dolor sit amet, consectetur adipiscing
            elit. Mauris vel lectus ante. Suspendisse ac neque molestie,
            interdum velit eget, suscipit metus. Donec dignissim nulla mi,
            lacinia commodo quam vel. Lorem ipsum dolor sit amet,
            consectetur adipiscing elit. Mauris vel lectus ante. Suspendisse
            ac neque molestie, interdum velit eget, suscipit metus. Donec
            dignissim nulla mi, lacinia commodo quam vel.
          </p>
          <div class="divider-sheet-tournament"></div>
          <h3>Prix</h3>
          <p>
            1st : Lorem ipsum dolor sit amet,<br /><br />
            2nd & 3rd : Lorem ipsum dolor sit amet,<br /><br />
            3e & 5e : Lorem ipsum dolor sit amet,
          </p>
        </div>
        <div class="container-button-info-general">
          <button class="button-info-general">
            <a href="/tournament/modification" target="_blank">Modifier</a>
          </button>
        </div>
        <div class="container-button-info-general">
          <button class="button-info-general">
            <a href="/tournament/sheet" target="_blank">Feuille du tournoi</a>
          </button>
        </div>
      </div>
    </div>
    <!-- CONTAINER DE LA SECTION PARTICIPANT ET INSCRIPTION  -->
    <div class="tournament-management">
      <!-- BOX PLAYERS -->
      <div class="players">
        <div class="title-sheet-tournament dropdown-players-tournament">
          <h2>Joueurs</h2>
          <img
            src="/assets/img/General/arrow-down-sign-to-navigate.png"
            alt="fleche pour ouvrir et fermer la fenetre des parametre"
            class="dropdown" />
        </div>
        <div class="container-players">
          <div class="top-box-players">
            <div class="number-tournament">
              <span id="number-of-players">5</span>
              <p>Joueurs</p>
            </div>
            <div class="number-tournament">
              <span id="size-of-tournament">16</span>
              <p>Taille du tournoi</p>
            </div>
          </div>
          <div class="bottom-box-players">
            <div class="title-bottom-box">
              <h3>Liste des joueurs</h3>
              <button id="add-player" class="add">Ajouter</button>
            </div>
            <!-- tableau des joueurs inscrit  -->
            <table class="table-players">
              <thead>
                <tr>
                  <th></th>
                  <th>Pseudo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <label for="list-player1" aria-label="Joueur inscrit"><input
                        type="checkbox"
                        name="list-player1"
                        id="list-player1" /></label>
                  </td>
                  <td>Joueur 1</td>
                  <td>
                    <img
                      src="/assets/img/General/crayon.png"
                      alt="Icone modifier" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="list-player1" aria-label="Joueur inscrit"><input
                        type="checkbox"
                        name="list-player1"
                        id="list-player1" /></label>
                  </td>
                  <td>Joueur 2</td>
                  <td>
                    <img
                      src="/assets/img/General/crayon.png"
                      alt="Icone modifier" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="list-player1" aria-label="Joueur inscrit"><input
                        type="checkbox"
                        name="list-player1"
                        id="list-player1" /></label>
                  </td>
                  <td>Joueur 3</td>
                  <td>
                    <img
                      src="/assets/img/General/crayon.png"
                      alt="Icone modifier" />
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <img
                      src="/assets/img/General/poubelle.png"
                      alt="Icone supprimer" />
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <!-- BOX REGISTRATION -->
      <div class="registration">
        <div
          class="title-sheet-tournament dropdown-registration-tournament">
          <h2>Inscriptions</h2>
          <img
            src="/assets/img/General/arrow-down-sign-to-navigate.png"
            alt="fleche pour ouvrir et fermer la fenetre des parametre"
            class="dropdown" />
        </div>
        <div class="container-registration">
          <div class="top-box-registration">
            <div class="number-registration">
              <span class="blue" id="number-waiting">5</span>
              <p class="blue">En attente</p>
            </div>
            <div class="number-registration">
              <span class="red" id="number-refused">0</span>
              <p class="red">Refusés</p>
            </div>
            <div class="number-registration">
              <span class="green" id="number-accept">5</span>
              <p class="green">Acceptés</p>
            </div>
            <div class="number-registration">
              <span class="orange" id="number-canceled">2</span>
              <p class="orange">Annulés</p>
            </div>
          </div>
          <div class="bottom-box-registration">
            <div class="title-bottom-box">
              <h3>Inscription en attente</h3>
            </div>
            <!-- tableau des joueurs en attente de validation  -->
            <table class="table-registration">
              <thead>
                <tr>
                  <th>Pseudo</th>
                  <th class="green">A</th>
                  <th class="red">R</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Joueur 6</td>
                  <td>
                    <label
                      for="registration-accepted1"
                      aria-label="Accepter l'inscription">
                      <input
                        type="radio"
                        id="registration-accepted1"
                        name="registration1" /></label>
                  </td>
                  <td>
                    <label
                      for="registration-canceled1"
                      aria-label="Refuser l'inscription"></label>
                    <input
                      type="radio"
                      id="registration-canceled1"
                      name="registration1" />
                  </td>
                </tr>
                <tr>
                  <td>Joueur 7</td>
                  <td>
                    <label
                      for="registration-accepted2"
                      aria-label="Accepter l'inscription">
                      <input
                        type="radio"
                        id="registration-accepted2"
                        name="registration2" /></label>
                  </td>
                  <td>
                    <label
                      for="registration-canceled2"
                      aria-label="Refuser l'inscription">
                      <input
                        type="radio"
                        id="registration-canceled2"
                        name="registration2" /></label>
                  </td>
                </tr>
                <tr>
                  <td>Joueur 8</td>
                  <td>
                    <label
                      for="registration-accepted3"
                      aria-label="Accepter l'inscription">
                      <input
                        type="radio"
                        id="registration-accepted3"
                        name="registration3" /></label>
                  </td>
                  <td>
                    <label
                      for="registration-canceled3"
                      aria-label="Refuser l'inscription">
                      <input
                        type="radio"
                        id="registration-canceled3"
                        name="registration3" /></label>
                  </td>
                </tr>
                <tr>
                  <td>Joueur 9</td>
                  <td>
                    <label
                      for="registration-accepted4"
                      aria-label="Accepter l'inscription">
                      <input
                        type="radio"
                        id="registration-accepted4"
                        name="registration4" /></label>
                  </td>
                  <td>
                    <label
                      for="registration-canceled4"
                      aria-label="Refuser l'inscription">
                      <input
                        type="radio"
                        id="registration-canceled4"
                        name="registration4" /></label>
                  </td>
                </tr>
                <tr>
                  <td>Joueur 10</td>
                  <td>
                    <label
                      for="registration-accepted5"
                      aria-label="Accepter l'inscription"><input
                        type="radio"
                        id="registration-accepted5"
                        name="registration5" /></label>
                  </td>
                  <td>
                    <label
                      for="registration-canceled5"
                      aria-label="Refuser l'inscription">
                      <input
                        type="radio"
                        id="registration-canceled5"
                        name="registration5" /></label>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <button class="add">Valider</button>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="auto-accept">
            <p>Accepter automatiquement les inscriptions</p>
            <label for="auto-accept-yes"><input
                type="radio"
                id="auto-accept-yes"
                name="auto-accept" />
              Oui</label>
            <label for="auto-accept-no"><input type="radio" id="auto-accept-no" name="auto-accept" />
              Non</label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- BUTTON SUBMIT -->
  <div class="main-container-button-submit">
    <!-- <div class="container-button-submit">
          <button class="submit">Enregistrer</button>
        </div> -->
    <div class="container-button-submit">
      <button class="submit">Lancer</button>
    </div>

    <div class="container-button-submit">
      <button class="submit">Supprimer le tournoi</button>
    </div>
  </div>

  <!-- TREE TOURNAMENT MANAGEMENT  -->
  <div class="main-container-tournament-tree-management">
    <div class="container-tournament-tree-management">
      <div class="title-sheet-tournament dropdown-registration-tournament">
        <h2>Arbre du tournoi</h2>
        <img
          src="/assets/img/General/arrow-down-sign-to-navigate.png"
          alt="fleche pour ouvrir et fermer la fenetre des parametre"
          class="dropdown" />
      </div>
      <?php template('tournament/tree'); ?>
    </div>
  </div>
</main>

<?php template('default', [
  'title' => 'Gestion du tournoi',
  'css' => 'tournament/management',
  'js' => 'tournament/management',
  'secondaryJs' => 'tournament/treeSVG',
  'content' => ob_get_clean()
]); ?>