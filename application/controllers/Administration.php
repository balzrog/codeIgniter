<?php

/**
 * Created by PhpStorm.
 * User: Balzrog
 * Date: 18/03/2016
 * Time: 11:08
 */
class Administration extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'email'));
        $this->load->model('Administration_model','admin_model');
    }

    function index(){
        if($this->session->userdata['user_id'] != null) {
            $data['results'] = $this->admin_model->get_user_max_infos($this->session->userdata['user_id']);

            $portfolio_id = $this->session->userdata['portfolio_id'];
            $data['trainings'] = $this->admin_model->get_all_trainings($portfolio_id);
            $data['experiences'] = $this->admin_model->get_all_experiences($portfolio_id);
            $data['projects'] = $this->admin_model->get_all_projects($portfolio_id);
            $data['portfolio'] =  $this->admin_model->get_portfolio_infos($this->session->userdata['user_id']);
            $data['categories'] = $this->admin_model->sp_get_all_categories($portfolio_id);
            $i=0;
            foreach ($data['categories'] as $category){
                $data['categories'][$i]['skills'] = $this->admin_model->sp_get_all_skills($category['id_categorie']);
                $i++;
            }

            $this->load->template("Administration_view", $data);
        }else{
            redirect(base_url("Home"));
        }
    }

    public function add_user_training() {
        $data = array();

        $this->form_validation->set_rules('training', 'Formation', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('diploma', 'Diplôme', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('year', 'Année', 'trim|required|numeric|min_length[4]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('details', 'Détails', 'trim|min_length[3]');
        $this->form_validation->set_rules('visible', 'Visible', 'trim|numeric|max_length[1]');
        if($this->form_validation->run() == false) {
            $this->load->template('Administration_view', $data);
        } else {
            $training       = $this->input->post('training');
            $diploma        = $this->input->post('diploma');
            $year           = $this->input->post('year');
            $city           = $this->input->post('city');
            $details        = $this->input->post('details');
            $visible        = $this->input->post('visible');
            $portfolio_id   = $this->session->userdata['portfolio_id'];

            $this->admin_model->add_training($portfolio_id, $training, $diploma, $year, $city, $details, $visible);

            redirect('Administration#Formations');

            //$last_id = $this->admin_model->add_training($portfolio_id, $training, $diploma, $year, $city, $details, $visible);
            //echo $last_id;
        }
    }

    public function update_user_training() {
        $data = array();

        $this->form_validation->set_rules('training', 'Formation', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('diploma', 'Diplôme', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('year', 'Année', 'trim|required|numeric|min_length[4]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('details', 'Détails', 'trim|min_length[3]');
        $this->form_validation->set_rules('visible', 'Visible', 'trim|numeric|max_length[1]');

        if($this->form_validation->run() == false) {
            echo "MAJ : ERREUR SAISIE";
            //$this->load->view('Administration_view#Formations', $data);
        } else {
            $training_id    = $this->input->post('id_training');
            $training       = $this->input->post('training');
            $diploma        = $this->input->post('diploma');
            $year           = $this->input->post('year');
            $city           = $this->input->post('city');
            $details        = $this->input->post('details');
            $visible        = $this->input->post('visible');
            $portfolio_id   = $this->session->userdata['portfolio_id'];

            $this->admin_model->update_training($training_id, $portfolio_id, $training, $year, $diploma, $city, $details, $visible);
        }
    }

    public function delete_user_training() {
        $training_id = (int)$this->uri->segment(3);

        $this->admin_model->delete_training($training_id);

        redirect('Administration#Formations');
    }

    public function add_user_experience() {
        $data = array();

        $this->form_validation->set_rules('entreprise', 'Entreprise', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('position', 'Poste', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('year', 'Année', 'trim|required|numeric|min_length[4]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('details', 'Détails', 'trim|min_length[3]');
        $this->form_validation->set_rules('visible', 'Visible', 'trim|numeric|max_length[1]');
        if($this->form_validation->run() == false) {
            $this->load->view('Administration_view', $data);
        } else {
            $entreprise     = $this->input->post('entreprise');
            $position       = $this->input->post('position');
            $year           = $this->input->post('year');
            $city           = $this->input->post('city');
            $details        = $this->input->post('details');
            $visible        = $this->input->post('visible');
            $portfolio_id   = $this->session->userdata['portfolio_id'];

            $this->admin_model->add_experience($portfolio_id, $position, $year, $entreprise, $city, $details, $visible);

            redirect('Administration#Expériences');
        }
    }

    public function update_user_experience() {
        $data = array();

        $this->form_validation->set_rules('entreprise', 'Entreprise', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('position', 'Poste', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('year', 'Année', 'trim|required|numeric|min_length[4]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('details', 'Détails', 'trim|min_length[3]');
        //$this->form_validation->set_rules('visible', 'Visible', 'trim|numeric|max_length[1]');
        if($this->form_validation->run() == false) {
            $this->load->view('Administration_view', $data);
        } else {
            $entreprise     = $this->input->post('entreprise');
            $position       = $this->input->post('position');
            $year           = (int)$this->input->post('year');
            $city           = $this->input->post('city');
            $details        = $this->input->post('description');
            //$visible      = (int)$this->input->post('visible');
            $experience_id  = (int)$this->uri->segment(3);
            $portfolio_id   = (int)$this->session->userdata['portfolio_id'];

            $this->admin_model->update_experience($experience_id, $portfolio_id, $position, $year, $entreprise, $city, $details, $visible = 1);

            redirect('Administration#Expériences');
        }
    }

    public function delete_user_experience() {
        $experience_id = (int)$this->uri->segment(3);

        $this->admin_model->delete_experience($experience_id);

        redirect('Administration#Expériences');
    }

    public function add_user_project() {
        $data = array();

        $this->form_validation->set_rules('title', 'Nom du projet', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('description', 'Description', 'trim|min_length[2]');
        $this->form_validation->set_rules('link', 'Lien', 'trim|min_length[2]');
        $this->form_validation->set_rules('visible', 'Visible', 'trim|numeric|max_length[1]');
        if($this->form_validation->run() == false) {
            $this->load->view('Administration_view', $data);
        } else {
            $title          = $this->input->post('title');
            $description    = $this->input->post('description');
            $link           = $this->input->post('link');
            $visible        = (int)$this->input->post('visible');
            $portfolio_id   = (int)$this->session->userdata['portfolio_id'];

            //var_dump($this->input->post());

            $config['upload_path'] = 'assets/images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            //if(!$this->upload->do_upload()) {
                //$error = array('error' => $this->upload->display_errors());
                //$this->load->template('Home_view', $error);
            //} else {
                //$file_name = $this->upload->data()['file_name'];

                //$image_id = (int)$this->admin_model->add_image($file_name);

                $this->admin_model->add_project($title, $description, $link, $visible, $portfolio_id, $image_id = 33);

                redirect('Administration#Projets');
            //}
        }
    }

    public function update_user_project() {
        $this->form_validation->set_rules('title', 'Nom du projet', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('description', 'Description', 'trim|min_length[2]');
        $this->form_validation->set_rules('link', 'Lien', 'trim|min_length[2]');
        //$this->form_validation->set_rules('visible', 'Visible', 'trim|numeric|max_length[1]');
        if($this->form_validation->run() == false) {
            $this->load->view('Administration#Projets');
        } else {
            $title          = $this->input->post('title');
            $description    = $this->input->post('description');
            $link           = $this->input->post('link');
            $project_id     = (int)$this->uri->segment(3);
            //$visible        = (int)$this->input->post('visible');
            $portfolio_id   = (int)$this->session->userdata['portfolio_id'];

            $this->admin_model->update_project($project_id, $portfolio_id, $title, $description, $link, $visible = 1);

            redirect('Administration#Projets');
        }
    }

    public function delete_user_project() {
        $project_id = (int)$this->uri->segment(3);

        $this->admin_model->delete_project($project_id);

        redirect('Administration#Projets');
    }

    public function add_user_categorie() {
        $this->form_validation->set_rules('categorie', 'Catégorie', 'trim|required|min_length[2]');
        if($this->form_validation->run() == false) {
            $this->load->view('Administration#Compétences');
        } else {
            $categorie      = $this->input->post('categorie');
            $portfolio_id   = (int)$this->session->userdata['portfolio_id'];

            $this->admin_model->add_categorie($portfolio_id, $categorie);

            redirect('Administration#Compétences');
        }
    }

    public function add_user_skill() {
        $this->form_validation->set_rules('skill', 'Compétence', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('categorieid', 'Catégorie', 'trim|required|numeric|max_length[10]');
        if($this->form_validation->run() == false) {
            redirect('Home');
        } else {
            $categorie_id   = (int)$this->input->post('categorieid');
            $skill          = $this->input->post('skill');

            $this->admin_model->add_skill($categorie_id, $skill, $level = 50, $visible = 1);

            redirect('Administration#Compétences');
        }
    }

    public function savePortfolioInfos(){
        if($this->session->userdata['user_id'] != null) {

            $this->form_validation->set_rules('description', 'Description', 'trim|min_length[2]');

            if($this->form_validation->run() == false){
                $this->index();
            } else {
                $config['upload_path'] = 'assets/images';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']	= '100';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($this->upload->data());
                    $this->index();
                } else {
                    $file_name = $this->upload->data()['file_name'];
                    $image_id = $this->admin_model->add_image($file_name);
                    $description = $this->input->post('description');

                $this->admin_model->update_portfolio_infos(
                    $this->session->userdata['user_id'],
                    $description,
                    $image_id
                );

                redirect(base_url('Administration/index#Accueil'));
            }}
        }else{
            redirect(base_url("Home"));
        }
    }

    public function saveUserInfos(){
        if($this->session->userdata['user_id'] != null) {


        $this->form_validation->set_rules('name', 'Nom', 'trim|required|customAlpha|min_length[2]');
        $this->form_validation->set_rules('firstname', 'Prénom', 'trim|required|customAlpha|min_length[2]');
        $this->form_validation->set_rules('phone', 'Téléphone', 'trim|max_length[10]');
        $this->form_validation->set_rules('address', 'Adresse', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('city', 'Ville', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('zipcode', 'Code postal', 'trim|required|numeric|max_length[5]');
        $this->form_validation->set_rules('addressextra', 'Complément', 'trim|alpha|min_length[5]');

        if($this->form_validation->run() == false){
            $this->index();
        } else {
            $name           = $this->input->post('name');
            $firstname      = $this->input->post('firstname');
            $phone          = $this->input->post('phone');
            $address        = $this->input->post('address');
            $city           = $this->input->post('city');
            $zipcode        = $this->input->post('zipcode');
            $address_extra  = $this->input->post('addressextra');
            $name_visible         = $this->input->post('radio_nom');
            $firstname_visible      = $this->input->post('radio_prenom');
            $phone_visible          = $this->input->post('radio_phone');
            $mail_visible           = $this->input->post('radio_mail');
            $address_visible        = $this->input->post('radio_adresse');
            $city_visible           = $this->input->post('radio_ville');
            $zipcode_visible        = $this->input->post('radio_code_postal');
            $address_extra_visible  = $this->input->post('radio_complement');

            $this->admin_model->update_user_infos(
                $this->session->userdata['user_id'],
                $name,
                $firstname,
                $phone,
                $address,
                $zipcode,
                $city,
                $address_extra);

            $this->admin_model->update_user_visibility_infos(
                $this->session->userdata['user_id'],
                $name_visible,
                $firstname_visible,
                $phone_visible,
                $mail_visible,
                $address_visible,
                $city_visible,
                $zipcode_visible,
                $address_extra_visible);

            redirect(base_url('Administration/index#Contact'));
        }
        }else{
            redirect(base_url("Home"));
        }
    }
}