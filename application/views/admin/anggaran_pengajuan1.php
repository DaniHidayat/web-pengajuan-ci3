<main id="main" class="main">

    <div class="pagetitle">
        <h1>Anggaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Status Pengajuan Anggaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

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
                                <h5 class="card-title">Pengajuan <span>| Kab/Kota</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode/Nama Daerah</th>
                                            <th scope="col">Berkas Anggaran</th>
                                            <th scope="col">Jumlah Anggaran Keseluruhan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pengajuan_kabkota as $key => $item): ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $item['kodenama_daerah']; ?>
                                            </td>
                                            <td><a href="#" class="text-info">Lihat Berkas</a></td>
                                            <td><?php echo 'Rp.' . number_format($item['anggaran'], 0, ',', '.'); ?>
                                            </td>
                                            <td>
                                                <?php
                                                $status = $item['status'];
                                                if ($status == 'Approved') {
                                                    echo '<span class="badge bg-success">' . $status . '</span>';
                                                } elseif ($status == 'Pending') {
                                                    echo '<span class="badge bg-warning">' . $status . '</span>';
                                                } else {
                                                    echo '<span class="badge bg-danger">' . $status . '</span>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm"><i class="bi bi-eye"></i>
                                                    View</a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
                                                    Hapus</a>
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