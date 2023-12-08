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

class Document extends BaseController
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

    public function show($id = null)
    {
        $user = sessionUser();

        // SELECT * FROM documentation WHERE app_num = $id;

        $query = $this->db->query('SELECT * FROM documentation WHERE app_num = '.$id.';');

        $data = [
            'page_title' => 'View Documents | TAMU CyberSec Center',
            // use getResultArray() on queries that return multiple rows
			'docs' => $query->getResultArray(),
            'id' => $id
        ];

        return view('documentation/show', $data);
    }

    public function create($id = null) {
        $data = [
            'page_title' => 'Add Document | TAMU CyberSec Center',
            'id' => $id
        ];

        return view('documentation/create', $data);
    }

    public function new($id = null)
    {
        $user = sessionUser();  
        $method = $this->request->getMethod();

        if ($method == "post") {
            $formData = $this->request->getPost();
            /* 
            INSERT INTO 
                documentation 
                (app_num, link, doc_type) 
                VALUES 
                ($id, $link, $doc_type);
            */

            $this->db->query('INSERT INTO documentation (app_num, link, doc_type)  
                VALUES(' . $id . 
                ', \'' . $formData['link'] . 
                '\' , \'' . $formData['doc_type'] . '\');');
        }

        return $this->response->redirect(site_url('application'));
	}

	public function destroy($id){
        if($id != null){
            // DELETE FROM documentation WHERE doc_num = $id;
           $this->db->query('DELETE FROM documentation WHERE doc_num = '.$id.';');
        }
		
        return $this->response->redirect(site_url('application'));
	}

    public function edit($id = null){
        // SELECT * FROM documentation WHERE doc_num = $id;
		$query = $this->db->query('SELECT * FROM documentation WHERE doc_num = '.$id.';');

        $data = [
			'page_title' => 'Edit Event | TAMU CyberSec Center',
            // use getRowArray() on queries that return one row
			'doc' => $query->getRowArray(),
        ];

        return view('documentation/edit', $data);
	}

	public function update($id){
        $method = $this->request->getMethod();
        if($method == "post"){
            $formData = $this->request->getPost();
            // UPDATE documentation SET link = $link, doc_type = $doc_type WHERE doc_num = $id;

            $this->db->query('UPDATE documentation SET 
                link = \'' . $formData['link'] . 
                '\', doc_type = \''. $formData['doc_type'] .
                '\' WHERE doc_num = '. $id . ';');
        }
        return $this->response->redirect(site_url('application'));
    }
}
