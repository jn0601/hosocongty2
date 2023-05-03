<?php

include 'db.php';

?>

<form action="controller.php" method="post">
    Nhập ngày muốn tra cứu: <input type="text" name="date_search" value="" placeholder="vd: 30/4/2023">
    <button type="submit" name="seach_btn">
        Tìm kiếm
    </button>
</form>