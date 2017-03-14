<?php

require '../connection/connection.php';
$fcm_token = $_POST["fcm_token"];
$query = "INSERT INTO `fcm_info`(`fcm_token`) VALUES ('" . $fcm_token . "')";
mysqli_query($con, $query);
mysqli_close($con);
