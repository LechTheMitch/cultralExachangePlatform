<?php
class ChatHandler{
    private $conn;
    public function __construct(){
        $host = 'localhost';    
        $user = 'root';          
        $password = '';          
        $database = 'homestays_and_cultural_exchange';
        $this->conn = new mysqli($host, $user, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function getUsersList($user_id){
        $output = "";
        $msg = "";
        $msgTime = "";

        $sql= mysqli_query($this->conn,"SELECT * FROM user");
        if(mysqli_num_rows($sql) == 1){
            $output .= 'Not found any user';
        }elseif(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql)){
                if($row['id'] == $user_id){
                    continue;
                }
                $query = mysqli_query($this->conn,'SELECT * FROM message WHERE (receiverID = '.$row['id'].' OR senderID = '.$row['id'].') 
                                                            AND (receiverID = '.$user_id.' OR senderID = '.$user_id.') ORDER BY id DESC LIMIT 1');

                if(mysqli_num_rows($query) > 0){
                    $row2 = mysqli_fetch_assoc($query);
                    $msg = $row2['content'];
                    $msg = (strlen($msg) > 28) ? substr($msg, 0, 28).'...' : $msg;
                    $msg = ($row2['senderID'] == $user_id) ? 'You: '.$msg : $msg;
                    $msgTime = date("h:i A", strtotime($row2['sent_at']));
                    
                }else{
                    $msg = "No message available";
                    $msgTime = "";
                }


                $output .= '<a href="#" class="user-item" data-id="' . $row['id'] . '" data-name="' . $row['name'] . '" data-image="'.$row['img'].'">
                                <div class="content">
                                    <img src="'.$row["img"].'" alt="">
                                    <div class="details">
                                        <span>'.$row['name'].'</span>
                                        <p>'.$msg.'</p>
                                        <p class="time">'.$msgTime.'</p>
                                    </div>
                                </div>
                            </a>';
            }
        }
        return $output;
    }
    public function searchUsers($searchTerm, $currentID){
        $output = "";
        $msg = "";
        $msgTime = "";
        $sql = mysqli_query($this->conn,'SELECT * FROM user WHERE name LIKE "%'.$searchTerm.'%" OR email LIKE "%'.$searchTerm.'%" AND id != '.$currentID.' ORDER BY name ASC');
        
        if(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql)){
                if($row['id'] == $currentID){
                    continue;
                }

                $query = mysqli_query($this->conn,'SELECT * FROM message WHERE (receiverID = '.$row['id'].' OR senderID = '.$row['id'].') 
                                                            AND (receiverID = '.$currentID.' OR senderID = '.$currentID.') ORDER BY id DESC LIMIT 1');

                if(mysqli_num_rows($query) > 0){
                    $row2 = mysqli_fetch_assoc($query);
                    $msg = $row2['content'];
                    $msg = (strlen($msg) > 28) ? substr($msg, 0, 28).'...' : $msg;
                    $msg = ($row2['senderID'] == $currentID) ? 'You: '.$msg : $msg;
                    if($msg != ""){
                        $msgTime = date("h:i A", strtotime($row2['sent_at']));
                    } else {
                        $msgTime = "";
                    }            }else{
                    $msg = "No message available";
                }

                $output .= '<a href="#" class="user-item" data-id="' . $row['id'] . '" data-name="' . $row['name'] . '">
                                <div class="content">
                                    <img src="'.$row["img"].'" alt="">
                                    <div class="details">
                                        <span>'.$row['name'].'</span>
                                        <p>'.$msg.'</p>
                                        <p class="message-time">'.$msgTime.'</p>
                                    </div>
                                </div>
                            </a>';
            }
        } else {
            $output .= '<div class="no-results">No users found</div>';
        }
        return $output;
    }
    public function getMessages($user_id, $receiverID){
        $output = "";
        $sql = mysqli_query($this->conn,'SELECT * FROM message WHERE (receiverID = '.$receiverID.' OR senderID = '.$receiverID.') 
                                                        AND (receiverID = '.$user_id.' OR senderID = '.$user_id.') ORDER BY id ASC');
        if(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql)){
                if($row['senderID'] == $user_id){
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row['content'].'</p>
                                    </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                    <img src="'.$row["img"].'" alt="">
                                    <div class="details">
                                        <p>'.$row['content'].'</p>
                                    </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="no-results">No messages available</div>';
        }
        return $output;
    }
    public function insertMessage($senderID, $receiverID, $message){
        if(!empty($message)){
            $sql = mysqli_query($this->conn, "INSERT INTO message (senderID, receiverID, content)
                                                        VALUES ('$senderID', '$receiverID', '$message')") or die("Error: " . mysqli_error($this->conn));
            

            return true;
        }
        else{
            return false;
        }
    }
}
?>