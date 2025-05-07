<?php
    session_start();
    if(!isset($_SESSION['currentID'])){
        header("Location: login.php");
    }
    include "../Model/connect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/chatStyle.css">
    <link rel="stylesheet" href="../css/all.min.css">


</head>

<body>
    <?php
        include "header.php";
    ?>
    <div class="main-container" style="display: flex;">
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                    $sql = mysqli_query($conn,"SELECT * from user where id = {$_SESSION['currentID']}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <a href="index.php" class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>
                <div class="content">
                    <img src="../images/download (3).jpg" alt="">
                    <div class="details">
                        <span><?php echo $row['name'] ?></span>
                    </div>
                </div>
            </header>
            <div class="search">
                <span class="text">Select a user to start chat</span>
                <input type="text" placeholder="Search....">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>
    <div class="chat-placeholder">
        <div class="placeholder-content">
        <h3>Select a user to start chatting</h3>
        <p>Click on a user from the left to open the chat.</p>
        </div>
    </div>
    <div class="wrapper-chat" style="display: none;">
        <section class="chat-area">
            <header>
                <div class="content">
                    <img src="../images/download (3).jpg" alt="">
                    <div class="details">
                        <span class="chat-username"></span>
                    </div>
                </div>
            </header>
            <div class="chat-box">
                
            </div>
            <form action="#" class="typing-area" method="POST" autocomplete="off">
                <!-- Sender ID -->
                <input type="text" name="sender_id" value="<?php echo $_SESSION['currentID']; ?>" hidden>
                <!-- Receiver ID -->
                <input class="receiver-id" name="receiver_id" value="" hidden>
                <!-- Message -->
                <input type="text" class="input-field" name="message" placeholder="Message...">
                <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
    </div>
    
    <script src="../js/chat.js"></script>
    <script src="../js/all.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const usersList = document.querySelector(".users-list");
    const chatWrapper = document.querySelector(".wrapper-chat");
    const chatPlaceholder = document.querySelector(".chat-placeholder");

    // Use event delegation
    usersList.addEventListener("click", function (e) {
        const target = e.target.closest(".user-item");
        if (target) {
            e.preventDefault();
            chatWrapper.style.display = "block";
            chatPlaceholder.style.display = "none";
        }
    });
});
</script>
</body>
</html>