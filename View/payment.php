<?php

use Controller\DBController;

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

}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pay'])) {
    $travelerID = $_POST['traveler_id'];
    $cardNumber = $_POST['card_number'];
    $expMonth = $_POST['exp_month'];
    $expYear = $_POST['exp_year'];
    $cvv = $_POST['cvv'];
    require_once '../Controller/DBController.php';
    $dbController = new DBController();
    $paymentStatus = $dbController->payNow($travelerID, $cardNumber);

    if ($paymentStatus) {
        echo "<script>alert('Payment successful!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Payment failed. Please try again.');</script>";
    }
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
            background-color: #f0f0f0 !important; /* Added a background color */
            height: 100vh;
        }

        .maxWidth {
            width: 100%;
            max-width: 1120px;
            margin: 0 auto;
        }
        /* Container */
        .wrapper {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
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
            border-color: green;
            outline: none;
            box-shadow: 0 0 3px green;
        }

        /* Style card info input */
        .payment-form input[type="text"]:not(#film):not(#city):not(#country) {
            font-family: monospace;
            letter-spacing: 2px;
        }

        /* Submit Button */
        .payment-form button {
            background-color: green;
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
            background-color: darkgreen;
        }

        /* Navigation Buttons */
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }


        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            .form-row {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <?php 
        include 'header.php';
    ?>

    <div class="wrapper">
        <div class="maxWidth">
        <h2>Payment</h2>

        <?php if (isset($travelerData)): ?>
            <h3>Traveler Info</h3>
            <p><strong>UserName:</strong> <?= htmlspecialchars($travelerData['name']) ?></p>
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
            <p style="color:red;"></p>
        <?php endif; ?>

    </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>