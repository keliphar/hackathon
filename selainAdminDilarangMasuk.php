<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="post">
        Username: <input type="text" name="username" id="username" required><br>
        Password: <input type="password" name="password" id="password" required><br>
        <input type="button" value="Login" name="btnLogin" onclick="login()">
    </form>
    <script>
        function login() {
            if(document.getElementById('username').value == 'admin' && document.getElementById('password').value == 'admin') {
                window.location.replace("admin-panel/adminBolehMasuk.php");
                // window.location.href = "adminBolehMasuk.php";
            }
        }
    </script>
</body>
</html>