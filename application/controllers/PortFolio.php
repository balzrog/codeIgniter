<?php

/**
 * User: nicol_000
 * Date: 21/03/2016
 * Time: 08:57
 */
class PortFolio extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
        $this->load->library(array('form_validation', 'email'));
		$this->load->model('PortFolio_model', 'portfolio');
	}

	public function index(){
		$this->lookup();
	}

	public function lookup() {
		$data = array();
		$requested_id = $this->uri->segment(3);
		$data['portfolio'] = $this->portfolio->get_portfolio($requested_id);
		$data['users'] = $this->portfolio->get_seeker_by_id($data['portfolio'][0]['id_utilisateur']);
		$data['projects'] = $this->portfolio->sp_get_all_projects($data['portfolio'][0]['id_utilisateur']);
		$data['trainings'] = $this->portfolio->sp_get_all_trainings($requested_id);
		$data['categories'] = $this->portfolio->sp_get_all_categories($requested_id);
		$data['experiences'] = $this->portfolio->sp_get_all_experiences($requested_id);
		$i=0;
		foreach ($data['projects'] as $project){
			$data['projects'][$i]['image'] = $this->portfolio->sp_get_image($data['projects'][$i]['id_image']);
			$i++;
		}
		$i=0;
		foreach ($data['categories'] as $category){
			$data['categories'][$i]['skills'] = $this->portfolio->sp_get_all_skills($category['id_categorie']);
			$i++;
		}
		$this->load->template("PortFolio_view", $data);

	}

    public function contact() {
        $data = array();

        $this->form_validation->set_rules('name', 'Nom', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('firstname', 'Prénom', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('mail', 'Adresse email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Sujet', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[2]');

        if($this->form_validation->run() == false) {
            $this->load->template('Contact_view', $data);
        } else {
            $name           = $this->input->post('name');
            $firstname      = $this->input->post('firstname');
            $full_name      = $name.' '.$firstname;
            $sender_mail    = $this->input->post('mail');
            $subject        = $this->input->post('subject');
            $message        = $this->input->post('message');
            $portfolio_id   = $this->uri->segment(3);
            $receiver_mail = $this->portfolio->get_user_email($portfolio_id);

            $config['useragent']    = 'CodeIgniter';
            $config['protocol']     = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_user']    = 'app.doowit@gmail.com';
            $config['smtp_pass']    = '';
            $config['smtp_port']    = 465;
            $config['wordwrap']     = TRUE;
            $config['wrapchars']    = 76;
            $config['mailtype']     = 'html';
            $config['charset']      = 'utf-8';
            $config['validate']     = FALSE;
            $config['priority']     = 3;
            $config['newline']      = "\r\n";
            $config['crlf']         = "\r\n";

            $this->email->initialize($config);

            $this->email->from($sender_mail, $full_name);
            $this->email->to($receiver_mail);
            $this->email->subject($subject);
            $this->email->message(nl2br($message));

            if(!$this->email->send()){
                echo "ERROR<br>" . $this->email->print_debugger();
            } else {
                redirect('/Home');
            }
        }
    }
}