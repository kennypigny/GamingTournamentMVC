    <?php ob_start() ?>
    <header>
      <!-- LISTE LATERAL DES PARTICIPANT VISIBLE UNIQUEMENT EN VERSION tablette/desktop -->

      <div class="container-list-sub-desktop">
        <div class="list-sub">
          <h2>Participant :</h2>
          <ul>
            <li><a href="">Joueur 1</a></li>
            <li><a href="">Joueur 2</a></li>
            <li><a href="">Joueur 3</a></li>
            <li><a href="">Joueur 4</a></li>
            <li><a href="">Joueur 5</a></li>
          </ul>
        </div>
      </div>
    </header>
    <main>
      <!-- DEBUT DE LA SECTION INFORMATION GENERALE -->
      <h1>Feuille du tournoi : <br /><em>*Nom du tournoi*</em></h1>
      <div class="main-container-tournament-sheet">
        <div class="info-general-tournament-sheet">
          <div class="title-sheet-tournament dropdown-info-sheet-tournament">
            <h2>Information générale</h2>
            <img
              src="/assets/img/General/arrow-down-sign-to-navigate.png"
              alt="fleche pour ouvrir et fermer la fenetre des parametre"
              class="dropdown" />
          </div>
          <div class="container-info-description">
            <div class="card-tournament-sheet">
              <img
                src="/assets/img/General/MiniBannière-lol323x100.webp"
                alt="Banniere du tournoi" />
              <div class="info-card">
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
                    <p>https://discord.gg/QJmFR7Fg</p>
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
                meilleures équipes des écoles de votre région dans une
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
          </div>
        </div>
      </div>

      <!-- DEBUT DE LA SECTION STRUCTURE DU TOURNOI -->
      <div class="main-container-structure">
        <div class="container-structure-tournament">
          <div class="title-sheet-tournament dropdown-structure-tournament">
            <h2>Structure du tournoi</h2>
            <img
              src="/assets/img/General/arrow-down-sign-to-navigate.png"
              alt="fleche pour ouvrir et fermer la fenetre des parametre"
              class="dropdown" />
          </div>
          <div class="structure-tournament">
            <!-- DEBUT DE LA SECTION ARBRE DE TOURNOIS -->
            <?php template('tournament/tree'); ?>
          </div>
        </div>
      </div>
      </div>
      <div class="container-button-register">
        <button class="register-submit">S'inscrire</button>
      </div>
    </main>
    <?php template('default', [
      'title' => 'Feuille de tournoi',
      'css' => 'tournament/sheet',
      'js' => 'tournament/sheet',
      'secondaryJs' => 'tournament/treeSVG',
      'content' => ob_get_clean()
    ]) ?>