<?php

require '../connection/connection.php';
$message = $_POST["message"];
$title = $_POST["title"];
$path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';
$server_key = "AIzaSyDmciQWqq8hwSW31JJUKfoOj-1Ngpw_a1k";
$query = "SELECT * FROM `fcm_info`";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_row($res);
$key = $row[0];

echo $title . "<br>";
echo $message . "<br>";
echo $key . "<br>";


 
$headers = array(
    'Authorization:key=' . $server_key,
    'Content-Type:application/json'
);




$fields = array('to' => $key,
    'notification' => array('title' => $title, 'body' => $message)
);

$payload = json_encode($fields);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $path_to_firebase_cm);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

$result = curl_exec($ch);

curl_close($ch);

mysqli_close($con);

