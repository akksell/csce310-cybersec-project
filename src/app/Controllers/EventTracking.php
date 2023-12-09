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

class EventTracking extends BaseController
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

        /* 
        CREATE OR REPLACE view trackings AS SELECT event.*, user.First_Name, user.Last_Name, program.name FROM event
            INNER JOIN event_tracking ON event.Event_ID = event_tracking.Event_ID 
            INNER JOIN user ON user.UIN=event_tracking.UIN
            INNER JOIN program ON event.Program_Num = program.program_num;
        */
		$this->db->query('CREATE OR REPLACE view joined AS SELECT event.*, user.First_Name, user.Last_Name, program.name, event_tracking.ET_Num FROM event
        INNER JOIN event_tracking ON event.Event_ID = event_tracking.Event_ID 
        INNER JOIN user ON user.UIN=event.UIN
        INNER JOIN program ON event.Program_Num = program.program_num 
        where event_tracking.UIN = '.$user->UIN.';');

        // SELECT * FROM trackings;
        $query = $this->db->query('SELECT * FROM joined');

        $data = [
            'page_title' => 'View Event Tracking | TAMU CyberSec Center',
            // use getResultArray() on queries that return multiple rows
			'events' => $query->getResultArray()
        ];

        return view('event_tracking/index', $data);
    }

    public function new($id = null)
    {
        $user = sessionUser();  
        $method = $this->request->getMethod();

        if ($method == "post") {
            $formData = $this->request->getPost();
            /* 
            INSERT INTO 
                event_tracking 
                (Event_ID, UIN) 
                VALUES 
                ($id, $UIN);
            */

            $this->db->query('INSERT INTO event_tracking (Event_ID, UIN) 
                VALUES(' . $id . 
                ', ' . $user->UIN . ');');
        }

        return $this->response->redirect(site_url('event'));
	}

	public function destroy($id){
        if($id != null){
            // DELETE FROM event_tracking WHERE ET_Num = $id;
           $this->db->query('DELETE FROM event_tracking WHERE ET_Num = '.$id.';');
        }
		
        return $this->response->redirect(site_url('event'));
	}
}
