<?php ob_start() ?>

<header>
  <!-- PHOTO DE PROFIL ET BANNIERE QU ON PEUX CHANGER AU CLICK -->
  <div class="container-banner-photo">
    <div class="banner-photo-profil">
      <div class="photo">
        <img
          id="photo-profil"
          src="./assets/img/General/addPhoto.jpg"
          alt="Photo de profil" />
        <input
          type="file"
          id="upload-photo"
          name="upload-photo"
          accept="images/*" />
      </div>
      <div class="banner">
        <img
          id="banner-profil"
          src="./assets/img/General/addPhoto612x612.jpg"
          alt="Bannière de profil" />
        <input
          type="file"
          id="upload-banner"
          name="upload-banner"
          accept="images/*" />
      </div>
    </div>
  </div>
</header>
<!-- DEBUT DU MAIN -->
<main>
  <!-- CONTAINER PRINCIPAL QUI CONTIENT GENERAL / CHANGEMENT DE MOT DE PASSE et D EMAIL / SUPRESSION DU COMPTE -->

  <div class="container-info-profil">
    <div class="info-general">
      <!-- CONTAINER  GENERAL -->
      <form method="POST">
        <div class="general box-info">
          <div class="title-container-profil">
            <h2>Général</h2>
            <img
              src="./assets/img/General/arrow-down-sign-to-navigate.png"
              alt="fleche pour ouvrir et fermer la fenetre des parametre"
              class="dropdown dropdown-general-profil" />
          </div>
          <div class="box-general box-dropdown">
            <label for="lastname">Nom :</label>
            <input
              name="lastname"
              id="lastname"
              type="text"
              placeholder="<?= $_SESSION['lastname'] ?>" />
            <p class="message-error letter-error-firstname">
              <?= isset($error['nickname']) ? $error['nickname'] : '2523'; ?>
            </p>
            <label for="firstname">Prénom : </label>
            <input
              name="firstname"
              id="firstname"
              type="text"
              placeholder="<?= $_SESSION['firstname'] ?>" />
            <p class="message-error letter-error-secondname">
              Le prénom doit contenir seulement les caractères a-z et A-Z
            </p>
            <label for="nickname">Pseudo : </label>
            <input
              name="nickname"
              id="nickname"
              type="text"
              placeholder="<?= $_SESSION['nickname'] ?>"
               />
            <p class="message-error letter-error-nickname">
              Le pseudo doit contenir seulement les caractères a-z , A-Z
            </p>
            <label for="country">Pays : </label>
            <select name="country" id="country" >
              <option value="" <?= $_SESSION['country'] == NULL ? 'selected' : ' '  ?>>--Choisissez un pays--</option>
              <option value="france"<?= $_SESSION['country'] == 'france' ?  'selected'  : ' '  ?>>France</option>
              <option value="espagne" <?= $_SESSION['country'] == 'espagne' ? 'selected' : ' '  ?>>Espagne</option>
              <option value="angleterre" <?= $_SESSION['country'] == 'angleterre' ? 'selected' : ' '  ?>>Angleterre</option>
              <option value="allemagne" <?= $_SESSION['country'] == 'allemagne' ? 'selected' : ' '  ?>>Allemagne</option>
              <option value="belgique" <?= $_SESSION['country'] == 'belgique' ? 'selected' : ' '  ?>>Belgique</option>
              <option value="suisse" <?= $_SESSION['country'] == 'suisse' ? 'selected' : ' '  ?>>Suisse</option>
            </select>
            <div class="container-button-update">
              <button class="button-update" id="button-general">Mettre a jour</button>
            </div>
          </div>
        </div>

        <!-- CONTAINER CHANGE PASSWORD -->
        <div class="change-password box-info">
          <div class="title-container-profil">
            <h2>Changement de mot de passe</h2>
            <img
              src="./assets/img/General/arrow-down-sign-to-navigate.png"
              alt="fleche pour ouvrir et fermer la fenetre des parametre"
              class="dropdown dropdown-change-password" />
          </div>
          <div class="box-change-password box-dropdown">
            <label for="password">Mot de passe actuel : </label>
            <input
              name="password"
              id="password"
              type="password"
              placeholder="**********"
               />
               <small><?= isset($error['password']) ?></small>
            <label for="new-password">Nouveau mot de passe : </label>
            <input
              name="new-password"
              id="new-password"
              type="password"
               />
            <p class="message-error password-error">
              Le mot de passe doit contenir au moins 8 caractères, une
              majuscule, une minuscule, un chiffre et un caractère spécial.
            </p>
            <label for="verify-password">Retapez votre nouveau mot de passe :
            </label>
            <input
              name="verify-password"
              id="verify-password"
              type="password"
               />
            <p class="message-error password-error-confirm">
              Le mot de passe ne correspond pas.
            </p>
            <div class="container-button-update">
              <button class="button-update" id="button-change-password">
                Mettre a jour
              </button>
            </div>
          </div>
        </div>

        <!-- CONTAINER CHANGE EMAIL -->
        <div class="change-mail box-info">
          <div class="title-container-profil">
            <h2>Changement d'email</h2>
            <img
              src="./assets/img/General/arrow-down-sign-to-navigate.png"
              alt="fleche pour ouvrir et fermer la fenetre des parametre"
              class="dropdown dropdown-change-mail" />
          </div>
          <div class="box-change-mail box-dropdown">
            <label for="new-mail">Nouvelle email : </label>
            <input name="new-mail" id="new-mail" type="text" />
            <label for="password-now-mail">Entrer votre mot de passe : </label>
            <input
              name="password-now-mail"
              id="password-now-mail"
              type="password" />
            <div class="container-button-update">
              <p class="message-error new-email-error">
                Entrer une adresse email valide.
              </p>

            </div>
            <button class="button-update" id="button-change-mail">
              Mettre a jour
            </button>
          </div>
        </div>

        <!-- CONTAINER DELETE ACCOUNT -->
        <div class="delete-account box-info">
          <div class="title-container-profil">
            <h2>Supprimer mon compte</h2>
            <img
              src="./assets/img/General/arrow-down-sign-to-navigate.png"
              alt="fleche pour ouvrir et fermer la fenetre des parametre"
              class="dropdown dropdown-delete-account" />
          </div>
          <div class="box-delete box-dropdown">
            <label for="delete-account">Entrer votre mot de passe : </label>
            <input
              name="delete-account"
              id="delete-account"
              type="password" />
            <div class="container-button-update">
              <button class="button-update">Supprimer</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- HISTORIQUE DES TOURNOIS -->
  <div class="container-history">
    <div class="history-tournament-profil">
      <div class="container-card">
        <div class="title-container-profil">
          <h2>Historique de mes tournois</h2>
          <img
            src="./assets/img/General/arrow-down-sign-to-navigate.png"
            alt="fleche pour ouvrir et fermer la fenetre des parametre"
            class="dropdown dropdown-history-profil" />
        </div>

        <div class="box-history-profil box-dropdown">
          <!-- carte tournois -->
          <div class="card-tournament">
            <a href="./tournamentSheet.html" target="_blank">
              <div class="banner-card-tournament"></div>
              <h4>
                T1 tournament | 16 teams | direct elimination | Cashprize
                2500RP
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
                <p>Terminé</p>
              </div>
              <div class="divider-card"></div>
              <h5>Région</h5>
              <div class="divider-card"></div>
              <h6>Nom de l'organisateur</h6>
            </a>
          </div>
          <!-- fin carte tournoi -->
          <!-- carte tournois -->
          <div class="card-tournament">
            <a href="./tournamentSheet.html" target="_blank">
              <div class="banner-card-tournament"></div>
              <h4>
                T1 tournament | 16 teams | direct elimination | Cashprize
                2500RP
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
                <p>Terminé</p>
              </div>
              <div class="divider-card"></div>
              <h5>Région</h5>
              <div class="divider-card"></div>
              <h6>Nom de l'organisateur</h6>
            </a>
          </div>
          <!-- fin carte tournoi -->
          <!-- carte tournois -->
          <div class="card-tournament">
            <a href="./tournamentSheet.html" target="_blank">
              <div class="banner-card-tournament"></div>
              <h4>
                T1 tournament | 16 teams | direct elimination | Cashprize
                2500RP
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
                <p>Terminé</p>
              </div>
              <div class="divider-card"></div>
              <h5>Région</h5>
              <div class="divider-card"></div>
              <h6>Nom de l'organisateur</h6>
            </a>
          </div>
          <!-- fin carte tournoi -->
          <!-- carte tournois -->
          <div class="card-tournament">
            <a href="./tournamentSheet.html" target="_blank">
              <div class="banner-card-tournament"></div>
              <h4>
                T1 tournament | 16 teams | direct elimination | Cashprize
                2500RP
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
                <p>Terminé</p>
              </div>
              <div class="divider-card"></div>
              <h5>Région</h5>
              <div class="divider-card"></div>
              <h6>Nom de l'organisateur</h6>
            </a>
          </div>
          <!-- fin carte tournoi -->
          <!-- carte tournois -->
          <div class="card-tournament">
            <a href="./tournamentSheet.html" target="_blank">
              <div class="banner-card-tournament"></div>
              <h4>
                T1 tournament | 16 teams | direct elimination | Cashprize
                2500RP
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
                <p>Terminé</p>
              </div>
              <div class="divider-card"></div>
              <h5>Région</h5>
              <div class="divider-card"></div>
              <h6>Nom de l'organisateur</h6>
            </a>
          </div>
          <!-- fin carte tournoi -->
          <!-- carte tournois -->
          <div class="card-tournament">
            <a href="./tournamentSheet.html" target="_blank">
              <div class="banner-card-tournament"></div>
              <h4>
                T1 tournament | 16 teams | direct elimination | Cashprize
                2500RP
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
                <p>Terminé</p>
              </div>
              <div class="divider-card"></div>
              <h5>Région</h5>
              <div class="divider-card"></div>
              <h6>Nom de l'organisateur</h6>
            </a>
          </div>
          <!-- fin carte tournoi -->
          <!-- carte tournois -->
          <div class="card-tournament">
            <a href="./tournamentSheet.html" target="_blank">
              <div class="banner-card-tournament"></div>
              <h4>
                T1 tournament | 16 teams | direct elimination | Cashprize
                2500RP
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
                <p>Terminé</p>
              </div>
              <div class="divider-card"></div>
              <h5>Région</h5>
              <div class="divider-card"></div>
              <h6>Nom de l'organisateur</h6>
            </a>
          </div>
          <!-- fin carte tournoi -->
          <!-- carte tournois -->
          <div class="card-tournament">
            <a href="./tournamentSheet.html" target="_blank">
              <div class="banner-card-tournament"></div>
              <h4>
                T1 tournament | 16 teams | direct elimination | Cashprize
                2500RP
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
                <p>Terminé</p>
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
    </div>
  </div>
</main>

<?php template('default', [
  'title' => 'Mon Profil',
  'css' => 'myProfil',
  'js' => 'myProfil',
  'content' => ob_get_clean()
]) ?>