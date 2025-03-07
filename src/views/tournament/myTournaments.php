<?php ob_start() ?>
<main>
  <div class="main-container-organised-tournament">
    <div class="container-organised-tournament">
      <h1>Mes tournois organisés </h1>
      <div class="box-organised-tournament">
        <?php
        template('cards/tournament');
        template('cards/tournament');
        template('cards/tournament');
        template('cards/tournament');
        template('cards/tournament');
        template('cards/tournament');
        ?>

      </div>
    </div>
  </div>
</main>
<?php
template('default', [
  'title'   => 'Création de tournoi',
  'css'     => 'tournament/myTournaments',
  'content' => ob_get_clean(),
]);
?>