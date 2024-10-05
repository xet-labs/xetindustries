<?php

class Database {
    private $host = 'localhost';
    private $dbName = 'my_database';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Establish PDO connection
    public function connect() {
        $this->conn = null;

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable exceptions for errors
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Fetch associative arrays
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }

    // Method for executing prepared statements (SELECT, INSERT, UPDATE, DELETE)
    public function run($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            echo 'Query Error: ' . $e->getMessage();
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
}
