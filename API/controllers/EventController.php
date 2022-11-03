<?php


class EventController
{
  private $model;

  public function __construct()
  {
    $this->model = new EventModel();
  }

  public function saveEvent()
  {
    if (empty($_POST)) {
      return $this->typeMessage('Request not valid', false, 422);
    }
    $registered = $this->model->registerEvent($_POST);
    if ($registered) {
      $event = $this->model->getEvent($registered);
      return $this->typeMessage($event, true, 202);
    }
    return $this->typeMessage('Event not saved', false, 500);
  }

  public function getAllEvents()
  {
    $events = $this->model->getEvents();
    return $this->typeMessage($events, true);
  }

  public function typeMessage($data, bool $type, $status = 200)
  {
    header("status: $status");
    if (!$type) {
      return ['status' => false, 'message' => $data];
    } else {
      return ['status' => true, 'data' => $data];
    }
  }
}
