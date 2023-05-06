<?php

include 'db.php';
include 'simple_html_dom.php';

include 'main_page.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        <?php include "home.css" ?>
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <div class="main_content">
        <div class="hot_product">
            <h3>CÔNG TY THÀNH LẬP TRONG TUẦN</h3>
        </div>
        <div class="tab_item">
            <div class="list_product">
                <?php $count3 = 0;
                foreach ($array_date as $value => $date) { ?>
                    <div class="item">
                        <div href="#" class="main_contain">
                            <h3 name="date">
                                <?= $date ?>
                            </h3>
                            <strong class="price">
                                <?= $array_company[$value] . "   công ty" ?>
                            </strong><br><br>
                        </div>
                    </div>
                <?php
                    $count3++;
                    if ($count3 == 7) {
                        break;
                    }
                }
                ?>
            </div>
        </div>
    </div><br>
    <div class="combo_btn">
        <a href="controller.php" target="_blank" class="btn btn-primary" value="">CẬP NHẬT DATABASE</a>
        <a href="list.php" target="_blank" class="btn btn-primary" value="">XEM DANH SÁCH ĐÃ ĐƯỢC CẬP NHẬT</a>
    </div>

</body>

</html>