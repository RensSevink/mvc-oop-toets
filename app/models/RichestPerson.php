<?php
  class RichestPerson {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getRichestPeople() {
      $this->db->query("SELECT * FROM `richestpeople`;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function deleteRichestPerson($id) {
      $this->db->query("DELETE FROM richestpeople WHERE id = :id");
      $this->db->bind("id", $id, PDO::PARAM_INT);
      return $this->db->execute();
    }
  }

?>