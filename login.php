<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dang nhap</title>
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <?php include "connect.php"; ?>
  <main>
    <div class="container">
      <div class="login-contain" id="login-l">
        <div class="login-conten">
          <h2>Đăng nhập</h2>
          <div class="link-button">
            <button class="login-link">Với Google</button>
            <button class="login-link">Với Facebook</button>
          </div>
          <p>---Hoặc---</p>
        </div>
        <div class="login-conten" id="login-form">
          <form action="login.php" method="post">
            <div class="input-contain">
              <input type="email" placeholder="Địa chỉ email" name="email" />
              <input type="password" placeholder="Mật khẩu" name="password" />
            </div>
            <button class="dangnhap" type="submit">Đăng nhập</button>
          </form>

          <?php if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $sql = "SELECT * FROM `nguoi_dung` WHERE email='$email' AND mat_khau='$pass'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              $user = mysqli_fetch_assoc($result);
              session_start();
              $_SESSION["username"] = $user['ho_ten'];
              $_SESSION['userid'] = $user['id'];
              $_SESSION['vaitro'] = $user['vaitro_id'];
              if ($user['vaitro_id'] == 1) {
                header('location: admin/index.php');
              } elseif ($user['vaitro'] == 2) {
                header('location: teacher/index.php');
              } else {
                header('location: index.php');
              } // echo "Hello " . $_SESSION['userid']; } else { echo
              "Ko ton tai!";
            }
          } ?>

          <div id="fogotpass">
            <a href="quenMK.php">Quên mật khẩu?</a>
          </div>
        </div>
      </div>

      <div class="login-conten" id="login-r">
        <h1>Tri thức là sức mạnh</h1>
        <p>Đăng nhập để bắt đầu sử dụng dịch vụ của chúng tôi.</p>
        <p>---hoặc---</p>
        <div>
          Bạn chưa có tài khoản?
          <a href="register.php">Đăng ký tài khoản</a>
        </div>
      </div>
    </div>
  </main>
</body>

</html>