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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= css_url("style") ?>">
    <title>Bootstrap</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
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
                    <?php if(count($this->session->user_id) > 0 && $this->session->logged_in == true) : ?>
                        <li><a href="<?= site_url('/Administration')?>">Administration</a></li>
                    <?php else : ?>
                        <li><a href="<?= site_url('/Registration')?>">Inscription</a></li>
                    <?php endif; ?>
                    <li><a href="<?= site_url('/ProfileSearch/search')?>">Consultation</a></li>
                </ul>
                <?php if(count($this->session->user_id) > 0 && $this->session->logged_in == true) : ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="btn-nav" style="margin-right: 67px;">
                            <a class="btn btn-primary btn-small navbar-btn" href="<?= site_url("Login/disconnection")?>">Déconnexion</a>
                        </div>
                    </li>
                </ul>
                <?php else : ?>
                <div class="navbar-right col-sm-7">
                    <form action="<?=site_url('Login/connection')?>" class="navbar-form row" method="post" role="form">
                        <div class="col-sm-3 col-sm-offset-5" style="margin-right: -20px;">
                            <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-envelope"></i>
                        </span>
                                <input class="form-control" name="mail" placeholder="Email" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3" style="margin-right: -30px;">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                <input class="form-control" name="password" placeholder="Mot de passe" type="password">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-primary" type="submit">Connexion</button>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>