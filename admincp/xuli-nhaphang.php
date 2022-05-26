<?php
include "config/config.php";
session_start();
if (isset($_POST['tdtrangthai'])) {
    $thanhtoan = $_POST['thanhtoan'];
    $nhanhang = $_POST['nhanhang'];
    $str = $nhanhang . ". " . $thanhtoan;
    if ($nhanhang == "Đã nhận hàng" && $thanhtoan == "Đã thanh toán") {
    }
    $idphieunhap = $_POST['idphieunhap'];
    $sql = "UPDATE tbl_phieunhap SET trangthai = '$str' WHERE id_phieunhap = $idphieunhap";
    $query = mysqli_query($con, $sql);
    if ($query) {
        header("location:index.php?id=quanlynhaphang&&trangthai=thanhcong");
    }
}
if (isset($_GET['thempn'])) {
    $sanpham = $_GET['idsanpham'];
    $idncc = $_GET['id_ncc'];
    $idsanpham = explode('.', $sanpham)[0];
    $sql = "SELECT tenncc FROM tbl_nhacungcap WHERE id_nhacungcap = " . $idncc;
    $query = mysqli_query($con, $sql);
    $tenncc = mysqli_fetch_array($query)['tenncc'];
    $soluong = $_GET['soluong'];
    if ($soluong == 0 || $sanpham == '') {
        header("location:index.php?id=quanlynhaphang&&trangthai=thempnthatbai");
    }
    $b = true;
    foreach ($_SESSION['phieunhap'] as $id => $value) {
        if ($_SESSION['phieunhap'][$id]['sanpham'] == $sanpham && $_SESSION['phieunhap'][$id]['tenncc'] == $tenncc) {
            $_SESSION['phieunhap'][$id]['soluong'] += $soluong;
            header("location:index.php?id=quanlynhaphang&&trangthai=thempnthanhcong&tangsoluong");
            $b = false;
            break;
        }
    }
    if ($b) {
        $_SESSION['phieunhap'][$_SESSION['num']]['idsanpham'] = $idsanpham;
        $_SESSION['phieunhap'][$_SESSION['num']]['sanpham'] = $sanpham;
        $_SESSION['phieunhap'][$_SESSION['num']]['idncc'] = $idncc;
        $_SESSION['phieunhap'][$_SESSION['num']]['tenncc'] = $tenncc;
        $_SESSION['phieunhap'][$_SESSION['num']]['soluong'] = $soluong;
        $_SESSION['num']++;
        header("location:index.php?id=quanlynhaphang&&trangthai=thempnthanhcong");
    }
}
if (isset($_GET['hoantatphieunhap'])) {
    $idphieunhap = $_GET['idphieunhap'];
    $date = date('Y-m-d');
    $tongtien = 0;
    $soluong = 0;
    $trangthai = "Chưa nhận hàng. Chưa thanh toán";
    foreach ($_SESSION['phieunhap'] as $id => $value) {
        $sql = "SELECT gia FROM tbl_sanpham WHERE id_sanpham = " . $_SESSION['phieunhap'][$id]['idsanpham'];
        $query = mysqli_query($con, $sql);
        $gia = mysqli_fetch_array($query)['gia'];
        // Thay đổi số lượng sản phẩm
        $tongtien = $tongtien + $_SESSION['phieunhap'][$id]['soluong'] * $gia;
        $soluong = $soluong + $_SESSION['phieunhap'][$id]['soluong'];
    }
    // Thêm phiếu nhập
    $sql = "INSERT INTO tbl_phieunhap VALUES (null,'" . $date . "'," . $soluong . "," . $tongtien . ",'" . $trangthai . "')";
    $query = mysqli_query($con, $sql);
    foreach ($_SESSION['phieunhap'] as $id => $value) {
        $sql = "SELECT gia FROM tbl_sanpham WHERE id_sanpham = " . $_SESSION['phieunhap'][$id]['idsanpham'];
        $query = mysqli_query($con, $sql);
        $gia = mysqli_fetch_array($query)['gia'];
        $sql = 'UPDATE tbl_sanpham SET soluong= soluong + ' . $_SESSION['phieunhap'][$id]['soluong'] . ' WHERE id_sanpham = ' . $_SESSION['phieunhap'][$id]['idsanpham'];
        $query = mysqli_query($con, $sql);
        $sql = 'INSERT INTO tbl_chitietphieunhap VALUES (' . $idphieunhap . ',' . $_SESSION['phieunhap'][$id]['idsanpham'] . ',' . $_SESSION['phieunhap'][$id]['idncc'] . ',' . $_SESSION['phieunhap'][$id]['soluong'] . ',' . $gia . ')';
        $query = mysqli_query($con, $sql);
    }
    unset($_SESSION['phieunhap']);

    header("location:index.php?id=quanlynhaphang&&trangthai=thanhcong");
}
