<?php
/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 18/03/2016
 * Time: 14:24
 */
?>
<div class="col-lg">
	<div class="col-sm-2">
		<div class="sidebar-nav" id="fixedtop">
			<div class="navbar navbar-default" role="navigation">
				<div class="navbar-collapse collapse sidebar-navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="navbar-brand">Barre d'administration</li>
						<?php if ($projects!=null): ?>
						<li><a href="#projets"><i class="fa fa-leanpub"></i> Projets</a></li>
						<?php endif; if ($trainings!=null): ?>
						<li><a href="#formations"><i class="fa fa-university"></i> Formations</a></li>
						<?php endif; if ($categories!=null): ?>
						<li><a href="#competences"><i class="fa fa-check"></i> Compétences</a></li>
						<?php endif; if ($experiences!=null): ?>
						<li><a href="#experiences"><i class="fa fa-cogs"></i> Expériences</a></li>
						<?php endif; if ($user!=null): ?>
						<li><a href="#contact"<i class="fa fa-user"></i> Contact</a></li>
						<?php endif ?>
						<li><a href="#"><i class="fa fa-arrow-up"></i> Retour en haut</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
</div>

<section class="container">
	<?php if ($projects!=null): ?>
	<section id="projets">
		<div class="panel panel-default">
			<div class="panel-heading"><i class="fa fa-leanpub"></i> Mes projets</div>
			<div class="panel-body">
				<?php foreach($projects as $project):
				if ($project['visible']):?>
				<div class="panel panel-primary training-cards">
					<div class="panel-heading" style="padding: 5px;">
						<h3 class="panel-title panel-custom-title pull-left">
							<?= $project['intitule']?>
						</h3>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2">
								<img src="<?=img_url($project['image'][0]['url_image'])?>" alt="<?=$project['image'][0]['alt']?>" class="img-rounded" style="width: 100px; height: 100px" />
							</div>
							<div class="col-md-10">
								<ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
									<li class="list-group-item"><b>Année :</b> <span class="training-data-year"><?= $project['annee']?></span></li>
									<li class="list-group-item">
										<b>Descriptif :</b>
										<br>
										<p class="training-data-details"><?= $project['description']?></p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php endif;
				endforeach ?>
			</div>
		</div>
	</section>
	<?php endif;
	if ($trainings!=null): ?>
		<section id="formations">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-university"></i> Mes formations</div>
				<div class="panel-body">
					<?php foreach($trainings as $training):
						if ($training['visible']==1):?>
						<div class="panel panel-primary training-cards">
							<div class="panel-heading" style="padding: 5px;">
								<h3 class="panel-title panel-custom-title pull-left">
									<?= $training['intitule']?>
								</h3>
								<div class="clearfix"></div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
											<li class="list-group-item"><b>Année :</b> <span class="training-data-year"><?= $training['annee']?></span></li>
											<li class="list-group-item"><b>Diplôme :</b> <span class="training-data-year"><?= $training['diplome']?></span></li>
											<li class="list-group-item"><b>Lieu :</b> <span class="training-data-year"><?= $training['lieu']?></span></li>
											<li class="list-group-item">
												<b>Descriptif :</b>
												<br>
												<p class="training-data-details"><?= $training['description']?></p>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php
					endif;
					endforeach ?>
				</div>
			</div>
		</section>
	<?php endif;
	if ($categories!=null): ?>
		<section id="competences">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-check"></i> Mes Compétences</div>
				<div class="panel-body">
					<?php foreach($categories as $category): ?>
						<div class="panel panel-primary training-cards">
							<div class="panel-heading" style="padding: 5px;">
								<h3 class="panel-title panel-custom-title pull-left">
									<?= $category['libelle']?>
								</h3>
								<div class="clearfix"></div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
											<?php foreach($category['skills'] as $skill): ?>
												<li class="list-group-item">
													<b><?=$skill['libelle']?></b>
													<div class="progress">
														<div class="progress-bar" role="progressbar" aria-valuenow="<?= $skill['niveau']?>"
														     aria-valuemin="0" aria-valuemax="100" style="width:<?= $skill['niveau']?>%">
															<span class="sr-only"><?= $skill['niveau']?>%</span>
														</div>
													</div>
												</li>
											<?php endforeach ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>
	<?php endif;
	if ($experiences!=null): ?>
	<section id="experiences">
		<div class="panel panel-default">
			<div class="panel-heading"><i class="fa fa-cogs"></i> Mes expériences</div>
			<div class="panel-body">
				<?php foreach($experiences as $experience):
					if ($experience['visible']==1):?>
						<div class="panel panel-primary training-cards">
							<div class="panel-heading" style="padding: 5px;">
								<h3 class="panel-title panel-custom-title pull-left">
									<?= $experience['poste']?>
								</h3>
								<div class="clearfix"></div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
											<li class="list-group-item"><b>Année :</b> <span class="training-data-year"><?= $experience['annee']?></span></li>
											<li class="list-group-item"><b>Entreprise :</b> <span class="training-data-year"><?= $experience['entreprise']?></span></li>
											<li class="list-group-item"><b>Lieu :</b> <span class="training-data-year"><?= $experience['lieu']?></span></li>
											<li class="list-group-item"><b>Détails :</b> <span class="training-data-year"><?= $experience['detail']?></span></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<?php
					endif;
				endforeach ?>
			</div>
		</div>
	</section>
	<?php endif;
	if ($user!=null): ?>
		<section id="contact">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-user"></i> Profil</div>
				<div class="panel-body">
					<?php foreach($experiences as $experience):
						if ($experience['visible']==1):?>
							<div class="panel panel-primary training-cards">
								<div class="panel-heading" style="padding: 5px;">
									<h3 class="panel-title panel-custom-title pull-left">
										<?= $experience['poste']?>
									</h3>
									<div class="clearfix"></div>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
												<li class="list-group-item"><b>Année :</b> <span class="training-data-year"><?= $experience['annee']?></span></li>
												<li class="list-group-item"><b>Entreprise :</b> <span class="training-data-year"><?= $experience['entreprise']?></span></li>
												<li class="list-group-item"><b>Lieu :</b> <span class="training-data-year"><?= $experience['lieu']?></span></li>
												<li class="list-group-item"><b>Détails :</b> <span class="training-data-year"><?= $experience['detail']?></span></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<?php
						endif;
					endforeach ?>
				</div>
			</div>
		</section>
	<?php endif;?>
