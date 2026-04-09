<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
    main {
        overflow: auto;
    }

    iframe {
        display: none;
    }
    </style>
</head>

<body>
    <main>
        <h1>Xem bài học</h1>
        <p><button onclick="location.reload()">Tải lại trang</button></p>
        <div>
            <?php
            $khoaid = $_GET['id_kh'];
            $sql = "SELECT * FROM `bai_hoc` WHERE khoahoc_id=$khoaid";
            $result = mysqli_query($conn, $sql);
            $bai = 0;
            ?>
            <?php
            while ($baihoc = mysqli_fetch_array($result)) {
            ?>
            <div style="border: solid 2px;" onclick="xemvideo(<?php echo $bai ?>)">
                <?php
                    $bai = $bai + 1;
                    ?>
                <p>Bài <?php echo $bai ?>: <?php echo $baihoc['ten_bai_hoc'] ?></p>
                <iframe width="560" height="315" src="<?php echo $baihoc['video_baigiang'] ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div>
            <?php
            }
            ?>
        </div>
    </main>
</body>

</html>