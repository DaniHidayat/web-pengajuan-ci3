<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?= base_url('Dashboard') ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Provinsi/anggarandaerah') ?>">
                <i class="bi bi-layout-text-window-reverse"></i><span>lihat statistic keseluruhan</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Provinsi/akunkabkota') ?>">
                <i class="bi bi-layout-text-window-reverse"></i><span>lihat statistic tiap provinsi</span>
            </a>

        </li><!-- End Tables Nav -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Provinsi/pengajuan') ?>">
                <i class="bi bi-bar-chart"></i><span>Pengajuan Anggaran</span>
            </a>

        </li> -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Admin/Profile') ?>">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Admin/faq') ?>">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('Login/logout') ?>">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->


    </ul>

</aside><!-- End Sidebar-->