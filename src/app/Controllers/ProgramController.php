<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProgramModel;

class ProgramController extends BaseController
{
    public function index()
    {
		$programModel = new ProgramModel();
        $data = [
            'page_title' => 'View Programs | TAMU CyberSec Center',
			'programs' => $programModel->findall()
        ];

        return view('program/index', $data);
    }

    public function create() {
        $data = [
            'page_title' => 'Create Program | TAMU CyberSec Center',
        ];

        return view('program/create', $data);
    }

    public function new()
    {
        $method = $this->request->getMethod();

        if ($method == "post") {
            $formData = $this->request->getPost();
            // $formData['Name'] = 'student';
            // $formData['Description'] = password_hash($formData['Password'], PASSWORD_BCRYPT);
            $programModel = new ProgramModel();
            $result = $programModel->save($formData, false);
            $data['result'] = $result;
        }

		// SWITCH TO REDIRECT
		// return $this->response->redirect(site_url('program/index'));

		// Set up index context
		$programModel = new ProgramModel();
        $data = [
            'page_title' => 'View Programs | TAMU CyberSec Center',
			'programs' => $programModel->findall()
        ];

        return view('program/index', $data);
	}
	
	public function edit($id = null){
		$programModel = new ProgramModel();
        $data = [
			'page_title' => 'Edit Program | TAMU CyberSec Center',
			'program' => $programModel->find($id)
        ];

        return view('program/edit', $data);
	}

	public function update($id){}

	public function delete($id = null){
		$programModel = new ProgramModel();
        $data = [
			'page_title' => 'Delete Program | TAMU CyberSec Center',
			'program' => $programModel->find($id)
        ];

        return view('program/delete', $data);
	}

	public function destroy($id){
		$programModel = new ProgramModel();

		$programModel->where("program_num",$id)->delete();
		
		// Set up index context
		$programModel = new ProgramModel();
		$data = [
			'page_title' => 'View Programs | TAMU CyberSec Center',
			'programs' => $programModel->findall()
		];

		return view('program/index', $data);
	}

	public function show($id = null)
    {
		$programModel = new ProgramModel();
        $data = [
			'page_title' => 'View Program | TAMU CyberSec Center',
			'program' => $programModel->find($id)
        ];

        return view('program/show', $data);
    }
}
