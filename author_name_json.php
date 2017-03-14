<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



require "./connection/connection.php";
$query = "SELECT author_name FROM `author`";
$result = mysqli_query($con, $query);

$response = array();
while ($row = mysqli_fetch_array($result)) {
    // $image = '<img height="300" width="300" src="data:image;base64,'.$row[5].' "> ';
    array_push($response, array("authors_name" => $row[0]));
}
echo json_encode(array("server_response" => $response));
//echo json_encode($response);
mysqli_close($con);
