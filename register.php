<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php
    include "connect.php";
    ?>
    <main>
        <div class="container">
            <div class="login-contain" id="login-l">
                <div class="login-conten">
                    <h2>
                        Đăng ký
                    </h2>
                    <div class="link-button">
                        <button class="login-link">Với Google</button>
                        <button class="login-link">Với Facebook</button>
                    </div>
                    <p>---Hoặc---</p>
                </div>
                <div class="login-conten" id="login-form">
                    <form action="register.php" method="post">
                        <div class="input-contain">
                            <div>
                                <input type="text" placeholder="Tên đầy đủ" name="ten">
                            </div>

                            <input type="email" placeholder="Địa chỉ email" name="email">
                            <input type="password" placeholder="Mật khẩu" name="password">
                            <input type="namsinh" placeholder="Năm sinh" name="namsinh">
                            <input type="sdt" placeholder="Số điện thoại" name="sdt">
                            <input type="tendangnhap" placeholder="Tên đăng nhập" name="tendangnhap">
                        </div>
                        <button class="dangnhap" type="submit">Đăng ký</button>
                    </form>
                    <?php
                    if (
                        !empty($_POST['ten']) &&
                        !empty($_POST['email']) &&
                        !empty($_POST['password']) &&
                        !empty($_POST['namsinh']) &&
                        !empty($_POST['sdt']) &&
                        !empty($_POST['tendangnhap'])
                    ) {

                        $sql = "SELECT * FROM `nguoi_dung`";
                        $result = mysqli_query($conn, $sql);
                        $xet = TRUE;
                        while ($user = mysqli_fetch_array($result)) {
                            if ($user['ho_ten'] == $_POST['ten']) {
                                echo "Đã có người sử dụng tên này!<br>";
                                $xet = FALSE;
                            }
                            if ($user['email'] == $_POST['email']) {
                                echo "Đã có người sử dụng email này!";
                                $xet = FALSE;
                            }
                        }
                        if ($xet == TRUE) {
                            $ten = $_POST['ten'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $namsinh = $_POST['namsinh'];
                            $sdt = $_POST['sdt'];
                            $tendangnhap = $_POST['tendangnhap'];

                            $sql = "INSERT INTO `nguoi_dung`(`ho_ten`, `nam_sinh`, `sdt` , `email`, `mat_khau`, `avatar`,`vaitro_id`, `ten_dang_nhap`) 
                                VALUES ('$ten', '$namsinh' , '$sdt','$email','$password','uploads/avatar.jpg','3', '$tendangnhap')";
                            $result = mysqli_query($conn, $sql);
                            echo "<script>
                                alert('Bạn đã đăng ký tài khoản thành công!');
                                window.location.href = 'login.php';
                            </script>";
                        }
                    } else {
                        echo "Hãy điền đầy đủ thông tin!";
                    }
                    ?>
                </div>
            </div>

            <div class="login-conten" id="login-r">
                <h1>
                    Tri thức là sức mạnh
                </h1>
                <p>
                    Bằng cách đăng ký, bạn đã đồng ý với Điều khoản sử dụng<br> và chính sách bảo mật của chúng tôi.
                </p>
                <p>
                    ---hoặc---
                </p>
                <div>
                    Bạn đã có tài khoản?
                    <a href="login.php">Đăng nhập tài khoản</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>