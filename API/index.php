<?php

header('Access-Control-Allow-Origin: http://localhost:5000');
header('Allow: GET, POST');
header('Content-Type: application/json');
include_once './models/Database.php';
include_once './models/EventModel.php';
include_once './controllers/EventController.php';

$method = $_GET['q'];
$methods = ['all'=>'getAllEvents', 'save'=>'saveEvent'];

if (array_key_exists($method, $methods)) {
  $event = new EventController();
  $response = $event->{$methods[$method]}();
  echo json_encode($response);
} else {
  header("status: 404");
  echo json_encode(['status' => false, 'message' => 'method not valid']);
}