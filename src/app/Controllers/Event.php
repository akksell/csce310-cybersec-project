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
        $user = sessionUser();

        $query;
    
        if ($user->User_Type == 'admin') {
            /* 
            CREATE OR REPLACE view events AS SELECT event.*, user.First_Name, user.Last_Name, program.name FROM event 
                INNER JOIN user ON user.UIN=event.UIN
                INNER JOIN program ON event.Program_Num = program.program_num;
            */
            $this->db->query('CREATE OR REPLACE view events AS SELECT event.*, user.First_Name, user.Last_Name, program.name FROM event INNER JOIN user ON user.UIN=event.UIN INNER JOIN program ON event.Program_Num = program.program_num;');
            
            // SELECT * FROM events;
            $query = $this->db->query('SELECT * FROM events');
        } else {
            /* 
            SELECT * FROM events WHERE Program_Num IN 
                SELECT program_num FROM application WHERE status = 1 AND 
                UIN = $userUIN;
            */
            $query = $this->db->query('SELECT * FROM events WHERE Program_Num IN (SELECT program_num FROM application WHERE status = 1 AND UIN = '.$user->UIN.');');
        }

        $data = [
            'page_title' => 'View Events | TAMU CyberSec Center',
            // use getResultArray() on queries that return multiple rows
			'events' => $query->getResultArray(),
            'user' => $user
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
            $user = sessionUser();

            $this->db->query('INSERT INTO event (Event_Name, UIN, Program_Num, Start_Date, Start_Time, Location, End_Date, End_Time, Event_Type) 
                VALUES(\'' . $formData['Event_Name'] . 
                '\', ' . $user->UIN . 
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

            $user = sessionUser();

            $this->db->query('UPDATE event SET 
                Event_Name = \'' . $formData['Event_Name'] .
                '\', UIN = ' . $user->UIN . 
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
        /* 
        CREATE OR REPLACE view trackings AS SELECT event.*, user.First_Name, user.Last_Name, program.name FROM event
            INNER JOIN event_tracking ON event.Event_ID = event_tracking.Event_ID 
            INNER JOIN user ON user.UIN=event_tracking.UIN
            INNER JOIN program ON event.Program_Num = program.program_num;
        */
		$this->db->query('CREATE OR REPLACE view trackings AS SELECT event.*, user.First_Name, user.Last_Name, program.name, event_tracking.ET_Num FROM event
            INNER JOIN event_tracking ON event.Event_ID = event_tracking.Event_ID 
            INNER JOIN user ON user.UIN=event_tracking.UIN
            INNER JOIN program ON event.Program_Num = program.program_num 
            where event.Event_ID = '.$id.';');

        // SELECT * FROM trackings;
        $query = $this->db->query('SELECT * FROM trackings');

        $data = [
			'page_title' => 'View Event | TAMU CyberSec Center',
			'events' => $query->getResultArray()
        ];

        return view('event/show', $data);
    }
}
