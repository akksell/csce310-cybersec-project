<!-- Min Zhang -->
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProgramModel;
use CodeIgniter\Database\RawSql;
use App\Config\Database;

// For custom constructor
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class ProgramController extends BaseController
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
        $query = $this->db->query('SELECT * FROM event;');

        $data = [
            'page_title' => 'View Events | TAMU CyberSec Center',
            // use getResultArray() on queries that return multiple rows
			'events' => $query->getResultArray()
        ];

        return view('event/index', $data);
    }

    public function create() {
        $data = [
            'page_title' => 'Create Event | TAMU CyberSec Center',
        ];

        return view('event/create', $data);
    }

    public function new()
    {
        $method = $this->request->getMethod();

        if ($method == "post") {
            $formData = $this->request->getPost();
            /* 
            INSERT INTO event 
                (Event_Name, UIN, Program_Num, Start_Date, Start_Time, Location, End_Date, End_Time, Event_Type) 
                VALUES ($insert,$desc);
            */
            $this->db->query('INSERT INTO event (name,description) 
                VALUES(\''.$formData['name'].'\',\''.$formData['description'].'\');');
        }

        return $this->response->redirect(site_url('event'));
	}
	
	public function edit($id = null){
		$query = $this->db->query('SELECT * FROM event WHERE Event_ID = '.$id.';');
        $data = [
			'page_title' => 'Edit Program | TAMU CyberSec Center',
            // use getRowArray() on queries that return one row
			'program' => $query->getRowArray()
        ];

        return view('program/edit', $data);
	}

	public function update($id){
        $method = $this->request->getMethod();
        if($method == "post"){
            $formData = $this->request->getPost();
            // UPDATE program SET name = $UpdatedName, description = $UpdatedDescription WHERE program_num = $id;
            $this->db->query('UPDATE program SET name = \''.$formData['name'].'\', description = \''.$formData['description'].'\' WHERE program_num = '.$id.';');
        }
        return $this->response->redirect(site_url('program'));
    }

	public function delete($id = null){
        // SELECT * FROM program WHERE program_num = $id;
		$query = $this->db->query('SELECT * FROM program WHERE program_num = '.$id.';');
        $data = [
			'page_title' => 'Delete Program | TAMU CyberSec Center',
			'program' => $query->getRowArray()
        ];

        return view('program/delete', $data);
	}

	public function destroy($id){
        if($id != null){
            // DELETE FROM program WHERE program_num = $id;
           $this->db->query('DELETE FROM program WHERE program_num = '.$id.';');
        }
		
        return $this->response->redirect(site_url('program'));
	}

	public function show($id = null)
    {
        // SELECT * FROM program WHERE program_num = $id;
		$query = $this->db->query('SELECT * FROM program WHERE program_num = '.$id.';');
        $data = [
			'page_title' => 'View Program | TAMU CyberSec Center',
			'program' => $query->getRowArray()
        ];

        return view('program/show', $data);
    }
}
