<?php
//SID ACe9c7f8cef08c23781eb4038a04bf19da
//Auth Token 9fd53aa76d5c92be9c43489ad251aa4b
$mobile = $_GET['mobile'];
$license = $_GET['license'];
$alert = "Your vehicle found in No-Parking Area. Rs. 1200 fine has been charged. Vehicle No.".$license;
use Twilio\Rest\Client;
require_once 'Twilio/autoload.php'; 

    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

    $sid    = "ACe9c7f8cef08c23781eb4038a04bf19da";
    $token  = "9fd53aa76d5c92be9c43489ad251aa4b";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("+917666533914", // to
        array(
          "from" => "+12545406498",
          "body" => $alert
        )
      );

print($message->sid);
?>