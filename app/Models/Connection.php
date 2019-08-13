<?php
namespace App\Models;

class Connection {

	/**
	* @var array
	*/
    private static $config = [
        'driver' => 'mysql',
        'host' => '',
        'username' => '',
        'password' => '',
        'db_name' => '',
        'commands' => []
    ];

    /**
     * @var PDO
     */
    private static $connect = null;

    /**
    * @param array
    * @return \PDO
    */
    public static function connect(array $config = [])
    {
        $config = array_replace(self::$config, $config);

        if (!empty(self::$connect)) {
            return self::$connect;
        }

        try {
            self::$connect = new \PDO(
                "{$config['driver']}:host={$config['host']};dbname={$config['db_name']}",
                $config['username'], $config['password'], $config['commands']
            );
        } catch (PDOException $e) {
            throw new \Exception('Connect failed!');
        }
        return self::$connect;
    }

    /**
    * @param string $query
    * @param array $params
    * @return object
    */
    public function fetchOne (string $query, array $params = []) {
        $statement = self::connect()->prepare($query);
        if (!$statement->execute($params) ) {
            return null;
        }
        return $statement->fetchObject();
    }

    /**
     * @param string $query
     * @param array $params
     * @return array
     */
    public function fetchAll (string $query, array $params = []) {
        $statement = self::connect()->prepare($query);
        if (!$statement->execute($params) ) {
            return [];
        }
        return $statement->fetchAll();
    }
}