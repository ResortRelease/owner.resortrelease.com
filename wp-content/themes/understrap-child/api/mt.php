<?php
    require __DIR__ . '../../vendor/autoload.php';

    use Mautic\MauticApi;
    use Mautic\Auth\ApiAuth;

    // session_start();

    // ApiAuth->newAuth() will accept an array of Auth settings
    $settings = array(
        'userName'   => 'CServices',             // Create a new user       
        'password'   => 'Welcome1..'              // Make it a secure password
    );

    // Initiate the auth object specifying to use BasicAuth
    $initAuth = new ApiAuth();
    $auth = $initAuth->newAuth($settings, 'BasicAuth');

    // Nothing else to do ... It's ready to use.
    // Just pass the auth object to the API context you are creating.

    $api = new MauticApi();
    $apiUrl = "https://e.resortrelease.com/api/";
    $contactApi = $api->newApi('contacts', $auth, $apiUrl);
    $stageApi = $api->newApi("stages", $auth, $apiUrl);
