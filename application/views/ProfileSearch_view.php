<?php

defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <section class="container">
        <div class="row">
            <div class="page-header">
                <h1>Recherche</h1>
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

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <?=form_open('ProfileSearch/search', array('class' => 'form-horizontal'))?>
                        <div class="form-group">
                            <div class="input-group">
                                <?=form_input(array('name' => 'keyword', 'class' => 'form-control', 'placeholder' => 'Rechercher un profil'))?>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" style="padding-top: 7px;"><i class="glyphicon glyphicon-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <?=form_close()?>
                    </div>
                </div>
                <div class="row">
                    <?php /*if(empty($this->input->post('keyword'))) :*/?>
                    <?php foreach($results as $result) : ;?>
                        <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
                            <div class=thumbnail>
                                <img src="<?=site_url($result['url_image'])?>" alt="<?=$result['alt']?>" />
                                <div class=caption>
                                    <h3 class="text-center"><?=$result['prenom'] . ' ' . $result['nom']?></h3>
                                    <p><?=$result['about']?></p>
                                    <p><a href="<?=site_url($result['url'])?>" class="btn btn-primary" role=button>Consulter</a></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ;?>
                    <?php /*endif*/ ?>
                </div>
            </div>
        </div>
    </section>