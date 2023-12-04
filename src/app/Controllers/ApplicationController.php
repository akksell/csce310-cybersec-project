<?php

namespace App\Controllers;

use App\Controllers\BaseController;

// For custom constructor
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


class ApplicationController extends BaseController
{
    //Class var to access db: $this->db->query('');
    protected $db;

    // Class constructor to connect to db and inherit BaseController
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ){
        parent::initController($request, $response, $logger);
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        //
    }
    
    public function create() {
        // select only programs that the user hasn't applied for already
        // TODO: use session for UIN = 
        $query = $this->db->query('SELECT * FROM program WHERE program_num NOT IN (SELECT program_num FROM application WHERE UIN = 230006744);');

        $data = [
            'page_title' => 'Applications | TAMU CyberSec Center',
            'programs' => $query->getResultArray()
        ];

        return view('application/create', $data);
    }

    public function new()
    {
        $method = $this->request->getMethod();

        if ($method == "post") {
            $formData = $this->request->getPost();
            // TODO: get UIN from session
            $this->db->query('INSERT INTO application (program_num, UIN, uncom_cert, com_cert, purpose_statement)
             VALUES(\''.$formData['program'].'\',230006744,\''.$formData['uncom_cert'].'\',\''.$formData['com_cert'].'\',\''.$formData['purpose_statement'].'\');');
        }

        return $this->response->redirect(site_url('program/'));
	}
}
