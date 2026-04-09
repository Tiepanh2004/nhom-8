<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hỗ trợ học tập trực tuyến</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="script/script.js"></script>
</head>
<style>
.giaodien {
    overflow: auto;
}

h1 {
    white-space: nowrap;
}
</style>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header('location: login.php');
    }
    include('connect.php');
    ?>

    <div class="giaodien">
        <aside class="sidebar">
            <div class="logo">
                <img src="img/logo.png" alt="">
                <p1>Lập trình cơ bản</p1>
            </div>
            <ul class="menu">
                <a href="index.php">
                    <li class="menu-danhmuc">
                        <i class="fa-solid fa-house"></i>
                        <span>Trang chủ</span>
                    </li>
                </a>
            </ul>
            <?php
            if ($_SESSION['vaitro'] == 2) {
                echo "
                        <ul class='menu'>
                            <a href='teacher/index.php'>
                                <li class='menu-danhmuc'>
                                    <i class='fa-solid fa-book'></i>
                                    <span>Trang giảng viên</span>
                                </li>
                            </a>
                        </ul>
                    ";
            }
            ?>
            <?php
            if ($_SESSION['vaitro'] == 1) {
                echo "
                        <ul class='menu'>
                            <a href='Admin/index.php'>
                                <li class='menu-danhmuc'>
                                    <i class='fa-solid fa-book'></i>
                                    <span>Trang Admin</span>
                                </li>
                            </a>
                        </ul>
                    ";
            }
            ?>
            <ul class="menu">
                <a href="index.php?page_layout=Baihoc">
                    <li class="menu-danhmuc">
                        <i class="fa-solid fa-play"></i>
                        <span>Bài học</span>
                    </li>
                </a>
            </ul>
            <ul class="menu">
                <a href="index.php?page_layout=Luyentap">
                    <li class="menu-danhmuc">
                        <i class="fa-solid fa-pen"></i>
                        <span>Luyện tập</span>
                    </li>
                </a>
            </ul>
            <ul class="menu">
                <a href="index.php?page_layout=Taikhoan">
                    <li class="menu-danhmuc">
                        <i class="fa-solid fa-user"></i>
                        <span>Tài khoản</span>
                    </li>
                </a>
            </ul>
        </aside>
        <?php
        if (isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
                case 'Khoahoc':
                    $title = "Khóa học";
                    break;
                case 'Baihoc':
                    $title = "Bài học";
                    break;
                case 'Luyentap':
                    $title = "Luyện tập";
                    break;
                case 'Taikhoan':
                    $title = "Tài khoản";
                    break;
                // case 'Xembaihoc':
                //     $title="Xem bài học";
                //     break;
                // case 'Xembaitap':
                //     $title="Xem bài tập";
                //     break;
                default:
                    $title = "Dashboard";
                    break;
            }
        } else {
            $title = "Dashboard";
        }
        ?>
        <main>
            <header>
                <h1><?php echo $title ?></h1>
                <form action="/tim-kiem" method="GET">
                    <div class="timkiem">
                        <input type="search" name="q" placeholder="Nhập từ khóa...">
                        <button type="submit">Tìm kiếm</button>
                    </div>
                </form>
                <div class="nguoidung">
                    <a href="index.php?page_layout=Taikhoan"><img style="height: 40px; width: 50px"
                            src="uploads/avatar.jpg" alt=""></a>
                    <span><?php echo $_SESSION['username'] ?></span>
                    <button><a href="dangxuat.php">Đăng xuất</a></button>
                </div>
            </header>
            <main>
                <?php
                if (isset($_GET['page_layout'])) {
                    switch ($_GET['page_layout']) {
                        case 'Taikhoan':
                            include "taikhoan.php";
                            break;
                        // case 'Dangxuat':
                        //     include "dangxuat.php";
                        //     break;
                        case 'Baihoc':
                            include "baihoc.php";
                            break;
                        case 'xembaihoc':
                            include "xembaihoc.php";
                            break;
                        case 'Luyentap':
                            include "luyentap.php";
                            break;
                        case 'xembaitap':
                            include "xembaitap.php";
                            break;
                    }
                } else {
                    include "trangchu.php";
                }
                ?>
            </main>
        </main>
    </div>

</body>

</html>