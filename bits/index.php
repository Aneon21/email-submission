<?php

//If the client is sending a POST request
//That is, when the user send his/her email id
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Credentials required (need to be changed accordingly during web deployment)
    $servername = "localhost"; //servername
    $username = "root"; //server-username
    $password = "";     //server password
    $database = "email";//name of database

    //trying to connect to the database
    try {
        //Creating a connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        //Sending the user info to the database
        $sql = "INSERT INTO `email_ids` (`no`, `email`) VALUES (NULL, '$email')";
        $result = mysqli_query($conn, $sql);
        //Redirects to submit.html after details are received (POST-redirect-GET method to prevent duplication of data)
        header("Location: pages/submit.html", true, 303);
        exit();
    }
    //if connection fails, sends a message that an error occured (or can redirect to an error page)
    catch (Exception $e) {
        //sends you back to the same page
        header("Location: index.php", true, 303);
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Download</title>
</head>

<body>
    <div class="modal" id="modal">
        <div class="title">Haven’t signed up yet? Perfect timing!</div>
        <div class="body">Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        </div>
        <form method="post" id="form" autocomplete="off">
            <input type="email" id="emailID" name="email" placeholder="Enter your email here">
            <label id="emailCheck"></label>
            <button type="submit" disabled="disable" id="submitbutton">Submit</button>
        </form>
    </div>
    <script src="scripts/index.js"></script>
</body>

</html>
