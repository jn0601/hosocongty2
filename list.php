<?php
include 'db.php';
$sql = "SELECT * FROM company_info ORDER BY id";
$query = mysqli_query($connect, $sql);

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
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h2>Danh sách công ty</h2>
    </div>
    <div class="card-body">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Tên công ty</th>
            <th>Địa chỉ</th>
            <th>Mã số thuế</th>
            <th>Ngày thành lập</th>
            <th>Tạo ngày</th>
          </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            $i = 1;
            while($row = mysqli_fetch_assoc($query)) { ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['company_name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['tax_code']; ?></td>
                <td><?php echo $row['founding_date']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
              </tr>
            <?php } ?>
            
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>

</html>