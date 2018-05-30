<?php
require 'vendor/autoload.php';
error_reporting(E_ALL);
ini_set("display_errors", 1);

$params = array(
    'credentials' => array(
        'key' => 'AKIAII3LDW6RNDYZYB6Q',
        'secret' => 'r3QFHasVHiRBGHTmsBiADZzbjjeM6KAm/CsGspmX',
    ),
    'region' => 'us-east-1', // < your aws from SNS Topic region
    'version' => 'latest'
);
$sns = new \Aws\Sns\SnsClient($params);

$result = $sns->publish([
    'Message' => 'Test sms with php', // REQUIRED
    'MessageAttributes' => [
        'AWS.SNS.SMS.SenderID' => [
            'DataType' => 'String', // REQUIRED
            'StringValue' => 'test123'
        ],
        'AWS.SNS.SMS.SMSType' => [
            'DataType' => 'String', // REQUIRED
            'StringValue' => 'Transactional' // or 'Promotional'
        ]
    ],
    'PhoneNumber' => '+919599555121',
]);


echo "<pre>";
var_dump($result);
echo "</pre>";
?>
