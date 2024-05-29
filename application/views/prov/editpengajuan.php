<main id="main" class="main">

    <div class="pagetitle">
        <h1>Anggaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Kabkota') ?>">Home</a></li>
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
                            <div class="card-body">
                                <h5 class="card-title">Edit/Ajukan <span>| Pengajuan</span></h5>

                                <div class="d-flex justify-content-end mb-3">
                                    <a href="<?= base_url('provinsi/tambahitem?id_pengajuan='.$id_pengajuan) ?>"
                                        type="button" class="btn btn-success mx-3" data-toggle="modal"
                                        data-target="#addModal"><i class="bi bi-plus"></i>Tambah
                                        item</a>
                                    <a href="<?= base_url('provinsi/pengajuan') ?>" type="button"
                                        class="btn btn-secondary ml-2"><i class="bi bi-arrow-left"></i>
                                        Kembali</a>
                                </div>

                                <?php if (!empty($import_prov)) : ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Program</th>
                                            <th>Kegiatan</th>
                                            <th>KRO</th>
                                            <th>RO</th>
                                            <th>Komponen</th>
                                            <th>Satuan</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($import_prov as $index => $row): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $row->Program ?></td>
                                            <td><?= $row->Kegiatan ?></td>
                                            <td><?= $row->KRO ?></td>
                                            <td><?= $row->RO ?></td>
                                            <td><?= $row->Komponen ?></td>
                                            <td><?= $row->Satuan ?></td>
                                            <td><?= $row->Qty ?></td>
                                            <td><?= $row->subtotal ?></td>
                                            <td><?= $row->total ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="text-right mt-3">
                                    <?php if(isset($id_pengajuan)): ?>
                                    <a href="<?= base_url('provinsi/downloadData/' . $id_pengajuan) ?>"
                                        class="btn btn-info">Download Data</a>
                                    <?php else: ?>
                                    <p>ID Pengajuan tidak ditemukan. Tidak dapat mengunduh data.</p>
                                    <?php endif; ?>
                                </div>

                                <?php else : ?>
                                <p>Data tidak tersedia.</p>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->

<!-- Include the Select2 JS and CSS files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

<!-- Initialize Select2 -->
<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Pilih opsi",
        allowClear: true,
        width: '100%'
    });
});
</script>