<main id="main" class="main">

    <div class="pagetitle">
        <h1>Anggaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">status Pengajuan Anggaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Button tambah pengajuan -->
                    <div class="col-12 mb-3">
                        <a href="<?= base_url('provinsi/tambahpengajuan') ?>" class="btn btn-success"><i
                                class="bi bi-plus"></i> Tambah
                            Pengajuan</a>
                    </div>

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
                                <h5 class="card-title">pengajuan <span>| provinsi</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode/Nama Daerah</th>
                                            <th scope="col">Nama pengajuan</th>
                                            <th scope="col">Jumlah Anggaran Keseluruhan</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pengajuan as $key => $item): ?>
                                        <tr>
                                            <th scope="row"><?php echo $key + 1; ?></th>
                                            <td><?php echo $item['Nama_Provinsi']; ?></td>
                                            <td><a href="#" class="text-info"><?php echo $item['Nama_pengajuan']; ?></a>
                                            </td>

                                            <td>
                                                <?php 
												if ($item['anggaran'] !== null) {
													echo 'Rp.' . number_format($item['anggaran'], 0, ',', '.'); 
												} else {
													echo 'N/A'; // atau teks atau nilai default lainnya
												}
											?>
                                            </td>


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
                                            <td><?php echo $item['keterangan']; ?></td>
                                            <td>
                                                <a href="<?= base_url($item['file_bukti']) ?>"
                                                    class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Lihat
                                                    Berkas Pengajuan</a>
                                                <a href="<?= base_url('provinsi/editpengajuan/'.$item['id_pengajuan']) ?>"
                                                    class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                                                <a href="<?= base_url('provinsi/hapuspengajuan/'.$item['id_pengajuan']) ?>"
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