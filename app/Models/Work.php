<?php

namespace App\Models;

class Work extends Connection {

	public function find(int $id) {
		return $this->fetchOne('select * from works where id = ?', [$id]);
	}
}