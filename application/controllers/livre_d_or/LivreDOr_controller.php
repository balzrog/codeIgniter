<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 10/03/2016
 * Time: 22:09
 */
class LivreDOr_controller extends CI_Controller
{
    const NB_COM_PER_PAGE = 15;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('livre_d_or/LivreDOr_model', 'livreorManager');
    }

    public function index($g_nb_commentary = 1)
    {
        echo 'hello world';
        //$this->look($g_nb_commentary);
    }

    public function look($g_nb_commentary = 1)
    {
        $this->load->library('pagination');
        $data = array();
        $nb_commantaries_total = $this->livreorManager->count();

        if($g_nb_commentary > 1)
        {
            if($g_nb_commentary <= $nb_commantaries_total)
            {
                $g_nb_commentary = intval($g_nb_commentary);
            }
            else
            {
                $g_nb_commentary = 1;
            }
        }
        else
        {
            $g_nb_commentary = 1;
        }

        $this->pagination->initialize(array('base_url' => base_url() . 'index.php/livre_d_or/LivreDOr_controller/look',
            'total_rows' => $nb_commantaries_total,
            'per_page' => self::NB_COM_PER_PAGE));

        $data['pagination'] = $this->pagination->create_links();
        $data['nb_commentaires'] = $nb_commantaries_total;

        $data['messages'] = $this->livreorManager->getCommantaries(self::NB_COM_PER_PAGE, $g_nb_commentary-1);

        $this->load->view('livre_d_or/showComs', $data);
    }

    public function write()
    {
        //    La page qui permet d'écrire un commentaire.
    }
}