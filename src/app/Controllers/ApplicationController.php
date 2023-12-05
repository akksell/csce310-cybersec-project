<?php
// Evan Burriola

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
        // SELECT * FROM program;
        $query = $this->db->query('SELECT program.program_num, program.name, application.status, application.app_num
        FROM program JOIN application ON program.program_num = application.program_num;');

        $data = [
            'page_title' => 'View Applications | TAMU CyberSec Center',
            // use getResultArray() on queries that return multiple rows
            'applications' => $query->getResultArray()
        ];

        return view('application/index', $data);
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

            // Input error checking (no program selected)
            if(!array_key_exists('program',$formData)){
                return $this->response->redirect(site_url('program/'));
            }

            // TODO: get UIN from session
            $this->db->query('INSERT INTO application (program_num, UIN, uncom_cert, com_cert, purpose_statement)
             VALUES(\''.$formData['program'].'\',230006744,\''.$formData['uncom_cert'].'\',\''.$formData['com_cert'].'\',\''.$formData['purpose_statement'].'\');');
        }

        return $this->response->redirect(site_url('program/'));
	}

    public function edit($app_num, $program_num){
        $query = $this->db->query('SELECT * FROM application WHERE app_num = \''.$app_num.'\';');
        $programQuery = $this->db->query('SELECT name FROM program WHERE program_num = '.$program_num.';');
        $data = [
            'page_title' => 'Edit Application | TAMU CyberSec Center',
            'app_num' => $app_num,
            'application' => $query->getResultArray(),
            'program' => $programQuery->getRowArray()
        ];

        return view('application/edit', $data);
    }
    public function update($app_num){
        $method = $this->request->getMethod();
        if($method == "post"){
            $formData = $this->request->getPost();
            $this->db->query('UPDATE application SET uncom_cert = \''.$formData['uncom_cert'].'\', 
            com_cert = \''.$formData['com_cert'].'\', purpose_statement = \''.$formData['purpose_statement'].
            '\' WHERE app_num = '.$app_num.';');
        }
        return $this->response->redirect(site_url('application'));
    }

    // TODO:

    public function documentation(){}

    public function new_doc(){

    }

	public function delete($app_num){
		$query = $this->db->query('SELECT * FROM application WHERE app_num = '.$app_num.';');
        $application = $query->getResultArray();
        $programQuery = $this->db->query('SELECT name FROM program WHERE program_num = '.$application[0]['program_num'].';');
        $program = $programQuery->getRowArray();
        $data = [
			'page_title' => 'Delete Application | TAMU CyberSec Center',
			'app_num' => $app_num,
            'program' => $program['name']
        ];

        return view('application/delete', $data);
	}

	public function destroy($id){
        if($id != null){
           $this->db->query('DELETE FROM application WHERE app_num = '.$id.';');
        }
		
        return $this->response->redirect(site_url('application'));
	}

}
