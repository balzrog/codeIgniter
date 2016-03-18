<?php
/**
 * Created by PhpStorm
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 13:43
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>Bootstrap</title>
</head>
<body>
    <!--<nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">
                    <img style="max-width:100px; margin-top: -7px;" src="#" alt="Logo" width="100px" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Accueil</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">Annonces
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Offreurs</a></li>
                            <li><a href="#">Demandeurs</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Inscription</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <div class="navbar-right col-sm-9">
                        <form action="#" class="navbar-form row" method="post" role="form">
                            <div class="col-sm-3 col-sm-offset-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input type="text" class="form-control" placeholder="Email" name="mail" size="10">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" size="10">
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-default" type="submit" style="margin-left: 10px;"><i class="glyphicon glyphicon-circle-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>-->
                <!--<a href="<?=site_url('Login/connection')?>" style="text-decoration: none;"><button type="button" class="btn btn-default navbar-btn navbar-right">Se connecter</button></a>-->
            <!--</div>
        </div>
    </nav>-->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle" data-target="#navbar-collapse" data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">
                    <img style="max-width:100px; margin-top: -7px;" src="#" alt="Logo" width="100px" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Inscription</a></li>
                    <li><a href="#">Consultatio</a></li>
                </ul>
                <div class="navbar-right col-sm-7">
                    <form action="#" class="navbar-form row" method="post" role="form">
                        <div class="col-sm-3 col-sm-offset-5">
                            <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span>
                                <input class="form-control" name="andrew_id" placeholder="Andrew ID" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                                <input class="form-control" name="secret" placeholder="Secret Words" type="password">
                            </div>

                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-primary" type="submit">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="page-header">
                <h1><?=$h1?></h1>
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
                <fieldset>
                    <legend>Informations personnelles</legend>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <?=form_label('Nom', 'name', array('class' => 'control-label'))?>
                            <?=form_input(array('name' => 'name', 'class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nom'))?>
                        </div>
                        <div class="form-group">
                            <?=form_label('Prénom', 'firstname', array('class' => 'control-label'))?>
                            <?=form_input(array('name' => 'firstname', 'class' => 'form-control', 'id' => 'firstname', 'placeholder' => 'Prénom'))?>
                        </div>
                        <div class="form-group">
                            <?=form_label('Téléphone', 'phone', array('class' => 'control-label'))?>
                            <?=form_input(array('name' => 'phone', 'class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Téléphone'))?>
                        </div>
                        <div class="form-group">
                            <?=form_label('Mot de passe', 'password', array('class' => 'control-label'))?>
                            <?=form_password(array('name' => 'password', 'class' => 'form-control', 'id' => 'password', 'placeholder' => 'Mot de passe'))?>
                        </div>
                        <div class="form-group">
                            <?=form_label('Confirmation du mot de passe', 'passwordbis', array('class' => 'control-label'))?>
                            <?=form_password(array('name' => 'passwordbis', 'class' => 'form-control', 'id' => 'passwordbis', 'placeholder' => 'Confirmation du mot de passe'))?>
                        </div>
                        <?=form_submit('', 'Envoyer', array('class' => 'btn btn-default'))?>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <?=form_label('Adresse email', 'mail', array('class' => 'control-label'))?>
                            <?=form_input(array('name' => 'mail', 'class' => 'form-control', 'id' => 'mail', 'placeholder' => 'exemple@domaine.fr'))?>
                        </div>
                        <div class="form-group">
                            <?=form_label('Adresse', 'address', array('class' => 'control-label'))?>
                            <?=form_input(array('name' => 'address', 'class' => 'form-control', 'id' => 'address', 'placeholder' => 'Adresse'))?>
                        </div>
                        <div class="form-group">
                            <?=form_label('Code postal', 'zipcode', array('class' => 'control-label'))?>
                            <?=form_input(array('name' => 'zipcode', 'class' => 'form-control', 'id' => 'zipcode', 'placeholder' => 'Code postal'))?>
                        </div>
                        <div class="form-group">
                            <?=form_label('Ville', 'city', array('class' => 'control-label'))?>
                            <?=form_input(array('name' => 'city', 'class' => 'form-control', 'id' => 'city', 'placeholder' => 'Ville'))?>
                        </div>
                        <div class="form-group">
                            <?=form_label('Complément d\'adresse', 'addressextra', array('class' => 'control-label'))?>
                            <?=form_input(array('name' => 'addressextra', 'class' => 'form-control', 'id' => 'addressextra', 'placeholder' => 'Complément d\'adresse'))?>
                        </div>
                    </div>
                </fieldset>
                <?=form_close()?>
            </div>
        </div>
    </div>
    <footer>
        <div style="margin-top: 100px;"></div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</html>