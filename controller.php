<?php
include 'index.php';
echo "<br>";

// danh sách chứa thông tin toàn bộ tên các công ty trong tuần
$list_congty = array();
// danh sách chứa thông tin toàn bộ địa chỉ các công ty trong tuần
$list_diachi = array();
// danh sách chứa thông tin toàn bộ mã số thuế các công ty trong tuần
$list_mst = array();
// danh sách chứa thông tin toàn bộ ngày thành lập các công ty trong tuần
$list_ngaythanhlap = array();

// duyệt từng trang con
//count($array_link_href)
// CẢNH BÁO SUBMIT RẤT LÂU NẾU CÓ QUÁ NHIỀU CÔNG TY!!!
// CÓ THỂ THAY ĐỔI count($array_link_href) THÀNH 1 HOẶC 2 ĐỂ TEST 2 HOẶC 3 NGÀY GẦN NHẤT
for ($i = 0; $i < count($array_link_href); $i++) {
  // nếu ngày đó không có công ty nào thì skip
  if (@$array_company[$i] == 0) {
    continue;
  }
  // get phân trang và thông tin trang đầu
  include 'first_page.php';

  // duyệt từng trang
  for ($q = 1; $q <= $phan_trang; $q++) {
    // duyệt từ trang 2 trở đi
    if ($q > 1) {
      include 'other_page.php'; // xử lý các trang phân trang
    } else {
      include 'first_page_controller.php'; // xử lý trang đầu tiên
      //exit("test");
?>
<?php }
  }
}

// xử lý thêm vào database
?>
<form action="" method="post" id="submit_form2" name="submit_form2" enctype="multipart/form-data">
  <?php
  // duyệt thông tin của tất cả công ty trong tuần
  $n = count($list_congty);
  for ($k = 0; $k < $n; $k++) {
  ?>
    <div style="display: inline-block; margin: 10px">
      <input type="text" name="<?= $k . 'nm'; ?>" value="<?= @array_values($list_congty)[$k] ?>"><br>
      <input type="text" name="<?= $k . 'dc'; ?>" value="<?= @array_values($list_diachi)[$k] ?>"><br>
      <input type="text" name="<?= $k . 'mst'; ?>" value="<?= @array_values($list_mst)[$k] ?>"><br>
      <input type="text" name="<?= $k . 'ngay'; ?>" value="<?= @array_values($list_ngaythanhlap)[$k] ?>"><br>
      <input type="hidden" name="n" value="<?= $n; ?>">
    </div>


  <?php } ?>
  <script type='text/javascript'>
    document.getElementById('submit_form2').submit();
  </script>
</form>

<?php
$sql_company_info = "SELECT * FROM company_info";
$query_company_info = mysqli_query($connect, $sql_company_info);

@$n = $_POST['n'];
for ($k = 0; $k < $n; $k++) {
  $nm = $_POST[$k . "nm"];
  $dc = $_POST[$k . "dc"];
  $mst = $_POST[$k . "mst"];
  $ngay = $_POST[$k . "ngay"];
  $created_at = date('d-m-y h:i:s');

  // check trùng tên, nếu tên đã có trên database thì skip và thêm tiếp
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
  }
}
echo "<script type='text/javascript'>alert('Submit thành công');
window.location.href='list.php';
</script>";
?>