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

    </style>
</head>

<body>

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

</body>

</html>