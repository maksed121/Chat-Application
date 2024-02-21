<?php

if (isset($_GET['user_id'])) {

    $tomessage = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id = $_GET[user_id]"));

?>
    <div class="col-md-8">
        <div class="bg-clr h-100 p-2 rounded scroll-mgs" style="position: relative;">
            <div class="nav-right d-flex justify-content-between align-items-center mb-3">
                <div class="right-nav d-flex align-items-center gap-2 p-2 rounded">
                    <div class="dp-img" style="width: 50px;height: 50px;border-radius:50%;background-size:100%;object-fit:cover; background-image:url(<?= $tomessage['dp'] ? $tomessage['dp'] : 'assests/images/user_dp.png' ?>)">
                    </div>
                    <div class="nav-right-contact">
                        <h6 class="my-0"><?= $tomessage['name'] ?></h6>
                        <p class="mb-0">last seen at <?= $tomessage['created_at'] ?> </p>
                    </div>
                </div>
                <div class="nav-icons">
                    <i class="fa-solid fa-video"></i>
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </div>
            </div>
            <div class="conversation d-flex justify-content-center flex-column">
                <!-- <div class="dayOfmessage mb-3" style="align-self: center;background-color: rgb(255, 255, 255); height: 3vh;width: 5vw;border-radius: 4px;">
                    <p style="text-align: center;">Today</p>
                </div> -->
                <div class="messages d-flex justify-content-between flex-column pb-5" id="messages">

                </div>
            </div>
            <div class="typeMessage bg-white p-2 m-0 d-flex align-items-center gap-3 w-100" style="position: fixed; bottom: 0;">
                <i class="fa-regular fa-face-smile fs-4"></i>
                <i class="fa-solid fa-plus fs-4"></i>
                <input type="text" placeholder="Type a messages" class="form-control" style="width: 55vw;" id="message">
                <i class="fa-solid fa-paper-plane fs-4" onclick="sendmessage(<?= $_GET['user_id'] ?>)"></i>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <div class="col-md-8">
        <div class="bg-clr h-100 p-2 rounded scroll-mgs d-flex align-items-center justify-content-center flex-column" style="position: relative;">
            <div class="h-50 d-flex align-items-center justify-content-center flex-column">
                <img class="" src="assests/images/whatsapp.png" alt="" style="width: 22vw;">
                <p class="fs-1">Download Whatsapp For Windows</p>
                <p class="fs-6 text-center">Make call,share screen and get a faster experience when you download the <br> Windows App</p>
                <a href="#" class="btn btn-success px-4 py-2" style="border-radius: 20px;">Get the app</a>
            </div>
        </div>
        <!-- <p class="bg-danger" style="">Your personal messages are end-to-end encrypted</p> -->
    </div>
<?php
}
?>

<script>
    getConversation()

    setInterval(() => {
        getConversation()
    }, 100)

    const inputField = document.getElementById("message");
    inputField.addEventListener("keyup", function(e){
        if (e.key === 'Enter' || e.keyCode === 13) {
            sendmessage('<?= $_GET['user_id'] ?>');
        }
    })
    


    async function getConversation() {
        const request = await fetch('backend/get_conversation.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                user_id: '<?= $user['id'] ?>',
                friend_id: '<?= $_GET['user_id'] ?>'
            })
        })

        const response = await request.json();
        const messageBox = document.getElementById("messages");
        messageBox.innerHTML = response.elements;
    }

    async function sendmessage(friendId) {
        let messageVal = document.getElementById("message");

        if (messageVal.value != "") {
            const request = await fetch('backend/send_chat.php', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    friendId,
                    userId: '<?= $user['id'] ?>',
                    message: messageVal.value
                })
            })

            const response = await request.json();
            if (response.code == 201) {
                messageVal.value = ""
            }
        }
    }
</script>