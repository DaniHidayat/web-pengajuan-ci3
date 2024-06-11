<main id="main" class="main">

    <div class="pagetitle">
        <h1>Laporan Anggaran </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
			
            <div class="col-lg-12">

                <div class="card">
					<div class="my-2">
					<form action="getlapByProvince"method="POST">
					<div class="row">
   
						<div class="col-md-3">
							<select class="form-select" name="provinsi" id="select1">
								<?php foreach($provinces as $prop) :?>
								<option value="<?= $prop->ID_Provinsi;?>"><?= $prop->Nama_Provinsi;?></option>
								
								<?php endforeach;?>
							</select>
						</div>
						
						<div class="col-md-3">
							<button type="submit" class="btn btn-success">Download</button>
						</div>
					</div>
					</form>

					</div>



                    <div class="card-body">
                        <!-- <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php endif; ?> -->
                        <!-- <h5 class="card-title">Akun Provinsi</h5> -->
                        <!-- Table with stripped rows -->
                        <!-- <div class="mb-3">
                            <a href="<?php echo site_url('Accountpusat/addprov'); ?>" type="button"
                                class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>

                        </div> -->
						<table class="table table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">kodedaerah/Nama</th>
								<th scope="col">Total Anggaran</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$total_all = 0;
							foreach ($data as $key => $row): 
								$total_anggaran = $row['total_anggaran'] ?? 0;
								$total_all += $total_anggaran;
							?>
							<tr>
								<td><?php echo $key + 1; ?></td>
								<td><?php echo $row['Nama_Provinsi']; ?></td>
								<td><?php echo "Rp " . number_format($total_anggaran, 2, ',', '.'); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th scope="col" colspan="2">Total Semua Provinsi</th>
								<th scope="col"><?php echo "Rp " . number_format($total_all, 2, ',', '.'); ?></th>
							</tr>
						</tfoot>
					</table>


                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- JavaScript to trigger modals -->
<script>
$(document).ready(function() {
	$('#tbl_laporan').DataTable();
    $('.btn-info').click(function() {
        $('#viewModal').modal('show');
    });

    $('.btn-warning').click(function() {
        $('#editModal').modal('show');
    });
});
</script>
