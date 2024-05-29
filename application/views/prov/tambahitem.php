<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Tambah Item Pengajuan </h1>
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
                                <form action="<?= base_url('provinsi/tambah_item') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <br>
                                    <input type="hidden" value="<?php echo $_GET['id_pengajuan'] ;?>"
                                        name="id_pengajuan" id="id_pengajuan">
                                    <div class="mb-3">
                                        <label for="program" class="form-label">Program</label>
                                        <select class="form-control" id="program" name="program" required>
                                            <option value="">Pilih Program</option>
                                            <?php foreach ($program as $item): ?>
                                            <option value="<?php echo $item['program_name']; ?>">
                                                <?php echo $item['program_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="kegiatan" class="form-label">Kegiatan</label>
                                        <select class="form-control" id="kegiatan" name="kegiatan" required>
                                            <option value="">Pilih Kegiatan</option>
                                            <?php foreach ($kegiatan as $item): ?>
                                            <option value="<?php echo $item['kegiatan_name']; ?>">
                                                <?php echo $item['kegiatan_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>

                                    <!-- Bagian KRO -->
                                    <div class="mb-3">
                                        <label for="kro" class="form-label">KRO</label>
                                        <select class="form-control" id="kro" name="kro" required>
                                            <option value="">Pilih KRO</option>
                                            <?php foreach ($kro as $item): ?>
                                            <option value="<?php echo $item['kro_name']; ?>">
                                                <?php echo $item['kro_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Bagian RO -->
                                    <div class="mb-3">
                                        <label for="ro" class="form-label">RO</label>
                                        <select class="form-control" id="ro" name="ro" required>
                                            <option value="">Pilih RO</option>
                                            <?php foreach ($ro as $item): ?>
                                            <option value="<?php echo $item['ro_name']; ?>">
                                                <?php echo $item['ro_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Bagian Komponen -->
                                    <div class="mb-3">
                                        <label for="komponen" class="form-label">Komponen</label>
                                        <select class="form-control" id="komponen" name="komponen" required>
                                            <option value="">Pilih Komponen</option>
                                            <?php foreach ($komponen as $item): ?>
                                            <option value="<?php echo $item['komponen_name']; ?>">
                                                <?php echo $item['komponen_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="satuan" class="form-label">Satuan</label>
                                        <select class="form-control" id="satuan" name="satuan" required>
                                            <option value="">Pilih Satuan</option>
                                            <?php foreach ($satuan as $item): ?>
                                            <option value="<?php echo $item['satuan_name']; ?>">
                                                <?php echo $item['satuan_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="qty" class="form-label">Qty</label>
                                        <input type="number" class="form-control" id="qty" name="qty" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="subtotal" class="form-label">Subtotal</label>
                                        <input type="text" class="form-control" id="subtotal" name="subtotal" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="total" class="form-label">Total</label>
                                        <input type="text" readonly class="form-control" id="total" name="total"
                                            required>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-info">Tambah Item</button>
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