</section>

<script>
	var divCardLayout = '<div class="panel-heading" style="padding: 5px;"> <h3 class="panel-title panel-custom-title pull-left"></h3> <button class="btn btn-default training-edit"><i class="fa fa-pencil-square"></i></button> <button class="btn btn-default training-delete"><i class="fa fa-trash"></i></button> <button class="btn btn-default training-up-order"><i class="fa fa-arrow-up"></i></button> <button class="btn btn-default training-down-order"><i class="fa fa-arrow-down"></i></button> <div class="clearfix"></div> </div> <div class="panel-body"> <ul class="list-group" id="list-group-admin" style="margin-bottom: 0;"> <li class="list-group-item "><b>Diplôme :</b> <span class="training-data-diploma"></span></li> <li class="list-group-item"><b>Année :</b> <span class="training-data-year"></span></li> <li class="list-group-item"><b>Ville :</b> <span class="training-data-city"></span></li> <li class="list-group-item"> <b>Descriptif :</b> <br> <p class="training-data-details"></p> </li> <li class="training-data-visible" style="display: none;"> </li> <li class="training-data-order" style="display: none;"> </li> <li class="training-data-id" style="display: none;"> </li> </ul> </div>';
	var submitTrainingButton = document.querySelector('#submit_training');
	var upOrderButton = document.querySelector("#training-up-order");

	var newCard = "";

	submitTrainingButton.addEventListener("click", function(e) {
		e.preventDefault();
		var cardsParent = document.querySelector('.panel-custom-height');
		var newCard = document.createElement('div');
		newCard.className = "panel panel-primary training-cards";
		newCard.innerHTML = divCardLayout;
		cardsParent.appendChild(newCard);

		//Form
		var formTraining = document.querySelector("#add_training_form");

		console.dir(formTraining);

		//Card
		newCard.querySelector(".panel-custom-title").innerText = formTraining.training.value;
		newCard.querySelector(".training-data-diploma").innerText = formTraining.diploma.value;
		newCard.querySelector(".training-data-year").innerText = formTraining.year.value;
		newCard.querySelector(".training-data-city").innerText = formTraining.city.value;
		newCard.querySelector(".training-data-details").innerText = formTraining.details.value;
		//newCard.querySelector(".training-data-visible").innerText = formTraining.visible.value;
		//newCard.querySelector(".training-data-order");

		//var trainingVisible = formTraining.visible.value;


		var xhr = new XMLHttpRequest();
		var form = new FormData(formTraining);

		xhr.open("POST", "<?=base_url()?>" + "index.php/Administration/add_user_training");
		xhr.send(form);

		xhr.addEventListener("load", function(){
			newCard.querySelector(".training-data-id").innerText = xhr.responseText;
		}, false);


		/*for(var i = 0; i < formTraining.length; i++){
		 formTraining.elements[i].value = "";
		 }*/


		attachEventToCard(newCard);

	}, false);

	function upCard(card) {
		var movedCard = card.cloneNode(true);
		attachEventToCard(movedCard);
		if(card.previousElementSibling) {
			card.parentNode.insertBefore(movedCard, card.previousElementSibling);
			card.parentNode.removeChild(card);
		}

	}

	function downCard(card) {
		var movedCard = card.cloneNode(true);
		attachEventToCard(movedCard);

		card.parentNode.insertBefore(movedCard, card.nextElementSibling.nextSibling);
		card.parentNode.removeChild(card);
	}

	function editCard(card) {
		var formTraining = document.querySelector("#add_training_form");

		formTraining.training.value = card.querySelector(".panel-custom-title").innerText;
		formTraining.diploma.value = card.querySelector(".training-data-diploma").innerText;
		formTraining.year.value = card.querySelector(".training-data-year").innerText;
		formTraining.city.value = card.querySelector(".training-data-city").innerText;
		formTraining.details.value = card.querySelector(".training-data-details").innerText;
		formTraining.submit.innerText = "Sauvegarder";
	}

	function attachEventToCard(newCard) {
		newCard.querySelector(".training-up-order").addEventListener("click", function(){ upCard(newCard); }, false);
		newCard.querySelector(".training-down-order").addEventListener("click", function() { downCard(newCard); }, false);
		newCard.querySelector(".training-edit").addEventListener("click", function() { editCard(newCard); }, false);
	}

	function init() {
		var allCards = document.querySelectorAll(".training-cards");
		for(var i = 0; allCards.length > i; i++) {
			attachEventToCard(allCards[i]);
		}
	}

	init();

</script>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>