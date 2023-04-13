<?php 
    // test
    $a =2;
    $b = "5";
    echo $a + $b;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bs5/bootstrap.min.css">
    <title>Login Admin</title>
</head>
<body>
    <div class="container">
        <form action="../model/handler/admin/loginadmin.php" method="post">
            <table class="">
                <tr>
                    <td>Tên đăng nhập</td>
                    <td><input type="text" placeholder="Tên đăng nhập" name="txtUsername"></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" placeholder="Mật khẩu" name="txtPassword"></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
    <!-- script -->
    <script src="../bs5/bootstrap.bundle.min.js"></script>
</body>
</html>