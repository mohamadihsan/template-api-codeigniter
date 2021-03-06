<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // validate token
        $this->token = AUTHORIZATION::validateTokenOnPage();
        
        // check privilege
        $url = $this->uri->segment(1);
        $url_mix = $this->uri->segment(1);
        $url_mix .= $this->uri->segment(2) != '' ? '/'.$this->uri->segment(2) : '';
        if ($url_mix != 'users/profile') {
            $id_user_group = JWT::decode($this->token, $this->config->item('jwt_key'), array('HS256'))->data->id_user_group;
            $check = $this->User_Privilege->check_privilege($id_user_group ,$url);
            if (!empty($check)) {
                if ($check->read_access == true) {
                    $this->create_access = $check->create_access;
                    $this->read_access = $check->read_access;
                    $this->update_access = $check->update_access;
                    $this->delete_access = $check->delete_access;
                    $this->approve_access = $check->approve_access;
                    $this->reject_access = $check->reject_access;
                    $this->print_access = $check->print_access;
                    $this->export_to_excel_access = $check->export_to_excel_access;
                    $this->export_to_csv_access = $check->export_to_csv_access;
                    $this->export_to_pdf_access = $check->export_to_pdf_access;
                } else {    
                    redirect('dashboard','refresh');
                }
            } else {
                redirect('dashboard','refresh');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Master User';
        $data['token'] = $this->token;

        // role
        $data['action_create'] = $this->create_access;
        $data['action_update'] = $this->update_access;
        $data['action_delete'] = $this->delete_access;
        $data['action_approval'] = $this->approve_access;
        $data['action_export_to_excel'] = $this->export_to_excel_access;
        $data['action_export_to_csv'] = $this->export_to_csv_access;
        $data['action_export_to_pdf'] = $this->export_to_pdf_access;


        $this->load->view('_layout/header', $data);
        $this->load->view('_layout/sidebar', $data);
        $this->load->view('_layout/topbar', $data);
        $this->load->view('pages/user', $data);
        $this->load->view('_layout/footer');
    }

    public function profile()
    {
        $data['title'] = 'User Profile';
        $data['token'] = $this->token;
        $decode = JWT::decode($this->token, $this->config->item('jwt_key'), array('HS256'));
        $data['username'] = $decode->data->username;
        
        // role
        $data['action_create'] = true;
        $data['action_update'] = true;
        $data['action_delete'] = true;
        $data['action_approval'] = true;
        $data['action_export_to_excel'] = true;
        $data['action_export_to_csv'] = true;
        $data['action_export_to_pdf'] = true;


        $this->load->view('_layout/header', $data);
        $this->load->view('_layout/sidebar', $data);
        $this->load->view('_layout/topbar', $data);
        $this->load->view('pages/user_profile', $data);
        $this->load->view('_layout/footer');
    }

}

/* End of file User.php */
