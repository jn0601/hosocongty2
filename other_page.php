<?php

// curl handle
$ch3 = curl_init();

// ignore ssl for localhost
curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch3, CURLOPT_SSL_VERIFYHOST, false);

$new_path = $full_path . "/page-" . $q;

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
    $get_ngay = substr($ngay->plaintext, -10);
    break;
}

// get tên của từng công ty trong ngày
foreach ($html3->find('ul li h3 a') as $ten) {
    $list_congty[] = $ten->plaintext;
    $list_ngaythanhlap[] = $get_ngay;
}

// get địa chỉ của từng công ty trong ngày
foreach ($html3->find('ul li div') as $diachi) {
    if (strlen($diachi->plaintext) > 1) {
        $list_diachi[] = substr($diachi->plaintext, 0, -28);
    }
}

// get mã số thuế của từng công ty trong ngày
foreach ($html3->find('ul li div a') as $mst) {
    $list_mst[] = $mst->plaintext;
}

?>



