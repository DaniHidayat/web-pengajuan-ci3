<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Pengajuan Anggaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pengajuan Anggaran</a></li>
                <li class="breadcrumb-item active">Form</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row justify-content-center">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <!-- Form -->
                                <form action="<?= base_url('provinsi/tambah_pengajuan') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <br>
                                    <input type="hidden" value="<?= $this->session->userdata('user_id'); ?>"
                                        name="user_id">

                                    <div class="mb-3">
                                        <label for="Nama_pengajuan" class="form-label">Nama Pengajuan</label>
                                        <input type="text" class="form-control" id="Nama_pengajuan"
                                            name="Nama_pengajuan" required>
                                    </div>

                                    <!-- <div class="mb-3">
                                        <label for="anggaran" class="form-label">Anggaran</label>
                                        <input type="number" class="form-control" id="anggaran" name="anggaran">
                                    </div> -->

                                    <div class="mb-3">
                                        <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                                        <input type="date" class="form-control" id="tanggal_pengajuan"
                                            name="tanggal_pengajuan" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="file_bukti" class="form-label">Unggah Berkas Anggaran</label>
                                        <input type="file" class="form-control" id="file_bukti" name="file_bukti"
                                            required>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-info">Ajukan Pengajuan</button>
                                        <a href="<?= base_url('provinsi/pengajuan') ?>"
                                            class="btn btn-secondary">Kembali</a>
                                    </div>
                                </form>
                                <!-- End Form -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->