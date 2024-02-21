<?php
require('../conn.php');
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if(isset($data['friendId'])){
    $q = "INSERT INTO conversation SET from_id = '$data[userId]', to_id = '$data[friendId]', message = '$data[message]'";
    $run = mysqli_query($conn, $q);
    
    if($run){
        $response = json_encode(['message' => 'messege sent', 'code' => 201]);
    }
    echo $response;
}
?>
