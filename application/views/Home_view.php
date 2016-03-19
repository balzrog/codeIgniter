<?php
/**
 * Created by PhpStorm.
 * User: Guillaume
 * Date: 17/03/2016
 * Time: 11:57
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="container">
    <h1>DGLS PortFolio</h1>
    <h2 class="text-center">
        Bienvenue sur le site DGLS PortFolio, un site de création de porte-folios personnalisés, veuillez choisir si vous êtes employeur ou à la recherche d'un emploi.
    </h2>
    <div class="row">
        <div class="col-lg-6 col-md-6 text-center" id="seeker_choice" style="margin-top: 50px;">
            <img src="<?=img_url('running.png')?>" alt="Lookin" style="width: 220px;" />
            <div class="caption">
                <h3>Vous êtes demandeur d'emploi ?</h3>
                <a href="<?=site_url('Registration/register')?>"><button class="btn btn-primary btn-lg">S'inscrire</button></a>
                <a href="<?=site_url('Login/connection')?>"><button class="btn btn-primary btn-lg">Se connecter</button></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 text-center" id="offerer_choice" style="margin-top: 50px;">
            <img src="<?=img_url('briefcase.png')?>" alt="Recruit" style="width: 220px;" />
            <div class="caption">
                <h3>Vous êtes recruteur ?</h3>
                <?=form_open('ProfileSearch/search')?>
                <div class="form-group">
                    <div class="input-group">
                        <?=form_input(array('name' => 'keyword', 'class' => 'form-control', 'placeholder' => 'Rechercher un profil'))?>
                        <span class="input-group-btn">
                            <button class="btn btn-default" style="padding-top: 7px;" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</section>