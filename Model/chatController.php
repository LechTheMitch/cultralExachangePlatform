<?php
    session_start();
    if(!isset($_SESSION['currentID'])){
        header("Location: login.php");
        exit();
    }
    include "../Controller/chatHandler.php";

    $chat = new ChatHandler();

    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'search':
            $term = $_POST['searchTerm'] ?? '';
            echo$chat->searchUsers($term,$_SESSION['currentID']);
            break;
        case 'getUsers':
            echo $chat->getUsersList($_SESSION['currentID']);
            break;
        case 'sendMessage':
            $sender = $_POST['sender_id'];
            $receiver = $_POST['receiver_id'];
            $message = $_POST['message'];
            echo $chat->insertMessage($sender, $receiver, $message);
            break;
        case 'getMessages':
            $sender = $_POST['sender_id'];
            $receiver = $_POST['receiver_id'];
            echo $chat->getMessages($sender, $receiver);
            break;
}
?>