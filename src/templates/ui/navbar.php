<nav class="nav-top">
	<div class="icon-hamb">
		<div class="container-icon btn-1">
			<div class="lign"></div>
			<div class="lign"></div>
			<div class="lign"></div>
		</div>
	</div>

	<img
		class="logo-nav"
		src="/assets/img/Mobile/gamingTournamentLogo.webp"
		alt="Logo Gaming Tournament" />
</nav>

<!-- SIDE NAVBAR mobile qui sera adapté au desktop avec les @media -->

<nav class="navbar-side">
	<ul>
		<li class="logo-side-navbar" alt="Logo gaming tournament"></li>
		<li>
			<img src="/assets/img/General/home.png" alt="Icone accueil" />
			<a href="/">Accueil</a>
		</li>
		<li>
			<img
				src="/assets/img/General/calendar.png"
				alt="Icone mes tournois" />
			<a href="/tournament/myTournaments">Mes tournois</a>
		</li>
		<li>
			<img
				src="/assets/img/General/crown.png"
				alt="Icone creation de tournoi" />
			<a href="/tournament/create">Créer tournois</a>
		</li>
		<li>
			<img
				src="/assets/img/General/play-button.png"
				alt="Icone accueil" />
			<a href="/tournament/joined">Tournois rejoints</a>
		</li>
		<li class="divider-nav"></li>
		<li>
			<img src="/assets/img/General/feedback.png" alt="Icone feedback" />
			<a href="">Feedback</a>
		</li>
	</ul>
	<ul>
		<li class="divider-nav"></li>
		<?php if (!empty($_SESSION['email'])) { ?>
			<li class="block">
				<img src="/assets/img/General/user.png" alt="Icone profil" />
				<a href="/myProfil"> Mon profil <span>(<?= $_SESSION['nickname'] ?>)</span> </a>
			</li>
			<li class="block">
				<img src="/assets/img/General/user.png" alt="Icone profil" />
				<a href="/logout">Déconnexion</a>
			</li>

			<?php if ($_SESSION['email'] == 'pigny.kenny@gmail.com') { ?>
				<li>
					<img
						src="/assets/img/General/add-user.png"
						alt="Icone admin" />
					<a href="/AdminDashboard">Tableau de bord</a>
				</li>
			<?php } ?>
		<?php
		} else { ?>
			<li class="block">
				<img src="/assets/img/General/user.png" alt="Icone connection" />
				<a href="/login">Connection</a>
			</li>

			<li>
				<img
					src="/assets/img/General/add-user.png"
					alt="Icone inscription" />
				<a href="/signUp">Inscription</a>
			</li>

		<?php } ?>


	</ul>
</nav>