<?php
if (!isset($_SESSION['num'])) {
    $_SESSION['num'] = 0;
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = 'show';
}
$limit_pg = 12;
if (isset($_GET["datefrom"]) && isset($_GET["dateto"])) {
    $datefrom = $_GET["datefrom"];
    $dateto = $_GET["dateto"];
    $sql = "SELECT * FROM tbl_phieunhap AND tbl_phieunhap.ngaynhap BETWEEN '" . $datefrom . "' AND '" . $dateto . "' ORDER BY tbl_phieunhap.ngaynhap DESC";
} else if (isset($_POST["datefrom"]) && isset($_POST["dateto"])) {
    $datefrom = $_POST["datefrom"];
    $dateto = $_POST["dateto"];
    $sql = "SELECT * FROM tbl_phieunhap AND tbl_phieunhap.ngaynhap BETWEEN '" . $datefrom . "' AND '" . $dateto . "' ORDER BY tbl_phieunhap.ngaynhap DESC";
} else {
    $sql = "SELECT * FROM tbl_phieunhap ORDER BY tbl_phieunhap.ngaynhap DESC";
}
if ($action == 'show') {
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    $page = ceil($row / $limit_pg);
    if (isset($_GET['page'])) {
        $pg = $_GET['page'];
    } else {
        $pg = 1;
    }
    $start = ($pg - 1) * $limit_pg;
    $sql = $sql . " LIMIT $start,$limit_pg";
    $query = mysqli_query($con, $sql);
}
if ($action == 'xemchitiet') {
    if (isset($_GET['idnhaphang'])) {
        $idnhaphang = $_GET['idnhaphang'];
        $sql="SELECT * FROM tbl_chitietphieunhap WHERE id_phieunhap = 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_num_rows($query);
        $page = ceil($row / $limit_pg);
        if (isset($_GET['page'])) {
            $pg = $_GET['page'];
        } else {
            $pg = 1;
        }
        $start = ($pg - 1) * $limit_pg;
        $sql = $sql . " LIMIT $start,$limit_pg";
        $query = mysqli_query($con, $sql);
    } else {
        header("location:index.php?id=quanlynhaphang");
    }
}
if ($action == 'xoa') {
    $id = $_GET['idnhaphang'];
    $sql = "DELETE FROM `tbl_chitietphieunhap` WHERE id_phieunhap = " . $id;
    $query = mysqli_query($con, $sql);
    $sql = "DELETE FROM `tbl_phieunhap` WHERE id_phieunhap = " . $id;
    $query = mysqli_query($con, $sql);
    $_SESSION['num']--;
?>
    <script>
        alert("Thao t??c th??nh c??ng");
        location.href = "index.php?id=quanlynhaphang";
    </script>
    <?php
}
if ($action == 'thempn') {
    $sql_id = "SELECT id_phieunhap FROM tbl_phieunhap ORDER BY id_phieunhap DESC LIMIT 1";
    $query = mysqli_query($con, $sql_id);
    $new_id = mysqli_fetch_assoc($query)["id_phieunhap"] + 1;
    $sql_ncc = "SELECT * FROM tbl_nhacungcap";
    $query = mysqli_query($con, $sql_ncc);
    while ($row = mysqli_fetch_array($query)) {
        $id_nhacungcap[] = $row["id_nhacungcap"];
        $ten_ncc[] = $row["tenncc"];
    }
    $sql_sp = "SELECT id_sanpham, ten_sanpham, gia FROM `tbl_sanpham`";
    $query = mysqli_query($con, $sql_sp);
    while ($row = mysqli_fetch_array($query)) {
        $id_sanpham[] = $row["id_sanpham"];
        $ten_sanpham[] = $row["ten_sanpham"];
        $sanpham[] = $row["id_sanpham"] . ". " . $row["ten_sanpham"];
        $gia[] = $row["gia"];
    }
}

