<?php

// curl handle
$ch3 = curl_init();

// ignore ssl for localhost
curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch3, CURLOPT_SSL_VERIFYHOST, false);

$new_path = $full_path . "/page-" . $q;
//echo $new_path . "<br>";
// exit();

curl_setopt($ch3, CURLOPT_URL, $new_path);
curl_setopt($ch3, CURLOPT_FOLLOWLOCATION, 1); // check theo domain khu vực
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1); // trả về kết quả
$response3 = curl_exec($ch3);
curl_close($ch3);

// lấy thông tin theo ngày
$html3 = new simple_html_dom();
$html3->load($response3);

// lấy ngày trong trang
$get_ngay = "";
foreach ($html3->find('div a[href^=https://hosocongty.vn/ngay-]') as $ngay) {
    $get_ngay = substr($ngay->href, -10);
    //echo $get_ngay . "<br>";
    break;
}
//$str_get_ngay = "list.php?date=" . $get_ngay;
// var_dump($str_get_ngay);
// exit();

// get tên của từng công ty trong ngày
$array_ten = array();
foreach ($html3->find('ul li h3 a') as $ten) {
    $array_ten[] = $ten->plaintext;
}
//var_dump($array_ten);

// get địa chỉ của từng công ty trong ngày
$array_diachi = array();
foreach ($html3->find('ul li div') as $diachi) {
    if (strlen($diachi->plaintext) > 1) {
        $array_diachi[] = substr($diachi->plaintext, 0, -28);
    }
}
// var_dump($array_diachi);
// exit();

// get mã số thuế của từng công ty trong ngày
$array_mst = array();
foreach ($html3->find('ul li div a') as $mst) {
    $array_mst[] = $mst->plaintext;
}
//var_dump($array_mst);

?>


<form action="" method="post" id="submit_form" enctype="multipart/form-data">
    <!-- <div class="main_content">
                <div class="hot_product">
                    <h3>CÔNG TY THÀNH LẬP TRONG NGÀY</h3>
                </div>
                <div class="tab_item">
                    <div class="list_product">
                        <?php
                        //lấy values của từng công ty
                        $n = count($array_ten);
                        for ($j = 0; $j < $n; $j++) {
                            ?>
                            <div class="item">
                                <div class="main_contain">
                                    <h3 name="<?= $j . 'nm'; ?>"><?= @array_values($array_ten)[$j] ?></h3>
                                    <p name="<?= $j . 'dc'; ?>"><?= @array_values($array_diachi)[$j] ?></p>
                                    <p class="mst" name="<?= $j . 'mst'; ?>"><?= @array_values($array_mst)[$j] ?></p>
                                    <div class="btn_detail">
                                        <div>
                                            <p name="<?= $j . 'ngay'; ?>"><?= $get_ngay ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div> -->
    <?php
    $n = count($array_ten);
    for ($j = 0; $j < $n; $j++) {
        ?>
        <input type="text" name="<?= $j . 'nm'; ?>" value="<?= @array_values($array_ten)[$j] ?>"><br>
        <input type="text" name="<?= $j . 'dc'; ?>" value="<?= @array_values($array_diachi)[$j] ?>"><br>
        <input type="text" name="<?= $j . 'mst'; ?>" value="<?= @array_values($array_mst)[$j] ?>"><br>
        <input type="text" name="<?= $j . 'ngay'; ?>" value="<?= $get_ngay ?>"><br>
        <input type="hidden" name="n" value="<?= $n; ?>">
        <br>

    <?php } ?>
    <!-- <script type='text/javascript'>
        document.getElementById('submit_form').submit(); 
    </script> -->
    <!-- <div class="combo_btn">
                <div class="btn_bottom">
                    <button type="submit" name="sbm" class="btn btn-success">
                        <span>CẬP NHẬT DATABASE</span>
                    </button>
                </div>
                <a href="list.php?date=<?= $get_ngay ?>" target="_blank" class="btn btn-primary" value="">Xem list</a>
                <a href="index.php" class="btn btn-primary" value="">Quay lại</a>
            </div> -->
</form>

<?php
$sql_company_info = "SELECT * FROM company_info";
$query_company_info = mysqli_query($connect, $sql_company_info);
//if (isset($_POST['sbm'])) {
// echo "<script type='text/javascript'>
// document.getElementById('submit_form').submit(); // SUBMIT FORM
// </script>";
@$n = $_POST['n'];
for ($j = 0; $j < $n; $j++) {
    $nm = $_POST[$j . "nm"];
    $dc = $_POST[$j . "dc"];
    $mst = $_POST[$j . "mst"];
    $ngay = $_POST[$j . "ngay"];
    $created_at = date('d-m-y h:i:s');

    $sql_name_company = "SELECT * FROM company_info WHERE company_name = '$nm'";
    $query_name_company = mysqli_query($connect, $sql_name_company);
    $checkName = mysqli_num_rows($query_name_company);
    if ($checkName == 1) {
        continue;
    } else {
        if ($nm !== '' & $dc !== '' & $mst !== '' & $ngay !== '' & $created_at !== '') {
            $sql = "INSERT INTO company_info (company_name, address, tax_code, founding_date, created_at) VALUES ('$nm','$dc','$mst','$ngay','$created_at')";
            $query = mysqli_query($connect, $sql);
        }
        // else {
        //     echo "<script type='text/javascript'>";
        //     echo "alert('Submit thất bại')";
        //     echo "</script>";
        // }
    }

}
// echo "<script type='text/javascript'>alert('Submit thành công');
// window.location.href='index.php'
// </script>";
//header("location: index.php");
//}
//ob_end_flush();

?>