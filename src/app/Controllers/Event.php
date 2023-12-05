<?php
// Min Zhang

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProgramModel;
use CodeIgniter\Database\RawSql;
use App\Config\Database;

// For custom constructor
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Event extends BaseController
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
        // SELECT * FROM event;
        $query = $this->db->query('SELECT * FROM event;');

        $data = [
            'page_title' => 'View Events | TAMU CyberSec Center',
            // use getResultArray() on queries that return multiple rows
			'events' => $query->getResultArray()
        ];

        return view('event/index', $data);
    }

    public function create() {
        // SELECT * FROM program;
        $query = $this->db->query('SELECT * FROM program;');

        $data = [
            'page_title' => 'Create Event | TAMU CyberSec Center',
            
            'programs' => $query->getResultArray()
        ];

        return view('event/create', $data);
    }

    public function new()
    {
        $method = $this->request->getMethod();

        if ($method == "post") {
            $formData = $this->request->getPost();
            /* 
            INSERT INTO 
                event 
                (Event_Name, UIN, Program_Num, Start_Date, Start_Time, Location, End_Date, End_Time, Event_Type) 
                VALUES 
                ($Event_Name, $UIN, $Program_Num, $Start_Date, $Start_Time, $Location, $End_Date, $End_Time, $Event_Type);
            */
            $user = 123123123;//sessionUser();

            $this->db->query('INSERT INTO event (Event_Name, UIN, Program_Num, Start_Date, Start_Time, Location, End_Date, End_Time, Event_Type) 
                VALUES(\'' . $formData['Event_Name'] . 
                '\', ' . $user . 
                ', '. $formData['Program_Num'] .
                ', \''. $formData['Start_Date'] .
                '\', \''. $formData['Start_Time'] .
                '\', \''. $formData['Location'] .
                '\', \''. $formData['End_Date'] .
                '\', \''. $formData['End_Time'] .
                '\', \''. $formData['Event_Type'] .
                '\');');
        }

        return $this->response->redirect(site_url('event'));
	}
	
	public function edit($id = null){
		$query1 = $this->db->query('SELECT * FROM event WHERE Event_ID = '.$id.';');
        $query2 = $this->db->query('SELECT * FROM program;');

        $data = [
			'page_title' => 'Edit Event | TAMU CyberSec Center',
            // use getRowArray() on queries that return one row
			'event' => $query1->getRowArray(),
            'programs' => $query2->getResultArray()
        ];

        return view('event/edit', $data);
	}

	public function update($id){
        $method = $this->request->getMethod();
        if($method == "post"){
            $formData = $this->request->getPost();
            // UPDATE event SET Event_Name = $Event_Name, UIN = $UIN, Program_Num = $Program_Num, Start_Date = $Start_Date, Start_Time = $Start_Time, Location = $Location, End_Date = $End_Date, End_Time = $End_Time, Event_Type = $Event_Type WHERE Event_ID = $id;

            $user = 123123123;//sessionUser();

            $this->db->query('UPDATE event SET 
                Event_Name = \'' . $formData['Event_Name'] .
                '\', UIN = ' . $user . 
                ', Program_Num = '. $formData['Program_Num'] .
                ', Start_Date = \''. $formData['Start_Date'] .
                '\', Start_Time = \''. $formData['Start_Time'] .
                '\', Location = \''. $formData['Location'] .
                '\', End_Date = \''. $formData['End_Date'] .
                '\', End_Time = \''. $formData['End_Time'] .
                '\', Event_Type = \''. $formData['Event_Type'] .
                '\' WHERE Event_ID = '. $id . ';');
        }
        return $this->response->redirect(site_url('event'));
    }

	public function delete($id = null){
        // SELECT * FROM event WHERE Event_ID = $id;
		$query = $this->db->query('SELECT * FROM event WHERE Event_ID = '.$id.';');
        $data = [
			'page_title' => 'Delete Event | TAMU CyberSec Center',
			'event' => $query->getRowArray()
        ];

        return view('event/delete', $data);
	}

	public function destroy($id){
        if($id != null){
            // DELETE FROM event WHERE Event_ID = $id;
           $this->db->query('DELETE FROM event WHERE Event_ID = '.$id.';');
        }
		
        return $this->response->redirect(site_url('event'));
	}

	public function show($id = null)
    {
        // SELECT * FROM event WHERE Event_ID = $id;
		$query = $this->db->query('SELECT * FROM event WHERE Event_ID = '.$id.';');
        $data = [
			'page_title' => 'View Event | TAMU CyberSec Center',
			'event' => $query->getRowArray()
        ];

        return view('event/show', $data);
    }
}
