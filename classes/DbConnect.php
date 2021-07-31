<?php


class DbConnect
{
    private $host = "localhost";
    private $db_name = "socialite";
    private $user = "root";
    private $password = "";
    private static $instances = [];
    private $connection = null;

    /**
     * DbConnect constructor.
     */
    private function __construct()
    {
        $this->createConnection();
    }

    public static function getInstance(){
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }
        return self::$instances[$cls];
    }


    private function createConnection()
    {
        $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->db_name) or die(500|mysqli_errno());
    }

    /**
     * @return null
     */
    public function getConnection()
    {
        return $this->connection;
    }
}