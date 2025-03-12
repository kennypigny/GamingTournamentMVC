<?php ob_start() ?>

<header>
  <!-- PHOTO DE PROFIL ET BANNIERE QU ON PEUX CHANGER AU CLICK -->
  <div class="container-banner-photo">
    <div class="banner-photo-profil">
      <form class="photo" method="POST" enctype="multipart/form-data">
        <img
          id="photo-profil"
          src="./assets/img/General/addPhoto.jpg"
          alt="Photo de profil" />
        <input
          type="file"
          id="upload-photo"
          name="photo"
          accept="images/*" />
        <!-- <button type="submit">valider</button> -->
      </form>
      <form class="banner" method="POST" enctype="multipart/form-data">
        <img
          id="banner-profil"
          src="./assets/img/General/addPhoto612x612.jpg"
          alt="Bannière de profil" />
        <input
          type="file"
          id="upload-banner"
          name="upload-banner"
          accept="images/*" />
      </form>
    </div>
  </div>
</header>
<!-- DEBUT DU MAIN -->
<main>
  <!-- CONTAINER PRINCIPAL QUI CONTIENT GENERAL / CHANGEMENT DE MOT DE PASSE et D EMAIL / SUPRESSION DU COMPTE -->

  <div class="container-info-profil">
    <div class="info-general">
      <!-- CONTAINER  GENERAL -->
      <div class="container-form">
        <div class="general box-info">
          <form method="POST">
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
                placeholder="<?= $dbUser['lastname'] ?>" />
              <small>
                <?= isset($error['lastname']) ? $error['lastname'] : ''; ?>
              </small>
              <label for="firstname">Prénom : </label>
              <input
                name="firstname"
                id="firstname"
                type="text"
                placeholder="<?= $dbUser['firstname'] ?>" />
              <small>
                <?= isset($error['firstname']) ? $error['firstname'] : ''; ?>
              </small>
              <label for="nickname">Pseudo : </label>
              <input
                name="nickname"
                id="nickname"
                type="text"
                placeholder="<?= $dbUser['pseudo'] ?>" />
              <small>
                <?= isset($error['nickname']) ? $error['nickname'] : ''; ?>
              </small>
              <label for="country">Pays : </label>
              <select name="country" id="country">
                <option value="" <?= $dbUser['country'] == NULL ? 'selected' : ' '  ?>>--Choisissez un pays--</option>
                <option value="france" <?= $dbUser['country'] == 'france' ?  'selected'  : ' '  ?>>France</option>
                <option value="espagne" <?= $dbUser['country'] == 'espagne' ? 'selected' : ' '  ?>>Espagne</option>
                <option value="angleterre" <?= $dbUser['country'] == 'angleterre' ? 'selected' : ' '  ?>>Angleterre</option>
                <option value="allemagne" <?= $dbUser['country'] == 'allemagne' ? 'selected' : ' '  ?>>Allemagne</option>
                <option value="belgique" <?= $dbUser['country'] == 'belgique' ? 'selected' : ' '  ?>>Belgique</option>
                <option value="suisse" <?= $dbUser['country'] == 'suisse' ? 'selected' : ' '  ?>>Suisse</option>
              </select>
              <div class="container-button-update">
                <button class="button-update" id="button-general">Mettre a jour</button>
              </div>
            </div>
          </form>
        </div>


        <!-- CONTAINER CHANGE PASSWORD -->
        <div class="change-password box-info">
          <form method="POST">
            <div class="title-container-profil">
              <h2>Changement de mot de passe</h2>
              <img
                src="./assets/img/General/arrow-down-sign-to-navigate.png"
                alt="fleche pour ouvrir et fermer la fenetre des parametre"
                class="dropdown dropdown-change-password" />
            </div>
            <div class="box-change-password box-dropdown">
              <p class="green">
                <?= isset($success['new-password']) ? $success['new-password'] : ''; ?>
              </p>
              <label for="password">Mot de passe actuel : </label>
              <input
                name="password"
                id="password"
                type="password"
                placeholder="**********" />
              <small>
                <?= isset($error['password']) ? $error['password'] : ''; ?>
              </small>
              <label for="new-password">Nouveau mot de passe : </label>
              <input
                name="new-password"
                id="new-password"
                type="password" />
              <small>
                <?= isset($error['new-password']) ? $error['new-password'] : ''; ?>
              </small>
              <label for="verify-password">Retapez votre nouveau mot de passe :
              </label>
              <input
                name="verify-password"
                id="verify-password"
                type="password" />
              <small>
                <?= isset($error['new-password']) ? $error['new-password'] : ''; ?>
              </small>
              <div class="container-button-update">
                <button class="button-update" id="button-change-password">
                  Mettre a jour
                </button>
              </div>
            </div>
          </form>

        </div>

        <!-- CONTAINER CHANGE EMAIL -->
        <div class="change-mail box-info">
          <form method="POST">

            <div class="title-container-profil">
              <h2>Changement d'email</h2>
              <img
                src="./assets/img/General/arrow-down-sign-to-navigate.png"
                alt="fleche pour ouvrir et fermer la fenetre des parametre"
                class="dropdown dropdown-change-mail" />
            </div>
            <div class="box-change-mail box-dropdown">
              <p class="green">
                <?= isset($success['new-mail']) ? $success['new-mail'] : ''; ?>
              </p>
              <label for="new-mail">Nouvelle email : </label>
              <input name="new-mail" id="new-mail" type="text" />
              <small>
                <?= isset($error['new-mail']) ? $error['new-mail'] : ''; ?>
              </small>
              <label for="password-new-mail">Entrer votre mot de passe : </label>
              <input
                name="password-new-mail"
                id="password-new-mail"
                type="password" />
              <small>
                <?= isset($error['password-new-mail']) ? $error['password-new-mail'] : ''; ?>
              </small>
              <button class="button-update" id="button-change-mail">
                Mettre a jour
              </button>
            </div>
          </form>
        </div>

        <!-- CONTAINER DELETE ACCOUNT -->
        <div class="delete-account box-info">
          <form method="POST">

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
              <small>
                <?= isset($error['delete-account']) ? $error['delete-account'] : ''; ?>
              </small>
              <div class="container-button-update">
                <button type="submit" class="button-update" name="delete" value="delete">Supprimer</button>
              </div>
            </div>
          </form>
        </div>
      </div>
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
          <?= template('cards/tournament'); ?>
          <?= template('cards/tournament'); ?>
          <?= template('cards/tournament'); ?>
          <?= template('cards/tournament'); ?>
          <?= template('cards/tournament'); ?>
          <?= template('cards/tournament'); ?>
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