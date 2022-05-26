<?php
include "config/config.php";
$thanhtoan = $_POST['thanhtoan'];
$nhanhang = $_POST['nhanhang'];
echo $thanhtoan;
echo $nhanhang;
$str = $nhanhang . ". " . $thanhtoan;
$idphieunhap = $_POST['idphieunhap'];
$sql = "UPDATE tbl_phieunhap SET trangthai = '$str' WHERE id_phieunhap = $idphieunhap";
$query = mysqli_query($con, $sql);
if ($query) {
    header("location:index.php?id=quanlynhaphang&&trangthai=thanhcong");
}
