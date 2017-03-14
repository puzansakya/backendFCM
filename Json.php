<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



require "./connection/connection.php";
$query = "SELECT quotes_id,quotes , author_name, category FROM category c JOIN(SELECT quotes_id, quotes, author_name ,category_id FROM author a JOIN (SELECT quotes_id, author_id,category_id,quotes FROM quotes)q on a.author_id = q.author_id)qd on qd.category_id = c.category_id";
$result = mysqli_query($con, $query);

$response = array();
while ($row = mysqli_fetch_array($result)) {
    // $image = '<img height="300" width="300" src="data:image;base64,'.$row[5].' "> ';
    array_push($response, array("quotes_id" => $row[0], "quotes" => $row[1], "author_name" => $row[2],"category"=>$row[3]));
}
echo json_encode(array("server_response" => $response));
//echo json_encode($response);
mysqli_close($con);
