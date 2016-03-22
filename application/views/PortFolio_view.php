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
						<li><a href="#projets"><i class="fa fa-leanpub"></i> Projets</a></li>
						<li><a href="#formations"><i class="fa fa-university"></i> Formations</a></li>
						<li><a href="#competences"><i class="fa fa-check"></i> Compétences</a></li>
						<li><a href="#experiences"><i class="fa fa-cogs"></i> Expériences</a></li>
						<li><a href="#contact"<i class="fa fa-user"></i> Contact</a></li>
						<li><a href="#"><i class="fa fa-arrow-up"></i> Retour en haut</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
</div>

<section class="container">
	<section id="projets">
		<div class="panel panel-default">
			<div class="panel-heading"><i class="fa fa-leanpub"></i> Mes projets</div>
			<div class="panel-body">
				<?php foreach($projects as $project):?>
				<div class="panel panel-primary training-cards">
					<div class="panel-heading" style="padding: 5px;">
						<h3 class="panel-title panel-custom-title pull-left">
							<?= $project['intitule']?>
						</h3>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
							<li class="list-group-item"><b>Année :</b> <span class="training-data-year">2014</span></li>
							<li class="list-group-item">
								<b>Descriptif :</b>
								<br>
								<p class="training-data-details"><?= $project['description']?></p>
							</li>
						</ul>
						<img src="<?=img_url($project['image'][0]['url_image'])?>" alt="<?=img_url($project['image'][0]['alt'])?>" style="width: 220px;" />
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
	<section id="formations">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-university"></i> Mes formations
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 panel-custom-height">
						<div class="panel panel-primary training-cards">
							<div class="panel-heading" style="padding: 5px;">
								<h3 class="panel-title panel-custom-title pull-left">
									BTS Commerce International
								</h3>
								<button class="btn btn-default training-edit"><i class="fa fa-pencil-square"></i></button>
								<button class="btn btn-default training-delete"><i class="fa fa-trash"></i></button>
								<button class="btn btn-default training-up-order"><i class="fa fa-arrow-up"></i></button>
								<button class="btn btn-default training-down-order"><i class="fa fa-arrow-down"></i></button>
								<div class="clearfix"></div>
							</div>
							<div class="panel-body">
								<ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
									<li class="list-group-item"><b>Diplôme :</b> <span class="training-data-diploma">Bac +2</span></li>
									<li class="list-group-item"><b>Année :</b> <span class="training-data-year">2014</span></li>
									<li class="list-group-item"><b>Ville :</b> <span class="training-data-city">Bordeaux</span></li>
									<li class="list-group-item">
										<b>Descriptif :</b>
										<br>
										<p class="training-data-details">Le titulaire de ce BTS est un professionnel de l'import-export travaillant généralement pour une société de négoce.</p>
									</li>
								</ul>
							</div>
						</div>
						<div class="panel panel-primary training-cards">
							<div class="panel-heading" style="padding: 5px;">
								<h3 class="panel-title panel-custom-title pull-left">
									Baccalauréat Scientifique
								</h3>
								<button class="btn btn-default training-edit"><i class="fa fa-pencil-square"></i></button>
								<button class="btn btn-default training-delete"><i class="fa fa-trash"></i></button>
								<button class="btn btn-default training-up-order"><i class="fa fa-arrow-up"></i></button>
								<button class="btn btn-default training-down-order"><i class="fa fa-arrow-down"></i></button>
								<div class="clearfix"></div>
							</div>
							<div class="panel-body">
								<ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
									<li class="list-group-item "><b>Diplôme :</b> Bac +2</li>
									<li class="list-group-item"><b>Année :</b> 2014</li>
									<li class="list-group-item"><b>Ville :</b> Bordeaux</li>
									<li class="list-group-item">
										<b>Descriptif :</b>
										<br>
										<p>Le titulaire de ce BTS est un professionnel de l'import-export travaillant généralement pour une société de négoce.</p>
									</li>
									<li style="display: none;"><span class="training-data-id"></span></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
						<div class="panel-body">
							<div class="panel panel-default">
								<div class="panel-body">
									<form id="add_training_form">
										<fieldset>
											<legend>Ajouter une formation</legend>
											<div class="form-group">
												<label for="company" class="control-label">Titre de la formation</label>
												<input type="text" name="training" id="training" class="form-control" placeholder="Formation">
											</div>
											<div class="form-group">
												<label for="diploma" class="control-label">Diplôme</label>
												<input type="text" name="diploma" id="diploma" class="form-control" placeholder="Diplôme">
											</div>
											<div class="form-group">
												<label for="year" class="control-label">Année</label>
												<input type="text" name="year" id="year" class="form-control" placeholder="Année">
											</div>
											<div class="form-group">
												<label for="city" class="control-label">Ville</label>
												<input type="text" name="city" id="city" class="form-control" placeholder="Ville">
											</div>
											<div class="form-group">
												<label for="details" class="control-label">Descriptif</label>
												<textarea class="form-control" name="details" id="details" rows="3"></textarea>
											</div>
											<div class="form-group">
												<label for="visible" class="control-label">Visible  <input type="checkbox" name="visible" id="visible"></label>
											</div>
											<input type="hidden" name="id_training" id="id_training">
											<button type="submit" name="submit" id="submit_training" class="btn btn-primary pull-right">Ajouter</button>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="competences">
		<div class="panel panel-default">
			<div class="panel-heading"><i class="fa fa-check"></i> Mes compétences</div>
			<div class="panel-body">
				<div class="panel panel-default col-lg-3" id="panelSkill">
					<div class="panel-heading"> Catégorie 1</div>
					<ul class="list-group">
						<li class="list-group-item"> Compétence 1 </li>
						<li class="list-group-item"> Compétence 2 </li>
					</ul>
				</div>
				<div class="panel panel-default col-lg-3" id="panelSkill">
					<div class="panel-heading"> Catégorie 2</div>
					<ul class="list-group">
						<li class="list-group-item"> Compétence 1 </li>
						<li class="list-group-item"> Compétence 2 </li>
					</ul>
				</div>
				<div class="panel panel-default col-lg-3" id="panelSkill">
					<div class="panel-heading"> Catégorie 3</div>
					<ul class="list-group">
						<li class="list-group-item"> Compétence 1 </li>
						<li class="list-group-item"> Compétence 2 </li>
					</ul>
				</div>
				<div class="panel panel-default col-lg-3" id="panelSkill">
					<div class="panel-heading"> Catégorie 4</div>
					<ul class="list-group">
						<li class="list-group-item"> Compétence 1 </li>
						<li class="list-group-item"> Compétence 2 </li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section id="experiences">
		<div class="panel panel-default">
			<div class="panel-heading"><i class="fa fa-cogs"></i> Mes expériences</div>
			<div class="panel-body">
				<?= "Voici mes expériences" ?>
				"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
				"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

				"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
				"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

				"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
				"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."

				"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
				"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
			</div>
		</div>
	</section>
	<section id="contact">
		<div class="panel panel-default">
			<div class="panel-heading"><i class="fa fa-user"></i> Mes informations personnelles</div>
			<div class="panel-body">
				<?=form_open("Administration/save")?>
				<?=form_fieldset('Informations personnelles')?>
				<?php foreach($results as $result) : ;?>
					<div class="col-lg-6">
						<div class="form-group">
							<?=form_label('Nom', 'name', array('class' => 'control-label'))?>
							<?=form_input(array('value' => $user['nom'],'name' => 'name', 'class' => 'form-control', 'id' => 'name', 'placeholder' => '', 'tabindex' => '1' ))?>
						</div>
						<div class="form-group">
							<?=form_label('Prénom', 'firstname', array('class' => 'control-label'))?>
							<?=form_input(array('value' => $user['prenom'],'name' => 'firstname', 'class' => 'form-control', 'id' => 'firstname', 'placeholder' => '', 'tabindex' => '2'))?>
						</div>
						<div class="form-group">
							<?=form_label('Téléphone', 'phone', array('class' => 'control-label'))?>
							<?=form_input(array('value' => $user['telephone'],'name' => 'phone', 'class' => 'form-control', 'id' => 'phone', 'placeholder' => '', 'tabindex' => '3'))?>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<?=form_label('Adresse', 'address', array('class' => 'control-label'))?>
							<?=form_input(array('value' => $user['adresse'],'name' => 'address', 'class' => 'form-control', 'id' => 'address', 'placeholder' => '', 'tabindex' => '7'))?>
						</div>
						<div class="form-group">
							<?=form_label('Code postal', 'zipcode', array('class' => 'control-label'))?>
							<?=form_input(array('value' => $user['code_postal'],'name' => 'zipcode', 'class' => 'form-control', 'id' => 'zipcode', 'placeholder' => '', 'tabindex' => '8'))?>
						</div>
						<div class="form-group">
							<?=form_label('Ville', 'city', array('class' => 'control-label'))?>
							<?=form_input(array('value' => $user['ville'],'name' => 'city', 'class' => 'form-control', 'id' => 'city', 'placeholder' => '', 'tabindex' => '9'))?>
						</div>
						<div class="form-group">
							<?=form_label('Complément d\'adresse', 'addressextra', array('class' => 'control-label'))?>
							<?=form_input(array('value' => $user['complement'],'name' => 'addressextra', 'class' => 'form-control', 'id' => 'addressextra', 'placeholder' => '', 'tabindex' => '10'))?>
						</div>
					</div>
				<?php endforeach ;?>
				<?=form_fieldset_close()?>

				<?=form_submit('', 'Modifier', array('class' => 'btn btn-default pull-right', 'tabindex' => '11'))?>
				<?=form_close()?>
			</div>
		</div>
	</section>
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