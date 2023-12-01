<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProgramModel;

class ProgramController extends BaseController
{
    public function index()
    {
        $program_obj = new ProgramModel();

		// Select all Programs from table	
        $programs = $program_obj->findAll();

		// Send this Program variable to any view file
		// ...
    }

    public function insertProgram()
    {
		$program_obj = new ProgramModel();
		
		// Insert Program row into table
		$program_obj->insert([
			"name" => "New Program",
			"description" => "Program Sample description",
		]);
	}
	
	public function updateProgram(){
		$program_obj = new ProgramModel();

		$program_id = 1; // ID to update

		// Update Program information by Program id
		$program_obj->update($program_id, [
			"name" => "Update Program",
			"description" => "Program Sample description update",
		]);
	}

	public function deleteProgram(){
		$program_obj = new ProgramModel();

		$program_id = 1; // ID to delete

		// Delete Program by ID
		$program_obj->delete($program_id);
	}
}