if (isset($_GET['trangthai'])) {
    $trangthai = $_GET['trangthai'];
    if ($trangthai == 'thanhcong') {
    ?>
        <script>
            alert("Thao t??c th??nh c??ng");
            location.href = "index.php?id=quanlynhaphang";
        </script>
    <?php
    } ?>
    <?php
    if ($trangthai == 'thempnthatbai') {
    ?>
        <script>
            //alert("Th??m th???t b???i");
            location.href = "index.php?id=quanlynhaphang&action=thempn";
        </script>
    <?php
    }
    if ($trangthai == 'thempnthanhcong') {
    ?>
        <script>
            //alert("Thao t??c th??nh c??ng");
            location.href = "index.php?id=quanlynhaphang&action=thempn";
        </script>
<?php
    }
}
if (isset($_GET['xoa'])) {
    unset($_SESSION['phieunhap'][$_GET['xoa']]);
}
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Qu???n l?? nh???p h??ng</h1>
    <?php if ($action == 'show') { ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Xem h??a ????n trong kho???ng:
                <form action="index.php?" class="form" method="POST">
                    <input type="input" hidden="true" class="form-control" name="id" value="quanlynhaphang">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="datefrom">Ng??y b???t ?????u</label>
                                <input type="date" class="form-control" name="datefrom" value=<?php if (isset($_POST["datefrom"]) || isset($_GET["datefrom"])) echo $datefrom; ?>>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label" for="dateto">Ng??y k???t th??c</label>
                                <input type="date" class="form-control" name="dateto" value=<?php if (isset($_POST["dateto"]) || isset($_GET["dateto"])) echo $dateto; ?>>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">X??c nh???n</button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID h??a ????n</th>
                                <th>Ng??y nh???p</th>
                                <th>S??? l?????ng</th>
                                <th>T???ng ti???n</th>
                                <th>Tr???ng th??i</th>
                                <th>Thao t??c</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_phieunhap'] ?></td>
                                    <td><?php echo $data['ngaynhap'] ?></td>
                                    <td><?php echo $data['soluong'] ?></td>
                                    <td><?php echo number_format($data['tongtien']) ?>??</td>
                                    <td><?php echo $data['trangthai'] ?></td>
                                    <td>
                                        <?php
                                        echo '<a href="index.php?id=quanlynhaphang&action=xemchitiet&&idnhaphang=' . $data["id_phieunhap"] . '" class="btn btn-success" style="margin-right:5px"> Xem chi ti???t</a>';
                                        for ($i = 0; $i < count($quyenquanlyhoadon); $i++) {
                                            if ($quyenquanlyhoadon[$i] == 'xuli') {
                                                switch ($data["trangthai"]) {
                                                    case 'Ch??a nh???n h??ng. Ch??a thanh to??n':
                                                        echo '<a href="index.php?id=quanlynhaphang&action=xuli&&idnhaphang=' . $data["id_phieunhap"] . '" class="btn btn-warning" style="margin-right:5px"> X??? l??</a>';
                                                        echo '<a href="index.php?id=quanlynhaphang&action=xoa&&idnhaphang=' . $data["id_phieunhap"] . '" class="btn btn-danger" style="margin-right:5px"> X??a</a>';
                                                        break;
                                                    case '???? nh???n h??ng. ???? thanh to??n':
                                                        break;
                                                    default:
                                                        echo '<a href="index.php?id=quanlynhaphang&action=xuli&&idnhaphang=' . $data["id_phieunhap"] . ' " class="btn btn-warning" style="margin-right:5px"> X??? l??</a>';
                                                        break;
                                                }
                                            }
                                        } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $page; $i++) {
                                    if ($i == $pg) {
                                        $active = "active";
                                ?>
                                        <li class="paginate_button page-item <?php echo $active ?> "><a href="index.php?id=quanlynhaphang&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                    <?php } else {
                                    ?>
                                        <li class="paginate_button page-item"><a href="index.php?id=quanlynhaphang&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                <?php }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="index.php?id=quanlynhaphang&action=thempn" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Th??m phi???u nh???p m???i</span>
        </a>
    <?php } ?>
    <?php if ($action == 'xemchitiet') { ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                Xem h??a ????n s??? <?php echo $idnhaphang;?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID s???n ph???m</th>
                                <th>ID Nh?? cung c???p</th>
                                <th>S??? l?????ng</th>
                                <th>????n gi??</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_sanpham'] ?></td>
                                    <td><?php echo $data['id_ncc'] ?></td>
                                    <td><?php echo $data['soluong'] ?></td>
                                    <td><?php echo number_format($data['dongia']) ?>??</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $page; $i++) {
                                    if ($i == $pg) {
                                        $active = "active";
                                ?>
                                        <li class="paginate_button page-item <?php echo $active ?> "><a href="index.php?id=quanlynhaphang&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                    <?php } else {
                                    ?>
                                        <li class="paginate_button page-item"><a href="index.php?id=quanlynhaphang&page=<?php echo $i ?>" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i ?></a></li>
                                <?php }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="index.php?id=quanlynhaphang" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Tr??? v???</span>
        </a>
    <?php } ?>

    <?php
    if ($action == 'xuli') {
        $id_pn = $_GET['idnhaphang'];
        $sql_sua = "SELECT * FROM tbl_phieunhap WHERE id_phieunhap = $id_pn";
        $query_sua = mysqli_query($con, $sql_sua);
        $phieunhap = mysqli_fetch_assoc($query_sua);
        $tt = explode('.', $phieunhap['trangthai']);
    ?>
        <div class="col">
            <h3 class="row">X??? l?? phi???u nh???p</h3>
            <h4 class="row">Th??ng tin phi???u nh???p ng??y <?php echo $phieunhap['ngaynhap'] ?></h4>
            <div class="row">
                <ul class="list-group col-7">
                    <li class="list-group-item">ID phi???u nh???p: <?php echo $phieunhap['id_phieunhap'] ?></li>
                    <li class="list-group-item">Ng??y nh???p: <?php echo $phieunhap['ngaynhap'] ?></li>
                    <li class="list-group-item">Tr???ng th??i phi???u nh???p: <?php echo $phieunhap['trangthai'] ?></li>
                    <li class="list-group-item">T???ng h??a ????n: <?php echo number_format($phieunhap['tongtien']) ?>??</li>
                </ul>
            </div>
            <div class="row" style="margin-top: 10px;">
                <form class="form" action="xuli-nhaphang.php" method="POST" name="tdtrangthai" id="tdtrangthai">
                    <input type="hidden" value="<?php echo $phieunhap['id_phieunhap'] ?>" name="idphieunhap" id="idphieunhap">
                    <div class="form-group row">
                        <div class="col">

                            <select class="form-control" name="nhanhang" id="nhanhang">
                                <option value="Ch??a nh???n h??ng" id="cnh" <?php if ($tt[0] == "???? nh???n h??ng") echo "disabled";
                                                                        else echo "selected"; ?>>Ch??a nh???n h??ng</option>
                                <option value="???? nh???n h??ng" id="dnh" <?php if ($tt[0] == "???? nh???n h??ng") echo "selected" ?>>???? nh???n h??ng</option>
                            </select>
                        </div>
                        <div class="col">

                            <select class="form-control" name="thanhtoan" id="thanhtoan">
                                <option value="Ch??a thanh to??n" id="ctt" <?php if ($tt[1] == "Ch??a thanh to??n") echo "selected" ?>>Ch??a thanh to??n</option>
                                <option value="???? thanh to??n" id="dtt" <?php if ($tt[1] == "???? thanh to??n") echo "selected" ?>>???? thanh to??n</option>
                            </select>
                        </div>
                    </div>
                    <button class="form-group btn btn-success" name="tdtrangthai" type="submit">X??c nh???n thay ?????i</button>
                </form>
            </div>
            <button class="btn btn-primary" type="submit" onclick="window.history.back(-1)">Tr??? l???i</button>
        </div>
    <?php } ?>
    <?php if ($action == 'thempn') { ?>
        <div class="row">
            <div class="col-6" style="display: flex;width: 600px;padding: 30px;margin: auto;border: solid 1px black;border-radius: 20px;">
                <form class="form" action="xuli-nhaphang.php" method="GET" name="themphieunhap" id="themphieunhap">
                    <legend> Form nh???p h??ng</legend>
                    <div class="form-group">
                        <label for="sanpham" class="form-label">S???n ph???m</label>
                        <input class="form-control" list="listsanpham" name="idsanpham" id="sanpham" placeholder="T??m ki???m s???n ph???m">
                        <datalist id="listsanpham" multiple="multiple">
                            <?php for ($i = 0; $i < sizeof($id_sanpham); $i++) {
                                echo '<option value="' . $sanpham[$i] . '" label="' . $i . '">';
                            } ?>
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Nhacuncap">Nh?? cung c???p</label>
                        <select class="form-control" name="id_ncc" aria-label="Nhacungcap">
                            <?php for ($i = 0; $i < sizeof($id_nhacungcap); $i++) {
                                echo '<option value="' . $id_nhacungcap[$i] . '">' . $ten_ncc[$i] . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="soluong">S??? l?????ng</label>
                        <input type="number" class="form-control" name="soluong" aria-label="soluong" value="0">
                        </input>
                    </div>
                    <button class="form-group btn btn-success" name="thempn" value="<?php echo $new_id; ?>" type="submit">Th??m</button>
                </form>
            </div>

            <div class="col-6">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>T??n s???n ph???m</th>
                            <th>T??n nh?? cung c???p</th>
                            <th>S??? l?????ng</th>
                            <th>Thao t??c</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['phieunhap'])) {
                            foreach ($_SESSION['phieunhap'] as $id => $value) {
                        ?>
                                <tr>
                                    <td><?php echo $_SESSION['phieunhap'][$id]['sanpham']; ?></td>
                                    <td><?php echo $_SESSION['phieunhap'][$id]['tenncc']; ?></td>
                                    <td><?php echo $_SESSION['phieunhap'][$id]['soluong']; ?></td>
                                    <td><a class="btn btn-danger" href="index.php?id=quanlynhaphang&action=thempn&xoa=<?php echo $id ?>">X??a</a></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-6-mg" style="margin-top: 10px;">
            <a class="btn btn-primary" href="index.php?id=quanlynhaphang">Tr??? l???i</a>
            <a href="xuli-nhaphang.php?hoantatphieunhap&idphieunhap=<?php echo $new_id; ?>" class="btn btn-warning">Ho??n t???t nh???p h??ng</a>
        </div>
    <?php }
