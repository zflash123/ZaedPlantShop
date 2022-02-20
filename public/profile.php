<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_POST["email"] == "z4ed.thalib123@gmail.com") {
        if ($_POST["password"] == "z") {
            echo "<h2>Selamat Datang Zaed</h2>
            <h4>Click ini untuk mengakses dashboard<br></h4>
            <a href='http://127.0.0.1:8000/'>Dashboard</a>";
        }
    }
    ?>

</body>

</html>