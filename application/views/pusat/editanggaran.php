<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Edit Pengajuan Anggaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pengajuan Anggaran</a></li>
                <li class="breadcrumb-item active">Form Edit</li>
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
                                <form>
                                    <br>

                                    <div class="mb-3">
                                        <label for="kodeNama" class="form-label">Kode/Nama Daerah</label>
                                        <input type="text" class="form-control" id="kodeNama" name="kodeNama" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlahAnggaran" class="form-label">Jumlah Anggaran
                                            Keseluruhan</label>
                                        <input type="text" class="form-control" id="jumlahAnggaran"
                                            name="jumlahAnggaran" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="setujui">Disetujui</option>
                                            <option value="pending">Pending</option>
                                            <option value="tolak">Ditolak</option>
                                        </select>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        <a href="<?= base_url('Pusat') ?>" class="btn btn-secondary">Kembali</a>
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