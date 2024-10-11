<?php

session_start();
require 'functions.php';

// cek cookie
if (!isset($_COOKIE['login']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

// cek tombol submit
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username 
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST["remember"])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie(
                    'key',
                    hash('sha256', $row['username']),
                    time() + 60
                );
            }

            header("Location: index.php");
            exit;
        }

        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        /* Gaya untuk form */
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Gaya untuk label */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        /* Gaya untuk input */
        input[type="text"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Gaya untuk input yang fokus */
        input:focus,
        textarea:focus {
            border-color: #4a90e2;
            outline: none;
        }

        /* Gaya untuk tombol */
        button {
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .button-container {
            text-align: right;
            margin-top: 10px;
        }

        /* Gaya untuk tombol saat hover */
        button:hover {
            background-color: #357ABD;
        }

        h1 {
            text-align: center;
        }

        /* Gaya untuk checkbox */
        .checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            margin-top: 15px;
        }

        .checkbox input {
            margin-bottom: 8px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <h1>Login</h1>

    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic; text-align:center">username / password salah!</p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <div class="button-container">
            <button type="submit" name="login">Sign In</button>
        </div>
    </form>
</body>

</html>