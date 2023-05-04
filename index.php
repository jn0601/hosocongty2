<?php

include 'db.php';
include 'simple_html_dom.php';

include 'main_page.php';

?>

<!-- <form action="controller.php" method="post">
    Nhập ngày muốn tra cứu: <input type="text" name="date_search" value="" placeholder="vd: 30/04/2023">
    <button type="submit" name="seach_btn">
        Tìm kiếm
    </button>
</form> -->

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
                // $date0 = "";
                // $date1 = "";
                // $date2 = "";
                // $date3 = "";
                // $date4 = "";
                // $date5 = "";
                // $date6 = "";
                // $link_url = "";
                //foreach ($html->find('a[href^=ngay-]') as $link) {
                foreach ($array_date as $value => $date) { ?>
                    <div class="item">
                        <div href="#" class="main_contain">
                            <h3 name="date">
                                <?= $date ?>
                            </h3>
                            <strong class="price">
                                <?= $array_company[$value] . "   công ty" ?>
                            </strong><br><br>
                            <!-- <div class="btn_detail">
                                <div href="index.php?page_layout=list">
                                    <?php
                                    //index.php?page_layout=list
                                    //echo $array_link[$value];
                                    echo "Xem chi tiết";
                                    //$link_url = $array_link[$value];
                                    //$_SESSION['link_url']= $link_url;
                                    //echo $link_url; 
                                    ?>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <?php

                    // if ($count3 == 0) {
                    //     $date0 = $link_url;
                    //     $_SESSION['link_url0'] = $date0;
                    // } else if ($count3 == 1) {
                    //     $date1 = $link_url;
                    //     $_SESSION['link_url1'] = $date1;
                    // } else if ($count3 == 2) {
                    //     $date2 = $link_url;
                    //     $_SESSION['link_url2'] = $date2;
                    // } else if ($count3 == 3) {
                    //     $date3 = $link_url;
                    //     $_SESSION['link_url3'] = $date3;
                    // } else if ($count3 == 4) {
                    //     $date4 = $link_url;
                    //     $_SESSION['link_url4'] = $date4;
                    // } else if ($count3 == 5) {
                    //     $date5 = $link_url;
                    //     $_SESSION['link_url5'] = $date5;
                    // } else {
                    //     $date6 = $link_url;
                    //     $_SESSION['link_url6'] = $date6;
                    // }
                
                    $count3++;
                    if ($count3 == 7) {
                        break;
                    }
                }

                //} 
                ?>
            </div>
        </div>
    </div><br>
    <div class="combo_btn">
        <a href="controller.php" target="_blank" class="btn btn-primary" value="">CẬP NHẬT DATABASE</a>
    </div>
    

    <!-- <script>
        function alertFunction() {
            alert("Cập nhật database thành công!");
        }
    </script> -->
</body>

</html>