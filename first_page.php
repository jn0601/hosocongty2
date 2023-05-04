<?php

// curl handle
$ch2 = curl_init();

// ignore ssl for localhost
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);

//curl_setopt($ch, CURLOPT_URL, "https://www.google.com/search?q=speedtest");
//foreach ($array_link_href as $url) {\
$path = "https://hosocongty.vn";
//for ($i = 0; $i <= count($array_link_href); $i++) {
$str_date = $array_link_href[$i];
//echo $str_date . "<br>";
$full_path = $path . "/" . $str_date;
//echo $full_path . "<br>";
//}
//exit();

// $str_date = "ngay-";
// @$url = $_POST['date_search'];
// //echo $url . "<br>";
// $path = "https://hosocongty.vn";
// $full_path = $path . "/" . $str_date . $url;
//echo $full_path . "<br>";

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
    //echo $phan_trang . "<br>";
}
//exit();

?>