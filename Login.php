<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body class="body">
    <div class="login">
        <header class="login_header">
            <h2>Welcom Back !</h2>
        </header>
        <form action="Login.php" class="login_form" method="POST">
            <div>
                <label for="email">E-mail address</label>
                <input type="email" id="email" name="email" placeholder="exemple@exemple.com">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="example1234">
            </div>
            <div>
                <input class="button" type="submit" value="Login">
                <a class="register" href="SigneUp.php">Or Register</a>
            </div>
        </form>

        <?php
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email == "wiwi@test.com" && $password == "1234") {
            header("Location: main.php");
            exit();
        } else {
            echo "<center>Wrong email or password</center>";
        }
        ?>
    </div>
</body>

</html>