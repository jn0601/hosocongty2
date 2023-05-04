<?php
//ob_start();
include 'index.php';
echo "<br>";
//var_dump($array_link_href); exit();

// duyệt từng trang con
for ($i = 0; $i <= count($array_link_href); $i++) {
  if (@$array_company[$i] == 0) {
    continue;
  }
  // get phân trang và thông tin trang đầu
  include 'first_page.php';
  // echo $phan_trang;
  // exit();
  for ($q = 1; $q <= $phan_trang; $q++) {
    // duyệt từ trang 2 trở đi
    if ($q > 1) {
      //echo $q . "<br>";
      include 'other_page.php';
    ?>
    <?php } else {
      include 'first_page_controller.php';
      //exit("test");
    ?>
    <?php }
  }
}

?>

<?php
//$str_date = "ngay-";
//@$url = $_POST['date_search'];
//echo $url . "<br>";
//$path = "https://hosocongty.vn";
//$full_path = $path . "/" . $str_date . $url;
//echo $full_path . "<br>";

//exit();
// curl_setopt($ch2, CURLOPT_URL, $full_path);
// curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1); // check theo domain khu vực
// curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); // trả về kết quả
// $response2 = curl_exec($ch2);
// curl_close($ch2);
//}
//exit();

// in kết quả ra màn hình
// echo $response2;
// exit();

// // lấy thông tin theo ngày
// $html2 = new simple_html2_dom();
// $html2->load($response2);

// // lấy ngày theo trang
// $get_ngay = "";
// foreach ($html2->find('div a[href^=https://hosocongty.vn/ngay-]') as $ngay) {
//   $get_ngay = substr($ngay->href, -10);
//   //echo $get_ngay . "<br>";
//   break;
// }
// //$str_get_ngay = "list.php?date=" . $get_ngay;
// // var_dump($str_get_ngay);
// // exit();

// // get tên của từng công ty trong ngày
// $array_ten = array();
// foreach ($html2->find('ul li h3 a') as $ten) {
//   $array_ten[] = $ten->plaintext;
// }
// //var_dump($array_ten);

// // get địa chỉ của từng công ty trong ngày
// $array_diachi = array();
// foreach ($html2->find('ul li div') as $diachi) {
//   if (strlen($diachi->plaintext) > 1) {
//     $array_diachi[] = substr($diachi->plaintext, 0, -28);
//   }
// }
// // var_dump($array_diachi);
// // exit();

// // get mã số thuế của từng công ty trong ngày
// $array_mst = array();
// foreach ($html2->find('ul li div a') as $mst) {
//   $array_mst[] = $mst->plaintext;
// }
// //var_dump($array_mst);

// // get số lượng phân trang
// $phan_trang = "";
// foreach ($html2->find('.next-page a') as $page) {
//   $phan_trang = $page->plaintext;
//   echo $phan_trang . "<br>";
// }
// //exit();

?>