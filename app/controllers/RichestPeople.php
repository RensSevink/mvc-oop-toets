<?php
class People extends Controller {
  // Properties, field
  private $personModel;

  // Dit is de constructor
  public function __construct() {
    $this->personModel = $this->model('Person');
  }

  public function index() {
    $people = $this->personModel->getPeople();

    $rows = '';
    foreach ($people as $value){
      $rows .= "<tr>
                  <td>$value->id</td>
                  <td>$value->name</td>
                  <td>" . number_format($value->networth, 0, ',', '.') . "</td>
                  <td>$value->age</td>
                  <td>$value->myCompany</td>
                  <td><a href='" . URLROOT . "/people/delete/$value->id'>delete</a></td>
                </tr>";
    }


    $data = [
      'title' => '<h1>De vijf rijkste mensen ter wereld</h1>',
      'countries' => $rows
    ];
    $this->view('people/index', $data);
  }

  public function delete($id) {
    $this->personModel->deletePerson($id);

    $data =[
      'deleteStatus' => "Het record met id = $id is verwijdert"
    ];
    $this->view("people/delete", $data);
    header("Refresh:3; url=" . URLROOT . "/people/index");
  }

?>