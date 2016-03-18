<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 11:57
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
    <title>Bootstrap</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
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
                <li><a href="#"><?=$title?></a></li>
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
            <a href="<?=site_url('Login/connection')?>" style="text-decoration: none;"><button type="button" class="btn btn-default navbar-btn navbar-right">Se connecter</button></a>
        </div>
    </div>
</nav>
<section class="container">
    <div class="col-xs-12 col-lg-10">
        <h1>Connexion</h1>
    </div>
</section>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>