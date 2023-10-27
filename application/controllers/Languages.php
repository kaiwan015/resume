<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Languages extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('languages_model');
        $this->load->database();
        $this->load->library('datatables');
        $this->isLoggedIn();
    }


    public function index()
    {
        $this->global['pageTitle'] = 'Programming Languages';
        $this->global['action'] = 'List';

        $this->loadViews("languages/index", $this->global, NULL, NULL);
    }
    public function languageslist()
    {
        $datatables = $this->datatables->select('id, name, status');
        $datatables->where('is_delete','1');
        $datatables->from('tbl_languages');
        $datatables->addColumn('action', '<a class="btn btn-sm btn-info" href="languages/edit/$1"><i class="fa fa-pencil"></i></a> <a class="btn btn-sm btn-danger deletelanguage" data-id="$1" href=""><i class="fa fa-trash"></i></a>', 'id');
      
        $data = $datatables->generate('raw');
       
        echo $data;
    }

    public function add()
    {
        $this->global['pageTitle'] = 'Programming Languages';
        $this->global['action'] = 'Add';

        $this->loadViews("languages/create", $this->global, NULL, NULL);
    }
    public function store()
    {

        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Languages name', 'trim|required|max_length[128]|xss_clean');

            if ($this->form_validation->run() == FALSE) {

            } else {
                $name = ucwords(strtolower($this->input->post('name')));
                $status = $this->input->post('status');

                $userInfo = array(
                    'name' => $name,
                    'status' => $status,
                    'created_by' => $this->vendorId,
                    'created_date' => date('Y-m-d H:i:s')
                );

                $result = $this->languages_model->store($userInfo);
                if ($result) {
                    $data = [
                        'status' => true,
                        'message' => "Programming Language added successfully",
                        'redirect' => base_url('languages'),
                    ];
                } else {
                    $data = [
                        'status' => false,
                        'message' => "something went wrong!",
                        'redirect' => '',
                    ];
                }
                echo json_encode($data);
            }
        }
    }

    public function delete()
    {
        $languageId = $this->input->post('language_id');
        $languageInfo = array('is_delete' => '0', 'updated_by' => $this->vendorId, 'deleted_date' => date('Y-m-d H:i:s'));

        $result = $this->languages_model->deletelanguage($languageId, $languageInfo);
        //    echo $this->db->last_query();
        if ($result > 0) {
            $data = [
                'status' => true,
                'message' => "Language deleted successfully",
            ];

        } else {
            $data = [
                'status' => false,
                'message' => "something went wrong!",
                'redirect' => '',
            ];
        }
        echo json_encode($data);
    }
}

?>