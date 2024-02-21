<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="https://iconspng.com/images/whatsapp-logo.jpg">
</head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<body>
    <div class="main">
        <div class="row m-0 p-0 bg-clg">
            <div class="col-md-4 p-0 m-0">
                <div class="ps-3">
                    <div class="nav-left d-flex justify-content-between align-items-center mb-3 bg-clr rounded p-2">
                        <div class="dp-img">
                            <img class="img-fluid rounded-circle" src="assests/images/abs.png" alt="">
                        </div>
                        <div class="nav-icons">
                            <i class="fa-solid fa-users fs-5 m-0"></i>
                            <i class="fa-solid fa-spinner fs-5 m-0"></i>
                            <i class="fa-solid fa-comment fs-5 m-0"></i>
                            <i class="fa-solid fa-person-circle-plus fs-5 m-0"></i>
                            <i class="fa-solid fa-ellipsis-vertical fs-5 m-0"></i>
                        </div>
                    </div>
                    <div class="search-user d-flex gap-2" style="border-radius: 5px 0px 0px 5px;">
                        <input type="text"
                            style="width: 90%;padding: 10px;border-radius: 7px;height: 35px;background-color: rgba(150, 150, 150, 0.13);border: 1px solid rgba(150, 150, 150, 0.13);"
                            placeholder="Search or start new Chat">
                        <button class="btn btn-info btn-sm">Search</button>
                    </div>
                    <div class="scroll-users">
                        <div class="recent_chat_list mt-2">
                            <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/abs.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Redrose Sid (You)</h6>
                                    <p class="m-0">You reacted 🙏 to : "Kali mont pelai diba..."</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent_chat_list">
                            <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/pp_logo.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Web Development | Batch 3 | Offline Batch</h6>
                                    <p class="m-0">You reacted 🙏 to : "Kali mont pelai diba..."</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent_chat_list">
                            <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/saidur.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Saidur Rahman</h6>
                                    <p class="m-0">You reacted 😥 to : "Kaise ho Bhaiya..."</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent_chat_list">
                            <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/mentor.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Imdadullah Sir [ Developer ]</h6>
                                    <p class="m-0">You reacted 🙏 to : "Noise..."</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent_chat_list">
                            <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/abs.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Redrose Sid (You)</h6>
                                    <p class="m-0">You reacted 🥰 to : "hellow..."</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent_chat_list">
                            <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/pp_logo.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Web Development | Batch 3 | Offline Batch</h6>
                                    <p class="m-0">You reacted 🙏 to : "project hwa ?..."</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent_chat_list">
                            <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/saidur.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Saidur Rahman</h6>
                                    <p class="m-0">You reacted to 😀: "Apuni Kene Ase ?..."</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent_chat_list">
                            <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/mentor.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Imdadullah Sir [ Developer ]</h6>
                                    <p class="m-0">HI hello Namaskar"</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent_chat_list">
                            <div class="d-flex gap-2 align-items-center py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/saidur.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Saidur Rahman</h6>
                                    <p class="m-0">You reacted to 😀: "Apuni Kene Ase ?..."</p>
                                </div>
                            </div>
                        </div>
                        <div class="recent_chat_list">
                            <div class="d-flex gap-2 align-items-center mb-5 py-2 align-items-center">
                                <div class="dp-img">
                                    <img class="img-fluid rounded-circle" src="assests/images/mentor.png" alt="">
                                </div>
                                <div class="ussers-list">
                                    <h6 class="m-0">Imdadullah Sir [ Developer ]</h6>
                                    <p class="m-0">You reacted 😶 to : "message1."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- // nav right ka message walah kam  -->
            <div class="col-md-8">
                <div class="bg-clr h-100 p-2 rounded scroll-mgs" style="position: relative;">
                    <div class="nav-right d-flex justify-content-between align-items-center mb-3">
                        <div class="right-nav d-flex align-items-center gap-2 p-2 rounded">
                            <div class="dp-img">
                                <img class="img-fluid rounded-circle" src="assests/images/mentor.png" alt="">
                            </div>
                            <div class="nav-right-contact">
                                <h6 class="my-0">Imdadullah Sir [ Develeoper ]</h6>
                                <p class="mb-0">last seen today at 9:35 PM </p>
                            </div>
                        </div>
                        <div class="nav-icons">
                            <i class="fa-solid fa-video"></i>
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </div>
                    </div>
                    <div class="conversation d-flex justify-content-center flex-column">
                        <div class="dayOfmessage mb-3"
                            style="align-self: center;background-color: rgb(255, 255, 255); height: 3vh;width: 5vw;border-radius: 4px;">
                            <p style="text-align: center;">Today</p>
                        </div>
                        <div class="messages d-flex justify-content-between flex-column">
                            <div class="msg-left mb-3"
                                style=" width: 70%; background-color: #FFFFFF;border-radius: 4px">
                                <p class="m-0 p-2">First Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    Rerum eveniet ducimus, reiciendis, vero cum debitis sapiente commodi laboriosam iu.
                                </p>
                            </div>
                            <div class="msg-right d-flex mb-3"
                                style=" width: 70%; background-color: #D1F4CC;align-self: flex-end;border-radius: 4px">
                                <p class="m-0 p-2">Second Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    Rerum similique. Eum, quis eaque.
                                </p>
                            </div>
                            <div class="msg-left mb-3"
                                style=" width: 70%; background-color: #FFFFFF;border-radius: 4px">
                                <p class="m-0 p-2">Third Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    maiores possimus. Tenetur reiciendis quas totam delectus similique. Eum, quis eaque.
                                </p>
                            </div>
                            <div class="msg-right d-flex mb-3"
                                style=" width: 70%; background-color: #D1F4CC;align-self: flex-end;border-radius: 4px">
                                <p class="m-0 p-2">Second Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    Rerum similique. Eum, quis eaque.
                                </p>
                            </div>
                            <div class="msg-left mb-3"
                                style=" width: 70%; background-color: #FFFFFF;border-radius: 4px">
                                <p class="m-0 p-2">Third Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    maiores possimus. Tenetur reiciendis quas totam delectus similique. Eum, quis eaque.
                                </p>
                            </div>
                            <div class="msg-right d-flex mb-3"
                                style=" width: 70%; background-color: #D1F4CC;align-self: flex-end;border-radius: 4px">
                                <p class="m-0 p-2">Second Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    Rerum similique. Eum, quis eaque.
                                </p>
                            </div>
                            <div class="msg-left mb-3"
                                style=" width: 70%; background-color: #FFFFFF;border-radius: 4px">
                                <p class="m-0 p-2">Third Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    maiores possimus. Tenetur reiciendis quas totam delectus similique. Eum, quis eaque.
                                </p>
                            </div>
                            <div class="msg-right d-flex mb-3"
                                style=" width: 70%; background-color: #D1F4CC;align-self: flex-end;border-radius: 4px">
                                <p class="m-0 p-2">Second Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    Rerum similique. Eum, quis eaque.
                                </p>
                            </div>
                            <div class="msg-left mb-3"
                                style=" width: 70%; background-color: #FFFFFF;border-radius: 4px">
                                <p class="m-0 p-2">Third Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    maiores possimus. Tenetur reiciendis quas totam delectus similique. Eum, quis eaque.
                                </p>
                            </div>
                            <div class="msg-right d-flex mb-5"
                                style=" width: 70%; background-color: #D1F4CC;align-self: flex-end;border-radius: 4px">
                                <p class="m-0 p-2">Fourth Messages Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit.
                                    Rerum eveniet ducimus, reiciendis, vero cum debitis sapiente commodi laboriosam iure
                                    maiores possimus. Tenetur reiciendis quas totam delectus similique. Eum, quis eaque.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="typeMessage bg-white p-2 m-0 d-flex align-items-center gap-3 w-100"
                        style="position: fixed; bottom: 0;">
                        <i class="fa-regular fa-face-smile fs-4"></i>
                        <i class="fa-solid fa-plus fs-4"></i>
                        <input type="text" placeholder="Type a messages" class="form-control" style="width: 55%;">
                        <i class="fa-solid fa-microphone fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>