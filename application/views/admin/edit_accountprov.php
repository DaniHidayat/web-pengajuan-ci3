<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Edit Akun</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Edit Akun</a></li>
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
                                <form action="<?php echo site_url('admin/updateprov'); ?>" method="post">
                                    <br>

                                    <!-- Pesan sukses atau gagal -->
                                    <?php if(isset($message)): ?>
                                    <?php echo $message; ?>
                                    <?php endif; ?>

                                    <input type="hidden" name="id" value="<?php echo $users['id']; ?>">

                                    <div class="mb-3">
                                        <label for="name_prov" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name_prov" name="name_prov"
                                            value="<?php echo $users['name_prov']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="<?php echo $users['email']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="<?php echo $users['username']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                                        <a href="<?= base_url('Admin/akunprov') ?>"
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