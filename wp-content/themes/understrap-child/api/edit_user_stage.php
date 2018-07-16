<?php 
  // if($_SERVER['HTTP_REFERER'] !== 'gooddomain.com'){
  //   die('Unauthorized access');
  // }else {
    
  // }
  require 'mt.php';
  $userEmail = $_GET['email'];
  $crmStage = $_GET['stage'];
  $searchUser = $contactApi->getList($userEmail);
  foreach($searchUser['contacts'] as $user){
    $userID = $user['id'];
  };
  switch($crmStage){
    case "Welcome":
      $stageId = 1;
      break;
    case "Estoppel":
      $stageId = 2;
      break;
    case "Inventory":
      $stageId = 3;
      break;
    case "ROFR":
      $stageId = 4;
      break;
    case "Deed Prep":
      $stageId = 5;
      break;
    case "Doc Prep":
      $stageId = 6;
      break;
    case "Execution":
      $stageId = 7;
      break;
    case "Execution Received - Deeded":
      $stageId = 8;
      break;
    case "Execution Received - Non- Deeded":
      $stageId = 9;
      break;
    case "Finalization":
      $stageId = 10;
      break;
    case "Closed":
      $stageId = 11;
      break;
  }
    $response = $stageApi->addContact($stageId, $userID);
    if (!isset($response['success'])) {
      print_r($response);
    }else{
      echo $userEmail.' -> Moved to Stage -> '.$stageId.'<br><br>';
    }

    // PHP SQL
    $servername = "localhost";
    $username = "wpmort";
    $password = ")3Sp07G7)6";
    $dbname = "wpmort";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }     
    //Encode $example array into a JSON string.
    $emailEncoded = json_encode($userEmail);
    $stageEncoded = json_encode($stageId);
    $userEmail = (string)$userEmail;
    // Create or update client stage
    $sql = "INSERT INTO Clients (id, email, stage) VALUES ('$userID', '$userEmail', '$stageId')
            ON DUPLICATE KEY UPDATE email = '$userEmail', stage= '$stageId'";

    if ($conn->query($sql) === TRUE) {
      echo "Created or Updated successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
  // End PHP SQL
  
  // option B
  // strpos($error, 'Duplicate') !== false
?>