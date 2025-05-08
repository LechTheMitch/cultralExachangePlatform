<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['currentID'])) {
    header("Location: login.php");
    exit();
}

include '../Model/connect.php'; 

if (isset($_SESSION["currentID"])) {
    $travelerID = $_SESSION["currentID"];

    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $travelerID);
    $stmt->execute();
    $result = $stmt->get_result();
    $travelerData = $result->fetch_assoc();

    if ($travelerData) {
        $names = explode(' ', $travelerData['name']);
        $firstName = $names[0] ?? '';
        $lastName = $names[1] ?? '';
    } else {
        echo "<p style='color:red;'>لا يوجد بيانات للمستخدم.</p>";
    }
} else {
    echo "<p style='color:red;'>الرجاء تسجيل الدخول أولاً.</p>";
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('background.jpg') no-repeat center center/cover;
            height: 100vh;
            padding: 20px;
        }

        /* Container */
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 50%;
            min-width: 400px;
            text-align: center;
        }

        /* Title */
        h2 {
            margin-bottom: 25px;
            font-size: 28px;
            color: #333;
        }

        /* Form */
        .payment-form {
            text-align: left;
            display: flex;
            flex-direction: column;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .form-group {
            width: 100%;
            margin-bottom: 15px;
        }

        .payment-form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        .payment-form input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Focus Effect */
        .payment-form input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 3px #007bff88;
        }

        /* Style card info input */
        .payment-form input[type="text"]:not(#film):not(#city):not(#country) {
            font-family: monospace;
            letter-spacing: 2px;
        }

        /* Submit Button */
        .payment-form button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        .payment-form button:hover {
            background-color: #0056b3;
        }

        /* Navigation Buttons */
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .home-btn,
        .login-btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 48%;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s ease;
        }

        .home-btn:hover,
        .login-btn:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            .form-row {
                flex-direction: column;
            }

            .buttons {
                flex-direction: column;
                gap: 10px;
            }

            .home-btn,
            .login-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php 
        include 'header.php'; // Include the payment controller for processing payments
    ?>

    <div class="container">
        <h2>Payment</h2>

        <?php if (isset($travelerData)): ?>
            <h3>Traveler Info</h3>
            <p><strong>First Name:</strong> <?= htmlspecialchars($firstName) ?></p>
            <p><strong>Last Name:</strong> <?= htmlspecialchars($lastName) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($travelerData['email']) ?></p>

            <form class="payment-form" method="post">
                <h3>Payment Info</h3>
                <input type="hidden" name="traveler_id" value="<?= $travelerData['id'] ?>">
                <div class="form-row">
                    <div class="form-group">
                        <label for="card_number">Card Number:</label>
                        <input type="text" id="card_number" name="card_number" required pattern="\d{16}" maxlength="16" inputmode="numeric">
                    </div>
                    <div class="form-group">
                        <label for="exp_month">EXP Month:</label>
                        <input type="number" id="exp_month" name="exp_month" min="1" max="12" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="exp_year">EXP Year:</label>
                        <input type="number" id="exp_year" name="exp_year" min="2024" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="text" id="cvv" name="cvv" required pattern="\d{3,4}">
                    </div>
                </div>

                <button type="submit" name="pay">Submit Payment</button>
            </form>
        <?php else: ?>
            <p style="color:red;">الرجاء تسجيل الدخول أولاً.</p>
        <?php endif; ?>

        <div class="buttons">
            <button onclick="location.href='home.html'" class="home-btn">Home</button>
            <button onclick="location.href='login.html'" class="login-btn">Login</button>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>