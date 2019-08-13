<?php
namespace App\Controllers;

abstract class Controller {

	/**
	* Get request
	* 
	* @var array
	*/
	private $get;

	/**
	* Post request
	* 
	* @var array
	*/
	private $post;

	/**
	* @param array $get
	* @param array $post
	*/
	public function _init(array $get, array $post)
	{
		$this->get = $get;
		$this->post = $post;
	}

	/**
	* @param string $filePath
	* @param array $data
	*/
	public function _view($filePath, array $data = []) 
	{
		extract($data);
		$filePath = '../app/Views/' . trim($filePath, '/');
		if (file_exists($filePath)) {
			require_once $filePath;
		}
	}

	/**
	* @return mixed
	*/
	public function _get(string $key = '', $default = null)
	{
		if (empty($key)) {
			return $this->get;
		}
		return $this->get[$key] ?? $default;
	}

	/**
	* @return mixed
	*/
	public function _post(string $key = '', $default = null)
	{
		if (empty($key)) {
			return $this->post;
		}
		return $this->post[$key] ?? $default;
	}
}
