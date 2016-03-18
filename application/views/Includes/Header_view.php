<<<<<<< Updated upstream
<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 18/03/2016
 * Time: 11:49
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
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle" data-target="#navbar-collapse" data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?= site_url('/Home')?>" class="navbar-brand">
                    <img style="max-width:100px; margin-top: -7px;" src="#" alt="Logo" width="100px" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?= site_url('/Home')?>">Accueil</a></li>
                    <li><a href="<?= site_url('/Registration')?>">Inscription</a></li>
                    <li><a href="<?= site_url('/ProfileSearch')?>">Consultation</a></li>
                </ul>
                <div class="navbar-right col-sm-7">
                    <form action="#" class="navbar-form row" method="post" role="form">
                        <div class="col-sm-3 col-sm-offset-5">
                            <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span>
                                <input class="form-control" name="andrew_id" placeholder="Nom d'utilisateur" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                                <input class="form-control" name="secret" placeholder="Mot de passe" type="password">
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
=======
<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 18/03/2016
 * Time: 11:49
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
                    <li><a href="#">Consultation</a></li>
                </ul>
                <div class="navbar-right col-sm-7">
                    <form action="<?=site_url('Login/connection')?>" class="navbar-form row" method="post" role="form">
                        <div class="col-sm-3 col-sm-offset-5">
                            <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-envelope-o"></i>
                        </span>
                                <input class="form-control" name="mail" placeholder="Email" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-key"></i>
                        </span>
                                <input class="form-control" name="password" placeholder="Mot de passe" type="password">
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
>>>>>>> Stashed changes
    <section class="container">