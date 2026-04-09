<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khóa học</title>
    <style>
    main {
        /* width: 50%; */
        margin: auto;
        background: #f1f0f0ff;
        padding: 40px 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        margin-top: 50px;
        border: 2px solid #29a2cfff;
    }

    .box1 {
        display: flex;
        justify-content: space-between;
    }

    .box1 input {
        border-radius: 5px;
        border: 1px solid black;
    }

    .box1 select {
        width: 175px;
        border-radius: 5px;
    }

    .box2 input {
        margin-top: 25px;
        width: 100%;
        background-color: white;
        border-radius: 5px;
        border: 1px solid black;
    }

    .thongbao {
        text-align: center;
    }
    </style>
</head>

<body>
    <main>
        <h1 style="text-align: center;">Thêm khóa học</h1>

        <form action="index.php?page_layout=themkhoahoc" method="post" enctype="multipart/form-data">

            <div class="box1">
                <div>
                    <p>Tên khóa học</p>
                    <input name="tenkhoahoc" type="text">
                </div>

                <div>
                    <p>Nội dung</p>
                    <input name="noidung" type="text">
                </div>
            </div>

            <div class="box1">
                <div>
                    <p>Mô tả</p>
                    <textarea name="mota"></textarea>
                </div>

                <div>
                    <p>Giảng viên</p>
                    <select name="giangvien">
                        <option value="">-- Chọn giảng viên --</option>
                        <?php
                        include('../connect.php');
                        $sqlGV = "SELECT * FROM nguoi_dung WHERE vaitro_id = 2";
                        $resultGV = mysqli_query($conn, $sqlGV);
                        while ($rowGV = mysqli_fetch_array($resultGV)) {
                            echo "<option value='{$rowGV['id']}'>{$rowGV['ho_ten']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="box1">
                <div>
                    <p>Ảnh khóa học</p>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
            </div>

            <div class="box2">
                <input type="submit" name="submit" value="Thêm khóa học">
            </div>
        </form>

        <?php
        if (
            !empty($_POST['tenkhoahoc']) &&
            !empty($_POST['noidung']) &&
            !empty($_POST['mota']) &&
            !empty($_POST['giangvien'])
        ) {
            $tenKhoaHoc = $_POST['tenkhoahoc'];
            $noiDung = $_POST['noidung'];
            $moTa = $_POST['mota'];
            $giangVien = $_POST['giangvien'];

            echo "1";

            #Bắt đầu xử lý thêm ảnh
            $target_dir = "../uploads/";
            $file_name = basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $file_name;

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // đường dẫn lưu vào database
            $img_url = "uploads/" . $file_name;

            // Kiểm tra xem file ảnh có hợp lệ không
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File không phải là ảnh.";
                    $uploadOk = 0;
                }
            }

            // Kiểm tra nếu file đã tồn tại
            if (file_exists($target_file)) {
                echo "File này đã tồn tại trên hệ thông";
                $uploadOk = 2;
            }

            // Kiểm tra kích thước file
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "File quá lớn";
                $uploadOk = 0;
            }

            // Cho phép các định dạng file ảnh nhất định
            if (
                $imageFileType != "jpg" && $imageFileType != "png" &&
                $imageFileType != "jpeg" && $imageFileType != "gif"
            ) {
                echo "Chỉ những file JPG, JPEG, PNG & GIF mới được chấp nhận.";
                $uploadOk = 0;
            }

            echo "3";

            #Kết thúc xử lý ảnh
            if ($uploadOk == 0) {
                echo "File của bạn chưa được tải lên";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    $sql = "INSERT INTO `khoa_hoc`
                            (`ten_khoa_hoc`, `noi_dung`, `mo_ta`, `giangvien_id`, `img_url`)
                            VALUES
                            ('$tenKhoaHoc', '$noiDung', '$moTa', '$giangVien', '$img_url')";
                    echo $sql;
                    mysqli_query($conn, $sql);

                    echo '<script>window.location.href = "index.php?page_layout=khoahoc";</script>';
                }
            }
        } else {
            echo " <p class='thongbao'>Vui lòng nhập đủ thông tin</p> ";
        }
        ?>
    </main>
</body>

</html>