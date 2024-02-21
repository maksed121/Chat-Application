<?php
require('../conn.php');
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['friend_id']) && isset($data['user_id'])) {
    $q = mysqli_query($conn, "SELECT * FROM conversation WHERE (from_id = '$data[user_id]' AND to_id = '$data[friend_id]') OR (from_id = '$data[friend_id]' AND to_id = '$data[user_id]')");

    $layout = "";

    while ($res = mysqli_fetch_array($q)) {

        if ($res['from_id'] == $data['friend_id']) {
            $layout .= '
            <div class="msg-left mb-3" style=" width: 30%; background-color: #FFFFFF;border-radius: 4px">
                <p class="m-0 p-2 fw-bold fs-6">' . $res['message'] . '
                </p>
                <hr style="margin: 0; color:#9c9b9a">
               <div class="d-flex justify-content-end"> <small class="p-2 text-end" style="font-size: 10px;">'.$res['created_at'].'</small> </div>
            </div>
            ';
        } else {
            $layout .= '
            <div class="msg-right mb-3" style=" width: 30%; background-color: #D1F4CC;align-self: flex-end;border-radius: 4px">
                <p class="m-0 p-2 fw-bold fs-6">' . $res['message'] . '
                </p>
                <hr style="margin: 0; color:#9c9b9a">
                <div class="d-flex justify-content-end"> <small class="p-2 text-end" style="font-size: 10px;">'.$res['created_at'].'</small> </div>
                </div>
            ';
        }
    }

    $response = json_encode(['elements' => $layout]);
    echo $response;
}
