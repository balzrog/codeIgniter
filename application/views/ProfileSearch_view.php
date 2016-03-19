<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <section class="container">
        <!--<div class="row">-->
        <div class="page-header">
            <h1>Recherche</h1>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                <?=form_open('ProfileSearch/search', array('class' => 'form-horizontal'))?>
                    <div class="form-group">
                        <div class="input-group">
                            <?=form_input(array('name' => 'search', 'class' => 'form-control', 'placeholder' => 'Rechercher un profil'))?>
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" style="padding-top: 7px;"><i class="glyphicon glyphicon-search"></i></button>
                            </span>
                        </div>
                    </div>
                <?=form_close()?>
                </div>
            </div>
            <div class="row">
                <?php foreach($results as $result) : ?>
                <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
                    <div class=thumbnail>
                        <img src="<?=$result->url?>" alt="Cat" />
                        <div class=caption>
                            <h3 class="text-center">Ben Sims</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a href=# class="btn btn-primary" role=button>Consulter</a></p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
                    <div class=thumbnail>
                        <img src="<?=img_url('cat.jpg')?>" alt="Cat" />
                        <div class=caption>
                            <h3>Thumbnail label</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a href=# class="btn btn-primary" role=button>Button</a> <a href=# class="btn btn-default" role=button>Button</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
                    <div class=thumbnail>
                        <img src="<?=img_url('cat.jpg')?>" alt="Cat" />
                        <div class=caption>
                            <h3>Thumbnail label</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a href=# class="btn btn-primary" role=button>Button</a> <a href=# class="btn btn-default" role=button>Button</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
                    <div class=thumbnail>
                        <img src="<?=img_url('cat.jpg')?>" alt="Cat" />
                        <div class=caption>
                            <h3>Thumbnail label</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a href=# class="btn btn-primary" role=button>Button</a> <a href=# class="btn btn-default" role=button>Button</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>