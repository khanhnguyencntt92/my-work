<?php
namespace App\Controllers;

class HomeController extends Controller {

	public function index() {
		redirect([
			'controller' => 'my-work'
		]);
	}
}