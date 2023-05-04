<?php

// curl handle
$ch = curl_init();

// ignore ssl for localhost
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);



//curl_setopt($ch, CURLOPT_URL, "https://www.google.com/search?q=speedtest");
curl_setopt($ch, CURLOPT_URL, "https://hosocongty.vn/danh-sach-cong-ty-moi-thanh-lap.htm");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // check theo domain khu vực
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // trả về kết quả
$response = curl_exec($ch);
curl_close($ch);

// in kết quả ra màn hình
//echo $response;
//exit();

// lấy list trang chủ
$html = new simple_html_dom();
$html->load($response);


//$($(".box_content")[0]).find("ul li div h3")

// get array ngày
$count = 0;
$array_date = array();
// array_combine($courses, $sections) as $course => $section
foreach ($html->find('ul li div h3') as $weekday) {
  //echo $weekday->plaintext . "<br>";
  $array_date[] = $weekday->plaintext;
  //array_push($array_date, $weekday->plaintext);
  $count++;
  //echo $count . "<br>";
  if ($count == 7) {
    break;
  }
  // if (array_count_values($array_date) == 7) {
  //     echo array_count_values($array_date);
  // }
}

// get array số lượng công ty
$count1 = 0;
$array_company = array();
// array_combine($courses, $sections) as $course => $section
foreach ($html->find('ul li div span strong') as $amount_cpn) {
  //echo $weekday->plaintext . "<br>";
  $array_company[] = $amount_cpn->plaintext;
  //array_push($array_date, $weekday->plaintext);
  $count1++;
  //echo $count . "<br>";
  if ($count1 == 7) {
    break;
  }
}

// get array link
$count2 = 0;
$array_link = array();
$array_link_href = array();
foreach ($html->find('a[href^=ngay-]') as $amount_link) {
  $array_link[] = $amount_link;
  $array_link_href[] = $amount_link->href; // array link tới những page con
  $count2++;
  if ($count2 == 7) {
    break;
  }
}
// var_dump($array_link_href);
// exit();


?>