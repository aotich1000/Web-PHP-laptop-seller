            <!-- Main Content -->
            <div id="content" style="width: 100%;">

                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 topbar static-top shadow">
                    <div class="nav-item mr-auto"></div>
                    <div class="nav-item mr-auto nav-link">
                        <a class="navbar-brand " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 big"><?php echo $_SESSION['admin']['user_name'] ?></span>
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                        </a>
                    </div>
                    <a class="btn btn-outline-danger my-2 my-sm-0a nav-link" href="index.php?action=dangxuat" role="button">Đăng xuất</a>
                </nav>