<main id="main" class="main">

    <div class="pagetitle">
        <h1>Anggaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Detail Pengajuan Anggaran</li>
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



                            <div class="card-body">
                                <h5 class="card-title">Pengajuan</h5>

                                <div class="d-flex justify-content-end mb-3">
                                    <!-- <a href="<?= base_url('Kabkota/tambahitem') ?>" type="button"
                                        class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                                            class="bi bi-plus"></i>Tambah
                                        item</a> -->
                                    <!-- <button type="button" class="btn btn-info ml-2"><i class="bi bi-save"></i>
                                        Simpan</button> -->
                                    <a href="<?= base_url('Pusat/wilayah') ?>" type="button"
                                        class="btn btn-secondary ml-2"><i class="bi bi-arrow-left"></i>
                                        Kembali</a>
                                </div>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Program</th>
                                            <th scope="col">Kegiatan</th>
                                            <th scope="col">KRO</th>
                                            <th scope="col">RO</th>
                                            <th scope="col">Komponen</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">subtotal</th>
                                            <th scope="col">total</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#">1</a></th>
                                            <td>
                                                <select class="select2" name="komponen">
                                                    <option value="Habis pakai">04664-Habis pakai</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>
                                                <select class="select2" name="kelompok">
                                                    <option value="Bahan">A.04664-Bahan</option>
                                                    <option value="Komponen">Komponen</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>
                                                <select class="select2" name="item">
                                                    <option value="Rfid">A.04664-AB-Rfid</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>
                                                <select name="item">
                                                    <option value="Rfid">umrah</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>
                                                <select name="komponen">
                                                    <option value="Rfid">komponen 1</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>Lembaga</td>
                                            <td>1</td>
                                            <td>5000</td>
                                            <td>10,000</td>
                                            <td>

                                                <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
                                                    Hapus</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">1</a></th>
                                            <td>
                                                <select class="select2" name="komponen">
                                                    <option value="Habis pakai">04664-Habis pakai</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>
                                                <select class="select2" name="kelompok">
                                                    <option value="Bahan">A.04664-Bahan</option>
                                                    <option value="Komponen">Komponen</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>
                                                <select class="select2" name="item">
                                                    <option value="Rfid">A.04664-AB-Rfid</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>
                                                <select name="item">
                                                    <option value="Rfid">umrah</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>
                                                <select name="komponen">
                                                    <option value="Rfid">komponen 1</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                </select>
                                            </td>
                                            <td>Lembaga</td>
                                            <td>1</td>
                                            <td>5000</td>
                                            <td>10,000</td>
                                            <td>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Pilih opsi",
        allowClear: true,
        width: '100%'
    });
});
</script>