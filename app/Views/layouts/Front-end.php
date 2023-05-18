<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-primary navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link text-white" data-toggle="dropdown" href="#">
                    <?= session()->get('email'); ?> &nbsp;<i class="nav-icon fas fa-user-circle fa-lg"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?php if (session()->get('status') == 'bendahara') {
                                            echo base_url('foto/' . $user[0]['foto']);
                                        } elseif (session()->get('status') == 'ketua') {
                                            echo base_url('foto/' . $user[1]['foto']);
                                        } else {
                                            echo base_url('foto/' . $user[2]['foto']);
                                        }
                                        ?>" alt="User Avatar" class="img-size-50 mr-3 img-rounded mt-2">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    <?= session()->get('name'); ?>

                                </h3>
                                <p class="text-lg"><?= session()->get('nama'); ?></p>
                                <p class="text-sm"><?= session()->get('status'); ?></p>
                                <p class="text-sm text-success"><i class="fas fa-circle mr-1"></i> Active</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url('logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php if (session()->get('status') == 'bendahara') { ?>
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link bg-primary">
                <img src="<?= base_url('img/logo.png') ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light ml-3"><b>YAYASAN C B N</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image mt-2">
                        <img src="<?php if (session()->get('status') == 'bendahara') {
                                        echo base_url('foto/' . $user[0]['foto']);
                                    } elseif (session()->get('status') == 'ketua') {
                                        echo base_url('foto/' . $user[1]['foto']);
                                    } else {
                                        echo base_url('foto/' . $user[2]['foto']);
                                    }  ?>" class="img-rounded elevation-2" alt="User Image">
                    </div>
                    <div class="info mt-0">
                        <a href="#" class="d-block"><?= session()->get('nama'); ?> </a>
                        <a href="#" class="d-block" style="font-size: small;"><?= session()->get('status'); ?> </a>

                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/Dashboard" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dashboard') {
                                                                        echo "active";
                                                                    } ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Dana-masuk') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Dana-keluar') {
                                                    echo "menu-open";
                                                } ?>">
                            <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dana-masuk') {
                                                            echo "active";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Dana-keluar') {
                                                                echo "active";
                                                            } ?>">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>
                                    Kelola Pendanaan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Dana-masuk" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dana-masuk') {
                                                                                echo "active";
                                                                            } ?>">
                                        <i class="fas fa-arrow-down nav-icon"></i>
                                        <p>Dana Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Dana-keluar" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dana-keluar') {
                                                                                echo "active";
                                                                            } ?>">
                                        <i class="fas fa-arrow-up nav-icon"></i>
                                        <p>Dana Keluar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Data-donatur') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Data-penerima-bantuan') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Data-satuan') {
                                                        echo "menu-open";
                                                    } ?>">
                            <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-donatur') {
                                                            echo "active";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Data-penerima-bantuan') {
                                                                echo "active";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Data-satuan') {
                                                                    echo "active";
                                                                } ?>">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Kelola List Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Data-donatur" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-donatur') {
                                                                                echo "active";
                                                                            } ?>">
                                        <i class="fas fa-user-secret nav-icon"></i>
                                        <p>List Donatur</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Data-penerima-bantuan" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-penerima-bantuan') {
                                                                                            echo "active";
                                                                                        } ?>">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>List Penerima Bantuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Data-satuan" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-satuan') {
                                                                                echo "active";
                                                                            } ?>">
                                        <i class="fas fa-receipt nav-icon"></i>
                                        <p>List Satuan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/Data-jenis" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Data-jenis') {
                                                                        echo "active";
                                                                    } ?>">
                                <i class="nav-icon fas fa-money-bill-wave"></i>
                                <p>
                                    Saldo
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Report-masuk') {
                                                echo "menu-open";
                                            } ?><?php if (current_url(true)->getSegment('2') == 'Report-keluar') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Report-donatur') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Report-bantuan') {
                                                            echo "menu-open";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Search-keluar') {
                                                                echo "menu-open";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Search-masuk') {
                                                                    echo "menu-open";
                                                                } ?>">
                            <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Report-masuk') {
                                                            echo "active";
                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Report-keluar') {
                                                                echo "active";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Report-donatur') {
                                                                    echo "active";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Report-bantuan') {
                                                                        echo "active";
                                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Search-keluar') {
                                                                            echo "active";
                                                                        } ?><?php if (current_url(true)->getSegment('2') == 'Search-masuk') {
                                                                                echo "active";
                                                                            } ?>">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>
                                    Report Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Report-masuk" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Report-masuk') {
                                                                                echo "active";
                                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Search-masuk') {
                                                                                    echo "active";
                                                                                } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Dana Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Report-keluar" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Report-keluar') {
                                                                                    echo "active";
                                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Search-keluar') {
                                                                                        echo "active";
                                                                                    } ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Dana Keluar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/Users" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Users') {
                                                                    echo "active";
                                                                } ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            <?php } ?>
            <!-- /.sidebar-menu -->

            <!-- /.sidebar -->
        </aside>
        <?php if (session()->get('status') == 'sekretaris') { ?>
            <aside class="main-sidebar sidebar-light-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link bg-primary">
                    <img src="<?= base_url('img/logo.png') ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light ml-3"><b>YAYASAN C B N</b></span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image mt-2">
                            <img src="<?php if (session()->get('status') == 'bendahara') {
                                            echo base_url('foto/' . $user[0]['foto']);
                                        } elseif (session()->get('status') == 'ketua') {
                                            echo base_url('foto/' . $user[1]['foto']);
                                        } else {
                                            echo base_url('foto/' . $user[2]['foto']);
                                        }  ?>" class="img-rounded elevation-2" alt="User Image">
                        </div>
                        <div class="info mt-0">
                            <a href="#" class="d-block"><?= session()->get('nama'); ?> </a>
                            <a href="#" class="d-block" style="font-size: small;"><?= session()->get('status'); ?> </a>

                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="/Dashboard" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dashboard') {
                                                                            echo "active";
                                                                        } ?>">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Dana-masuk') {
                                                    echo "menu-open";
                                                } ?><?php if (current_url(true)->getSegment('2') == 'Dana-keluar') {
                                                        echo "menu-open";
                                                    } ?>">
                                <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dana-masuk') {
                                                                echo "active";
                                                            } ?><?php if (current_url(true)->getSegment('2') == 'Dana-keluar') {
                                                                    echo "active";
                                                                } ?>">
                                    <i class="nav-icon fas fa-chart-line"></i>
                                    <p>
                                        Kelola Pendanaan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/Dana-masuk" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dana-masuk') {
                                                                                    echo "active";
                                                                                } ?>">
                                            <i class="fas fa-arrow-down nav-icon"></i>
                                            <p>Dana Masuk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/Dana-keluar" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dana-keluar') {
                                                                                    echo "active";
                                                                                } ?>">
                                            <i class="fas fa-arrow-up nav-icon"></i>
                                            <p>Dana Keluar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </nav>
                <?php } ?>
                <!-- /.sidebar-menu -->

                <!-- /.sidebar -->
            </aside>
            <?php if (session()->get('status') == 'ketua') { ?>
                <aside class="main-sidebar sidebar-light-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="index3.html" class="brand-link bg-primary">
                        <img src="<?= base_url('img/logo.png') ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light ml-3"><b>YAYASAN C B N</b></span>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image mt-2">
                                <img src="<?php if (session()->get('status') == 'bendahara') {
                                                echo base_url('foto/' . $user[0]['foto']);
                                            } elseif (session()->get('status') == 'ketua') {
                                                echo base_url('foto/' . $user[1]['foto']);
                                            } else {
                                                echo base_url('foto/' . $user[2]['foto']);
                                            }  ?>" class="img-rounded elevation-2" alt="User Image">
                            </div>
                            <div class="info mt-0">
                                <a href="#" class="d-block"><?= session()->get('nama'); ?> </a>
                                <a href="#" class="d-block" style="font-size: small;"><?= session()->get('status'); ?> </a>

                            </div>
                        </div>

                        <!-- SidebarSearch Form -->
                        <div class="form-inline">
                            <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-sidebar">
                                        <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                                <li class="nav-item">
                                    <a href="/Dashboard" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dashboard') {
                                                                                echo "active";
                                                                            } ?>">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item <?php if (current_url(true)->getSegment('2') == 'Dana-masuk') {
                                                        echo "menu-open";
                                                    } ?><?php if (current_url(true)->getSegment('2') == 'Dana-keluar') {
                                                        echo "menu-open";
                                                    } ?>">
                                    <a href="#" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dana-masuk') {
                                                                    echo "active";
                                                                } ?><?php if (current_url(true)->getSegment('2') == 'Dana-keluar') {
                                                                    echo "active";
                                                                } ?>">
                                        <i class="nav-icon fas fa-chart-line"></i>
                                        <p>
                                            Kelola Pendanaan
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/Dana-masuk" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dana-masuk') {
                                                                                        echo "active";
                                                                                    } ?>">
                                                <i class="fas fa-arrow-down nav-icon"></i>
                                                <p>Dana Masuk</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/Dana-keluar" class="nav-link <?php if (current_url(true)->getSegment('2') == 'Dana-keluar') {
                                                                                        echo "active";
                                                                                    } ?>">
                                                <i class="fas fa-arrow-up nav-icon"></i>
                                                <p>Dana Keluar</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    <?php } ?>
                    <!-- /.sidebar-menu -->

                    <!-- /.sidebar -->
                </aside>