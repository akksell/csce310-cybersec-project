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
        // SELECT * FROM event_tracking;
        $query = $this->db->query('SELECT * FROM event_tracking;');

        $data = [
            'page_title' => 'View Event Tracking | TAMU CyberSec Center',
            // use getResultArray() on queries that return multiple rows
			'events_tracking' => $query->getResultArray()
        ];

        return view('event_tracking/index', $data);
    }

    public function create() {
        // SELECT * FROM event;
        $query = $this->db->query('SELECT * FROM event;');

        $data = [
            'page_title' => 'Create Event | TAMU CyberSec Center',
            
            'events' => $query->getResultArray()
        ];

        return view('event_tracking/create', $data);
    }

    public function new()
    {
        $method = $this->request->getMethod();

        if ($method == "post") {
            $formData = $this->request->getPost();
            /* 
            INSERT INTO 
                event_tracking 
                (Event_ID, UIN) 
                VALUES 
                ($Event_ID, $UIN);
            */

            $this->db->query('INSERT INTO event_tracking (Event_ID, UIN) 
                VALUES(' . $formData['Event_ID'] . 
                ', ' . $formData['UIN'] . ');');
        }

        return $this->response->redirect(site_url('event_tracking'));
	}
}
