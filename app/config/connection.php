<?php
class Connection {
    
    // ATTRS

    private static Connection $instance; // Singleton instance

    private string $driver = 'pgsql';
    private string $host = 'localhost';
    private string $dbname = 'db_postgres';
    private string $port = '5432';
    private string $username = 'root';
    private string $password = 'Contrasenia123';
    private PDO $conn;


    // CONSTRUCTORS

    private function _construct() {}


    // CUSTOMERS

    public static function getConnection() {
        try {
            if (!isset(self::$instance)) {
                
                // echo "Is not set<br>";

                $instance = new Connection();
                $instance->conn = new PDO("{$instance->driver}:host={$instance->host};port={$instance->port};dbname={$instance->dbname}", $instance->username, $instance->password);
                $instance->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::$instance = $instance;

                unset($instance);
            }
            // echo 'Success!<br>';
            return self::$instance->conn;
        } catch (PDOException $e) {

            echo "Error: ".$e->getMessage();
        }
    }



    //* GETTERS
    
    /**
     * Get the value of driver
     */ 
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Get the value of host
     */ 
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Get the value of dbname
     */ 
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * Get the value of port
     */ 
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of conn
     */ 
    public function getConn()
    {
        return $this->conn;
    }
}

Connection::getConnection();