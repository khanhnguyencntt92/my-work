<?php
namespace App\Controllers;

use App\Models\Work;

class MyWorkController extends Controller {

	/**
	* @var Work
	*/
	protected $workModel;

	/**
	* @var int
	*/
	protected $id;

	public function _init(array $get, array $post)
	{
		parent::_init($get, $post);

		$this->workModel = new Work;
		$this->id = intval($this->_get('id', 0));
	}

	/**
	* Show list work
	*/
	public function index()
	{
		$data = $this->workModel->fetchAllWork();
		$this->_view('index.php', ['data' => $data]);
	}

	/*
	* Show one work
	*/
	public function show()
	{
		$data = $this->workModel->find($this->id);
		if (empty($data)) {
			exit('Work not found!');
		}
		$this->_view('show.php', ['work' => $data]);
	}

	/**
	* Edit one work
	*/
	public function update()
	{
		$data = $this->workModel->find($this->id);
		if (empty($data)) {
			exit('Work not found!');
		}
		if (($post = $this->_post()) && $this->workModel->updateWork($this->id, $post)) {
			redirect(['controller' => 'my-work']);
		}
		$this->_view('update.php', ['work' => $data]);
	}

	public function create()
	{
		if (($post = $this->_post()) && $this->workModel->addWork($post)) {
			redirect(['controller' => 'my-work']);
		}
		$this->_view('create.php');
	}

	/**
	* Delete one work
	*/
	public function delete()
	{
		$work = $this->workModel;
		$data = $work->find($this->id);

		if (empty($data)) {
			exit('Work not found!');
		}
		$work->delete($_GET['id']);
		redirect(['controller' => 'my-work']);
	}
}
