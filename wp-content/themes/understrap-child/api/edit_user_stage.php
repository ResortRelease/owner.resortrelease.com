<?php 
  /* CORS */
  $http_origin = $_SERVER['HTTP_ORIGIN'];
  $allowed_domains = array(
    'https://www.resortrelease.com',
    'https://www.resortreleasecrm.com'
  );
  if (in_array($http_origin, $allowed_domains))
  {  
    header("Access-Control-Allow-Origin: $http_origin");
  }
  /* END CORS */  
  require 'mt.php'; /* Mautic API */ 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userEmail = $_POST['email'];
    $crmStage = $_POST['stage'];
    $type = $_POST;
  } else{
    $type = $_GET;
    $userEmail = $_GET['email'];
    $crmStage = $_GET['stage'];
  }
  /* Grab Data */
  $data = array(
    'fullname' => $type['fullname'],
    'email' => $userEmail,
    'phone' => $type['phone'],
    'resort' => $type['resort'],
    'comments' => $type['comments'],
    'hearduson' => $type['hearduson'],
    'utmcampaign' => $type['utm_campaign'],
    'utmsource' => $type['utm_source'],
    'utmad' => $type['utm_ad'],
    'utmadgroup' => $type['utm_adgroup'],
    'utmmedium' => $type['utm_medium'],
    'utmplacement' => $type['utm_placement'],
    'utmterm' => $type['utm_term'],
    'msclkid' => $type['msclkid'],
    'gclid' => $type['gclid'],
    'crm_lead_source' => $type['crmleadsource'],
    'crmleadsubsource' => $type['crmleadsubsource'],
    'hasapp' => $type['hasapp'],
    'hasform' => $type['hasform']
  );
  /** Search User*/
  $searchUser = $contactApi->getList($userEmail);
  foreach($searchUser['contacts'] as $user){
    $userID = $user['id'];
  };
  /** Check Stage */
  $crmStage = strtolower($crmStage);
  switch($crmStage){
    case "welcome":
    case 1:
    case "1":
      $stageId = 1;
      break;
    case "estoppel":
    case 2:
    case "2":
      $stageId = 2;
      break;
    case "inventory":
    case 3:
    case "3":
      $stageId = 3;
      break;
    case "rofr":
    case 4:
    case "4":
      $stageId = 4;
      break;
    case "deedprep":
    case 5:
    case "5":
      $stageId = 5;
      break;
    case "docprep":
    case 6:
    case "6":
      $stageId = 6;
      break;
    case "execution":
    case 7:
    case "7":
      $stageId = 7;
      break;
    case "executionreceived-deeded":
    case 8:
    case "8":
      $stageId = 8;
      break;
    case "executionreceived-non-deeded":
    case 9:
    case "9":
      $stageId = 9;
      break;
    case "recording":
    case 10:
    case "10":
      $stageId = 10;
      break;
    case "finalization":
    case 11:
    case "11":
      $stageId = 11;
      break;
    case "closed":
    case 12:
    case "12":
      $stageId = 12;
      break;
  }
  /* If Contact Does Not Exist in Mautic ? Create : Edit */
  if (!$userID || $userID == 0) {
    $newContact = $contactApi->create($data);
    $userID = $newContact['contact']['id'];
    echo $userID;
    $response = $stageApi->addContact($stageId, $userID);
  } else {
    $contact = $contactApi->edit($userID, $data, false);
    $response = $stageApi->addContact($stageId, $userID);
  }
  if (!isset($response['success'])) {
    echo 'Unknown Stage Name.<br>';
  }else{
    echo $userEmail.' -> Moved to Stage -> '.$stageId.'<br>';
  }
  /*Create connection*/
    require 'ils.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
    /*Check connection*/
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }     
    /*Encode $example array into a JSON string.*/
    $emailEncoded = json_encode($userEmail);
    $stageEncoded = json_encode($stageId);
    $userEmail = (string)$userEmail;
  
    /*Create or update client stage */
    $sql = "INSERT INTO $table (id, email, stage) VALUES ('$userID', '$userEmail', '$stageId')
            ON DUPLICATE KEY UPDATE email = '$userEmail', stage= '$stageId'";

    if ($conn->query($sql) === TRUE) {
      echo "Created or Updated successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  $conn->close();
?>