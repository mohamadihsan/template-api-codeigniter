<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ACCARDAT extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // check token
        $this->token = AUTHORIZATION::validateTokenOnPage();

        // check privilege
        $url = $this->uri->segment(1);
        $url .= $this->uri->segment(2) != '' ? '/' . $this->uri->segment(2) : '';
        $url .= $this->uri->segment(3) != '' ? '/' . $this->uri->segment(3) : '';
        $id_user_group = JWT::decode($this->token, $this->config->item('jwt_key'), array('HS256'))->data->id_user_group;
        $this->sales_ar = JWT::decode($this->token, $this->config->item('jwt_key'), array('HS256'))->data->sales_ar;
        $check = $this->User_Privilege->check_privilege($id_user_group, $url);
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
                redirect('dashboard', 'refresh');
            }
        } else {
            redirect('dashboard', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Tagihan';
        $data['token'] = $this->token;
        $data['sales_ar'] = $this->sales_ar;

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
        $this->load->view('pages/tagihan_klik2', $data);
        $this->load->view('_layout/footer');
    }

    public function detail($kode_langganan, $sales_ar, $from_date, $end_date)
    {
        $data['title'] = 'Detail Tagihan Langganan';
        $data['token'] = $this->token;
        $data['from_date'] = $from_date;
        $data['end_date'] = $end_date;
        $data['sales_ar'] = $sales_ar;
        $data['kode_langganan'] = $kode_langganan;

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
        $this->load->view('pages/tagihan_klik3', $data);
        $this->load->view('_layout/footer');
    }

    public function nota($nomor_nota)
    {
        $data['title'] = 'Detail Tagihan Nota';
        $data['token'] = $this->token;
        $data['nomor_nota'] = $nomor_nota;

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
        $this->load->view('pages/tagihan_klik4', $data);
        $this->load->view('_layout/footer');
    }
}

/* End of file ACCARDAT.php */
