<?php 
  // if($_SERVER['HTTP_REFERER'] !== 'gooddomain.com'){
  //   die('Unauthorized access');
  // }else {
    
  // }
  $http_origin = $_SERVER['HTTP_ORIGIN'];

  $allowed_domains = array(
    'https://www.resortrelease.com',
    'https://www.resortreleasecrm.com'
  );

  if (in_array($http_origin, $allowed_domains))
  {  
      header("Access-Control-Allow-Origin: $http_origin");
  }
  require 'mt.php';
  if(isset($_POST)){
    $userEmail = $_POST['email'];
    $crmStage = $_POST['stage'];
  }else{
    $userEmail = $_GET['email'];
    $crmStage = $_GET['stage'];
  }
  $searchUser = $contactApi->getList($userEmail);
  foreach($searchUser['contacts'] as $user){
    $userID = $user['id'];
  };
  switch($crmStage){
    case "Welcome":
    case 1:
    case "1":
      $stageId = 1;
      break;
    case "Estoppel":
    case 2:
    case "2":
      $stageId = 2;
      break;
    case "Inventory":
    case 3:
    case "3":
      $stageId = 3;
      break;
    case "ROFR":
    case 4:
    case "4":
      $stageId = 4;
      break;
    case "Deed Prep":
    case 5:
    case "5":
      $stageId = 5;
      break;
    case "Doc Prep":
    case 6:
    case "6":
      $stageId = 6;
      break;
    case "Execution":
    case 7:
    case "7":
      $stageId = 7;
      break;
    case "Execution Received - Deeded":
    case 8:
    case "8":
      $stageId = 8;
      break;
    case "Execution Received - Non- Deeded":
    case 9:
    case "9":
      $stageId = 9;
      break;
    case "Finalization":
    case 10:
    case "10":
      $stageId = 10;
      break;
    case "Closed":
    case 11:
    case "11":
      $stageId = 11;
      break;
  }
    $response = $stageApi->addContact($stageId, $userID);
    if (!isset($response['success'])) {
      print_r($response);
    }else{
      echo $userEmail.' -> Moved to Stage -> '.$stageId.'<br><br>';
    }

    require 'ils.php';
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