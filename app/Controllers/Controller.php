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
	* @return mixed
	*/
	public function _get(string $key, $default = null)
	{
		return $this->get[$key] ?? $default;
	}

	/**
	* @return mixed
	*/
	public function _post(string $key, $default = null)
	{
		return $this->post[$key] ?? $default;
	}
}
