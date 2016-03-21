<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 10:59
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <section class="container">
        <div class="row">
            <div class="page-header">
                <h1>Connexion</h1>
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

            <div class="col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-2 col-xs-6">
                <?=form_open()?>
                    <?=form_fieldset('Accéder à l\'espace d\'administration')?>
                    <div class="form-group">
                        <?=form_label('Adresse email', 'mail', array('class' => 'control-label'))?>
                        <?=form_input(array('name' => 'mail', 'class' => 'form-control', 'id' => 'mail', 'placeholder' => 'Adresse email'))?>
                    </div>
                    <div class="form-group">
                        <?=form_label('Mot de passe', 'password', array('class' => 'control-label'))?>
                        <?=form_password(array('name' => 'password', 'class' => 'form-control', 'id' => 'password', 'placeholder' => 'Mot de passe'))?>
                    </div>
                    <?=form_submit('', 'Se connecter', array('class' => 'btn btn-default'))?>
                    <?=form_fieldset_close()?>
                <?=form_close()?>
            </div>
        </div>
        
    </section>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script>
        $(document).ready(function() {
            //alert('Hello World!');
            //refreshNavBar();
        });
    </script>