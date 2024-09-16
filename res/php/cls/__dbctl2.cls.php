<?php

// DB handler class
class DBctl {

    // Constructor to accept custom DB configuration or use default
    public static function setDBconf($dbConf = null) {
        if ($dbConf !== null ) {
            if (!isset($this->DBconf[$dbConf[$dbName ?? $db]])) {

                if (!isset($this->DBconf[$dbConf[$dbName ?? $db]][$dbConf[$db]])) {
                    return("DB config '$dbName' exists for '$this->DBconf[$dbName]['db']'");
                    exit();
                }
                
                return("DB config '$dbName' exists for '$this->DBconf[$dbName]['db']'");
                exit();
            } else {
                $this->DBconf[$dbConf[$dbName ?? $db]] =>  [
                    'servername' => $dbConf[servername],
                    'username' => $dbConf[username],
                    'pass' => $dbConf[pass],
                    'db' => $dbConf[db]
                ];

            }
        }
    }
    public static function getDBConf($dbName) {
        if (isset(self::$DBconf[$dbName])) {
            return self::$DBconf[$dbName];
        } else {
            throw new Exception("Database configuration not found for '$dbName'.");
        }
    }
    
    private $DBconf = [
        "XI" => [
            'servername' => "localhost",
            'username' => "XIu",
            'pass' => "XIpass",
            'db' => "XI"
        ],
        "XI_t" => [
            'servername' => "localhost",
            'username' => "XIu_t",
            'pass' => "uTestDbPass",
            'db' => "XI_t"
        ]
    ];
    // -connect to DB using PDO
    protected function connect($dbConf = $this->DBconf['XI']) {
        try {
            $dsn = "mysql:host={$dbConf['servername']};dbname={$dbConf['db']};";
            $this->conn = new PDO($dsn, $dbConf['username'], $dbConf['pass']);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $this->conn;
            
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    // -disconnect from DB
    private function disconnect() {
        $this->conn = null;
    }

    // Method for executing prepared statements (SELECT, INSERT, UPDATE, DELETE)
    public function run($sql, $params = []) {
        try {
            $this->connect();

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Query failed: " . $e->getMessage());
        } finally {
            $this->disconnect();
        }
    }

    // Fetch all rows from a query
    public function fetchAll($sql, $params = []) {
        return $this->run($sql, $params)->fetchAll();
    }

    // Fetch a single row from a query
    public function fetch($sql, $params = []) {
        return $this->run($sql, $params)->fetch();
    }

    // Insert data into a table
    public function insert($sql, $params = []) {
        $this->run($sql, $params);
        return $this->conn->lastInsertId(); // Get the last inserted ID
    }

    // Update or delete data
    public function execute($sql, $params = []) {
        return $this->run($sql, $params)->rowCount(); // Return the number of affected rows
    }

    // Get the database name
    public function getDatabaseName() {
        return $this->dbName;
    }
}

?>
