<?php

class News {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $sql = "SELECT * FROM news ORDER BY created_at DESC";
        return $this->conn->query($sql);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM news WHERE id = ?"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insert($title, $content) {
        $stmt = $this->conn->prepare(
            "INSERT INTO news (title, content) VALUES (?, ?)"
        );
        $stmt->bind_param("ss", $title, $content);
        return $stmt->execute();
    }

    public function update($id, $title, $content) {
        $stmt = $this->conn->prepare(
            "UPDATE news SET title = ?, content = ? WHERE id = ?"
        );
        $stmt->bind_param("ssi", $title, $content, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare(
            "DELETE FROM news WHERE id = ?"
        );
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
