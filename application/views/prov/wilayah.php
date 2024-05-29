<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pengajuan di jawabarat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">status Pengajuan Anggaran di wiliyah jawa barat</li>
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
                                <h5 class="card-title">pengajuan <span>| Kab/Kota</span></h5>
                                <div class="d-flex justify-content-end mb-3">
                                    <a href="<?= base_url('Provinsi/pengajuan') ?>" type="button"
                                        class="btn btn-success" data-toggle="modal" data-target="#addModal"></i>
                                        Kembali</a>
                                </div>
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
                                        <tr>
                                            <th scope="row"><a href="#">1</a></th>
                                            <td>01/KotaTasikmalaya</td>
                                            <td><a href="#" class="text-info">Lihat Berkas</a></td>
                                            <td>Rp.8.000.000</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm"><i class="bi bi-eye"></i>
                                                    View</a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
                                                    Hapus</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">2</a></th>
                                            <td>02/kab.Tasikmalaya</td>
                                            <td><a href="#" class="text-info">Lihat Berkas</a>
                                            </td>
                                            <td>Rp.89.000.000</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm"><i class="bi bi-eye"></i>
                                                    View</a>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
                                                    Hapus</a>
                                            </td>
                                        </tr>
                                        <!-- Tambahkan baris lain di sini -->
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