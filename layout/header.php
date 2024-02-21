<?php
session_start();
require("./conn.php");

if (!$_SESSION['email']) {
?>
    <script>
        location.replace('./index.php');
    </script>
<?php
} else {
    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE email = '$_SESSION[email]'"));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="https://iconspng.com/images/whatsapp-logo.jpg">
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
    <div class="main">
        <div class="row m-0 p-0 bg-clg">
            <div class="col-md-4 p-0 m-0">
                <div class="ps-3" id="chatslist" style="position: relative;display:block">
                    <div class="nav-left d-flex justify-content-between align-items-center mb-3 bg-clr rounded p-2">
                        <div onclick="showDp()" class="dp-img" style="width: 50px;height: 50px;border-radius:50%;background-size:100%;object-fit:cover; background-image:url(<?= $user['dp'] ? $user['dp'] : 'assests/images/user_dp.png' ?>)">
                            <!-- <img class="img-fluid rounded-circle" src="" alt=""> -->
                        </div>
                        <div class="nav-icons">
                            <i class="fa-solid fa-users fs-5 m-0"></i>
                            <i class="fa-solid fa-spinner fs-5 m-0"></i>
                            <i class="fa-solid fa-comment fs-5 m-0"></i>
                            <i class="fa-solid fa-person-circle-plus fs-5 m-0"></i>
                            <i class="fa-solid fa-ellipsis-vertical fs-5 m-0" onclick="hideDotMenu()" style="cursor:pointer;"></i>
                        </div>
                    </div>
                    <div class="search-user d-flex gap-2" style="border-radius: 5px 0px 0px 5px;">
                        <form action="chat-ui.php" class="d-flex w-100 gap-3 mb-2">
                            <input type="text" name="search" class="w-100" style="padding: 10px;border-radius: 7px;height: 35px;background-color: rgba(150, 150, 150, 0.13);border: 1px solid rgba(150, 150, 150, 0.13);" required value="<?= $_GET['search'] ?? '' ?>" placeholder="Search or start new Chat">
                            <button class="btn btn-info btn-sm">Search</button>
                        </form>
                    </div>
                    <div class="scroll-users pb-5">

                        <?php
                        $allusers = mysqli_query($conn, "SELECT DISTINCT * FROM friends WHERE user_id = '$user[id]' OR friend_id = '$user[id]'");


                        while ($data = mysqli_fetch_array($allusers)) {

                            $friend_id = ($data['user_id'] == $user['id']) ? $data['friend_id'] : $data['user_id'];

                            $friend = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id =  '$friend_id'"));

                            // Check if $friend exists before accessing its properties
                            if ($friend) {
                                $lastmessage = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM conversation WHERE from_id = '$friend[id]' OR to_id = '$friend[id]' ORDER BY id DESC LIMIT 1"));

                                // Your code for displaying the last message
                        ?>

                                <a href="dashboard.php?user_id=<?= $friend['id'] ?>" style="text-decoration:none;color:black">
                                    <div class="recent_chat_list my-2">
                                        <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                            <div class="dp-img" style="width: 50px;height: 50px;border-radius:50%;background-size:100%;object-fit:cover; background-image:url(<?= $friend['dp'] ? $friend['dp'] : 'assests/images/user_dp.png' ?>)">
                                            </div>
                                            <div class="ussers-list">
                                                <h6 class="m-0"><?= $friend['name'] ?></h6>
                                                <p class="m-0"><?= $lastmessage['message'] ?? "Click to start conversation" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                        <?php
                            }
                        }
                        ?>

                    </div>
                    <div style="display: none;" id="dotMenu">
                        <div class="dot-3 d-flex bg-white flex-column justify-content-center gap-3 my-2 mt-5 shadow p-4 rounded" style="position: absolute; top: 0; right: 0;width:15vw; margin:7vh 1vw 0 0;">
                            <a href="#" style="text-decoration: none;">New Group</a>
                            <a href="#" style="text-decoration: none;">New Community</a>
                            <a href="#" style="text-decoration: none;">Started Messages</a>
                            <a href="#" style="text-decoration: none;">Select Chats</a>
                            <a onclick="showSettings()" style="text-decoration: none;cursor:pointer">Setting</a>
                            <a onclick="logout()" style="text-decoration: none;color:black;cursor:pointer">Log Out</a>
                        </div>
                    </div>

                </div>
                <div id="settings" style="display: none;">
                    <div class="bg-success mb-0  pt-5 ps-5 text-white" style="width: 100%;">
                        <div class="d-flex align-items-center gap-4 py-4 fs-5">
                            <i class="fa-solid fa-arrow-left" onclick="showChatsList()" style="cursor: pointer;"></i>
                            <h4 class="m-0">Settings</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-4 py-3 fs-5 hover ps-5" style="cursor: pointer;" onclick="showprofileupdates()">
                        <div class="dp-logo border border-1 border-dark bg-white" style="width: 90px;height: 90px;border-radius:50%;background-size:100%;object-fit:cover; background-image:url(<?= $user['dp'] ? $user['dp'] : 'assests/images/user_dp.png' ?>)">
                        </div>
                        <div class="dp-name">
                            <p class="fs-3 m-0 p-0"><?= $user['name'] ?></p>
                            <p class="fs-6 m-0 p-0"><?= $user['bio'] ?></p>
                        </div>
                    </div>
                    <div class="ps-5">


                        <div class="settings-lists d-flex flex-column gap-3">
                            <p class="fs-5"><i class="fa-solid fa-bell me-3"></i>Notifications</p>
                            <p class="fs-5"><i class="fa-solid fa-lock me-3"></i></i>Privacy</p>
                            <p class="fs-5"><i class="fa-solid fa-shield-halved me-3"></i>Security</p>
                            <p class="fs-5"><i class="fa-solid fa-palette me-3"></i>Theme</p>
                            <p class="fs-5"><i class="fa-solid fa-download me-3"></i>Media-auto download</p>
                            <p class="fs-5"><i class="fa-solid fa-file-invoice me-3"></i>Request account info</p>
                            <p class="fs-5"><i class="fa-solid fa-circle-question me-3"></i></i>Help</p>
                        </div>
                    </div>
                </div>
                <div id="profileupdate" style="display: none;">
                    <div class="bg-success mb-0  pt-5 ps-5 text-white" style="width: 100%;">
                        <div class="d-flex align-items-center gap-4 py-4 fs-5">
                            <i class="fa-solid fa-arrow-left" onclick="settingBack()" style="cursor: pointer;"></i>
                            <h4 class="m-0">Profile</h4>
                        </div>
                    </div>
                    <div class="px-5">
                        <div>
                            <div class="d-flex flex-column align-items-center gap-4 py-3 fs-5">
                                <div class="dp-logo border border-1 border-dark bg-white" style="width: 90px;height: 90px;border-radius:50%;background-size:100%;object-fit:cover; background-image:url(<?= $user['dp'] ? $user['dp'] : 'assests/images/user_dp.png' ?>)">
                                </div>
                            </div>
                            <div class="dp-details d-flex flex-column gap-4">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="file" class="form-control" name="image">
                                    <label for="name" class="text-success">Your name</label>
                                    <input type="text" class="form-control" value="<?= $user['name'] ?>" name="name">
                                    <small class="text-secondary">This is not your username or pin. This name will be visible to your WhatsApp contacts <br></small>
                                    <label for="bio" class="text-success">About</label>
                                    <input type="text" class="form-control" value="<?= $user['bio'] ?>" name="bio">
                                    <button class="btn btn-info w-100 mt-4" name="update">Update My Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <script>
                var dotMenu = document.getElementById('dotMenu');

                function hideDotMenu() {
                    dotMenu.style.display = (dotMenu.style.display === 'none' || dotMenu.style.display === '') ? 'block' : 'none';
                }

                function showSettings() {
                    var settings = document.getElementById('settings');
                    var chatsList = document.getElementById('chatslist');
                    settings.style.display = 'block';
                    chatsList.style.display = 'none';
                    dotMenu.style.display = 'none';
                }

                function showChatsList() {

                    var chatsList = document.getElementById('chatslist');

                    chatsList.style.display = 'block';
                }

                function showprofileupdates() {
                    var settings = document.getElementById('settings');
                    var chatsList = document.getElementById('chatslist');
                    var profileupdate = document.getElementById('profileupdate');
                    var dotMenu = document.getElementById('dotMenu');
                    settings.style.display = 'none';
                    chatsList.style.display = 'none';
                    dotMenu.style.display = 'none';
                    profileupdate.style.display = 'block';
                }

                function settingBack() {
                    showSettings();
                }

                function showDp(){
                    showprofileupdates();
                }
            </script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                async function logout() {


                    Swal.fire({
                        title: 'Log out?',
                        text: "Are you sure you want to log out?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Log out!'
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            location.replace("./logout.php")
                        }
                    })
                }
            </script>

            <?php
            if (isset($_POST['update'])) {
                $name = $_POST['name'];
                $bio = $_POST['bio'];

                if ($_FILES["image"] && $_FILES['image']['tmp_name']) {
                    $image = $_FILES['image'];
                    $filename = $image['name'];
                    $fileerror = $image['error'];
                    $filetmp = $image['tmp_name'];
                    $fileext = explode('.', $filename);
                    $filecheck = strtolower(end($fileext));
                    $fileextstored = array('png', 'jpg', 'jpeg');

                    if (in_array($filecheck, $fileextstored)) {
                        $destination = 'images/' . $filename;
                        move_uploaded_file($filetmp, $destination);
                    }
                } else {
                    $destination = $user['dp'];
                }

                $updateq = "UPDATE users SET name = '$name' , bio = '$bio' , dp = '$destination' WHERE id = '$user[id]'";
                $updaterun = mysqli_query($conn, $updateq);

                if ($updateq) {
            ?>
                    <script>
                        Swal.fire(
                            'success',
                            'Profile Updated Succesfully',
                            'Success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                // location.replace("dashboard.php");
                                showprofileupdates();
                            }
                        })
                    </script>
                <?php
                }

                ?>
            <?php

            }
            ?>