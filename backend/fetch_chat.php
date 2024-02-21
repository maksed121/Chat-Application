<?php
require('../conn.php');
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if(isset($data['friendId'])){
    $check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM friends WHERE friend_id = '$data[friendId]' AND user_id = '$data[userId]'"));


    if($check == 0){
        $q = "INSERT INTO friends SET user_id = '$data[userId]', friend_id = '$data[friendId]'";
        $run = mysqli_query($conn, $q);
        
        if($run){
            $response = json_encode(['message' => 'Friend Added', 'code' => 201]);
        }
    }else{
        $response = json_encode(['message' => 'Friend already exist', 'code' => 400]);
    }

    echo $response;
}
?>
