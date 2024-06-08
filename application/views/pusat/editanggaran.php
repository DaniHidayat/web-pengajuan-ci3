<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Edit Pengajuan Anggaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pengajuan Anggaran provinsi</a></li>
                <li class="breadcrumb-item active"></li>
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
                                <form action="<?= base_url('pusat/update_pengajuan') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <br>
                                    <input type="hidden" name="id_pengajuan"
                                        value="<?php echo $pengajuan['id_pengajuan']; ?>">

                                    <div class="mb-3">
                                        <label for="kodeNama" class="form-label">Kode/Nama Daerah</label>
                                        <input type="text" class="form-control" id="kodeNama" name="kodenama_daerah"
                                            value="<?= $pengajuan['kodenama_daerah'] ?>" disabled>
                                        <input type="hidden" name="kodenama_daerah"
                                            value="<?= $pengajuan['kodenama_daerah'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="namaPengajuan" class="form-label">Nama Pengajuan</label>
                                        <input type="text" class="form-control" id="namaPengajuan" name="Nama_pengajuan"
                                            value="<?= $pengajuan['Nama_pengajuan'] ?>" disabled>
                                        <input type="hidden" name="Nama_pengajuan"
                                            value="<?= $pengajuan['Nama_pengajuan'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlahAnggaran" class="form-label">Jumlah Anggaran
                                            Keseluruhan</label>
                                        <input type="text" class="form-control" id="jumlahAnggaran" name="anggaran"
                                            value="<?= $pengajuan['anggaran'] ?>" disabled>
                                        <input type="hidden" name="anggaran" value="<?= $pengajuan['anggaran'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggalPengajuan" class="form-label">Tanggal Pengajuan</label>
                                        <input type="date" class="form-control" id="tanggalPengajuan"
                                            name="tanggal_pengajuan" value="<?= $pengajuan['tanggal_pengajuan'] ?>"
                                            disabled>
                                        <input type="hidden" name="tanggal_pengajuan"
                                            value="<?= $pengajuan['tanggal_pengajuan'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" id="unggahFile" name="file_bukti"
                                            value="<?= $pengajuan['file_bukti'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                                            value="<?= $pengajuan['keterangan'] ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="">Pilih Status</option>
                                            <option value="Approved"
                                                <?= $pengajuan['status'] == 'Approved' ? 'selected' : '' ?>>Approved
                                            </option>
                                            <option value="Pending"
                                                <?= $pengajuan['status'] == 'Pending' ? 'selected' : '' ?>>Pending
                                            </option>
                                            <option value="Rejected"
                                                <?= $pengajuan['status'] == 'Rejected' ? 'selected' : '' ?>>Rejected
                                            </option>
                                        </select>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                                        <a href="<?= base_url('pusat/anggaran') ?>"
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
<!-- End #main -->