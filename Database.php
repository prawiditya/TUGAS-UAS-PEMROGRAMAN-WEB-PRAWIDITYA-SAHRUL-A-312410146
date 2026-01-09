<?php
/**
 * File: class/Database.php
 */
class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    public $conn;

    public function __construct() {
        // PENTING: Panggil kembali config.php di dalam sini agar variabel $config terbaca
        include "config.php"; 

        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];

        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // ... method query, insert, update, delete tetap sama seperti sebelumnya
    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function get($table, $where) {
        $sql = "SELECT * FROM {$table} WHERE {$where}";
        $result = $this->query($sql);
        return $result->fetch_assoc();
    }

    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = array_values($data);
        $formatted_values = array_map(function($value) {
            return "'" . $this->conn->real_escape_string($value) . "'";
        }, $values);
        $sql = "INSERT INTO {$table} ({$columns}) VALUES (" . implode(", ", $formatted_values) . ")";
        return $this->query($sql);
    }

    public function update($table, $data, $where) {
        $update_values = [];
        foreach ($data as $key => $value) {
            $update_values[] = "{$key} = '" . $this->conn->real_escape_string($value) . "'";
        }
        $sql = "UPDATE {$table} SET " . implode(", ", $update_values) . " WHERE {$where}";
        return $this->query($sql);
    }

    public function delete($table, $where) {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        return $this->query($sql);
    }
}
?>