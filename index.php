<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
    <style>
    body {
        margin: 0;
    }

    nav {
        background-color: deepskyblue;
        display: flex;
        justify-content: space-between;
    }

    ul {
        display: flex;
        list-style: none;
        margin: 0;
    }

    li {
        padding: 10px;
    }

    a {
        text-decoration: none;
        color: white;
    }

    a:hover {
        color: orange;
    }
    </style>
</head>
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
        header('location: ../login.php');
    }
    include('../connect.php');
    ?>
    <header>
        <nav>
            <ul>
                <ul>
                    <li><a href="../index.php">Trang chủ</a></li>
                    <li><a href="index.php?page_layout=baihoc">Bài học</a></li>
                    <li><a href="index.php?page_layout=luyentap">Luyện tập</a></li>
                </ul>
            </ul>
            <ul>
                <li>Xin chao,<?php echo $_SESSION['username'] ?> </li>
                <li><a href="../index.php">Đăng xuất</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        if (isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
                case 'baihoc':
                    include "baihoc.php";
                    break;
                case 'luyentap':
                    include "luyentap.php";
                    break;
                case 'thembaihoc':
                    include "thembaihoc.php";
                    break;
                case 'capnhatbaihoc':
                    include "capnhatbaihoc.php";
                    break;
                case 'xoabaihoc':
                    include "xoabaihoc.php";
                    break;
                case 'thembailuyentap':
                    include "thembailuyentap.php";
                    break;
                case 'capnhatbailuyentap':
                    include "capnhatbailuyentap.php";
                    break;
                case 'xoabailuyentap':
                    include "xoabailuyentap.php";
                    break;
                default:
                    break;
            }
        }
        ?>
    </main>
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

