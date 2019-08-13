<?php
namespace App\Models;

class Work extends Connection {

	private function validate($data) {
		return !(empty($data['work_name']) 
			|| empty($data['start_date']) 
			|| empty($data['end_date']) 
			|| empty($data['status']));
	}

    /**
     * @param int $id
     * @return object|null
     */
	public function find(int $id)
	{
		return $this->fetchOne('SELECT * FROM works WHERE id = ?', [$id]);
	}

	/**
	* Function to get all work
	* @return array
	*/
	public function fetchAllWork()
	{
		return $this->fetchAll('SELECT * FROM works');
	}

    /**
     * @param int $id
     * @param array $data
     * @return bool
     * @throws \Exception
     */
	public function updateWork(int $id, array $data = [])
	{
		if (!$this->validate($data)) {
			return false;
		}

		unset($data['update']);		
		if (isset($data['start_date'])) {
			$data['start_date'] = strtotime($data['start_date']);
		}
		if (isset($data['end_date'])) {
			$data['end_date'] = strtotime($data['end_date']);
		}
		$setArrayWork = '';
		$param = [];
		foreach ($data as $key => $value) {
			$setArrayWork .= $key .'`= ?, `';
			$param[] = $value;
		}
		$setArrayWork = rtrim('`'.$setArrayWork.'`', ', `');
		$param[]= $id;
		$edit = Parent::connect()->prepare(
			"UPDATE `works` SET " . $setArrayWork . " WHERE id = ?"
		);
		return $edit->execute($param);
	}

    /**
     * @param array $data
     * @return bool
     * @throws \Exception
     */
	public function addWork (array $data) 
	{
		if (!$this->validate($dadta)) {
			return false;
		}
		unset($data['create']);		
		if (isset($data['start_date'])) {
			$data['start_date'] = strtotime( $data['start_date']);
		}
		if (isset($data['end_date'])) {
			$data['end_date'] = strtotime( $data['end_date']);
		}
		$setArrayWork = '';
		$param = [];
		foreach ($data as $key => $value) {
			$setArrayWork .= '`'.$key.'`, ';
			$param[] = $value;
		}
		$keySet = rtrim($setArrayWork, ' ,');
		$valueSet = rtrim(str_repeat('?, ', count($param)), ', ');

		$add = Parent::connect()->prepare(
			"INSERT INTO `works` (". $keySet .") VALUES (". $valueSet .")"
		);
		return $add->execute($param);
	}

    /**
     * @param int $id
     * @throws \Exception
     */
	public function delete(int $id)
	{	
		$delete = Parent::connect()->prepare("DELETE FROM `works` WHERE id= ?");
		return $delete->execute([$id]);
	}
}
