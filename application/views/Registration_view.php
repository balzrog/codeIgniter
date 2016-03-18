<?php
/**
 * Created by PhpStorm
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 13:43
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <section class="container">
        <div class="row">
            <div class="page-header">
                <h1>Inscription</h1>
            </div>

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

            <div class="col-xs-12">
                <?=form_open()?>
                    <?=form_fieldset('Informations personnelles')?>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?=form_label('Nom', 'name', array('class' => 'control-label'))?>
                                <?=form_input(array('name' => 'name', 'class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nom', 'tabindex' => '1'))?>
                            </div>
                            <div class="form-group">
                                <?=form_label('Prénom', 'firstname', array('class' => 'control-label'))?>
                                <?=form_input(array('name' => 'firstname', 'class' => 'form-control', 'id' => 'firstname', 'placeholder' => 'Prénom', 'tabindex' => '3'))?>
                            </div>
                            <div class="form-group">
                                <?=form_label('Téléphone', 'phone', array('class' => 'control-label'))?>
                                <?=form_input(array('name' => 'phone', 'class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Téléphone', 'tabindex' => '5'))?>
                            </div>
                            <div class="form-group">
                                <?=form_label('Mot de passe', 'password', array('class' => 'control-label'))?>
                                <?=form_password(array('name' => 'password', 'class' => 'form-control', 'id' => 'password', 'placeholder' => 'Mot de passe', 'tabindex' => '7'))?>
                            </div>
                            <div class="form-group">
                                <?=form_label('Confirmation du mot de passe', 'passwordbis', array('class' => 'control-label'))?>
                                <?=form_password(array('name' => 'passwordbis', 'class' => 'form-control', 'id' => 'passwordbis', 'placeholder' => 'Confirmation du mot de passe', 'tabindex' => '9'))?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?=form_label('Adresse email', 'mail', array('class' => 'control-label'))?>
                                <?=form_input(array('name' => 'mail', 'class' => 'form-control', 'id' => 'mail', 'placeholder' => 'exemple@domaine.fr', 'tabindex' => '2'))?>
                            </div>
                            <div class="form-group">
                                <?=form_label('Adresse', 'address', array('class' => 'control-label'))?>
                                <?=form_input(array('name' => 'address', 'class' => 'form-control', 'id' => 'address', 'placeholder' => 'Adresse', 'tabindex' => '4'))?>
                            </div>
                            <div class="form-group">
                                <?=form_label('Code postal', 'zipcode', array('class' => 'control-label'))?>
                                <?=form_input(array('name' => 'zipcode', 'class' => 'form-control', 'id' => 'zipcode', 'placeholder' => 'Code postal', 'tabindex' => '6'))?>
                            </div>
                            <div class="form-group">
                                <?=form_label('Ville', 'city', array('class' => 'control-label'))?>
                                <?=form_input(array('name' => 'city', 'class' => 'form-control', 'id' => 'city', 'placeholder' => 'Ville', 'tabindex' => '8'))?>
                            </div>
                            <div class="form-group">
                                <?=form_label('Complément d\'adresse', 'addressextra', array('class' => 'control-label'))?>
                                <?=form_input(array('name' => 'addressextra', 'class' => 'form-control', 'id' => 'addressextra', 'placeholder' => 'Complément d\'adresse', 'tabindex' => '10'))?>
                            </div>
                            <?=form_submit('', 'Envoyer', array('class' => 'btn btn-default pull-right'))?>
                        </div>
                    <?=form_fieldset_close()?>
                <?=form_close()?>
            </div>
        </div>
    </section>