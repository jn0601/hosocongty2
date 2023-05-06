<?php


// lấy ngày trong trang
$get_ngay = "";
foreach ($html2->find('div a[href^=https://hosocongty.vn/ngay-]') as $ngay) {
  $get_ngay = substr($ngay->plaintext, -10);
  break;
}

// get tên của từng công ty trong ngày
foreach ($html2->find('ul li h3 a') as $ten) {
  $list_congty[] = $ten->plaintext;
  $list_ngaythanhlap[] = $get_ngay;
}

// get địa chỉ của từng công ty trong ngày
$array_diachi = array();
foreach ($html2->find('ul li div') as $diachi) {
  if (strlen($diachi->plaintext) > 1) {
    $list_diachi[] = substr($diachi->plaintext, 0, -28);
  }
}

// get mã số thuế của từng công ty trong ngày
foreach ($html2->find('ul li div a') as $mst) {
  $list_mst[] = $mst->plaintext;
}

?>

