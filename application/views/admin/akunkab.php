<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Akun Kab/Kota </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
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
                        <h5 class="card-title">Akun Provinsi</h5>
                        <!-- Table with stripped rows -->
                        <div class="mb-3">
                            <a href="<?php echo site_url('account/addkab'); ?>" type="button" class="btn btn-success"><i
                                    class="fas fa-plus"></i> Tambah</a>

                        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">kodedaerah/Nama</th>
                                    <th scope="col">Wilayah</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($users as $key => $users): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $users['name']; ?></td>
                                    <td><?php echo $users['wilayah']; ?></td>
                                    <td><?php echo $users['email']; ?></td>
                                    <td><?php echo $users['username']; ?></td>
                                    <td><?php echo $users['role']; ?></td>
                                    <td>

                                        <a href="<?php echo site_url('Admin/editkab/'.$users['id']); ?>"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?php echo site_url('Admin/deletekab/'.$users['id']); ?>"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <!-- Add more rows here -->
                            </tbody>
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
    $('.btn-info').click(function() {
        $('#viewModal').modal('show');
    });

    $('.btn-warning').click(function() {
        $('#editModal').modal('show');
    });
});
</script>