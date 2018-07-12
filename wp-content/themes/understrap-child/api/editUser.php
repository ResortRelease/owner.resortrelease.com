<?php 
  include 'mt.php'; 
  $stageApi = $api->newApi("stages", $auth, $apiUrl);
  $stages = $stageApi->getList();
  $userStage = $_POST["stage"];
  $allStages = array() ;
  $user = $_POST["user"];
  $userArray = $_POST["userArray"];
  $optionCount = 0;
  $userId = $userArray['id'];
  echo '<div id="editModal" class="animated floatUp card">
    <div class="inner-contents">
    <div class="h3" id="name">Name: '.$userArray['fullname'].'</div>
    <div id="email">Email: '.$userArray['email'].'</div>
    <div id="phone">Phone: '.$userArray['phone'].'</div>
    <div id="stage">Current Stage: '.$userStage.'</div>
    <div class="form-group">
    <label for="sel1">Select Stages For The User:</label>
    <select class="form-control" id="sel1">';
    foreach($stages['stages'] as $key => $val){
      $optionCount ++;
      echo '<option value="'.$optionCount.'">'.$val['name'].'</option>';
      // $allStages[] = json_encode($val['name']);
    };
    echo '</select>
      </div></div>
      <div class="row" id="editButtons">
          <div class="col-md-4"></div>
          <div class="col-md-4 text-right" id="save">
              <div class="button-save text-center" onclick="saveUser('.$userId.');">
                  Save
                  <i class="fa fa-check"></i>
              </div>
          </div>
          <div class="col-md-4 text-right" id="cancel">
              <div class="button-cancel text-center" onclick="hideModal();">
                  Cancel
                  <i class="fa fa-times"></i>
              </div>
          </div>
      </div>
    </div>';
?>