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
                                            <th scope="col">Nilai Anggaran</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#">1</a></th>
                                            <td>03/Jawa barat</td>
                                            <td><a href="#" class="text-info">Rp 8.500.000.000</a></td>

                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#viewModal"><i class="bi bi-eye"></i> View</button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal"><i class="bi bi-trash"></i>
                                                    Hapus</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">2</a></th>
                                            <td>04/jawa timur</td>
                                            <td><a href="#" class="text-info">Rp 9.300.000.000</a>
                                            </td>

                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#viewModal"><i class="bi bi-eye"></i> View</button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal"><i class="bi bi-trash"></i>
                                                    Hapus</button>
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