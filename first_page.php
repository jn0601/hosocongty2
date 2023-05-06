<?php

// curl handle
$ch2 = curl_init();

// ignore ssl for localhost
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);

$path = "https://hosocongty.vn";
$str_date = $array_link_href[$i];
$full_path = $path . "/" . $str_date;


curl_setopt($ch2, CURLOPT_URL, $full_path);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1); // check theo domain khu vực
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); // trả về kết quả
$response2 = curl_exec($ch2);
curl_close($ch2);

// lấy thông tin theo ngày
$html2 = new simple_html_dom();
$html2->load($response2);

// get số lượng phân trang
$phan_trang = "";
foreach ($html2->find('.next-page a') as $page) {
    $phan_trang = $page->plaintext;
}

?>