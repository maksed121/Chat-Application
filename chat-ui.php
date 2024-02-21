<?php
include("./layout/header.php");
$search = $_GET['search'];
?>
<div class="col-md-8">
    <div class="bg-clr h-100 p-2 rounded d-flex flex-column gap-3 my-3 align-items-center justify-content-center">

        <?php
        $addchats = mysqli_query($conn, "SELECT * FROM users WHERE name LIKE '%$search%' OR email = '$search' OR phone = '$search'");
        while ($data = mysqli_fetch_array($addchats)) {
        ?>
            <div class="chat-box rounded border border-1" style="width: 30vw">
                <div style="text-decoration: none;color:black" onclick="addchat(<?= $data['id'] ?>)">
                    <div class="recent_chat_list">
                        <div class="d-flex gap-2 align-items-center p-2 align-items-center">
                            <div class="dp-img" style="border: 2px solid black;">
                                <img class="img-fluid rounded-circle" src="<?= $data['dp'] ? $data['dp'] : 'assests/images/user_dp.png' ?>" alt="">
                            </div>
                            <div class="ussers-list">
                                <h6 class="m-0"><?= $data['name'] ?></h6>
                                <p class="m-0"><?= $data['bio'] ?></p>
                            </div>
                        </div>
                        <h1 class="btn btn-info btn-sm w-100 m-0">Add Contact to Chat</h1>
                    </div>
        </div>
            </div>
        <?php
        }
        ?>


    </div>
</div>

<?php
include("./layout/footer.php")
?>


<script>
    async function addchat(friendId) {

        const request = await fetch('backend/fetch_chat.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                friendId,
                userId: '<?= $user['id'] ?>'
            })
        })

        const response = await request.json();

        if (response.code == 201) {
            Swal.fire({
                title: 'Success!',
                text: 'Friend Added Succesfully',
                icon: 'success',
                confirmButtonText: 'Okay'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.replace('dashboard.php');
                }
            })
        } else if (response.code == 400) {
            Swal.fire({
                title: 'Error!',
                text: 'Friend Already added',
                icon: 'error',
            })
        }
    }
</script>