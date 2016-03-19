<?php

/**
 * Created by PhpStorm.
 * User: nicol_000
 * Date: 18/03/2016
 * Time: 14:12
 */
class ProfileSearch extends CI_Controller{

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('ProfileSearch_model', 'profilesearch');
	}

	public function index(){
        echo "ProfileSearch Index";
	}

    public function search() {
        $data['results'] = array();

        /*if(empty($this->input->post('keyword'))) {
            $data['results'] = $this->profilesearch->get_all_seekers();
        }*/

        $this->form_validation->set_rules('keyword', 'Recherche', 'trim|required');
        if($this->form_validation->run() == false) {
            $this->load->template('ProfileSearch_view', $data);
        } else {
            //$keywords = $this->input->post('keyword');

            //$data['results'] = $this->profilesearch->get_results($keywords);

            $results = array( array('id_utilisateur' => '52', 'nom' => 'Goisset', 'prenom' => 'Guillaume', 'about' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'url_image' => '/assets/images/cat.jpg', 'url' => '/Registration/register'),
                array('id_utilisateur' => '53', 'nom' => 'Laffargue', 'prenom' => 'Adrien', 'about' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'url_image' => '/assets/images/cat.jpg', 'url' => '/Registration/register'),
                array('id_utilisateur' => '54', 'nom' => 'Sabuco', 'prenom' => 'Baptiste', 'about' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'url_image' => '/assets/images/cat.jpg', 'url' => '/Registration/register'),
                array('id_utilisateur' => '55', 'nom' => 'Dubois', 'prenom' => 'Nicolas', 'about' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'url_image' => '/assets/images/cat.jpg', 'url' => '/Registration/register'),
                array('id_utilisateur' => '56', 'nom' => 'Dark', 'prenom' => 'Dylan', 'about' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'url_image' => '/assets/images/cat.jpg', 'alt' => 'Cat', 'url' => '/Registration/register')
            );

            $data['results'] = $results;

            $this->load->template('ProfileSearch_view', $data);
        }
    }
}