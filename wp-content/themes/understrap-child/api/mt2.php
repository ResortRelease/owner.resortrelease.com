<?php
    require __DIR__ . '../../vendor/autoload.php';

    use Mautic\MauticApi;
    use Mautic\Auth\ApiAuth;
    
    // session_start();

    // ApiAuth->newAuth() will accept an array of Auth settings
    $settings = array(
      'baseUrl'      => 'https://e.resortrelease.com',
      'version'      => 'OAuth2',
      'clientKey'    => '3_40kajsqg8zs4g8c0go84gwsog4ksoo8gocc4gosk4gos84c8o4',
      'clientSecret' => '4fam43t9njms0kg0ok8ow80g00oc840ooccgwwk4c0cc8gs40k', 
      'callback'     => 'http://127.0.0.1/mortgage.resortrelease.com/wp-content/themes/understrap-child/api/edit_user_stage.php'
    );

    // Initiate the auth object
    $initAuth = new ApiAuth();
    $auth     = $initAuth->newAuth($settings);

    // Initiate process for obtaining an access token; this will redirect the user to the authorize endpoint and/or set the tokens when the user is redirected back after granting authorization

    if ($auth->validateAccessToken()) {
        if ($auth->accessTokenUpdated()) {
            $accessTokenData = $auth->getAccessTokenData();
            echo $accessTokenData;
            //store access token data however you want
        }
    }
    // Nothing else to do ... It's ready to use.
    // Just pass the auth object to the API context you are creating.

    $api = new MauticApi();
    $apiUrl = "https://e.resortrelease.com/api/";
    $contactApi = $api->newApi('contacts', $auth, $apiUrl);
    $stageApi = $api->newApi("stages", $auth, $apiUrl);