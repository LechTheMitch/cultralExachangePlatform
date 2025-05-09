<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CultureStay - Hosts Listing</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.css">
</head>
<body>
        <?php include 'header.php'; ?> <!-- Include the header -->

        <h2 class="text-center fw-bold mb-5 my-5">Featured Hosts</h2>
        <?php include '../Model/listingController.php'; ?> <!-- Include the listing controller -->

        <?php include 'footer.php'; ?> <!-- Include the footer -->
</body>
</html>