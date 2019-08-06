<?php
namespace App\Controllers;

use App\Models\Work;

class MyWorkController extends Controller {

	public function index()
	{
		$work = new Work;

		$data = $work->find(intval($this->_get('id', 0)));
	}
}
