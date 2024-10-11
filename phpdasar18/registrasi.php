<?php
require 'functions.php';
// cek tombol submit
if (isset($_POST["register"])) {
    // berhasil ditambahkan atau tidak
    if (registrasi($_POST) > 0) {
        echo "
            <script>
                alert('user baru telah ditambahkan');
                // location.href = 'index.php'
            </script>;
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
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
    </style>
</head>

<body>
    <h1>Registration</h1>

    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="password2">Confirm Passwword</label>
        <input type="password" name="password2" id="password2" required>

        <div class="button-container">
            <button type="submit" name="register">Sign Up</button>
        </div>
    </form>
</body>

</html>