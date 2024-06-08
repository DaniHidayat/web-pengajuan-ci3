<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pengajuan Anggaran Daerah</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">status Pengajuan Anggaran daerah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Button tambah pengajuan -->
                    <!-- <div class="col-12 mb-3">
                        <a href="<?= base_url('Kabkota/tambahpengajuan') ?>" class="btn btn-success"><i
                                class="bi bi-plus"></i> Tambah
                            Pengajuan</a>
                    </div> -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">pengajuan <span>| Kab/Kota</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode/Nama Daerah</th>
                                            <th scope="col">Nama pengajuan</th>
                                            <th scope="col">Jumlah Anggaran Keseluruhan</th>
                                            <th scope="col">Tanggal pengajuan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pengajuan as $key => $item): ?>
                                        <tr>
                                            <th scope="row"><?= $key + 1 ?></th>
                                            <td><?= $item['Nama_KotaKab'] ?></td>
                                            <td><?= $item['Nama_pengajuan'] ?></a></td>
                                            <td><?= $item['anggaran'] ?></td>
                                            <td><?= $item['tanggal_pengajuan'] ?></td>
                                            <!-- <td>
                                                <a href="<?= base_url('Departement/lihatBerkas1/' . $item['id_pengajuan']) ?>"
                                                    target="_blank" class="text-info">lihat berkas</a>
                                            </td> -->
                                            <td>
                                                <span class="badge bg-<?php 
        if ($item['status'] == 'Pending') {
            echo 'warning';
        } elseif ($item['status'] == 'Rejected') {
            echo 'danger';
        } else {
            echo 'success';
        }
    ?>">
                                                    <?= $item['status'] ?>
                                                </span>
                                            </td>

                                            <td><?= $item['keterangan'] ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/lihatpengajuan1/'.$item['id_pengajuan']) ?>"
                                                    class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Lihat
                                                    Pengajuan</a>
                                                <!-- <a href="<?= base_url('admin/editanggaran1/'.$item['id_pengajuan']) ?>"
                                                    class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a> -->
                                                <a href="<?= base_url('admin/hapuspengajuan1/'.$item['id_pengajuan']) ?>"
                                                    class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->