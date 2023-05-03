<?php
//ob_start();
include 'db.php';
include 'simple_html_dom.php';

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



// lấy list công ty
$html = new simple_html_dom();
$html->load($response);
// lấy list ngày
$html2 = new simple_html_dom();
$html2->load($response);
// lấy list link
$html3 = new simple_html_dom();
$html3->load($response);




//$($(".box_content")[0]).find("ul li div h3")

// get array ngày
$count = 0;
$array_date = array();
// array_combine($courses, $sections) as $course => $section
foreach ($html2->find('ul li div h3') as $weekday) {
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
foreach ($html2->find('ul li div span strong') as $amount_cpn) {
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
foreach ($html3->find('a[href^=ngay-]') as $amount_link) {
  $array_link[] = $amount_link;
  $array_link_href[] = $amount_link->href;
  $count2++;
  if ($count2 == 7) {
    break;
  }
}
// var_dump($array_link_href);
// exit();

// curl handle
$ch2 = curl_init();

// ignore ssl for localhost
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);

//curl_setopt($ch, CURLOPT_URL, "https://www.google.com/search?q=speedtest");
//foreach ($array_link_href as $url) {\
$str_date = "ngay-";
@$url = $_POST['date_search'];
//echo $url . "<br>";
$path = "https://hosocongty.vn";
$full_path = $path . "/" . $str_date . $url;
//echo $full_path . "<br>";

//exit();
curl_setopt($ch2, CURLOPT_URL, $full_path);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, 1); // check theo domain khu vực
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); // trả về kết quả
$response2 = curl_exec($ch2);
curl_close($ch2);
//}
//exit();

// in kết quả ra màn hình
// echo $response2;
// exit();

// lấy thông tin theo ngày
$html4 = new simple_html_dom();
$html4->load($response2);

$get_ngay = "";
foreach ($html4->find('div a[href^=https://hosocongty.vn/ngay-]') as $ngay) {
  $get_ngay = substr($ngay->href, -10);
  //echo $get_ngay . "<br>";
  break;
}
//$str_get_ngay = "list.php?date=" . $get_ngay;
// var_dump($str_get_ngay);
// exit();

$array_ten = array();
foreach ($html4->find('ul li h3 a') as $ten) {
  $array_ten[] = $ten->plaintext;
}
//var_dump($array_ten);

$array_diachi = array();
foreach ($html4->find('ul li div') as $diachi) {
  if (strlen($diachi->plaintext) > 1) {
    $array_diachi[] = substr($diachi->plaintext, 0, -28);
  }
}
// var_dump($array_diachi);
// exit();

$array_mst = array();
foreach ($html4->find('ul li div a') as $mst) {
  $array_mst[] = $mst->plaintext;
}
//var_dump($array_mst);

$phan_trang = "";
foreach ($html4->find('.next-page a') as $page) {
  $phan_trang = $page->plaintext;
  echo $phan_trang . "<br>";
}
exit();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    <?php include "home.css" ?>
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>LIST</title>
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="main_content">
      <div class="hot_product">
        <h3>CÔNG TY THÀNH LẬP TRONG NGÀY</h3>
      </div>
      <div class="tab_item">
        <div class="list_product">
          <?php
          $n = count($array_ten);
          for ($i = 0; $i < $n; $i++) {
            ?>
            <div class="item">
              <div class="main_contain">
                <h3 name="<?= $i . 'nm'; ?>"><?= @array_values($array_ten)[$i] ?></h3>
                <p name="<?= $i . 'dc'; ?>"><?= @array_values($array_diachi)[$i] ?></p>
                <p class="mst"  name="<?= $i . 'mst'; ?>"><?= @array_values($array_mst)[$i] ?></p>
                <div class="btn_detail">
                  <div>
                    <p name="<?= $i . 'ngay'; ?>"><?= $get_ngay ?></p>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
    <!-- <?php
    $n = count($array_ten);
    for ($i = 0; $i < $n; $i++) {
      ?>
      <input type="text" name="<?= $i . 'nm'; ?>" value="<?= @array_values($array_ten)[$i] ?>"><br>
      <input type="text" name="<?= $i . 'dc'; ?>" value="<?= @array_values($array_diachi)[$i] ?>"><br>
      <input type="text" name="<?= $i . 'mst'; ?>" value="<?= @array_values($array_mst)[$i] ?>"><br>
      <input type="text" name="<?= $i . 'ngay'; ?>" value="<?= $get_ngay ?>"><br>
      <input type="hidden" name="n" value="<?= $n; ?>">
      <br>

    <?php } ?> -->

    <div class="combo_btn">
      <div class="btn_bottom">
        <button type="submit" name="sbm" class="btn btn-success">
          <span>CẬP NHẬT DATABASE</span>
        </button>
      </div>
      <a href="list.php?date=<?= $get_ngay ?>" target="_blank" class="btn btn-primary" value="">Xem list</a>
      <a href="index.php" class="btn btn-primary" value="">Quay lại</a>
    </div>
  </form>
</body>

</html>
<?php
$sql_company_info = "SELECT * FROM company_info";
$query_company_info = mysqli_query($connect, $sql_company_info);
if (isset($_POST['sbm'])) {
  $n = $_POST['n'];
  for ($i = 0; $i < $n; $i++) {
    $nm = $_POST[$i . "nm"];
    $dc = $_POST[$i . "dc"];
    $mst = $_POST[$i . "mst"];
    $ngay = $_POST[$i . "ngay"];
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
      } else {
        echo "<script type='text/javascript'>";
        echo "alert('Submit thất bại')";
        echo "</script>";
      }
    }

  }
  echo "<script type='text/javascript'>alert('Submit thành công');
  window.location.href='index.php'
  </script>";
  //header("location: index.php");
}
//ob_end_flush();
?>