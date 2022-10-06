<?php 
define('API_ACCESS_KEY',
'AAAAIa-ABx0:APA91bEu_f5VZJwACQ7dR1lZWYpxFsGh0Mj3BMRCeRmSG1imjJKP8pQO64UadslzyJTTC14IU0ppSi27XHLIZahs-cTH9dJENca7VUgOsUhoAeBleb70whu0yJshlFQiLUn5');


$msg = array(
                'body'  => $body,
                'title'     => $title,
                'activity'     => 'contact',
            );

            $fields = array(
                'to'  => '/topics/RATE',
                'data'=> $msg
            );

            $headers = array(
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
            
            sendNotification($headers, $fields);
            
            
function sendNotification($headers, $fields)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
}            
