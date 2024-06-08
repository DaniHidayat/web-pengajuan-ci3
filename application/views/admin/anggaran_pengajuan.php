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

                                <!-- <div class="d-flex justify-content-end mb-3">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#addModal"><i class="bi bi-plus"></i> Tambah</button>
                                </div> -->

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode/Nama Daerah</th>
                                            <th scope="col">Nama pengajuan</th>
                                            <th scope="col">Nilai Anggaran</th>

                                            <th scope="col">Status</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pengajuan as $key => $item): ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $item['Nama_Provinsi']; ?></td>
                                            <td><?php echo $item['Nama_pengajuan']; ?></td>

                                            <td> <?php 
												if ($item['anggaran'] !== null) {
													echo 'Rp.' . number_format($item['anggaran'], 0, ',', '.'); 
												} else {
													echo 'N/A'; // atau teks atau nilai default lainnya
												}
											?></a>
                                            </td>
                                            <td> <?php if ($item['status'] == 'Approved'): ?>
                                                <span class="badge bg-success"><?php echo $item['status']; ?></span>
                                                <?php elseif ($item['status'] == 'Pending'): ?>
                                                <span
                                                    class="badge bg-warning text-dark"><?php echo $item['status']; ?></span>
                                                <?php elseif ($item['status'] == 'Rejected'): ?>
                                                <span class="badge bg-danger"><?php echo $item['status']; ?></span>
                                                <?php else: ?>
                                                <span class="badge bg-secondary"><?php echo $item['status']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $item['keterangan']; ?></td>
                                            <td>
                                                <a href="<?= base_url('pusat/lihatpengajuan/'.$item['id_pengajuan']) ?>"
                                                    class="btn btn-info btn-sm"><i class="bi bi-eye"></i> View</a>
                                                <a href="<?= base_url('pusat/editanggaran/'.$item['id_pengajuan']) ?>"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('pusat/hapuspengajuan2/'.$item['id_pengajuan']) ?>"
                                                    class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
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