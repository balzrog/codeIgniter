<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 18/03/2016
 * Time: 11:15
 */
class Template extends CI_Loader
{
    var $ci_loader;
    function __construct()
    {
        parent::__construct();
        $this->ci_loader = &get_instance();
    }

    function template($template_nom, $vars =array(), $return = FALSE){
        $content = $this->view('includes/header_view.php', $vars,$return);
        $content .= $this->view($template_nom, $vars, $return);
        $content .= $this->view('includes/footer_view.php', $vars, $return);

        return $content;
    }
}