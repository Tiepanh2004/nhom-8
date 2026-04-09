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