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

    /**
     * @param $view_name
     * @param array $vars
     * @param bool $return
     * @return object|string
     */
    function template($view_name, $vars =array(), $return = FALSE){
        $content = $this->view('Includes/Header_view.php', $vars,$return);
        $content .= $this->view($view_name, $vars, $return);
        $content .= $this->view('Includes/Footer_view.php', $vars, $return);

        return $content;
    }
}