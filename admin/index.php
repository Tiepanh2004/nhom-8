<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chu</title>
    <style>
        /* Import Google Font */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ec 100%);
    min-height: 100vh;
}

/* Navigation Bar Styling */
nav {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 3rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    position: sticky;
    top: 0;
    z-index: 1000;
    align-items: center;
}

ul {
    display: flex;
    list-style: none;
    margin: 0;
    align-items: center;
    gap: 0.25rem;
}

li {
    padding: 0;
    margin: 0;
}

/* Link Styling */
a {
    text-decoration: none;
    color: white;
    white-space: nowrap;
    padding: 0.85rem 1.25rem;
    display: inline-block;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 8px;
    position: relative;
}

a::after {
    content: '';
    position: absolute;
    bottom: 8px;
    left: 50%;
    transform: translateX(-50%) scaleX(0);
    width: 60%;
    height: 2px;
    background: white;
    transition: transform 0.3s ease;
}

a:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-2px);
}

a:hover::after {
    transform: translateX(-50%) scaleX(1);
}

/* User Info Section (Right side) */
nav > ul:last-child {
    gap: 0.75rem;
}

nav > ul:last-child > li:first-child {
    color: white;
    padding: 0.6rem 1.2rem;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50px;
    font-weight: 500;
    font-size: 0.875rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Logout Button Styling */
nav > ul:last-child > li:last-child a {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    padding: 0.6rem 1.4rem;
    border-radius: 50px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    border: none;
}

nav > ul:last-child > li:last-child a::after {
    display: none;
}

nav > ul:last-child > li:last-child a:hover {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    box-shadow: 0 6px 16px rgba(220, 38, 38, 0.4);
    transform: translateY(-3px);
}

/* Responsive Design */
@media (max-width: 968px) {
    nav {
        padding: 0 1.5rem;
    }
    
    a {
        padding: 1rem 1.2rem;
        font-size: 0.9rem;
    }
}

@media (max-width: 768px) {
    nav {
        flex-direction: column;
        padding: 1rem;
        gap: 1rem;
    }

    ul {
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.5rem;
    }

    a {
        padding: 0.75rem 1rem;
        font-size: 0.85rem;
    }

    nav > ul:last-child > li:first-child {
        padding: 0.6rem 1.2rem;
        font-size: 0.85rem;
    }

    nav > ul:last-child > li:last-child a {
        padding: 0.6rem 1.4rem;
    }
}

/* Animation for page load */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

nav {
    animation: fadeIn 0.5s ease-out;
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
                    <li><a href="index.php?page_layout=trangchu">Trang chủ</a></li>
                    <li><a href="index.php?page_layout=khoahoc">Khóa học</a></li>
                    <li><a href="index.php?page_layout=giangvien">Giảng viên</a></li>
                    <li><a href="index.php?page_layout=hocvien">Học viên</a></li>
                </ul>
            </ul>
            <ul>
                <li>Xin chao,<?php echo $_SESSION['username'] ?> </li>
                <li><a href="index.php?page_layout=dangxuat">Dang xuat</a></li>
            </ul>
        </nav>
    </header>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {

            case 'trangchu':
                include "trangchu.php";
                break;
            case 'khoahoc':
                include "ds_khoahoc.php";
                break;
            case 'giangvien':
                include "ds_giangvien.php";
                break;
            case 'hocvien':
                include "ds_hocvien.php";
                break;
            case 'dangxuat':
                include "../dangxuat.php";
                break;
            case 'themkhoahoc':
                include "themkhoahoc.php";
                break;
            case 'suakhoahoc':
                include "suakhoahoc.php";
                break;
            case 'xoakhoahoc':
                include "xoakhoahoc.php";
                break;
            case 'themgiangvien':
                include "themgiangvien.php";
                break;
            case 'xoagiangvien':
                include "xoagiangvien.php";
                break;
            case 'suagiangvien':
                include "suagiangvien.php";
                break;
            case 'themhocvien';
                include "themhocvien.php";
                break;
            case 'xoahocvien';
                include "xoahocvien.php";
                break;
            case 'suahocvien';
                include "suahocvien.php";
                break;
            default:
                include "trangchu.php";
                break;
        }
    }
    ?>
</body>

</html>