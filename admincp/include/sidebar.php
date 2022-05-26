        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Aishop Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Thống kê -->
            <!--  Nav item - Quản lý Sản phẩm-->
            <?php for ($i = 0; $i < count($quyenquanlysanpham); $i++) {
                if ($quyenquanlysanpham[$i] == 'xem') {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=thongke">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Thống kê</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=quanlysanpham">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Quản lý sản phẩm</span>
                        </a>
                    </li>
            <?php }
            } ?>
            <!--  Nav item - Quản lý Admin-->
            <?php for ($i = 0; $i < count($quyenquanlyadmin); $i++) {
                if ($quyenquanlyadmin[$i] == 'xem') {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=quanlyadmin">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Quản lý Admin</span>
                        </a>
                    </li>
            <?php }
            } ?>
            <!-- Nav Item - Quản lý tài khoản khách hàng -->
            <!-- Nav Item - Danh mục -->
            <!-- Nav Item - Banner -->
            <?php for ($i = 0; $i < count($quyenquanlyuser); $i++) {
                if ($quyenquanlyuser[$i] == 'xem') {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=quanlyuser">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Quản lý tài khoản khách hàng</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=quanlydanhmuc">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Quản lý danh mục</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=quanlybanner">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Quản lý Banner</span></a>
                    </li>
            <?php }
            } ?>
            <!--  Nav item - Quản lý Hóa đơn-->
            <?php for ($i = 0; $i < count($quyenquanlyhoadon); $i++) {
                if ($quyenquanlyhoadon[$i] == 'xem') {
            ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=quanlyhoadon">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Quản lý hóa đơn</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?id=quanlynhaphang">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Quản lý nhập hàng</span>
                        </a>
                    </li>
            <?php }
            } ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>