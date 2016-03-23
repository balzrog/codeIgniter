
<div class="col-lg">
    <div class="col-sm-2">
        <div class="sidebar-nav" id="fixedtop">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-collapse collapse sidebar-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="navbar-brand">Barre d'administration</li>
                        <li><a href="#Accueil"><i class="fa fa-home"></i> Accueil</a></li>
                        <li><a href="#Projets"><i class="fa fa-leanpub"></i> Projets</a></li>
                        <li><a href="#Formations"><i class="fa fa-university"></i> Formations</a></li>
                        <li><a href="#Compétences"><i class="fa fa-check"></i> Compétences</a></li>
                        <li><a href="#Expériences"><i class="fa fa-cogs"></i> Expériences</a></li>
                        <li><a href="#Contact"<i class="fa fa-user"></i> Contact</a></li>
                        <li><a href="#"><i class="fa fa-arrow-up"></i> Retour en haut</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
</div>

<section class="container">
    <section id="Accueil">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-home"></i> Configuration de l'accueil</div>
            <div class="panel-body">
                <?=form_open_multipart('Administration/savePortfolioInfos', array('id' => 'save_portfolio_infos'))?>
                <?=form_fieldset('Configuration de l\'accueil')?>
                <?php foreach($portfolio as $pf) : ;?>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?=form_label('Image', 'img', array('class' => 'control-label'))?>
                            <img src="<?=img_url($pf['url_image'])?>" class="img-responsive center-block" style="max-width: 280px;">
                        </div>
                        <div class="form-group">
                            <?=form_label('Modifier l\'image', 'image', array('class' => 'control-label', 'style' => 'display: block;'))?>
                            <label class="btn btn-default" for="image">
                                <?=form_upload(array('name' => 'userfile', 'id' => 'image', 'style' => 'display: none;'))?>
                                Parcourir...
                            </label>
                        </div>
                        <div class="form-group">
                            <?=form_label('Description', 'description', array('class' => 'control-label'))?>
                            <?=form_textarea(array('value' => $pf['about'],'name' => 'description', 'id' => 'description', 'class' => 'form-control', 'rows' => '7'))?>
                        </div>
                    </div>
                <?php endforeach ;?>
                <?=form_fieldset_close()?>
                <?=form_submit('', 'Modifier', array('value' => 'upload', 'class' => 'btn btn-default pull-right', 'tabindex' => '11'))?>
                <?=form_close()?>
            </div>
        </div>
    </section>
    <section id="Projets">
       <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-leanpub"></i> Mes projets</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 panel-custom-height panel-experience">
                        <?php foreach($projects as $project) : ?>
                            <div class="panel panel-primary project-cards">
                                <div class="panel-heading" style="padding: 5px;">
                                    <?=form_open('Administration/update_user_project/'.$project['id_projet'])?>
                                    <h3 class="panel-title panel-custom-title pull-left">
                                        <?=form_input(array('name' => 'title', 'class' => 'form-control', 'value' => $project['intitule'], 'style' => 'width: 80%;'))?>
                                    </h3>
                                    <button type="submit" class="btn btn-default proj-edit"><i class="fa fa-pencil-square"></i></button>
                                    <button class="btn btn-default proj-up-order"><i class="fa fa-arrow-up"></i></button>
                                    <button class="btn btn-default proj-down-order"><i class="fa fa-arrow-down"></i></button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
                                        <li class="list-group-item"><b>Illustration :</b>
                                        <br>
                                        <img src="<?=img_url($project['url_image'])?>" class="img-responsive center-block" style="max-width: 250px;">
                                        <li class="list-group-item"><b>Lien :</b>
                                            <?=form_input(array('name' => 'link', 'class' => 'form-control data-link', 'value' => $project['lien']))?>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Description du projet :</b>
                                            <?=form_textarea(array('value' => $project['description'], 'name' => 'description', 'id' => 'description', 'class' => 'form-control data-details', 'rows' => '3'))?>
                                        </li>
                                        <li class="data-visible none"><?=$project['visible']?></li>
                                        <li class="data-order none"><?=$project['ordre']?></li>
                                        <li class="data-id none"><?=$project['id_projet']?></li>
                                    </ul>
                                    <?=form_close()?>
                                    <!--<a class="pull-right" href="<?=base_url().'Administration/delete_user_project/'.$project['id_projet']?>"><i class="fa fa-trash"></i> <b>Supprimer</b></a>-->
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?=form_open_multipart('Administration/add_user_project', array('id' => 'add_project_form'))?>
                                    <?=form_fieldset('Ajouter un projet')?>
                                    <div class="form-group">
                                        <?=form_label('Nom du projet', 'title', array('class' => 'control-label'))?>
                                        <?=form_input(array('name' => 'title', 'id' => 'title', 'class' => 'form-control', 'placeholder' => 'Nom du projet'))?>
                                    </div>
                                    <div class="form-group">
                                        <?=form_label('Description', 'description', array('class' => 'control-label'))?>
                                        <?=form_textarea(array('name' => 'description', 'id' => 'description', 'class' => 'form-control', 'rows' => '6'))?>
                                    </div>
                                    <div class="form-group">
                                        <?=form_label('Lien vers la réalisation', 'link', array('class' => 'control-label'))?>
                                        <?=form_input(array('name' => 'link', 'id' => 'link', 'class' => 'form-control', 'placeholder' => 'Lien vers la réalisation'))?>
                                    </div>
                                    <!--<div class="form-group">
                                        <?=form_label('Ajouter une image', 'image', array('class' => 'control-label', 'style' => 'display: block;'))?>
                                        <label class="btn btn-default" for="image">
                                        <?=form_upload(array('name' => 'userfile', 'id' => 'image', 'style' => 'display: none;'))?>
                                            Parcourir...
                                        </label>
                                    </div>-->
                                    <div class="form-group">
                                        <label class="control-label" style="display: block;">Visible</label>
                                            <label class="radio-inline"><input type="radio" name="visible" id="visible" value="1" checked>Oui</label>
                                            <label class="radio-inline"><input type="radio" name="visible" id="visible" value="0">Non</label>
                                        </label>
                                    </div>
                                    <input type="hidden" name="id_project" id="id_project">
                                    <button type="submit" id="submit_project" class="btn btn-primary pull-right" value="upload">Ajouter</button>
                                    <?=form_fieldset_close()?>
                                    <?=form_close()?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Formations">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-university"></i> Mes formations
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 panel-custom-height panel-training">
                        <?php foreach($trainings as $training) : ?>
                        <div class="panel panel-primary training-cards">
                            <div class="panel-heading" style="padding: 5px;">
                                <?=form_open('Administration/update_user_training/'.$training['id_formation'])?>
                                <h3 class="panel-title panel-custom-title pull-left">
                                    <?=form_input(array('name' => 'training', 'class' => 'form-control', 'value' => $training['intitule'], 'style' => 'width: 80%;'))?>
                                </h3>
                                <button type="submit" class="btn btn-default training-edit"><i class="fa fa-pencil-square"></i></button>
                                <a href="<?=base_url().'Administration/delete_user_training/'.$training['id_formation']?>"><button class="btn btn-default training-delete"><i class="fa fa-trash"></i></button></a>
                                <button class="btn btn-default training-up-order"><i class="fa fa-arrow-up"></i></button>
                                <button class="btn btn-default training-down-order"><i class="fa fa-arrow-down"></i></button>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
                                    <li class="list-group-item"><b>Diplôme :</b>
                                        <?=form_input(array('name' => 'diploma', 'class' => 'form-control training-data-diploma', 'value' => $training['diplome']))?>
                                    </li>
                                    <li class="list-group-item"><b>Année :</b>
                                        <?=form_input(array('name' => 'year', 'class' => 'form-control training-data-year', 'value' => $training['annee']))?>
                                    </li>
                                    <li class="list-group-item"><b>Ville :</b>
                                        <?=form_input(array('name' => 'city', 'class' => 'form-control training-data-city', 'value' => $training['lieu']))?>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Descriptif :</b>
                                        <?=form_textarea(array('value' => $training['description'], 'name' => 'description', 'id' => 'description', 'class' => 'form-control training-data-details', 'rows' => '3'))?>
                                    </li>
                                    <li class="training-data-visible none"><?=$training['visible']?></li>
                                    <li class="training-data-order none"><?=$training['ordre']?></li>
                                    <li class="training-data-id none"><?=$training['id_formation']?></li>
                                </ul>
                            </div>
                            <?=form_close()?>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?=form_open('Administration/add_user_training', array('id' => 'add_training_form'))?>
                                        <?=form_fieldset('Ajouter une formation')?>
                                            <div class="form-group">
                                                <?=form_label('Titre de la formation', 'training', array('class' => 'control-label'))?>
                                                <?=form_input(array('name' => 'training', 'id' => 'training', 'class' => 'form-control', 'placeholder' => 'Formation'))?>
                                            </div>
                                            <div class="form-group">
                                                <?=form_label('Diplôme', 'diploma', array('class' => 'control-label'))?>
                                                <?=form_input(array('name' => 'diploma', 'id' => 'diploma', 'class' => 'form-control', 'placeholder' => 'Diplôme'))?>
                                            </div>
                                            <div class="form-group">
                                                <?=form_label('Année', 'year', array('class' => 'control-label'))?>
                                                <?=form_input(array('name' => 'year', 'id' => 'year', 'class' => 'form-control', 'placeholder' => 'Année'))?>
                                            </div>
                                            <div class="form-group">
                                                <?=form_label('Ville', 'city', array('class' => 'control-label'))?>
                                                <?=form_input(array('name' => 'city', 'id' => 'city', 'class' => 'form-control', 'placeholder' => 'Ville'))?>
                                            </div>
                                            <div class="form-group">
                                                <?=form_label('Descriptif', 'details', array('class' => 'control-label'))?>
                                                <?=form_textarea(array('name' => 'details', 'id' => 'details', 'class' => 'form-control', 'rows' => '3'))?>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" style="display: block;">Visible</label>
                                                    <label class="radio-inline"><input type="radio" name="visible" id="visible" value="1" checked>Oui</label>
                                                    <label class="radio-inline"><input type="radio" name="visible" id="visible" value="0">Non</label>
                                                </label>
                                            </div>
                                            <?=form_hidden('id_training')?>
                                            <button type="submit" name="submit" id="submit_training" class="btn btn-primary pull-right">Ajouter</button>
                                        <?=form_fieldset_close()?>
                                    <?=form_close()?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Compétences">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-check"></i> Mes compétences</div>
            <div class="panel-body">
                <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
                    <div class="form-group">
                    <?=form_open('Administration/add_user_categorie', array('id' => 'add_project_form'))?>
                        <?=form_fieldset('Ajouter une catégorie')?>
                        <?=form_label('Catégorie', 'categorie', array('class' => 'control-label'))?>
                        <?=form_input(array('name' => 'categorie', 'id' => 'categorie', 'class' => 'form-control', 'placeholder' => 'Catégorie'))?>
                    </div>
                    <button type="submit" name="submit" id="submit_categorie" class="btn btn-primary">Ajouter</button>
                    <?=form_fieldset_close()?>
                    <?=form_close()?>
                    <br><br>
                    <div class="form-group">
                        <?=form_open('Administration/add_user_skill', array('id' => 'add_skill_form'))?>
                        <?=form_fieldset('Ajouter une compétence')?>
                        <?=form_label('Compétence', 'skill', array('class' => 'control-label'))?>
                        <?=form_input(array('name' => 'skill', 'id' => 'skill', 'class' => 'form-control', 'placeholder' => 'Compétence'))?>
                    </div>
                    <div class="form-group">
                        <?=form_label('Catégorie', 'categorie', array('class' => 'control-label'))?>
                        <select name="categorieid" id="categorieid" class="form-control">
                            <?php foreach($categories as $categorie): ?>
                            <option value="<?=$categorie['id_categorie']?>"><?=$categorie['libelle']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" id="submit_categorie" class="btn btn-primary">Ajouter</button>
                    <?=form_fieldset_close()?>
                    <?=form_close()?>
                </div>
            <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
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
     <section id="Expériences">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-cogs"></i> Mes expériences</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 panel-custom-height panel-experience">
                        <?php foreach($experiences as $experience) : ?>
                            <div class="panel panel-primary experience-cards">
                                <div class="panel-heading" style="padding: 5px;">
                                    <?=form_open('Administration/update_user_experience/'.$experience['id_experience'])?>
                                    <h3 class="panel-title panel-custom-title pull-left">
                                        <?=form_input(array('name' => 'entreprise', 'class' => 'form-control', 'value' => $experience['entreprise'], 'style' => 'width: 80%;'))?>
                                    </h3>
                                    <button type="submit" class="btn btn-default exp-edit"><i class="fa fa-pencil-square"></i></button>
                                    <a href="<?=base_url().'Administration/delete_user_experience/'.$experience['id_experience']?>"><button class="btn btn-default exp-delete"><i class="fa fa-trash"></i></button></a>
                                    <button class="btn btn-default exp-up-order"><i class="fa fa-arrow-up"></i></button>
                                    <button class="btn btn-default exp-down-order"><i class="fa fa-arrow-down"></i></button>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-group" id="list-group-admin" style="margin-bottom: 0;">
                                        <li class="list-group-item"><b>Poste :</b>
                                            <?=form_input(array('name' => 'position', 'class' => 'form-control data-position', 'value' => $experience['poste']))?>
                                        </li>
                                        <li class="list-group-item"><b>Année :</b>
                                            <?=form_input(array('name' => 'year', 'class' => 'form-control data-year', 'value' => $experience['annee']))?>
                                        </li>
                                        <li class="list-group-item"><b>Ville :</b>
                                            <?=form_input(array('name' => 'city', 'class' => 'form-control data-city', 'value' => $experience['lieu']))?>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Détail de la mission :</b>
                                            <?=form_textarea(array('value' => $experience['detail'], 'name' => 'description', 'id' => 'description', 'class' => 'form-control data-details', 'rows' => '3'))?>
                                        </li>
                                        <li class="data-visible none"><?=$experience['visible']?></li>
                                        <li class="data-order none"><?=$experience['ordre']?></li>
                                        <li class="data-id none"><?=$experience['id_experience']?></li>
                                    </ul>
                                </div>
                                <?=form_close()?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-9 col-xs-12">
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?=form_open('Administration/add_user_experience', array('id' => 'add_experience_form'))?>
                                        <?=form_fieldset('Ajouter une expérience')?>
                                            <div class="form-group">
                                                <?=form_label('Entreprise', 'entreprise', array('class' => 'control-label'))?>
                                                <?=form_input(array('name' => 'entreprise', 'id' => 'entreprise', 'class' => 'form-control', 'placeholder' => 'Entreprise'))?>
                                            </div>
                                            <div class="form-group">
                                                <?=form_label('Poste', 'position', array('class' => 'control-label'))?>
                                                <?=form_input(array('name' => 'position', 'id' => 'position', 'class' => 'form-control', 'placeholder' => 'Poste'))?>
                                            </div>
                                            <div class="form-group">
                                                <?=form_label('Année', 'year', array('class' => 'control-label'))?>
                                                <?=form_input(array('name' => 'year', 'id' => 'year', 'class' => 'form-control', 'placeholder' => 'Année'))?>
                                            </div>
                                            <div class="form-group">
                                                <?=form_label('Ville', 'city', array('class' => 'control-label'))?>
                                                <?=form_input(array('name' => 'city', 'id' => 'city', 'class' => 'form-control', 'placeholder' => 'Ville'))?>
                                            </div>
                                            <div class="form-group">
                                                <?=form_label('Détail de la mission', 'details', array('class' => 'control-label'))?>
                                                <?=form_textarea(array('name' => 'details', 'id' => 'details', 'class' => 'form-control', 'rows' => '3'))?>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" style="display: block;">Visible</label>
                                                <label class="radio-inline"><input type="radio" name="visible" id="visible" value="1" checked>Oui</label>
                                                <label class="radio-inline"><input type="radio" name="visible" id="visible" value="0">Non</label>
                                                </label>
                                            </div>
                                            <input type="hidden" name="id_experience" id="id_experience">
                                            <button type="submit" name="submit" id="submit_experience" class="btn btn-primary pull-right">Ajouter</button>
                                        <?=form_fieldset_close()?>
                                    <?=form_close()?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="Contact">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-user"></i> Mes informations personnelles</div>
            <div class="panel-body">
                <?php if(validation_errors()) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <?=validation_errors()?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($error)) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <?=$error?>
                        </div>
                    </div>
                <?php endif; ?>
                <?=form_open("Administration/saveUserInfos")?>
                <?=form_fieldset('Informations personnelles')?>
                <?php foreach($results as $result) : ;?>
                <div class="col-lg-6">
                    <div class="form-group">
                        <?=form_label('Nom', 'name', array('class' => 'control-label'))?>
                        <?=form_input(array('value' => $result['nom'],'name' => 'name', 'class' => 'form-control', 'id' => 'name', 'placeholder' => '', 'tabindex' => '1' ))?>
                    </div>
                    <div class="form-group">
                        <?=form_label('Prénom', 'firstname', array('class' => 'control-label'))?>
                        <?=form_input(array('value' => $result['prenom'],'name' => 'firstname', 'class' => 'form-control', 'id' => 'firstname', 'placeholder' => '', 'tabindex' => '2'))?>
                    </div>
                    <div class="form-group">
                        <?=form_label('Téléphone', 'phone', array('class' => 'control-label'))?>
                        <?=form_input(array('value' => $result['telephone'],'name' => 'phone', 'class' => 'form-control', 'id' => 'phone', 'placeholder' => '', 'tabindex' => '3'))?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <?=form_label('Adresse', 'address', array('class' => 'control-label'))?>
                        <?=form_input(array('value' => $result['adresse'],'name' => 'address', 'class' => 'form-control', 'id' => 'address', 'placeholder' => '', 'tabindex' => '7'))?>
                    </div>
                    <div class="form-group">
                        <?=form_label('Code postal', 'zipcode', array('class' => 'control-label'))?>
                        <?=form_input(array('value' => $result['code_postal'],'name' => 'zipcode', 'class' => 'form-control', 'id' => 'zipcode', 'placeholder' => '', 'tabindex' => '8'))?>
                    </div>
                    <div class="form-group">
                        <?=form_label('Ville', 'city', array('class' => 'control-label'))?>
                        <?=form_input(array('value' => $result['ville'],'name' => 'city', 'class' => 'form-control', 'id' => 'city', 'placeholder' => '', 'tabindex' => '9'))?>
                    </div>
                    <div class="form-group">
                        <?=form_label('Complément d\'adresse', 'addressextra', array('class' => 'control-label'))?>
                        <?=form_input(array('value' => $result['complement'],'name' => 'addressextra', 'class' => 'form-control', 'id' => 'addressextra', 'placeholder' => '', 'tabindex' => '10'))?>
                    </div>
                </div>
                <?php endforeach ;?>
                <?=form_fieldset_close()?>
                <?=form_fieldset('Visibilité des informations personnelles')?>
                <div id="visibleInfos">
                    <table>
                        <tr>
                            <td><?=form_label('Nom', 'name', array('class' => 'control-label'))?></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_nom', 'id' => 'nom_visible', 'value' => 1,'checked'=> (bool) $result['nom_visible']))?> Oui </label></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_nom', 'id' => 'nom_visible', 'value' => 0,'checked'=> (bool) !$result['nom_visible']))?> Non</label></td>
                        </tr>
                        <tr>
                            <td><?=form_label('Prénom', 'name', array('class' => 'control-label'))?></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_prenom', 'id' => 'nom_visible', 'value' => 1,'checked'=> (bool) $result['prenom_visible']))?> Oui </label></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_prenom', 'id' => 'nom_visible', 'value' => 0,'checked'=> (bool) !$result['prenom_visible']))?> Non</label></td>
                        </tr>
                        <tr>
                            <td><?=form_label('Téléphone', 'phone', array('class' => 'control-label'))?></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_phone', 'id' => 'nom_visible', 'value' => 1,'checked'=> (bool) $result['phone_visible']))?>Oui</label></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_phone', 'id' => 'nom_visible', 'value' => 0,'checked'=> (bool) !$result['phone_visible']))?>Non</label></td>
                        </tr>
                        <tr>
                            <td><?=form_label('Email', 'mail', array('class' => 'control-label'))?></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_mail', 'id' => 'nom_visible', 'value' => 1,'checked'=> (bool) $result['mail_visible']))?>Oui</label></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_mail', 'id' => 'nom_visible', 'value' => 0,'checked'=> (bool) !$result['mail_visible']))?>Non</label></td>
                        </tr>
                        <tr>
                            <td><?=form_label('Adresse', 'adress', array('class' => 'control-label'))?></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_adresse', 'id' => 'nom_visible', 'value' => 1,'checked'=> (bool) $result['adresse_visible']))?>Oui</label></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_adresse', 'id' => 'nom_visible', 'value' => 0,'checked'=> (bool) !$result['adresse_visible']))?>Non</label></td>
                        </tr>
                        <tr>
                            <td><?=form_label('Code postal', 'zipcode', array('class' => 'control-label'))?></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_code_postal', 'id' => 'nom_visible', 'value' => 1,'checked'=> (bool) $result['code_postal_visible']))?>Oui</label></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_code_postal', 'id' => 'nom_visible', 'value' => 0,'checked'=> (bool) !$result['code_postal_visible']))?>Non</label></td>
                        </tr>
                        <tr>
                            <td><?=form_label('Ville', 'city', array('class' => 'control-label'))?></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_ville', 'id' => 'nom_visible', 'value' => 1,'checked'=> (bool) $result['ville_visible']))?>Oui</label></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_ville', 'id' => 'nom_visible', 'value' => 0,'checked'=> (bool) !$result['ville_visible']))?>Non</label></td>
                        </tr>
                        <tr>
                            <td><?=form_label('Complément', 'addressextra', array('class' => 'control-label'))?></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_complement', 'id' => 'nom_visible', 'value' => 1,'checked'=> (bool) $result['complement_visible']))?>Oui</label></td>
                            <td><label class="radio-inline"><?=form_radio(array('name' => 'radio_complement', 'id' => 'nom_visible', 'value' => 0,'checked'=> (bool) !$result['complement_visible']))?>Non</label></td>
                        </tr>
                    </table>
                <?=form_fieldset_close()?>
                <?=form_submit('', 'Modifier', array('class' => 'btn btn-default pull-right', 'tabindex' => '11'))?>
                <?=form_close()?>
            </div>
        </div>
    </section>
</section>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>