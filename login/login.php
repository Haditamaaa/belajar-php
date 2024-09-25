<?php
// cek tombol submit
if (isset($_POST["submit"])) {
    // cek username & password
    if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
        // if true, redirect to admin page. 
        header("Location: admin.php");
        exit;
    } else {
        // if else, show wrong message
        $error = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Login Admin</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic;">username / password salah!</p>
    <?php endif ?>
    <ul>
        <form action="" method="post">
            <li>
                <label for="">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <br>
            <li>
                <label for="">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <br>
            <button type="submit" name="submit">Login</button>
        </form>
    </ul>
</body>

</html>