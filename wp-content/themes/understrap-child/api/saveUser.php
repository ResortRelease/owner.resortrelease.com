<?php 
  include 'mt.php';
  $contactId = $_POST["userId"];
  $stageId = $_POST["newStage"];
  $response = $stageApi->addContact($stageId, $contactId);
  if (!isset($response['success'])) {
    print_r($response);
  }
?>