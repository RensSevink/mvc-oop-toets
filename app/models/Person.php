<?php
  class Country {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getPeople() {
      $this->db->query("SELECT * FROM `richestpeople`;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function deletePerson($id) {
      $this->db->query("DELETE FROM richestpeople WHERE id = :id");
      $this->db->bind("id", $id, PDO::PARAM_INT);
      return $this->db->execute();
    }
  }

?>