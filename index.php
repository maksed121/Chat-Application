<?php
require("./conn.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Whatsapp Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style>
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            /* background-color: black; */
            overflow: hidden;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -30px;
            bottom: -80px;
        }

        form {
            height: 520px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            margin-top: 5px;
        }

        input {
            display: block;
            height: 47px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 12px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin: 10px 0;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 12px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }

        form a {
            margin-top: 20px !important;
        }
    </style>
</head>

<body style="background-color: black;">
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <!-- <input type="text" placeholder="Email or Phone" id="username" name="username"> -->
        <input type="text" placeholder="Email or Phone" id="username" name="email">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <button name="submit">Log In</button>

       <div class="pt-2 text-center w-full">
       <a href="index.php" style="text-decoration: none;">Don't have an Account <span style="background-color: crimson; padding: 0px 5px; border-radius: 5px;cursor: pointer;">Create here</span></a>


       </div>
        <div class="social" style="display: flex;justify-content: space-between;">
            <a href="createAccount.php" style="text-decoration: none;">
                <div class="go"><i class="fab fa-google"></i> Google</div>
            </a>
            <a href="createAccount.php" style="text-decoration: none;">
                <div class="go"><i class="fab fa-facebook"></i> Facebook</div>
            </a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // $q = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        // $run = mysqli_query($conn, $q);

        // $checking = mysqli_num_rows($conn, $run);

        // $check = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE (email = '$username' OR phone = '$username') AND password = '$password' "));
        $check = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password' "));

        if ($check != 0) {
            $_SESSION['email'] = $email;
    ?>

            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Go To Dashboard',
                    icon: 'success',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.replace('dashboard.php');
                    }
                })
            </script>
        <?php
        } else {
        ?>

            <script>
                Swal.fire({
                    title: 'error!',
                    text: 'Account does not exist',
                    icon: 'error',
                })
            </script>
    <?php
        }
    }
    ?>
</body>

</html>