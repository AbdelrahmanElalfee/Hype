<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <main class="main">
        <div class="icon"><img src="logo.png" alt=""></div>
        <form action="" method="POST" class="login">
            <h1>Admin Login</h1>
            <div class="group">
                <label for="user">E-Mail</label>
                <input type="mail" name="adminMail" id="user" placeholder="XYZ@hype.com">
            </div>
            <div class="group">
                <label for="user">password</label>
                <input type="password" name="adminPassword" id="user" placeholder="******">
            </div>
            <button type="submit" name="log" class="btn">login</button>
        </form>
        <?php
        if (isset($_POST['log'])) {
            $adminEmail = $mysqli->real_escape_string($_POST['adminMail']);
            if (empty($adminEmail)) {
                array_push($error, "Email is needed");
            }
            $adminPassword = $mysqli->real_escape_string($_POST['adminPassword']);
            if (empty($adminPassword)) {
                array_push($error, "Password is needed");
            }
            $check = "SELECT * FROM `admin` WHERE `admin_mail`='$adminEmail' AND `admin_password`='$adminPassword'";
            $runCheck = mysqli_query($mysqli, $check);
            $admin = mysqli_fetch_array($runCheck);
            $rows = mysqli_num_rows($runCheck);
            if ($rows == 0) {
                array_push($error, "USERNAME ISNOT FOUND");
            }
            foreach ($error as $msg) {
                echo "<h3>$msg</h3>";
            }
            if (empty($error)) {
                if ($rows == 1) {
                    $_SESSION['adminEmail'] = $adminEmail;
                    echo "<h3>Welcome " . $admin['admin_name'] . "</h3>";
                    header('refresh:3;url=index.php');
                }
            }
        }
        ?>
    </main>
</body>

</html>