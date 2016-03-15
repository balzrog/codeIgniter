<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

<head>
    <title>Liste d'appel</title>
    <meta http-equiv="Content-Type" content="text/html; charset="<?php echo $this->config->item('charset'); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo css_url('style2'); ?>" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo js_url('main'); ?>"></script>
</head>

<body>
    <table>
    <a href="<?= site_url('livre_d_or/LivreDOr_controller') ?>">Lien vers la page</a>
    <?php foreach($students as $student): ?>
        <tr>
            <td><?= $student->nom ?></td>
            <td><?= $student->prenom ?></td>
            <td><button onclick="removeEntry('<?= $student->nom ?>','<?= $student->prenom ?>')">Supprimer</button> </td>
        </tr>
    <?php endforeach; ?>

    </table>
    <br>
    <br>
    <?=form_open('liste_d_appel/ListeAppel_controller/displayForm')?>
    <label for="nom">Nom</label>
    <br>
    <input type="text" id="nom" name="nom">
    <br>
    <label for="prenom">Prenom</label>
    <br>
    <input type="text" id="prenom" name="prenom">
    <br>
    <br>
    <input type="submit">
    </form>


</body>