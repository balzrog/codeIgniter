<?php

class MY_Loader extends CI_Loader {

    /**
     * Encapsulate the view between the header and the footer
     * @param $view_name
     * @param array $vars
     * @param bool $return
     * @return string
     */

    public function template($view_name, $vars = array(), $return = FALSE)
    {
        if ($return)
        {
            $content  = $this->view('includes/Header_view', $vars, $return);
            $content .= $this->view($view_name, $vars, $return);
            $content .= $this->view('includes/Footer_view', $vars, $return);
            return $content;
        }else{
            $this->view('includes/Header_view', $vars);
            $this->view($view_name, $vars);
            $this->view('includes/Footer_view', $vars);
        }
    }
}
