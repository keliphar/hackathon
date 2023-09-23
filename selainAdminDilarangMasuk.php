<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div class="con">
        <form action="" method="post">
        <div class="kotak">
            <h4 style="margin-bottom: 20px;"><center>Login</center></h4>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <input type="button" value="Login" name="btnLogin" onclick="login()" class="btn w-100 mt-4 p-3 text-light" style="font-size: 16px; background-color: #8e6441">
            </div>
        </form>
    </div>
    <script>
        function login() {
            if(document.getElementById('username').value == 'admin' && document.getElementById('password').value == 'admin') {
                console.log("masok");
                window.location.replace("admin-panel/adminBolehMasuk.php");
                // window.location.href = "adminBolehMasuk.php";
            }
        }
    </script>
</body>
</html>