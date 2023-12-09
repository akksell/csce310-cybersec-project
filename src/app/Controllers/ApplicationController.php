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
        $user = sessionUser();
        if(!$user) return $this->response->redirect(site_url('/login'));

        $query;
        $student_name;

        if($user->User_Type == 'student'){
            // SELECT * FROM program;
            $sql = <<<SQL
                SELECT * FROM application_filter WHERE application_filter.UIN = $user->UIN; 
            SQL;
            $query = $this->db->query($sql);
        }else{
            $sql = <<<SQL
                SELECT * FROM application_filter JOIN user ON application_filter.UIN = user.UIN
            SQL;
            $query = $this->db->query($sql);
        }

        $data = [
            'page_title' => 'View Applications | TAMU CyberSec Center',
            // use getResultArray() on queries that return multiple rows
            'applications' => $query->getResultArray(),
            'user' => $user
        ];

        return view('application/index', $data);
    }
    
    public function create() {
        // select only programs that the user hasn't applied for already
        $user = sessionUser();
        if(!$user) return $this->response->redirect(site_url('/login'));

        $query;

        if($user->hasPermission('student')){
            $sql = <<<SQL
                SELECT * FROM program WHERE program_num NOT IN
                (SELECT program_num FROM application WHERE UIN = $user->UIN) AND is_accessible = 1;
            SQL;
            $query = $this->db->query($sql);

            $array = $query->getResultArray();

            if(!$array){
                return $this->response->redirect(site_url('/application'));
            }

            $data = [
                'page_title' => 'Applications | TAMU CyberSec Center',
                'programs' => $array
            ];

            return view('application/create', $data);
        }
        return $this->response->redirect(site_url('/application'));

    }

    public function new()
    {
        $user = sessionUser();
        if(!$user) return $this->response->redirect(site_url('/login'));
        if($user->hasPermission('admin')) return $this->response->redirect(site_url('/application'));

        $method = $this->request->getMethod();

        if ($method == "post") {
            $formData = $this->request->getPost();

            // Input error checking (no program selected)
            if(!array_key_exists('program',$formData)){
                return $this->response->redirect(site_url('program/'));
            }

            $sql =  <<<SQL
                INSERT INTO application (program_num, UIN, uncom_cert, com_cert, purpose_statement)
                VALUES('{$formData['program']}',$user->UIN,'{$formData['uncom_cert']}','{$formData['com_cert']}','{$formData['purpose_statement']}');
            SQL;
            $this->db->query($sql);
        }

        return $this->response->redirect(site_url('/application'));
	}

    public function edit($app_num, $program_num){
        $user = sessionUser();
        if(!$user) return $this->response->redirect(site_url('/login'));
        if($user->hasPermission('admin')) return $this->response->redirect(site_url('/application'));

        $query = $this->db->query('SELECT * FROM application WHERE app_num = \''.$app_num.'\';');
        $programQuery = $this->db->query('SELECT name FROM program WHERE program_num = '.$program_num.';');
        $data = [
            'page_title' => 'Edit Application | TAMU CyberSec Center',
            'app_num' => $app_num,
            'application' => $query->getRowArray(),
            'program' => $programQuery->getRowArray()
        ];

        return view('application/edit', $data);
    }
    public function update($app_num){
        $user = sessionUser();
        if(!$user) return $this->response->redirect(site_url('/login'));
        if($user->hasPermission('admin')) return $this->response->redirect(site_url('/application'));

        $method = $this->request->getMethod();
        if($method == "post"){
            $formData = $this->request->getPost();
            $this->db->query('UPDATE application SET uncom_cert = \''.$formData['uncom_cert'].'\', 
            com_cert = \''.$formData['com_cert'].'\', purpose_statement = \''.$formData['purpose_statement'].
            '\' WHERE app_num = '.$app_num.';');
        }
        return $this->response->redirect(site_url('application'));
    }

	public function delete($app_num){
        $user = sessionUser();
        if(!$user) return $this->response->redirect(site_url('/login'));
        if($user->hasPermission('admin')) return $this->response->redirect(site_url('/application'));

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
        $user = sessionUser();
        if(!$user) return $this->response->redirect(site_url('/login'));
        if($user->hasPermission('admin')) return $this->response->redirect(site_url('/application'));

        if($id != null){
           $this->db->query('DELETE FROM application WHERE app_num = '.$id.';');
        }
		
        return $this->response->redirect(site_url('application'));
	}

    public function review($app_num, $program_num){
        $user = sessionUser();
        if(!$user) return $this->response->redirect(site_url('/login'));
        if($user->hasPermission('student')) return $this->response->redirect(site_url('/application'));
                
        $query = $this->db->query('SELECT * FROM application WHERE app_num = \''.$app_num.'\';');
        $programQuery = $this->db->query('SELECT name FROM program WHERE program_num = '.$program_num.';');
        $data = [
            'page_title' => 'Review Application | TAMU CyberSec Center',
            'app_num' => $app_num,
            'application' => $query->getRowArray(),
            'program' => $programQuery->getRowArray()
        ];

        return view('application/review', $data);
    }

    public function update_status($app_num){
        $user = sessionUser();
        if(!$user) return $this->response->redirect(site_url('/login'));
        if($user->hasPermission('student')) return $this->response->redirect(site_url('/application'));

        $method = $this->request->getMethod();
        if($method == "post"){

            $sql;
            $formData = $this->request->getPost();
            if($formData['status'] == '0'){
                $sql = <<<SQL
                    UPDATE application SET status = 0 WHERE app_num = $app_num;
                SQL;
            }elseif($formData['status'] == '1'){
                $sql = <<<SQL
                    UPDATE application SET status = 1 WHERE app_num = $app_num;
                SQL;
            }
            $this->db->query($sql);

        }
        return $this->response->redirect(site_url('application'));
    }

}
