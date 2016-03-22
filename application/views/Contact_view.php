<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 21/03/2016
 * Time: 18:04
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="container">
    <div class="row">
        <div class="page-header">
            <h1>Contact</h1>
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
            <?=form_fieldset('Vos informations de contact')?>
            <div class="col-lg-8">
                <div class="form-group">
                    <?=form_label('Nom', 'name', array('class' => 'control-label'))?>
                    <?=form_input(array('name' => 'name', 'class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nom'))?>
                </div>
                <div class="form-group">
                    <?=form_label('Prénom', 'firstname', array('class' => 'control-label'))?>
                    <?=form_input(array('name' => 'firstname', 'class' => 'form-control', 'id' => 'firstname', 'placeholder' => 'Prénom'))?>
                </div>
                <div class="form-group">
                    <?=form_label('Adresse email', 'mail', array('class' => 'control-label'))?>
                    <?=form_input(array('name' => 'mail', 'class' => 'form-control', 'id' => 'mail', 'placeholder' => 'Adresse email'))?>
                </div>
                <div class="form-group">
                    <?=form_label('Sujet', 'subject', array('class' => 'control-label'))?>
                    <?=form_input(array('name' => 'subject', 'class' => 'form-control', 'id' => 'subject', 'placeholder' => 'Sujet du message'))?>
                </div>
                <div class="form-group">
                    <?=form_label('Message', 'message', array('class' => 'control-label'))?>
                    <?=form_textarea(array('name' => 'message', 'class' => 'form-control', 'id' => 'message', 'rows' => '10'))?>
                </div>
                <?=form_submit('', 'Envoyer', array('class' => 'btn btn-default'))?>
                <?=form_fieldset_close()?>
                <?=form_close()?>
            </div>
        </div>
    </div>
</section>
