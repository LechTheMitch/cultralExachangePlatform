<?php
require_once "../database/homestays_and_cultural_exchange.sql";

$host = "localhost";
$user = "root";
$pass = "";
$db = "homestays_and_cultural_exchange";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo "Failed to connect DB" . $conn->connect_error;
}

session_start();
$_SESSION['user_id'] = 2; // مؤقتًا، لتجربة الصفحة
$user_id = $_SESSION['user_id'];

// جلب بيانات من جدول user
function getUserData($conn, $user_id)
{
    $sql = "SELECT name FROM user WHERE id = $user_id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}
// جلب بيانات من جدول travel
function getTravelData($conn, $user_id)
{
//    $sql = "SELECT skills, day_booked FROM travel WHERE id = $user_id";
//    $result = $conn->query($sql);
//    return $result->fetch_assoc();
}

// تعديل البيانات
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit_field"])) {
    $field = $_POST["edit_field"];
    $value = $_POST["new_value"];

    // نحدد الجدول بناءً على الحقل
    if (in_array($field, ['skills', 'day_booked'])) {
        $sql = "UPDATE travel SET $field = '$value' WHERE id = $user_id";
    } else {
        $sql = "UPDATE user SET $field = '$value' WHERE id = $user_id";
    }

    $conn->query($sql);
    header("Location: profile.php");
    exit();
}

$user = getUserData($conn, $user_id);
$travel = getTravelData($conn, $user_id);
?>


<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f9f9f9;
        }

        .profile-container {
            width: 60%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
        }

        .edit-btn {
            float: right;
        }

        .top-image {
            width: 100%;
            height: 200px;
            background-image: url('white_map.jpg');
            background-size: cover;
            border-radius: 10px 10px 0 0;
        }

        img.profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: -50px;
            border: 3px solid white;
        }

        .btn {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            background: #007BFF;
            color: white;
            border-radius: 5px;
        }

        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

<div class="profile-container">
    <div class="top-image"></div>
    <center>
        <img class="profile-pic" src="<?= $user['profile_image'] ?>" alt="Profile Picture">
        <h2>Welcome, <?= htmlspecialchars($user['name']) ?>!</h2>
    </center>

    <form method="POST">
        <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?>
            <button name="edit_field" value="name" class="edit-btn btn">Edit</button>
        </p>

        <p><strong>Country:</strong> <?= htmlspecialchars($user['country']) ?></p>
        <p><strong>Phone Number:</strong> <?= htmlspecialchars($user['phone']) ?></p>
        <p><strong>Languages Spoken:</strong> <?= htmlspecialchars($user['languages']) ?>
            <button name="edit_field" value="languages" class="edit-btn btn">Edit</button>
        </p>

        <p><strong>Skills:</strong> <?= htmlspecialchars($user['skills']) ?>
            <button name="edit_field" value="skills" class="edit-btn btn">Edit</button>
        </p>

        <p><strong>Day Booked:</strong> <?= htmlspecialchars($user['day_booked']) ?>
            <button name="edit_field" value="day_booked" class="edit-btn btn">Edit</button>
        </p>

        <?php if (isset($_POST['edit_field'])): ?>
            <p>New Value for <?= $_POST['edit_field'] ?>:
                <input type="text" name="new_value" required>
                <button type="submit" class="btn">Save</button>
            </p>
        <?php endif; ?>
    </form>

    <center>
        <a href="chat.php" class="btn">Message</a>
        <a href="home.php" class="btn">Home</a>
    </center>
</div>

</body>

</html>