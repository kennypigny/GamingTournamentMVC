    <?php ob_start() ?>
    <main>
      <h1>TABLEAU DE BORD ADMINISTRATEUR :</h1>
      <!-- SECTION TOURNOIS -->
      <div class="box">
        <div class="title-box dropdown-tournament-admin">
          <h2>Les tournois</h2>
          <img
            src="./assets/img/General/arrow-down-sign-to-navigate.png"
            alt="fleche pour ouvrir et fermer la fenetre des parametre" />
        </div>
        <div class="container-resume">
          <div class="number-resume">
            <p>Total :</p>
            <span class="blue" id="tournament-waiting">5</span>
          </div>
          <div class="number-resume">
            <p>En cours :</p>
            <span class="green" id="tournament-accept">3</span>
          </div>
          <div class="number-resume">
            <p>A venir :</p>
            <span class="orange" id="tournament-canceled">2</span>
          </div>
          <div class="number-resume">
            <p>Terminée :</p>
            <span class="red" id="tournament-refused">0</span>
          </div>
        </div>
        <div class="container-search">
          <div class="search-bar">
            <div class="input-search-container">
              <h3>Rechercher un tournoi :</h3>
              <input
                type="text"
                id="tournament-search"
                placeholder="Rechercher un tournoi..." />
              <label for="tournament-search"><img
                  src="./assets/img/General/searchIcon.png"
                  alt="Icone de recherche" /></label>
            </div>
          </div>
        </div>
        <!-- container des resultats de la recherche de tournois -->
        <div class="container-result-search">
          <!-- carte tournois -->
          <div class="card-tournament">
            <a href="./tournamentManagement.html" target="_blank">
              <div class="banner-card-tournament"></div>
              <h4>
                T1 tournament | 16 teams | direct elimination | Cashprize 2500RP
              </h4>
              <div class="info-date-tournament">
                <img
                  src="./assets/img/General/schedule.png"
                  alt="Icone calendrier" />
                <p>Tue dec 24</p>
                <img
                  src="./assets/img/General/clock.png"
                  alt="Icone horloge" />
                <p>19:00 AM CET</p>
                <p>in 3 days</p>
              </div>
              <div class="divider-card"></div>
              <h5>Région</h5>
              <div class="divider-card"></div>
              <h6>Nom de l'organisateur</h6>
            </a>
          </div>
          <!-- fin carte tournoi -->
          
        </div>
      </div>

      <!-- SECTION UTILISATEUR  -->
      <div class="box">
        <div class="title-box dropdown-tournament-admin">
          <h2>Utilisateurs</h2>
          <img
            src="./assets/img/General/arrow-down-sign-to-navigate.png"
            alt="fleche pour ouvrir et fermer la fenetre des parametre" />
        </div>
        <div class="container-resume">
          <div class="number-resume">
            <p>Total :</p>
            <span class="blue" id="tournament-waiting"><?= $countUsers['user_count']; ?></span>
          </div>
          <div class="number-resume">
            <p>Connectés :</p>
            <span class="green" id="tournament-accept">0</span>
          </div>
          <div class="number-resume">
            <p>Inscrit/mois :</p>
            <span id="tournament-canceled">2</span>
          </div>
          <div class="number-resume">
            <p>Inscrit/tournois :</p>
            <span id="tournament-refused">0</span>
          </div>
        </div>
        <div class="container-search">
          <div class="search-bar">
            <div class="input-search-container">
              <h3>Rechercher un utilisateur :</h3>
              <input
                type="text"
                id="users-search"
                placeholder="Rechercher un utilisateur..." />
              <label for="users-search">
                <img
                  src="./assets/img/General/searchIcon.png"
                  alt="Icone de recherche" /></label>
            </div>
          </div>
        </div>

        <!-- container des résultats de la recherche utilisateur -->
        <div class="container-result-search-user">
          <div class="table-title">
            <h4>Nom</h4>
            <h4>Email</h4>
            <h4>Pseudo</h4>
          </div>
          <ul class="list-users">
            <?php showUsers() ?>
          </ul>
        </div>
      </div>
    </main>

    <?php template('default', [
      'css' => 'adminDashboard',
      'title' => 'Dashboard Admin',
      'content' => ob_get_clean()
    ]) ?>